<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Organisation;
use App\Models\PhdApplicationInfo;
use App\Models\PhdOtherDocument;
use App\Models\PhdSupervisor;
use App\Models\StudentQualification;
use App\Models\PhdCourseWorks;
use App\Models\CourseWorkSubjects;
use App\Models\SemesterPublication;
use DSCExperts;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TblRemarks;
use Carbon\Carbon;
class JuniorExecutiveController extends Controller
{
    /**
     * Method appliedApplication
     * @author AlokDas
     * @return void
     */
    public function appliedApplication()
    {
        $application = PhdApplicationInfo::select(['id', 'stud_id', 'name', 'enrollment_no', 'stu_payment_status', 'stu_payment_status', 'enrollment_date', 'email', 'phone', 'topic_of_phd_work', 'student_category', 'application_status', 'notification_no', 'notification_date', 'notified'])
            ->where([['stu_payment_status', 1]]);
        $data['applications'] = $application
            ->whereIn('application_status', [4, 6, 7, 8, 9, 10, 11, 12])
            ->where('deleted_at', null)
            ->get();
        $data['app_status'] = Helpers::appStatus();

        return view('je.applied_student')->with($data);
    }

    /**
     * Method viewApplication
     * @param $id $id [explicite description]
     * @author AlokDas
     * @return void
     */
    public function viewApplication($id)
    {
        $data['student']                = PhdApplicationInfo::select('phd_application_info.*', 'nodal_centres.college_name')->join('nodal_centres', 'phd_application_info.nodal_id', 'nodal_centres.id')->where('phd_application_info.id', $id)->first();
        $data['transaction_history']    = DB::table('transaction_history')->where('appl_id', $id)->first(['transaction_id']);
        $data['supervisor']             = PhdSupervisor::where('appl_id', $id)->first();
        $data['student_qualifications'] = StudentQualification::where('appl_id', $id)->get();
        $data['organisation']           = Organisation::where('appl_id', $id)->get();
        $data['documents']              = PhdOtherDocument::where('appl_id', $id)->get();
        $data['domain_experts']         = DSCExperts::where('appl_id', $id)->with('getProfessorDetails')->get()->map(function ($r) {
            return $table_data = DB::table($r->getProfessorDetails->user_table_name)
                ->select(['id', 'name', 'designation', 'address', 'email_id', 'contact_no'])
                ->where('id', $r->ncr_user_id)
                ->get()
                ->map(function ($r1) use ($r) {
                    return [
                        'professor_id' => $r1->id ?? '',
                        'name'         => $r1->name ?? '',
                        'designation'  => $r1->designation ?? '',
                        'address'      => $r1->address ?? '',
                        'email_id'     => $r1->email_id ?? '',
                        'contact_no'   => $r1->contact_no ?? '',
                        'status'       => $r->status ?? '',
                    ];
                })->first();
        });
        $data['tbl_remarks'] = TblRemarks::where('appl_id', $id)->first(); //->pluck('ncr')->first();

        return view('je.view_applied_student')->with($data);
    }

