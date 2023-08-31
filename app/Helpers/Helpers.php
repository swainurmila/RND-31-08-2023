<?php

namespace App\Helpers;

use App\Models\CoSupervisorApplicationInfo;
use App\Models\ExtentionCompleteWork;
use App\Models\PhdApplicationInfo;
use App\Models\SupervisorApplicationInfo;
use App\Models\PhdCourseWorks;
use App\Models\SemesterProgressReport;
use App\Models\SemesterRegisrationStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Helpers
{
    public static function phdcourseworkStatus($coursework_id)
    {
        $coursework = PhdCourseWorks::where('id', $coursework_id)->first(['status']);
        $status  = $coursework->status;
        if ($status == 0) {
            $app_status = 'Not Submitted';
        } elseif ($status == 1) {
            if (session('userdata')['role'] == 'student') {
                $app_status = 'Applied';
            }elseif(session('userdata')['role'] == 'supervisor'){
                $app_status = 'Pending';
            } 
            else {
                $app_status = 'Applied By Student';
            }
        } elseif ($status == 2) {
            if(session('userdata')['role'] == 'supervisor'){
                $app_status = 'Recommended';
            }elseif(session('userdata')['role'] == 'Nodal Centre'){
                $app_status = 'Pending';
            } 
            else {
                $app_status = 'Pending at Nodal-Centre';
            }
        } elseif ($status == 3) {
            if(session('userdata')['role'] == 'supervisor'){
                $app_status = 'Not Recommended';
            }else {
                $app_status = 'Not recommended by Supervisor';
            }
        } elseif ($status == 4) {
            if(session('userdata')['role'] == 'Nodal Centre'){
                $app_status = 'Recommended';
            }elseif(session('userdata')['role_id'] == '12'){
                $app_status = 'Pending';
            } 
            else {
                $app_status = 'Pending at JE';
            }    
        } elseif ($status == 5) {
            if(session('userdata')['role'] == 'Nodal Centre'){
                $app_status = 'Not Recommended';
            }else {
                $app_status = 'Not recommended by Nodal Centre';
            }
        } elseif ($status == 6) {
            if(session('userdata')['role_id'] == '12'){
                $app_status = 'Recommended';
            }elseif(session('userdata')['role_id'] == '7'){
                $app_status = 'Pending';
            } 
            else {
                $app_status = 'Pending at R&D cell';
            } 
        } elseif ($status == 7) {
            if(session('userdata')['role_id'] == '12'){
                $app_status = 'Not Recommended';
            }else {
                $app_status = 'Not recommended by JE';
            }
        } elseif ($status == 8) {
            if(session('userdata')['role_id'] == '7'){
                $app_status = 'Recommended';
            }elseif(session('userdata')['role_id'] == '6'){
                $app_status = 'Pending';
            }else {
                $app_status = 'Pending at VC';
            } 
        } elseif ($status == 9) {
            if(session('userdata')['role_id'] == '7'){
                $app_status = 'Not Recommended';
            }else {
                $app_status = 'Not recommended by R&D cell';
            }
        } elseif ($status == 10) {
            if(session('userdata')['role_id'] == '6'){
                $app_status = 'Approved';
            }elseif(session('userdata')['role_id'] == '7'){
                $app_status = 'Pending for Transfer';
            }else {
                $app_status = 'Approved by VC';
            } 
        }elseif ($status == 11) {
            if(session('userdata')['role_id'] == '6'){
                $app_status = 'Rejected';
            }else {
                $app_status = 'Rejected by VC';
            }
        }elseif ($status == 12) {
            if(session('userdata')['role_id'] == '12'){
                $app_status = 'Pending for Notify';
            }else {
                $app_status = 'Transferred to JE';
            }
        }elseif ($status == 14) {
            $app_status = 'Notified by JE';
        }else {
            $app_status = "";
        }
        return $app_status;
    }
    public static function phdcourseworkStatusColor($coursework_id)
    {
        $coursework = PhdCourseWorks::where('id', $coursework_id)->first(['status']);
        $status  = $coursework->status;
        $badgeClass = '';
        if ($status == 0) {
            $badgeClass = 'secondary';
        } elseif ($status == 1) {
            if (session('userdata')['role'] == 'student') {
                $badgeClass = 'secondary';
            }elseif(session('userdata')['role'] == 'supervisor'){
                $badgeClass = 'warning';
            } 
            else {
                $badgeClass = 'warning';
            }
        } elseif ($status == 2) {
            if(session('userdata')['role'] == 'supervisor'){
                $badgeClass = 'success';
            }elseif(session('userdata')['role'] == 'Nodal Centre'){
                $badgeClass = 'warning';
            } 
            else {
                $badgeClass = 'info';
            }
        } elseif ($status == 3) {
            if(session('userdata')['role'] == 'supervisor'){
                $badgeClass = 'danger';
            }else {
                $badgeClass = 'danger';
            }
        } elseif ($status == 4) {
            if(session('userdata')['role'] == 'Nodal Centre'){
                $badgeClass = 'success';
            }elseif(session('userdata')['role_id'] == '12'){
                $badgeClass = 'warning';
            } 
            else {
                $badgeClass = 'info';
            }    
        } elseif ($status == 5) {
            if(session('userdata')['role'] == 'Nodal Centre'){
                $badgeClass = 'danger';
            }else {
                $badgeClass = 'danger';
            }
        } elseif ($status == 6) {
            if(session('userdata')['role_id'] == '12'){
                $badgeClass = 'success';
            }elseif(session('userdata')['role_id'] == '7'){
                $badgeClass = 'warning';
            } 
            else {
                $badgeClass = 'info';
            } 
        } elseif ($status == 7) {
            if(session('userdata')['role_id'] == '12'){
                $badgeClass = 'danger';
            }else {
                $badgeClass = 'danger';
            }
        } elseif ($status == 8) {
            if(session('userdata')['role_id'] == '7'){
                $badgeClass = 'success';
            }elseif(session('userdata')['role_id'] == '6'){
                $badgeClass = 'warning';
            }else {
                $badgeClass = 'info';
            } 
        } elseif ($status == 9) {
            if(session('userdata')['role_id'] == '7'){
                $badgeClass = 'danger';
            }else {
                $badgeClass = 'danger';
            }
        } elseif ($status == 10) {
            if(session('userdata')['role_id'] == '6'){
                $badgeClass = 'success';
            }elseif(session('userdata')['role_id'] == '7'){
                $badgeClass = 'warning';
            }else {
                $badgeClass = 'info';
            } 
        }elseif ($status == 11) {
            if(session('userdata')['role_id'] == '6'){
                $badgeClass = 'danger';
            }else {
                $badgeClass = 'danger';
            }
        }elseif ($status == 12) {
            if(session('userdata')['role_id'] == '12'){
                $badgeClass = 'warning';
            }else {
                $badgeClass = 'info';
            }
        }elseif ($status == 14) {
            $badgeClass = 'pink';
        }else {
            $badgeClass = "";
        }
        return $badgeClass ;
    }
    /**
     * Method appliedApplicationStatus
     * @param $status_id : as per the status id a status text will be fetched
     * @author AlokDas
     * @return string
     */
    public static function appliedApplicationStatus($status_id)
    {
        $status_array = [
            'Not Submitted',
            'Pending at supervisor',
            'Pending at NCR',
            'Not recommended by supervisor',
            'Pending at JE',
            'Not recommended by NCR',
            'Pending at RnD Cell',
            'Not recommended by JE',
            'Pending at VC',
            'Not recommended by RnD Cell',
            'Approved by VC',
            'Rejected by VC',
            'Approved by RnD Cell and Transfered to JE',
            'Rejected by RnD Cell and Not Transfered to JE',
        ];
        return $status_array[$status_id];
    }

    /**
     * Method appliedApplicationStatusColor
     * @param $status_id : as per the status id a status text will be fetched
     * @author AlokDas
     * @return string
     */
    public static function appliedApplicationStatusColor($status_id)
    {
        $status_array = [
            'dark',
            'warning',
            'warning',
            'danger',
            'warning',
            'danger',
            'warning',
            'danger',
            'warning',
            'danger',
            'success',
            'danger',
            'success',
            'danger',
        ];
        return $status_array[$status_id];
    }

    /**
     * Method CourseworkStatus
     * @param $status_id : as per the status id a status text will be fetched
     * @author AlokDas
     * @return string
     */
    public static function CourseworkStatus($status_id)
    {
        $status_array = [
            'Not Submitted',
            'Pending at supervisor',
            'Recommended by supervisor',
            'Not Recommended by supervisor',
        ];
        return $status_array[$status_id];
    }

    /**
     * Method CourseworkStatusColor
     * @param $status_id : as per the status id a status text will be fetched
     * @author AlokDas
     * @return string
     */
    public static function CourseworkStatusColor($status_id)
    {
        $status_array = [
            'dark',
            'warning',
            'success',
            'danger',
        ];
        return $status_array[$status_id];
    }

    /**
     * Method professorsDesignation
     * @param $designation_id $designation_id [explicite description]
     * @author AlokDas
     * @return void
     */
    public static function professorsDesignation($designation_id)
    {
        $designation_array = ['', 'Professor', 'Associate Professor', 'Chairperson', 'Co-Chairperson'];
        return $designation_array[$designation_id];
    }

    /**
     * Method getChairpersons
     * This method will return only the chairperson and co hairperson from that respective nodal center
     * @param $ncr_id $ncr_id [explicite description]
     * @author AlokDas
     * @return void
     */
    public static function getChairpersons($appl_id)
    {
        $application_details = PhdApplicationInfo::where('id', $appl_id)->with(['get_domain_experts_details' => function ($r) {
            $r->where('status', 1);
        }]);
        $ncr_id             = $application_details->first()->nodal_id;
        $ncr_user_table     = 'nodal_user_' . $ncr_id;
        $ncr_data           = new DB;
        $ncr_chairperson    = $ncr_data::table($ncr_user_table)->where('designation', 3)->first();
        $ncr_co_chairperson = $ncr_data::table($ncr_user_table)->where('designation', 4)->first();
        $data['dsc1']       = $ncr_chairperson->id; //dsc3
        $data['dsc2']       = $ncr_co_chairperson->id; //dsc4
        $data['dsc3']       = $application_details->first()->get_domain_experts_details[0]->ncr_user_id; //chairperson
        $data['dsc4']       = $application_details->first()->get_domain_experts_details[1]->ncr_user_id; //co_chairperson
        $supervisors        = $application_details->with('get_supervisor_details')->first();
        $data['dsc5']       = $supervisors->get_supervisor_details->sup_id ?? 0; //supervisor
        $data['dsc6']       = $supervisors->get_supervisor_details->cosup_id ?? 2; //co_supervisor
        return $data;
    }

    // public static function appliedApplication()
    // {
    //     $application = PhdApplicationInfo::select(['id', 'stud_id', 'name', 'enrollment_no', 'stu_payment_status', 'stu_payment_status', 'enrollment_date', 'email', 'phone', 'topic_of_phd_work', 'student_category', 'application_status'])
    //         ->where([['stu_payment_status', 1]]);
    //     //dd(session('userdata')['role']);

    //     if (session('userdata')['role'] == 'Nodal Centre') {
    //         $nodal_id    = Auth::guard('nodalcentre')->user()->id;
    //         $application = $application->where([['nodal_id', $nodal_id], ['application_status', 1]])->orWhere('application_status', 11)->get();
    //     } elseif (session('userdata')['role'] == 'control_cell') {
    //         $application = $application->where([['application_status', 2]])->get();
    //     } elseif (session('userdata')['role'] == 'vice-chancellor') {
    //         $application = $application->where([['application_status', 4]])->get();
    //     }
    //     return $application;
    // }

    /**
     * Method appliedApplication
     * @return void
     */
    public static function appliedApplication()
    {
        $application = PhdApplicationInfo::select('phd_application_info.*')
            ->leftjoin('students as s', 's.id', '=', 'phd_application_info.stud_id')
            ->leftjoin('change_research_supervisor_name as sn', 'phd_application_info.stud_id', '=', 'sn.student_id')
            ->where([['phd_application_info.stu_payment_status', 1]]);

        if (session('userdata')['role'] == 'Nodal Centre') {
            $nodal_id    = Auth::guard('nodalcentre')->user()->id;
            $application = $application->where('phd_application_info.nodal_id', $nodal_id)->whereIn('phd_application_info.application_status', [2, 11])->get();
        } elseif (session('userdata')['role'] == 'control_cell') {
            $application = $application->whereIn('phd_application_info.application_status', [6, 8, 9])->get();
            // $application = Student::with(['phd_application_info','change_nodal_center','change_research_supervisor_name','researchwork_change_title'])->get();
        } elseif (session('userdata')['role'] == 'vice-chancellor') {
            $application = $application->where([['phd_application_info.application_status', 4]])->get();
            // $application = Student::with(['phd_application_info','change_nodal_center','change_research_supervisor_name','researchwork_change_title'])->get();
        } elseif (session('userdata')['role'] == 'supervisor') {
            $supervisor_id = Auth::guard('supervisor')->user()->id;
            $application   = DB::table('change_research_supervisor_name as cr')
                ->select('cr.*', 's.*', 'pai.student_category')
                ->join('students as s', 'cr.student_id', '=', 's.id')
                ->join('phd_application_info as pai', 'pai.stud_id', '=', 's.id')
                ->where('present_research_supervisor', $supervisor_id)
                ->orWhere('proposed_research_supervisor', $supervisor_id)
                ->get();
        }

        return $application;
    }

    public static function allApplications()
    {
        $application = PhdApplicationInfo::select(['id', 'stud_id', 'name', 'enrollment_no', 'stu_payment_status', 'stu_payment_status', 'enrollment_date', 'email', 'phone', 'topic_of_phd_work', 'student_category', 'application_status'])->where([['stu_payment_status', 1]]);

        if (session('userdata')['role'] == 'Nodal Centre') {
            $nodal_id    = Auth::guard('nodalcentre')->user()->id;
            $application = $application->where('nodal_id', $nodal_id)->whereIn('application_status', [2, 4, 5, 6, 7, 11, 12, 13])->get();
        } elseif (session('userdata')['role'] == 'control_cell') {
            $application = $application->where([['application_status', '!=', 2]])->where('application_status', '!=', 1)->get();
        } elseif (session('userdata')['role'] == 'vice-chancellor') {
            $application = $application->whereIn('application_status', [4, 6, 7])->get();
        }
        return $application;
    }

    /**
     * // Will not be using this anymore
     * Method applicationStatus
     * @param $application_id $application_id [explicite description]
     * @return string
     */
    public static function applicationStatus($application_id)
    {

        $student = PhdApplicationInfo::where('id', $application_id)->first(['application_status']);
        $status  = $student->application_status;
        if ($status == 0) {
            $app_status = 'Not Submitted';
        } elseif ($status == 1) {

            if (session('userdata')['role'] == 'admin') {
                $app_status = 'Pending At NodalCenter';
            } else {
                $app_status = 'Applied By Student';
            }

        } elseif ($status == 2) {
            $app_status = 'Pending at Nodal-Centre';
        } elseif ($status == 3) {
            $app_status = 'Rejected by Supervisor';
        } elseif ($status == 4) {
            $app_status = 'Pending at JE';
        } elseif ($status == 5) {
            $app_status = 'Rejected by Nodal-Centre';
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

    /**
     * Method appStatus
     * @return void
     */
    public static function appStatus()
    {
        $payment_status = 1; // 0: Not paid 1: Paid
        return $apples  = PhdApplicationInfo::selectRaw(
            'COUNT(*) as applied,
                SUM(application_status = 1 ) as pending,
                SUM(application_status = 2 || application_status=4 || application_status=6) as approved,
                SUM(application_status=3 || application_status=5 || application_status=7) as rejected,
                SUM(application_status=0 ) as draft'
        )->where('stu_payment_status', $payment_status)->first();
    }

    /**
     * Method Status for approved super visor application
     * @return void
     */
    public static function approvedSupervisorApplicationStatus()
    {
        $payment_status = 1; // 0: Not paid 1: Paid
        return $apples  = PhdApplicationInfo::selectRaw(
            'COUNT(*) as applied,
                SUM(application_status = 1 ) as pending,
                SUM(application_status = 2 || application_status=4 || application_status=6) as approved,
                SUM(application_status=3 || application_status=5 || application_status=7) as rejected,
                SUM(application_status=0 ) as draft'
        )->where('stu_payment_status', $payment_status)->first();
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

    /**
     * Method SupervisorAllApplications
     * @return void
     */
    public static function SupervisorAllApplications()
    {
        $application = SupervisorApplicationInfo::select(['id', 'sup_id', 'name', 'faculty', 'marital_status', 'age', 'application_status']);

        if (session('userdata')['role'] == 'control_cell') {
            $application = $application->whereIn('application_status', [2, 3, 4, 5])->get();
        } elseif (session('userdata')['role'] == 'vice-chancellor') {
            $application = $application->whereIn('application_status', [4, 5])->get();
        } elseif (session('userdata')['role'] == 'admin') {
            $application = $application->whereIn('application_status', [1, 2, 3, 4, 5])->get();
        }
        // dd($application->toArray());
        return $application;
    }

    /**
     * Method CoSupervisorAllApplications
     * @return void
     */
    public static function CoSupervisorAllApplications()
    {
        //dd(1);
        $application = CoSupervisorApplicationInfo::select(['id', 'sup_id', 'name', 'faculty', 'marital_status', 'age', 'application_status']);

        if (session('userdata')['role'] == 'control_cell') {
            $application = $application->whereIn('application_status', [2, 3, 4, 5])->get();
        } elseif (session('userdata')['role'] == 'vice-chancellor') {
            $application = $application->whereIn('application_status', [4, 5])->get();
        }
        return $application;
    }

    /**
     * Method SupervisorAppliedApplication
     * @return void
     */
    public static function SupervisorAppliedApplication()
    {
        $application = SupervisorApplicationInfo::select(['id', 'sup_id', 'name', 'faculty', 'marital_status', 'age', 'application_status']);

        if (session('userdata')['role'] == 'control_cell') {
            $application = $application->where('application_status', 1)->get();

        } elseif (session('userdata')['role'] == 'vice-chancellor') {
            $application = $application->where([['application_status', 2]])->get();
        }
        return $application;
    }

    /**
     * Method cosupervisor_appliedApplication
     * @return void
     */
    public static function cosupervisor_appliedApplication()
    {

        $application = CoSupervisorApplicationInfo::select(['id', 'sup_id', 'name', 'faculty', 'marital_status', 'age', 'application_status']);

        if (session('userdata')['role'] == 'control_cell') {
            $application = $application->where('application_status', 1)->get();

        } elseif (session('userdata')['role'] == 'vice-chancellor') {
            $application = $application->where([['application_status', 2]])->get();
        }
        return $application;
    }

    /**
     * Method SupervisorApplicationStatus rturns
     * @param $application_id $application_id [explicite description]
     * @return string
     */
    public static function SupervisorApplicationStatus($application_id)
    {

        $supervisor = SupervisorApplicationInfo::where('id', $application_id)->first(['application_status']);
        $status     = $supervisor->application_status;

        if ($status == 0) {
            $app_status = 'Not Submitted';
        }
        if ($status == 1) {
            if (session('userdata')['role'] == 'admin') {
                $app_status = 'Pending At R&D control cell';
            } else {
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
        } else {
            $app_status = "";
        }
        return $app_status;
    }

    /**
     * Method CoSupervisorApplicationStatus
     * @param $application_id $application_id [explicite description]
     * @return void
     */
    public static function CoSupervisorApplicationStatus($application_id)
    {
        $supervisor = CoSupervisorApplicationInfo::where('id', $application_id)->first(['application_status']);
        $status     = $supervisor->application_status;

        if ($status == 0) {
            $app_status = 'Not Submitted';
        } elseif ($status == 1) {
            if (session('userdata')['role'] == 'admin') {
                $app_status = 'Pending At R&D control cell';
            } else {
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
        } else {
            $app_status = "";
        }
        return $app_status;
    }

    /**
     * Method SupervisorAppStatus
     * @return void
     */
    public static function SupervisorAppStatus()
    {

        return $apples = SupervisorApplicationInfo::selectRaw(
            'COUNT(*) as applied,
            SUM(application_status=4 || application_status=2 ) as approved,
            SUM(application_status=1) as pending,
            SUM(application_status=3 || application_status=5 ) as rejected'
        )->first();
    }

    /**
     * Method CoSupervisorAppStatus
     * @return void
     */
    public static function CoSupervisorAppStatus()
    {
        return $apples = CoSupervisorApplicationInfo::selectRaw(
            'COUNT(*) as applied,
            SUM(application_status=2 || application_status=4) as approved,
            SUM(application_status=1 ) as pending,
            SUM(application_status=3 || application_status=5 ) as rejected'
        )->first();
    }

    /**
     * Method StuappliedApplication
     * @return void
     */
    public static function StuappliedApplication()
    {
        $payment_status = 1; // 0: Not paid 1: Paid
        $application    = PhdApplicationInfo::select(['id', 'stud_id', 'name', 'enrollment_no', 'stu_payment_status', 'enrollment_date', 'email',
            'phone', 'topic_of_phd_work', 'student_category', 'application_status'])
            ->where('stu_payment_status', $payment_status)->get();

        // dd($application);
        return $application;
    }

    /**
     * Method CoSupappliedApplication
     * @return void
     */
    public static function CoSupappliedApplication()
    {
        $application = CoSupervisorApplicationInfo::select(['id', 'sup_id', 'name', 'faculty', 'marital_status', 'age', 'application_status'])
        // ->whereIn('application_status', [0, 1, 2, 3, 4, 5])
            ->get();
        // dd($application->toArray());
        return $application;
    }

    /**
     * Method RndDashboardCountNo
     * @param $type $type [explicite description]
     * @return void
     */
    public static function RndDashboardCountNo($type)
    {
        if ($type == 'control_cell') {
            //$application = $application->where([['application_status', 2]])->get();
            $data['Applied'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_research_supervisor_name as b ON a.id=b.student_id");
            // $data['Applied'] = DB::table('students as s')->select('c.student_id')->join('change_research_supervisor_name as c','s.id','=','c.student_id');
            $data['Approved'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_research_supervisor_name as b ON a.id=b.student_id WHERE b.status = 1");
            $data['Rejected'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_research_supervisor_name as b ON a.id=b.student_id WHERE b.status = 2");
        }
        return $data;
    }

    /**
     * Method VcDashboardCountNo
     * @param $type $type [explicite description]
     * @return void
     */
    public static function VcDashboardCountNo($type)
    {
        if ($type == 'vice-chancellor') {
            $data1['Applied']  = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_research_supervisor_name as b ON a.id=b.student_id");
            $data2['Applied2'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_nodal_center as b ON a.id=b.student_id");
            $data3['Applied2'] = DB::select("SELECT b.stud_id FROM students as a INNER JOIN phd_application_info as b ON a.id=b.stud_id");
            $data4['Applied2'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN researchwork_change_title as b ON a.id=b.student_id");
            $data['Applied']   = count($data1['Applied1']) + count($data2['Applied2']) + count($data3['Applied2']) + count($data4['Applied2']);

            // $data1['Approved1'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_research_supervisor_name as b ON a.id=b.student_id WHERE b.status = 6");
            // $data2['Approved2'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_nodal_center as b ON a.id=b.student_id WHERE b.vice_chancellor = 1");
            // $data3['Approved2'] = DB::select("SELECT b.stud_id FROM students as a INNER JOIN phd_application_info as b ON a.id=b.stud_id WHERE b.application_status = 1");
            // $data4['Approved2'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN researchwork_change_title as b ON a.id=b.student_id WHERE b.vice_chancellor = 1");
            // $data['Approved'] = count($data1['Approved1']) + count($data2['Approved2']) + count($data3['Approved2']) + count($data4['Approved2']);

            // $data1['Pending1'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_research_supervisor_name as b ON a.id=b.student_id WHERE b.status = 4");
            // $data2['Pending2'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_nodal_center as b ON a.id=b.student_id WHERE b.vice_chancellor = 0");
            // $data3['Pending2'] = DB::select("SELECT b.stud_id FROM students as a INNER JOIN phd_application_info as b ON a.id=b.stud_id WHERE b.application_status = 4");
            // $data4['Pending2'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN researchwork_change_title as b ON a.id=b.student_id WHERE b.vice_chancellor = 0");
            // $data['Pending'] = count($data1['Pending1']) + count($data2['Pending2']) + count($data3['Pending2']) + count($data4['Pending2']);

            // $data1['Rejected1'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_research_supervisor_name as b ON a.id=b.student_id WHERE b.status = 7");
            // $data2['Rejected2'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN change_nodal_center as b ON a.id=b.student_id WHERE b.vice_chancellor = 2");
            // $data3['Rejected2'] = DB::select("SELECT b.stud_id FROM students as a INNER JOIN phd_application_info as b ON a.id=b.stud_id WHERE b.application_status = 5");
            // $data4['Rejected2'] = DB::select("SELECT b.student_id FROM students as a INNER JOIN researchwork_change_title as b ON a.id=b.student_id WHERE b.vice_chancellor = 2");

            // $data['Rejected'] = count($data1['Rejected1']) + count($data2['Rejected2'])+ count($data3['Rejected2']) + count($data4['Rejected2']);
        }
        return $data;
    }

    /**
     * Method CheckStudentApplyPHD
     * @param $params $params [explicite description]
     * @return void
     */
    public static function CheckStudentApplyPHD($params)
    {
        if ($params == 'student') {
            $phd_app = new PhdApplicationInfo;
            $details = $phd_app->select('stu_payment_status')->where('id', Auth::guard($params)->user()->id)->first();
            $status  = ((isset($details->stu_payment_status) && $details->stu_payment_status == 1)) ? 'disabled' : '';
            return $status;
        } else {
            return '';
        }
    }

    /**
     * Method ExtensionWork
     * @return void
     */
    public static function ExtensionWork()
    {
        //dd(Auth::guard('student')->user()->id);
        $student = DB::table('extention_complete_works as ecw')->select('ecw.*', 'n.college_name')
            ->Join('nodal_centres as n', 'n.id', '=', 'ecw.nodal_center');
        //dd($student);
        if (session('userdata')['role'] == 'student') {
            $student->where('ecw.stud_id', Auth::guard('student')->user()->id);

        } elseif (session('userdata')['role'] == 'supervisor') {
            $student->whereIn('ecw.application_status', [1, 2, 3, 4, 5, 6, 7]);
        } elseif (session('userdata')['role'] == 'Nodal Centre') {
            $student->whereIn('ecw.application_status', [2, 4, 5, 6, 7]);
        } elseif (session('userdata')['role'] == 'control_cell') {
            $student->whereIn('ecw.application_status', [4, 6, 7]);
        }
        $result = $student->get();

        return $result;
    }

    /**
     * Method ExtensionWorkStatus
     * @param $ExtId $ExtId [explicite description]
     * @return void
     */
    public static function ExtensionWorkStatus($ExtId)
    {
        $status = ExtentionCompleteWork::where('id', $ExtId)->first(['application_status']);
        $status = $status->application_status;

        if ($status == 1) {
            if (session('userdata')['role'] == 'supervisor') {
                return $status = 'Pending';
            } else {
                return $status = 'Pending At Supervisor';
            }
        } elseif ($status == 2) {
            if (session('userdata')['role'] == 'Nodal Centre') {
                return $status = 'Pending';
            } else {
                return $status = 'Pending At NCR';
            }

        } elseif ($status == 3) {
            return $status = 'Reject by supervisor';
        } elseif ($status == 4) {
            if (session('userdata')['role'] == 'control_cell') {
                return $status = 'Pending';
            } else {
                return $status = 'Pendign At Controlcell';
            }

        } elseif ($status == 5) {
            return $status = 'Reject by NCR';
        } elseif ($status == 6) {
            return $status = 'Approved';
        } elseif ($status == 7) {
            return $status = 'Reject by Controlcell';
        } else {
            return $status = 'Not Sumbited';
        }

        return $status;
    }

    /**
     * @param $array
     * @return pre-formatted array
     */
    public static function pr($array)
    {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

    /**
     * @param date
     * @param dash / - .
     * @return void
     */
    public static function date_format($date, $dash = null)
    {
        $format = $dash == null ? 'd/m/Y' : 'd' . $dash . 'm' . $dash . 'Y';
        // dd($format);
        return \Carbon\Carbon::parse($date)->format($format);
    }
    public static function phdsemesterStatus($sem_id)
    {
        $semester = SemesterProgressReport::where('id', $sem_id)->first(['status']);
        $status = $semester->status;
        $app_status = '';
        $badge_color = '';

        if ($status == 0) {
            $app_status = 'Not Submitted';
            $badge_color = 'secondary'; 
        } elseif ($status == 1) {
            if (session('userdata')['role'] == 'student') {
                $app_status = 'Applied';
                $badge_color = 'primary'; 
            } elseif (session('userdata')['role'] == 'supervisor') {
                $app_status = 'Pending';
                $badge_color = 'warning'; 
            } else {
                $app_status = 'Applied By Student';
                $badge_color = 'info'; 
            }
        } elseif ($status == 2) {
            if (session('userdata')['role'] == 'supervisor') {
                $app_status = 'Recommended';
                $badge_color = 'success'; 
            } elseif (session('userdata')['role'] == 'Nodal Centre') {
                $app_status = 'Pending';
                $badge_color = 'warning'; 
            } else {
                $app_status = 'Pending at Nodal-Centre';
                $badge_color = 'info'; 
            }
        } elseif ($status == 3) {
            if (session('userdata')['role'] == 'supervisor') {
                $app_status = 'Not Recommended';
                $badge_color = 'danger';
            } else {
                $app_status = 'Not recommended by Supervisor';
                $badge_color = 'danger'; 
            }
        } elseif ($status == 4) {
            if (session('userdata')['role'] == 'Nodal Centre') {
                $app_status = 'Recommended';
                $badge_color = 'success'; 
            } elseif (session('userdata')['role_id'] == '12') {
                $app_status = 'Pending';
                $badge_color = 'warning'; 
            }else{
                $app_status = 'Pending at JE';
                $badge_color = 'info'; 
            }
        } elseif ($status == 5) {
            if (session('userdata')['role'] == 'Nodal Centre') {
                $app_status = 'Not Recommended';
                $badge_color = 'danger'; 
            } else {
                $app_status = 'Not recommended by Nodal Centre';
                $badge_color = 'danger';
            }
        } elseif ($status == 6) {
            if (session('userdata')['role_id'] == '12') {
                $app_status = 'Recommended';
                $badge_color = 'success'; 
            } elseif (session('userdata')['role_id'] == '7') {
                $app_status = 'Pending';
                $badge_color = 'warning'; 
            } else {
                $app_status = 'Pending at R&D cell';
                $badge_color = 'info'; 
            }
        } elseif ($status == 7) {
            if (session('userdata')['role_id'] == '12') {
                $app_status = 'Not Recommended';
                $badge_color = 'danger';
            } else {
                $app_status = 'Not recommended by JE';
                $badge_color = 'danger'; 
            }
        } elseif ($status == 8) {
            if (session('userdata')['role_id'] == '7') {
                $app_status = 'Approved';
                $badge_color = 'success'; 
            }elseif(session('userdata')['role_id'] == '12'){ 
                $app_status = 'pending to notify';
                $badge_color = 'warning';
            }else {
                $app_status = 'Approved by R&D cell';
                $badge_color = 'success'; 
            }
        } elseif ($status == 9) {
            if (session('userdata')['role_id'] == '7') {
                $app_status = 'Rejected';
                $badge_color = 'danger'; 
            } elseif (session('userdata')['role_id'] == '12') {
                $app_status = 'Pending to notify';
                $badge_color = 'warning'; 
            } else {
                $app_status = 'Rejected by R&D cell';
                $badge_color = 'danger'; 
            }
        } elseif ($status == 10) {
            $app_status = 'Notified by JE';
            $badge_color = 'info'; 
        }

        $statusWithBadge = [
            'status' => $app_status,
            'badge_color' => $badge_color
        ];

        return $statusWithBadge;
    }
    public static function phdSemRegistrationStatus($app_id)
    {
        $semester = SemesterRegisrationStatus::where('sem_payment_id', $app_id)->first(['status']);
        $status = $semester->status;
        $app_status = '';
        $badge_color = '';

        if ($status == 0) {
            $app_status = 'Not Submitted';
            $badge_color = 'secondary'; 
        } elseif ($status == 1) {
            if (session('userdata')['role'] == 'student') {
                $app_status = 'Applied';
                $badge_color = 'primary'; 
            } elseif (session('userdata')['role'] == 'supervisor') {
                $app_status = 'Pending';
                $badge_color = 'warning'; 
            } else {
                $app_status = 'Applied By Student';
                $badge_color = 'info'; 
            }
        } elseif ($status == 2) {
            if (session('userdata')['role'] == 'supervisor') {
                $app_status = 'Recommended';
                $badge_color = 'success'; 
            } elseif (session('userdata')['role'] == 'Nodal Centre') {
                $app_status = 'Pending';
                $badge_color = 'warning'; 
            } else {
                $app_status = 'Pending at Nodal-Centre';
                $badge_color = 'info'; 
            }
        } elseif ($status == 3) {
            if (session('userdata')['role'] == 'supervisor') {
                $app_status = 'Not Recommended';
                $badge_color = 'danger';
            } else {
                $app_status = 'Not recommended by Supervisor';
                $badge_color = 'danger'; 
            }
        } elseif ($status == 4) {
            if (session('userdata')['role'] == 'Nodal Centre') {
                $app_status = 'Recommended';
                $badge_color = 'success'; 
            } elseif (session('userdata')['role_id'] == '12') {
                $app_status = 'Pending';
                $badge_color = 'warning'; 
            }else{
                $app_status = 'Pending at JE';
                $badge_color = 'info'; 
            }
        } elseif ($status == 5) {
            if (session('userdata')['role'] == 'Nodal Centre') {
                $app_status = 'Not Recommended';
                $badge_color = 'danger'; 
            } else {
                $app_status = 'Not recommended by Nodal Centre';
                $badge_color = 'danger';
            }
        } elseif ($status == 6) {
            if (session('userdata')['role_id'] == '12') {
                $app_status = 'Recommended';
                $badge_color = 'success'; 
            } elseif (session('userdata')['role_id'] == '7') {
                $app_status = 'Pending';
                $badge_color = 'warning'; 
            } else {
                $app_status = 'Pending at R&D cell';
                $badge_color = 'info'; 
            }
        } elseif ($status == 7) {
            if (session('userdata')['role_id'] == '12') {
                $app_status = 'Not Recommended';
                $badge_color = 'danger';
            } else {
                $app_status = 'Not recommended by JE';
                $badge_color = 'danger'; 
            }
        } elseif ($status == 8) {
            if (session('userdata')['role_id'] == '7') {
                $app_status = 'Approved';
                $badge_color = 'success'; 
            }elseif(session('userdata')['role_id'] == '12'){ 
                $app_status = 'pending to notify';
                $badge_color = 'warning';
            }else {
                $app_status = 'Approved by R&D cell';
                $badge_color = 'success'; 
            }
        } elseif ($status == 9) {
            if (session('userdata')['role_id'] == '7') {
                $app_status = 'Rejected';
                $badge_color = 'danger'; 
            } elseif (session('userdata')['role_id'] == '12') {
                $app_status = 'Pending to notify';
                $badge_color = 'warning'; 
            } else {
                $app_status = 'Rejected by R&D cell';
                $badge_color = 'danger'; 
            }
        } elseif ($status == 10) {
            $app_status = 'Notified by JE';
            $badge_color = 'info'; 
        }

        $statusWithBadge = [
            'status' => $app_status,
            'badge_color' => $badge_color
        ];

        return $statusWithBadge;
    }
    public static function provisionalRegistrationStatus($app_id)
    {
        $semester = DB::table('provisional_registrations')->where('id', $app_id)->first(['status']);
        $status = $semester->status;
        $app_status = '';
        $badge_color = '';

        if ($status == 0) {
            $app_status = 'Not Submitted';
            $badge_color = 'secondary'; 
        } elseif ($status == 1) {
            if (session('userdata')['role'] == 'student') {
                $app_status = 'Applied';
                $badge_color = 'primary'; 
            } elseif (session('userdata')['role'] == 'supervisor') {
                $app_status = 'Pending';
                $badge_color = 'danger'; 
            } else {
                $app_status = 'Applied By Student';
                $badge_color = 'info'; 
            }
        } elseif ($status == 2) {
            if (session('userdata')['role'] == 'supervisor') {
                $app_status = 'Recommended';
                $badge_color = 'success'; 
            } elseif (session('userdata')['role'] == 'Nodal Centre') {
                $app_status = 'Pending';
                $badge_color = 'danger'; 
            } else {
                $app_status = 'Pending at nodal center';
                $badge_color = 'info'; 
            }
        }elseif ($status == 3) {
            if (session('userdata')['role'] == 'supervisor') {
                $app_status = 'Not Recommended';
                $badge_color = 'pink';
            } else {
                $app_status = 'Not recommended by Supervisor';
                $badge_color = 'pink'; 
            }
        }
        // elseif ($status == 4) {
        //     if (session('userdata')['role'] == 'co-supervisor') {
        //         $app_status = 'Recommended';
        //         $badge_color = 'success'; 
        //     } elseif (session('userdata')['role'] == 'Nodal Centre') {
        //         $app_status = 'Pending';
        //         $badge_color = 'danger'; 
        //     }else{
        //         $app_status = 'Pending at Nodal Center';
        //         $badge_color = 'info'; 
        //     }
        // } elseif ($status == 5) {
        //     if (session('userdata')['role'] == 'co-supervisor') {
        //         $app_status = 'Not Recommended';
        //         $badge_color = 'pink'; 
        //     } else {
        //         $app_status = 'Not recommended by co-supervisor';
        //         $badge_color = 'pink';
        //     }
        // }
         elseif ($status == 6) {
            if (session('userdata')['role'] == 'Nodal Centre') {
                $app_status = 'Recommended';
                $badge_color = 'success'; 
            } elseif (session('userdata')['role_id'] == '12') {
                $app_status = 'Pending';
                $badge_color = 'danger'; 
            }else{
                $app_status = 'Pending at JE';
                $badge_color = 'info'; 
            }
        } elseif ($status == 7) {
            if (session('userdata')['role'] == 'Nodal Centre') {
                $app_status = 'Not Recommended';
                $badge_color = 'pink'; 
            } elseif(session('userdata')['role'] == 'supervisor'){ 
                $app_status = 'Not recommended by Nodal Centre';
                $badge_color = 'danger';
            }else {
                $app_status = 'Not recommended by Nodal Centre';
                $badge_color = 'pink';
            }
        } elseif ($status == 8) {
            if (session('userdata')['role_id'] == '12') {
                $app_status = 'Recommended';
                $badge_color = 'success'; 
            } elseif (session('userdata')['role_id'] == '7') {
                $app_status = 'Pending';
                $badge_color = 'danger'; 
            } else {
                $app_status = 'Pending at R&D cell';
                $badge_color = 'info'; 
            }
        } elseif ($status == 9) {
            if (session('userdata')['role_id'] == '12') {
                $app_status = 'Not Recommended';
                $badge_color = 'pink';
            } elseif(session('userdata')['role'] == 'Nodal Centre'){ 
                $app_status = 'Not recommended by JE';
                $badge_color = 'danger';
            }else {
                $app_status = 'Not recommended by JE';
                $badge_color = 'pink'; 
            }
        } elseif ($status == 10) {
            if (session('userdata')['role_id'] == '7') {
                $app_status = 'Recommended';
                $badge_color = 'success'; 
            }elseif(session('userdata')['role_id'] == '6'){ 
                $app_status = 'pending';
                $badge_color = 'danger';
            }else {
                $app_status = 'Pending at VC';
                $badge_color = 'success'; 
            }
        } elseif ($status == 11) {
            if (session('userdata')['role_id'] == '7') {
                $app_status = 'Not recommended';
                $badge_color = 'pink'; 
            }elseif(session('userdata')['role_id'] == '12'){ 
                $app_status = 'Not recommended by R&D cell';
                $badge_color = 'danger';
            }else {
                $app_status = 'Not recommended by R&D cell';
                $badge_color = 'pink'; 
            }
        } elseif ($status == 12) {
            if (session('userdata')['role_id'] == '6') {
                $app_status = 'Approved';
                $badge_color = 'success'; 
            }elseif(session('userdata')['role_id'] == '7'){ 
                $app_status = 'pending to transfer';
                $badge_color = 'danger';
            }else {
                $app_status = 'Approved by VC';
                $badge_color = 'success'; 
            }
        }elseif ($status == 13) {
            if (session('userdata')['role_id'] == '6') {
                $app_status = 'Rejected';
                $badge_color = 'pink'; 
            }elseif(session('userdata')['role_id'] == '7'){ 
                $app_status = 'Rejected by VC';
                $badge_color = 'danger';
            }else {
                $app_status = 'Rejected by VC';
                $badge_color = 'pink'; 
            }
        }elseif ($status == 14) {
            if (session('userdata')['role_id'] == '7') {
                $app_status = 'transferred';
                $badge_color = 'success'; 
            }elseif(session('userdata')['role_id'] == '12'){ 
                $app_status = 'pending to notify';
                $badge_color = 'danger';
            }else {
                $app_status = 'transferred to JE';
                $badge_color = 'success'; 
            }
        }elseif ($status == 15) {
                $app_status = 'notified';
                $badge_color = 'success';
        }

        $statusWithBadge = [
            'status' => $app_status,
            'badge_color' => $badge_color
        ];

        return $statusWithBadge;
    }
}
