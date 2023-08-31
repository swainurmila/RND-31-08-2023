<?php

namespace App\Http\Controllers;

use App\Models\CourseWorkSubjects;
use App\Models\PhdCourseWorks;
use App\Models\SemesterPublication;
use App\Models\PhdApplicationInfo;
use Illuminate\Http\Request;
use TblCourseWorksApplicationRemarks;
use DB;
use App\Models\Student;

class ChairpersonController extends Controller
{
    /**
     * Method courseworkList
     * @author UrmilaSwain
     * @return void
     */
    public function courseworkList()
    {
        $data['page_title']          = 'Coursework application list';
        $data['application_remarks'] = DB::table('tbl_phd_courseworks as c')->select('p.enrollment_no', 'p.name', 'p.topic_of_phd_work', 'p.student_category', 'r.status', 'c.id')->where('dsc_type', 1)
        ->leftJoin('tbl_course_works_application_remarks as r', 'c.id', 'r.course_sub_id')
        ->leftJoin('phd_application_info as p', 'p.id', 'r.appl_id')
        ->get();
   
        return view('admin.chairperson.coursework_list')->with($data);
    }

    /**
     * Method courseworkDetails
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @author UrmilaSwain
     * @return void
     */
    public function courseworkDetails(Request $request, $id = null)
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

        $data['coursework_appl_remarks'] = TblCourseWorksApplicationRemarks::select('status')->where('course_sub_id', $id)->first();
        $data['submitted']               = $coursework_subjects->isNotEmpty() ? 1 : 0;
        // dd($data);
        return view('admin.chairperson.coursework_details')->with($data);
    }

    /**
     * Method courseworkDetailsUpdate
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function courseworkDetailsUpdate(Request $request)
    {
        try {
            // dd($request->all());
            $update_data = [
                'dsc1_status'  => $request->recommendation_status,
                'dsc1_remarks' => $request->comment,
                'dsc_1'        => $request->session()->get('userdata')['userID'],
            ];

            $data['data']    = TblCourseWorksApplicationRemarks::where('course_sub_id', $request->coursework_id)->update($update_data);
            $data['message'] = 'Status updated successfully';
            return redirect()->route('chairperson.coursework-list')->with($data);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Method courseworkListCochairperson
     *
     * @return void
     */
    public function courseworkListCochairperson()
    {
        $data['page_title']          = 'Coursework application list';
        $data['application_remarks'] = TblCourseWorksApplicationRemarks::with(['get_application_details', 'get_coursework_subject_details'])->get();
        return view('admin.cochairperson.coursework_list')->with($data);
    }

    /**
     * Method courseDetailsCochairperson
     *
     * @param $id $id [explicite description]
     *
     * @return void
     */
    public function courseDetailsCochairperson($id = null)
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

        $data['coursework_appl_remarks'] = TblCourseWorksApplicationRemarks::select('dsc2_status', 'dsc2_remarks')->where('course_sub_id', $id)->first();
        $data['submitted']               = $coursework_subjects->isNotEmpty() ? 1 : 0;
        // dd($data);
        return view('admin.cochairperson.coursework_details')->with($data);
    }

    /**
     * Method courseworkUpdateCochairperson
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function courseworkUpdateCochairperson(Request $request)
    {
        try {
            //return $request;
            $update_data = [
                'dsc2_status'  => $request->recommendation_status,
                'dsc2_remarks' => $request->comment,
                'dsc_2'        => $request->session()->get('userdata')['userID'],
            ];

            $data['data']    = TblCourseWorksApplicationRemarks::where('course_sub_id', $request->coursework_id)->update($update_data);
            $data['message'] = 'Status updated successfully';
            return redirect()->route('co-chairperson.coursework-list')->with($data);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }
     //Semester Progress Report
     public function sup_semester_list()
     {
          $nodal_id = session()->get('userdata')['nodal_id'];
         $user_id = session()->get('userdata')['userID'];
         $stu_sem_repo = DB::table('semester_progress_reports as s')->select('s.*', 'p.professor_id')
         ->leftJoin('phd_application_info as i', 'i.stud_id', '=', 's.stud_id')
         ->leftJoin('tbl_professors as p', 'i.nodal_id', '=', 'p.ncr_id')
         ->whereIn('p.designation', [3,4])
         ->where('p.professor_id', $user_id)
         ->whereIn('s.status', [2,4,5,6,7,8,9,10])
            ->get();
        
 
         return view('admin.dsc.semester-progress-listing', compact('stu_sem_repo'));
 
     }
     public function sup_semester_view($id)
     {
         // return $id;
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
 
         return view('admin.dsc.semester-progress-view', compact('student_sem_detaills', 'sem_publication', 'supervisor', 'id', 'cosupervisor'));
     }
     //provisional registration
    public function provisionalRegList(){
        $nodal_id = session()->get('userdata')['nodal_id'];
        $user_id = session()->get('userdata')['userID'];
        $provision = DB::table('provisional_registrations as p')->select('i.enrollment_no', 'i.name', 'p.id as app_id', 'p.status')->leftJoin('phd_application_info as i', 'p.appl_id', '=', 'i.id')
        ->leftJoin('phd_supervisors as s', 's.appl_id', '=', 'i.id')
        ->leftJoin('tbl_professors as t', 'i.nodal_id', '=', 't.ncr_id')
        ->whereIn('p.status', [4,6,7,8,9,10,11,12,13,14,15])
        ->where('i.nodal_id', $nodal_id)
        ->where('t.professor_id', $user_id)
        ->get();
        return view('admin.dsc.provisional-reg.provisional_reg_list', compact('provision'));
    }
    public function provisionalRegView($id){
        $provisional = DB::table('provisional_registrations')->where('id', $id)->first();
        $info = Student::select('students.registration_no', 'students.registration_date', 'p.ncr_department', 'p.enrollment_no', 'p.name', 'p.enrollment_date', 'p.topic_of_phd_work', 'ps.supervisor_name', 'nodal.college_name', 'nodal.id as nod_id', 'd.departments_title', 'p.id as appl_id', 'students.father_husband','p.permannt_address', 'p.name_of_faculty', 'p.dob', 'p.category', 'p.student_category')
            ->leftJoin('phd_application_info as p', 'students.id', '=', 'p.stud_id')
            ->leftJoin('nodal_centres as nodal', 'nodal.id', '=', 'p.nodal_id')
            ->rightJoin('departments as d', 'd.id', '=', 'p.academic_programme')
            ->leftJoin('phd_supervisors as ps', 'ps.appl_id', '=', 'p.id')->orderby('p.id', 'desc')
            ->where('students.id', $provisional->stud_id)->first();
            $coursework_sub = DB::table('tbl_course_work_subjects as c')->where('appl_id', $info->appl_id)->get();
        
        return view('admin.dsc.provisional-reg.provisional_reg_view', compact('info', 'coursework_sub', 'provisional', 'id'));
    }
}