    /**
     * Method updateApplicationRemark
     * @author AlokDas
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     *
     * @return void
     */
    public function updateApplicationRemark(Request $request, $id)
    {
        PhdApplicationInfo::where('id', $id)
            ->update([
                'application_status' => $request->je_recommendation_status,
            ]);

        $tbl_remarks_status = TblRemarks::where('appl_id', $request->appl_id);
        if ($tbl_remarks_status->get()->isNotEmpty()) {
            $tbl_remarks_status->update([
                'appl_id'    => $request->appl_id,
                'je'         => $request->domain_expert_je_remarks,
                'je_overall' => $request->phd_app_je_remarks,
            ]);
        } else {
            $tbl_remarks_status->insert([
                'appl_id'    => $request->appl_id,
                'je'         => $request->domain_expert_je_remarks,
                'je_overall' => $request->phd_app_je_remarks,
            ]);
        }
        return redirect()->route("je.applied-application")->with('success', 'Application has saved to draft successfully.');
    }
    // Coursework Code
    public function viewCoursework(Request $request, $id = null)
    {
        $data['page_title'] = 'Application for Coursework Allotment in Ph.D Programme';
        $data['details']    = PhdCourseWorks::where('id', $id)->with([
            'get_application_details.get_supervisor_details',
            'get_application_details.get_nodal_center_details:id,college_name',
            'get_application_details.get_department_details',
        ])->first();
       
        $coursework_subjects = CourseWorkSubjects::where('appl_id', $data['details']->appl_id)->get();
        if ($coursework_subjects->isNotEmpty()) {
            $data['coursework_subjects'] = $coursework_subjects->map(function ($r) {
                return [
                    "id"           => $r->id,
                    "appl_id"      => $r->appl_id,
                    "subject_code" => $r->subject_code,
                    "course_title" => $r->course_title,
                    "credits"      => $r->credits,
                    "remarks"      => $r->remarks,
                    "status"       => $r->status,
                ];
            });
        } else {
            $data['coursework_subjects'] = [
                "id"           => '',
                "appl_id"      => '',
                "subject_code" => '',
                "course_title" => '',
                "credits"      => '',
                "remarks"      => '',
                "status"       => '',
            ];
        }
        $data['submitted'] = $coursework_subjects->isNotEmpty() ? 1 : 0;

        // dd($data);
        return view("je.coursework.view_coursework")->with($data);
    }
    public function viewCourseworkUpdate(Request $request){
        //return $request;
        $update_data = [
            'status'  => $request->recommendation_status,
            'je_comment' => $request->comment,
        ];

        $data['data']    = PhdCourseWorks::where('id', $request->coursework_id)->update($update_data);
        $data['message'] = 'Status updated successfully';
        return redirect()->route('je.applied-application')->with($data);    
   }
   public function notifyCoursework(Request $request)
    {
        try {
            $update_notify = PhdCourseWorks::where('id', $request->id)->update(['status' => 14]);
            
            $details = [
                "email" => $request->to,
            ];
            
            \Mail::to($request->to)->send(new CourseworkMail($details));

            return response()->json(['message' => 'Email sent successfully'], 200);
        } catch (\Exception $e) {
            $data['data'] = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }
    public function semProgApplication(){
        $stu_sem_repo = DB::table('semester_progress_reports')
           ->whereIn('status', [4,6,7,8,9,10])
           ->get();

       return view('je.semester.semester_progress_list', compact('stu_sem_repo'));
    }
    public function viewSemesterProg($id){
        $student_sem_detaills = DB::table('semester_progress_reports as spr')
        ->select('spr.*', 'spw.*', 'spr.id as id', 'nodal.college_name', 'spr.semester as sem')
          ->leftJoin('semester_planned_works as spw', 'spw.prog_repo_id', '=', 'spr.id')
          ->leftJoin('nodal_centres as nodal', 'nodal.id', '=', 'spr.nodal_center')
          ->where('spr.id', $id)
          ->first();

      $supervisor = DB::table('supervisors as sup')->select('sup.id', DB::raw("CONCAT(sup.first_name,' ',sup.last_name) AS sup_name"))
          ->where('sup.id', $student_sem_detaills->supervisor_1)
          ->first();
       $cosupervisor = DB::table('co_supervisors as sup')->select('id', DB::raw("CONCAT(sup.first_name,' ',sup.last_name) AS cosupsup_name"))
          ->where('id', $student_sem_detaills->supervisor_2)
          ->first();

      //return $supervisor[0];

      $sem_publication = SemesterPublication::where('prog_repo_id', $id)->get();

      return view('je.semester.semester_progress_view', compact('student_sem_detaills', 'sem_publication', 'supervisor', 'id', 'cosupervisor'));
    }
    public function sup_semester_store($id, Request $request){
        //return $request;
        $student_details = DB::table('semester_progress_reports')
            ->where('id', $id)
            ->update([
                'status' => $request->status,
                'je_remark' => $request->remark,
            ]);

        return redirect()->route('je.sem-prog-application')->with('success', 'Application has submitted successfully.');
    }
    public function notifySemProgress($id){
        $student_details = DB::table('semester_progress_reports')
        ->where('id', $id)
        ->update([
            'status' => 10,
        ]);
        return redirect()->route('je.sem-prog-application')->with('success', 'Application has notified successfully.');
    }
     //Semester registration at junior executive
    public function semesterRegister(){
        $info = DB::table('semester_payments as p')->select('i.enrollment_no', 'i.name', 's.semester', 's.status', 'p.id as app_id')
        ->leftJoin('semester_regisration_statuses as s', 's.sem_payment_id', '=', 'p.id')
        ->leftJoin('phd_application_info as i', 'i.id', '=', 's.appl_id')
        ->whereIn('s.status', [4,6,7,8,9,10])
        ->get();
        return view('je.semester.semester_register', compact('info'));
    }
    public function semesterRegisterView($id, Request $request){
        $info = DB::table('semester_payments as p')->select('i.enrollment_no', 'i.name', 'p.semester', 'p.id as app_id', 'st.registration_no', 'st.registration_date', 'i.ncr_department','nodal.college_name', 'nodal.id as nod_id', 'd.departments_title', 'i.id as appl_id', 'i.topic_of_phd_work', 'i.enrollment_date', 'ps.supervisor_name')
            ->leftJoin('phd_application_info as i', 'i.id', '=', 'p.appl_id')
            ->leftJoin('students as st', 'st.id', '=', 'i.stud_id')
            ->leftJoin('nodal_centres as nodal', 'nodal.id', '=', 'i.nodal_id')
            ->rightJoin('departments as d', 'd.id', '=', 'i.academic_programme')
            ->leftJoin('phd_supervisors as ps', 'ps.appl_id', '=', 'p.appl_id')
            ->where('p.id', $id)->first();
            $coursework_sub = DB::table('tbl_course_work_subjects as c')->where('appl_id', $info->appl_id)->get();
            $payment_details = DB::table('semester_payments')->where('id', $id)->first();
            $payemt_status = DB::table('semester_regisration_statuses')->where('sem_payment_id', $id)->first();
        return view('je.semester.semester_register_view', compact('coursework_sub', 'info', 'payment_details','payemt_status', 'id'));
    }
    public function semesterRegisterStore(Request $request, $id){
        //return $request;
        $reg_details = DB::table('semester_regisration_statuses')
        ->where('sem_payment_id', $id)
        ->update([
            'status'    => $request->status,
            'je_remark'    => $request->je_remark,
        ]); 

    return redirect()->route('je.semester-register')->with('success', 'your form has successfully submitted');
    }
    public function notifySemesterRegister($id){
        $reg_details = DB::table('semester_regisration_statuses')
        ->where('sem_payment_id', $id)
        ->update([
            'status'    => 10,
        ]); 
        return redirect()->route('je.semester-register')->with('success', 'Application has notified successfully.');
    }
    //Provisional registration DSC recommendation
    public function provisionalRegList()
    {
        $user_id   = session('userdata')['userID'];
        $provision = DB::table('provisional_registrations as p')->select('i.enrollment_no', 'i.name', 'p.id as app_id', 'p.status')->leftJoin('phd_application_info as i', 'p.appl_id', '=', 'i.id')
            ->leftJoin('phd_supervisors as s', 's.appl_id', '=', 'i.id')
            ->whereIn('p.status', [6, 8, 9, 10, 11, 12, 13, 14, 15])
            ->get();
        return view('je.provisional_registration.provisional_reg_list', compact('provision'));
    }
    public function provisionalRegView($id)
    {
        $provisional = DB::table('provisional_registrations')->where('id', $id)->first();
        $info        = Student::select('students.registration_no', 'students.registration_date', 'p.ncr_department', 'p.enrollment_no', 'p.name', 'p.enrollment_date', 'p.topic_of_phd_work', 'ps.supervisor_name', 'nodal.college_name', 'nodal.id as nod_id', 'd.departments_title', 'p.id as appl_id', 'students.father_husband', 'p.permannt_address', 'p.name_of_faculty', 'p.dob', 'p.category', 'p.student_category')
            ->leftJoin('phd_application_info as p', 'students.id', '=', 'p.stud_id')
            ->leftJoin('nodal_centres as nodal', 'nodal.id', '=', 'p.nodal_id')
            ->rightJoin('departments as d', 'd.id', '=', 'p.academic_programme')
            ->leftJoin('phd_supervisors as ps', 'ps.appl_id', '=', 'p.id')->orderby('p.id', 'desc')
            ->where('students.id', $provisional->stud_id)->first();
        $coursework_sub = DB::table('tbl_course_work_subjects as c')->where('appl_id', $info->appl_id)->get();

        return view('je.provisional_registration.provisional_reg_view', compact('info', 'coursework_sub', 'provisional', 'id'));
    }
    public function provisionRegSubmit(Request $request, $id)
    {
        //return $request;
        $reg_year = Carbon::now()->format('y');

        $student_details = DB::table('provisional_registrations')
            ->where('id', $id)
            ->update([
                'status'    => $request->status,
                'je_remark' => $request->je_remark,
            ]);
        return redirect()->route('je.provisional-registration-list')->with('success', 'you form has been successfully submitted.');
    }
    public function provisionRegNotify(Request $request, $id)
    {
        $en_no = DB::table('provisional_registrations as p')->select('i.enrollment_no')->leftJoin('phd_application_info as i', 'p.appl_id', '=', 'i.id')->where('p.id', $id)->first();
        $enrollment_no = $en_no->enrollment_no;
        $reg_year = Carbon::now()->format('y');
        $curr_date = Carbon::now()->format('d-m-Y');
        $redgno = $reg_year.$enrollment_no;
        $stud_reg = DB::table('students as s')->leftJoin('provisional_registrations as p', 'p.stud_id', '=', 's.id')
        ->where('p.id', $id)->update([
            'registration_no' => $redgno,
            'registration_date' =>  $curr_date,
        ]);
        $student_details = DB::table('provisional_registrations')
            ->where('id', $id)
            ->update([
                'status'    => 15,
            ]);
        return redirect()->route('je.provisional-registration-list')->with('success', 'you form has been successfully submitted.');
    }
    public function reg_office_order($id){
        $provisional = DB::table('provisional_registrations')->where('id', $id)->first();
         $info        = Student::select('students.registration_no', 'students.registration_date', 'p.ncr_department', 'p.enrollment_no', 'p.name', 'p.enrollment_date', 'p.topic_of_phd_work', 'ps.supervisor_name', 'nodal.college_name', 'nodal.id as nod_id', 'd.departments_title', 'p.id as appl_id', 'students.father_husband', 'p.permannt_address', 'p.name_of_faculty', 'p.dob', 'p.category', 'p.student_category')
            ->leftJoin('phd_application_info as p', 'students.id', '=', 'p.stud_id')
            ->leftJoin('nodal_centres as nodal', 'nodal.id', '=', 'p.nodal_id')
            ->rightJoin('departments as d', 'd.id', '=', 'p.academic_programme')
            ->leftJoin('phd_supervisors as ps', 'ps.appl_id', '=', 'p.id')->orderby('p.id', 'desc')
            ->where('students.id', $provisional->stud_id)->first();
        $coursework_sub = DB::table('tbl_course_work_subjects as c')->where('appl_id', $info->appl_id)->get();
        return view("je.provisional_registration.office_order", compact('provisional','info','coursework_sub'));
    }
}
