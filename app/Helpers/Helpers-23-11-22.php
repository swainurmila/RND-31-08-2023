<?php

namespace App\Helpers;

use App\Jobs\SendSmsJob;
use App\Models\CoSupervisorApplicationInfo;
use App\Models\ExtentionCompleteWork;
use App\Models\PhdApplicationInfo;
use App\Models\Student;
use App\Models\SupervisorApplicationInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Helpers
{
    // public static function appliedApplication()
    // {
    //     $application = PhdApplicationInfo::select(['id', 'stud_id', 'name', 'enrollment_no', 'stu_payment_status', 'stu_payment_status', 'enrollment_date', 'email', 'phone', 'topic_of_phd_work', 'student_category', 'application_status'])
    //         ->where([['stu_payment_status', 1]]);
    //     //dd(session('userdata')['role']);
            
    //     if (session('userdata')['role'] == 'Nodal Centre') {
    //         $nodal_id = Auth::guard('nodalcentre')->user()->id;
    //         $application = $application->where([['nodal_id', $nodal_id], ['application_status', 1]])->orWhere('application_status', 11)->get();
    //     } elseif (session('userdata')['role'] == 'control_cell') {
    //         $application = $application->where([['application_status', 2]])->get();
    //     } elseif (session('userdata')['role'] == 'vice-chancellor') {
    //         $application = $application->where([['application_status', 4]])->get();
    //     }
    //     return $application;
    // }

    public static function appliedApplication()
    {
        $application =  PhdApplicationInfo::select('phd_application_info.*')
        ->leftjoin('students as s', 's.id','=','phd_application_info.stud_id')
        ->leftjoin('change_research_supervisor_name as sn', 'phd_application_info.stud_id', '=', 'sn.student_id')
        ->where([['phd_application_info.stu_payment_status', 1]]);
        //dd(session('userdata')['role']);
        //$application = DB::select("SELECT a.*,b.* FROM students as a INNER JOIN change_research_supervisor_name as b ON a.id=b.student_id");
        if (session('userdata')['role'] == 'Nodal Centre') {
            $nodal_id = Auth::guard('nodalcentre')->user()->id;
            $application = $application->where('phd_application_info.nodal_id', $nodal_id)->whereIn('phd_application_info.application_status', [1,11])->get();
        } elseif (session('userdata')['role'] == 'control_cell') {
            //$application = $application->where([['application_status', 2]])->get();
            $application = Student::with(['phd_application_info','change_nodal_center','change_research_supervisor_name','researchwork_change_title'])->get();
        } elseif (session('userdata')['role'] == 'vice-chancellor') {
            //$application->where([['application_status', 4]])->get();
            $application = Student::with(['phd_application_info','change_nodal_center','change_research_supervisor_name','researchwork_change_title'])->get();
        }elseif (session('userdata')['role'] == 'supervisor') {
            $application = DB::table('change_research_supervisor_name as cr')->select('cr.*','s.*')->join('students as s','cr.student_id','=','s.id')->get();
            //$application['ch_sup'] = DB::select("SELECT a.*,b.* FROM students as a INNER JOIN change_research_supervisor_name as b ON a.id=b.student_id")->get();
        }
        //dd($application);
        return $application;
    }

    public static function allApplications()
    {
        //dd(1);
        
        $application = PhdApplicationInfo::select(['id', 'stud_id', 'name', 'enrollment_no', 'stu_payment_status', 'stu_payment_status', 'enrollment_date', 'email', 'phone', 'topic_of_phd_work', 'student_category', 'application_status'])->where([['stu_payment_status', 1]]);
           
        //dd($application);
        //dd(session('userdata')['role']);
        //return $application;
        if (session('userdata')['role'] == 'Nodal Centre') {
            $nodal_id = Auth::guard('nodalcentre')->user()->id;
            $application = $application->where('nodal_id', $nodal_id)->whereIn('application_status',[2,4,5,6,7,11,12,13])->get();
        } elseif (session('userdata')['role'] == 'control_cell') {
            $application = $application->where([['application_status', '!=', 2]])->where('application_status', '!=', 1)->get();
        } elseif (session('userdata')['role'] == 'vc') {
            $application = $application->whereIn('application_status',[6,7])->get();
        }
        return $application;
    }

    public static function applicationStatus($application_id)
    {
       
        $student = PhdApplicationInfo::where('id', $application_id)->first(['application_status']);
        $status = $student->application_status;
        if ($status == 0) {
            $app_status = 'Not Submitted';
        }
        elseif ($status == 1) {

        if(session('userdata')['role']== 'admin'){
            $app_status = 'Pending At NodalCenter';
        }else{
            $app_status = 'Applied By Student';
        }
           
        } elseif ($status == 2) {
            $app_status = 'Approved by Nodal-Centre';
        } elseif ($status == 3) {
            $app_status = 'Rejected by Nodal-Centre';
        } elseif ($status == 4) {
            $app_status = 'Approved by R&D Control cell';
        } elseif ($status == 5) {
            $app_status = 'Rejected by R&D Control cell';
        } elseif ($status == 6) {
            $app_status = 'Approved by VC';
        } elseif ($status == 7) {
            $app_status = 'Rejected by VC';
        } elseif ($status == 11) {
            $app_status = 'Draft by Nodal-Center';
        } elseif ($status == 12) {
            $app_status = 'Draft by R&D Control cell';
        } elseif ($status == 13) {
            $app_status = 'Draft by VC';
        } else {
            $app_status = "";
        }
        return $app_status;
    }

    public static function appStatus()
    {

        return $apples = PhdApplicationInfo::selectRaw(
            'COUNT(*) as applied,
            SUM(application_status=6) as approved,
            SUM(application_status=1 || application_status=2 || application_status=4 || application_status=11 ) as pending,
            SUM(application_status=3 || application_status=5 || application_status=7) as rejected'
        )->first();
    }

    // public static function SupervisorAppliedApplication()
    // {
    //     $application = PhdApplicationInfo::select(['id', 'stud_id', 'name', 'enrollment_no', 'stu_payment_status', 'stu_payment_status', 'enrollment_date', 'email', 'phone', 'topic_of_phd_work', 'student_category', 'application_status'])
    //         ->where([['stu_payment_status', 1]]);

    //     if (session('userdata')['role'] == 'Nodal Centre') {
    //         $nodal_id = Auth::guard('nodalcentre')->user()->id;
    //         $application = $application->where([['nodal_id', $nodal_id], ['application_status', 1]])->orWhere('application_status', 11)->get();
    //     } elseif (session('userdata')['role'] == 'control_cell') {
    //         $application = $application->where([['application_status', 2]])->get();
    //     } elseif (session('userdata')['role'] == 'vc') {
    //         $application = $application->where([['application_status', 4]])->get();
    //     }
    //     // dd($application);
    //     return $application;
    // }

    public static function SupervisorAllApplications()
    {
        //dd(1);
        
        $application = SupervisorApplicationInfo::select(['id', 'sup_id', 'name', 'faculty','marital_status','age','application_status']);
       
        if (session('userdata')['role'] == 'control_cell') {
                $application = $application->whereIn('application_status',[2,3,4,5])->get();
            }elseif (session('userdata')['role'] == 'vice-chancellor') {
                $application = $application->whereIn('application_status',[4,5])->get();
            }elseif (session('userdata')['role'] == 'admin') {
                $application = $application->whereIn('application_status',[1,2,3,4,5])->get();
            }
        return $application;
    }
    public static function CoSupervisorAllApplications()
    {
        //dd(1);
        $application = CoSupervisorApplicationInfo::select(['id', 'sup_id', 'name', 'faculty','marital_status','age','application_status']);
       
        if (session('userdata')['role'] == 'control_cell') {
            $application = $application->whereIn('application_status',[2,3,4,5])->get();
        }elseif (session('userdata')['role'] == 'vice-chancellor') {
            $application = $application->whereIn('application_status',[4,5])->get();
        }
        return $application;
    }

    public static function SupervisorAppliedApplication()
    {
       
        
        $application = SupervisorApplicationInfo::select(['id', 'sup_id', 'name', 'faculty','marital_status','age','application_status']);
       
        if (session('userdata')['role'] == 'control_cell') {
            $application = $application->where('application_status',1)->get();
            
            }elseif (session('userdata')['role'] == 'vice-chancellor') {
                $application = $application->where([['application_status', 2]])->get();
            } 
        return $application;
    }
    public static function cosupervisor_appliedApplication()
    {
       
        
        $application = CoSupervisorApplicationInfo::select(['id', 'sup_id', 'name', 'faculty','marital_status','age','application_status']);
       
        if (session('userdata')['role'] == 'control_cell') {
            $application = $application->where('application_status',1)->get();
            
            }elseif (session('userdata')['role'] == 'vice-chancellor') {
                $application = $application->where([['application_status', 2]])->get();
            } 
        return $application;
    }

    public static function SupervisorApplicationStatus($application_id)
    {
        
        $supervisor = SupervisorApplicationInfo::where('id', $application_id)->first(['application_status']);
        $status = $supervisor->application_status;
        
        if ($status == 0) {
            $app_status = 'Not Submitted';
        }
        if ($status == 1) {
            if(session('userdata')['role']== 'admin'){
                $app_status = 'Pending At R&D control cell';
            }else{
                $app_status = 'Applied By Supervisor';
            }
            
        } elseif ($status == 2) {
            $app_status = 'Approved by R&D control cell';
        } elseif ($status == 3) {
            $app_status = 'Rejected by R&D control cell';
        } elseif ($status == 4) {
            $app_status = 'Approved by VC';
        } elseif ($status == 5) {
            $app_status = 'Rejected by VC';
        }  else {
            $app_status = "";
        }
        return $app_status;
    }
    public static function CoSupervisorApplicationStatus($application_id)
    {
        $supervisor = CoSupervisorApplicationInfo::where('id', $application_id)->first(['application_status']);
        $status = $supervisor->application_status;
        //dd($status);
        if ($status == 0) {
            $app_status = 'Not Submitted';
        }
        if ($status == 1) {
            if(session('userdata')['role']== 'admin'){
                $app_status = 'Pending At R&D control cell';
            }else{
                $app_status = 'Applied by Co-Supervisor';
            }
           
        } elseif ($status == 2) {
            $app_status = 'Approved by R&D control cell';
        } elseif ($status == 3) {
            $app_status = 'Rejected by R&D control cell';
        } elseif ($status == 4) {
            $app_status = 'Approved by VC';
        } elseif ($status == 5) {
            $app_status = 'Rejected by VC';
        }  else {
            $app_status = "";
        }
        return $app_status;
    }

    public static function SupervisorAppStatus()
    {

        return $apples = SupervisorApplicationInfo::selectRaw(
            'COUNT(*) as applied,
            SUM(application_status=5) as approved,
            SUM(application_status=1 || application_status=2 ) as pending,
            SUM(application_status=3 || application_status=5 ) as rejected'
        )->first();
    }
    public static function CoSupervisorAppStatus()
    {
        return $apples = CoSupervisorApplicationInfo::selectRaw(
            'COUNT(*) as applied,
            SUM(application_status=5) as approved,
            SUM(application_status=1 || application_status=2 ) as pending,
            SUM(application_status=3 || application_status=5 ) as rejected'
        )->first();
    }


    public static function StuappliedApplication()
    {
        $application = PhdApplicationInfo::select(['id', 'stud_id', 'name', 'enrollment_no', 'stu_payment_status', 'enrollment_date', 'email', 'phone', 'topic_of_phd_work', 'student_category', 'application_status'])
        ->where([['stu_payment_status', 1]])->get();
       
        return $application;
    }
    public static function CoSupappliedApplication()
    {
        //dd('1');
        $application = CoSupervisorApplicationInfo::select(['id', 'sup_id', 'name', 'faculty','marital_status','age','application_status'])
        ->whereIn('application_status',[1,2,3,4,5])->get();
       
        return $application;
    }

    public static function RndDashboardCountNo($type){
        if ($type == 'control_cell') {
            //$application = $application->where([['application_status', 2]])->get();
            $data['Applied'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_research_supervisor_name as b ON a.id=b.student_id");
            $data['Approved'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_research_supervisor_name as b ON a.id=b.student_id WHERE rd_approved = 1");
            $data['Rejected'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_research_supervisor_name as b ON a.id=b.student_id WHERE rd_approved = 2");
        }
        return $data;
    }
    public static function VcDashboardCountNo($type){
        if ($type == 'vice-chancellor') {
            $data1['Applied1'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_research_supervisor_name as b ON a.id=b.student_id");
            $data2['Applied2'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_nodal_center as b ON a.id=b.student_id");
            $data3['Applied2'] = DB::select("SELECT b.stud_id FROM students as a INNER JOIN phd_application_info as b ON a.id=b.stud_id");
            $data4['Applied2'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN researchwork_change_title as b ON a.id=b.student_id");
            $data['Applied'] = count($data1['Applied1']) + count($data2['Applied2']) + count($data3['Applied2']) + count($data4['Applied2']);
            
            $data1['Approved1'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_research_supervisor_name as b ON a.id=b.student_id WHERE b.vice_chancellor = 1");
            $data2['Approved2'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_nodal_center as b ON a.id=b.student_id WHERE b.vice_chancellor = 1");
            $data3['Approved2'] = DB::select("SELECT b.stud_id FROM students as a INNER JOIN phd_application_info as b ON a.id=b.stud_id WHERE b.application_status = 1");
            $data4['Approved2'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN researchwork_change_title as b ON a.id=b.student_id WHERE b.vice_chancellor = 1");
            $data['Approved'] = count($data1['Approved1']) + count($data2['Approved2']) + count($data3['Approved2']) + count($data4['Approved2']);

            $data1['Pending1'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_research_supervisor_name as b ON a.id=b.student_id WHERE b.vice_chancellor = 0");
            $data2['Pending2'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_nodal_center as b ON a.id=b.student_id WHERE b.vice_chancellor = 0");
            $data3['Pending2'] = DB::select("SELECT b.stud_id FROM students as a INNER JOIN phd_application_info as b ON a.id=b.stud_id WHERE b.application_status = 4");
            $data4['Pending2'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN researchwork_change_title as b ON a.id=b.student_id WHERE b.vice_chancellor = 0");
            $data['Pending'] = count($data1['Pending1']) + count($data2['Pending2']) + count($data3['Pending2']) + count($data4['Pending2']);

            $data1['Rejected1'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_research_supervisor_name as b ON a.id=b.student_id WHERE b.vice_chancellor = 2");
            $data2['Rejected2'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_nodal_center as b ON a.id=b.student_id WHERE b.vice_chancellor = 2");
            $data3['Rejected2'] = DB::select("SELECT b.stud_id FROM students as a INNER JOIN phd_application_info as b ON a.id=b.stud_id WHERE b.application_status = 5");
            $data4['Rejected2'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN researchwork_change_title as b ON a.id=b.student_id WHERE b.vice_chancellor = 2");

            $data['Rejected'] = count($data1['Rejected1']) + count($data2['Rejected2'])+ count($data3['Rejected2']) + count($data4['Rejected2']);
        }
        return $data;
    }

    public static function CheckStudentApplyPHD($params){
        if($params == 'student'){
            $phd_app = new PhdApplicationInfo;
            $details = $phd_app->select('stu_payment_status')->where('id',Auth::guard($params)->user()->id)->first();
            $status = ((isset($details->stu_payment_status) && $details->stu_payment_status == 1)) ? 'disabled' : '';
            return $status;
        }else{
            return '';
        }
    }

    public static function ExtensionWork()
    {

        //dd(Auth::guard('student')->user()->id);
        $student = DB::table('extention_complete_works as ecw')->select('ecw.*', 'n.college_name')
        ->Join('nodal_centres as n', 'n.id','=','ecw.nodal_center');
        //dd($student);
        if (session('userdata')['role'] == 'student') {
            $student->where('ecw.stud_id',Auth::guard('student')->user()->id);
            
        }elseif(session('userdata')['role'] == 'supervisor'){
            $student->whereIn('ecw.application_status',[1,2,3,4,5,6,7]);
        }elseif(session('userdata')['role'] == 'Nodal Centre'){
            $student->whereIn('ecw.application_status',[2,4,5,6,7]);
        }elseif(session('userdata')['role'] == 'control_cell'){
            $student->whereIn('ecw.application_status',[4,6,7]);
        }
        $result= $student->get();

        return  $result;
    }

    public static function ExtensionWorkStatus($ExtId)
    {
        $status = ExtentionCompleteWork::where('id',$ExtId)->first(['application_status']);
        $status = $status->application_status;

        if($status == 1){
            if (session('userdata')['role'] == 'supervisor') {
            return $status = 'Pending';
        }else{
            return $status = 'Pending At Supervisor';
        }
        }elseif($status == 2){
            if (session('userdata')['role'] == 'Nodal Centre') {
                return $status = 'Pending';
            }else{
                return $status = 'Pending At NCR';
            }
            
        }elseif($status == 3){
            return $status = 'Reject by supervisor';
        }elseif($status == 4){
            if (session('userdata')['role'] == 'control_cell') {
                return $status = 'Pending';
            }else{
                return $status = 'Pendign At Controlcell';
            }
            
        }elseif($status == 5){
            return $status = 'Reject by NCR';
        }elseif($status == 6){
            return $status = 'Approved';
        }elseif($status == 7){
            return $status = 'Reject by Controlcell';
        }else{
            return $status = 'Not Sumbited';
        }

        return $status;
    }
    

}
