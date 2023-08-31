<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\CourseWorkSubjects;
use App\Models\PhdCourseWorks;
use App\Models\SemesterPublication;
use DB;
use Department;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Professors;
use TblCourseWorksApplicationRemarks;
use App\Models\Student;

class ProfessorsController extends Controller
{

    // protected $table_name = '';
    // public function __construct()
    // {
    //     // $this->table_name = Auth::guard('nodalcentre')->user()->id;
    //     echo $this->table_name;
    // }

    /**
     * Display a listing of the resource.
     * @return view
     */
    public function index()
    {
        $data['page_title'] = 'Professors list';
        $data['department'] = Department::get();

        $ncr_id       = Auth::guard('nodalcentre')->user()->id;
        $ncr_user_tbl = Auth::guard('nodalcentre')->user()->user_table_name;

        $data['professors'] = DB::table($ncr_user_tbl)
            ->join('nodal_centres', $ncr_user_tbl . '.ncr_id', '=', 'nodal_centres.id')
            ->join('departments', $ncr_user_tbl . '.dept_id', '=', 'departments.id')
            ->select($ncr_user_tbl . '.*', 'nodal_centres.college_name', 'departments.departments_title')
            ->get()
            ->map(function ($result) {
                $designation_array = ['', 'Professor', 'Associate Professor', 'Chairperson', 'Co-Chairperson'];
                $status            = ['Inactive', 'Active'];
                $status_color      = ['warning', 'success'];
                $type              = ['Internal', 'External'];
                $expert_type       = ['Inexpert', 'Expert'];
                return [
                    "professor_id"      => $result->id ?? '',
                    "professor_name"    => $result->name ?? '',
                    "ncr_id"            => $result->ncr_id ?? '',
                    "ncr_name"          => $result->college_name ?? '',
                    "dept_id"           => $result->dept_id ?? '',
                    "dept_name"         => $result->departments_title ?? '',
                    "designation_id"    => $result->designation ?? '',
                    "designation"       => $designation_array[$result->designation],
                    "address"           => $result->address ?? '',
                    "contact_no"        => $result->contact_no ?? '',
                    "email_id"          => $result->email_id ?? '',

                    "status_id"         => $result->status ?? '',
                    "status"            => $status[$result->status] ?? '',
                    "status_color"      => $status_color[$result->status] ?? '',

                    "proffesor_type_id" => $result->employee_type ?? '',
                    "proffesor_type"    => $type[$result->employee_type] ?? '',

                    "expert_status_id"  => $result->expert_status ?? '',
                    "expert_status"     => $expert_type[$result->expert_status] ?? '',

                    "created_by"        => $result->created_by,
                    "updated_by"        => $result->updated_by,
                ];
            });
        $data['designation'] = DB::table($ncr_user_tbl)->select('designation')->whereIn('designation', [3, 4])->get()->pluck('designation')->toArray();
        // dd($data['professors']);

        $data['app_status'] = [
            'applied'  => 0,
            'pending'  => 0,
            'approved' => 0,
            'rejected' => 0,
        ];
        return view('professors.index')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @return json
     */
    public function store(Request $request)
    {
        try {
            //return $request;
            $validator = Validator::make($request->all(), [
                'add_name'        => 'required|string|min:3|max:60',
                'add_dept_id'     => 'required|integer',
                'add_email_id'    => 'required|email',
                'add_address'     => 'string',
                'add_contact_no'  => 'required|string',
                'add_designation' => 'required|integer',
            ]);

            if ($validator->passes()) {
                $ncr_id       = Auth::guard('nodalcentre')->user()->id;
                $ncr_user_tbl = Auth::guard('nodalcentre')->user()->user_table_name;

                $role    = ['', 'DSC 1', 'DSC 2 ', 'Chairperson', 'Co-Chairperson'];
                $role_id = [0, 3, 3, 14, 5];

                $insert_array = [
                    'role'          => $role[$request->add_designation],
                    'role_id'       => $role_id[$request->add_designation],
                    'ncr_id'        => $ncr_id,
                    'dept_id'       => $request->add_dept_id,
                    'name'          => $request->add_name,
                    'designation'   => $request->add_designation,
                    'address'       => $request->add_address,
                    'contact_no'    => $request->add_contact_no,
                    'email_id'      => $request->add_email_id,
                    'password'      => Hash::make($request->add_password),
                    'status'        => $request->add_status,
                    'employee_type' => $request->add_employee_type,
                    'expert_status' => $request->add_expert_status,
                    'created_by'    => $ncr_id,
                    'created_at'    => Carbon::now(),
                ];

                $insert_id = DB::table($ncr_user_tbl)->insert($insert_array);

                $details = [
                    "to_address" => $request->add_email_id,
                    "subject"    => 'User details creation mail',
                    "username"   => $request->add_email_id,
                    "password"   => '12345678',
                ];

                $mail = Mail::send('emails.nodalMail_Info', $details, function ($message) use ($details) {
                    $message->to($details['to_address']);
                    $message->subject($details['subject']);
                });

                $data['data']    = $insert_id;
                $data['message'] = 'Professor created successfully.';
                return response($data, 200);
            } else {
                $data['data']    = [];
                $data['message'] = $validator->errors();
                return response($data, 406);
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Display the specified resource.
     * @return json
     */
    public function show(Request $request)
    {
        try {
            $ncr_id       = Auth::guard('nodalcentre')->user()->id;
            $ncr_user_tbl = Auth::guard('nodalcentre')->user()->user_table_name;
            $result       = DB::table($ncr_user_tbl)->where('id', $request->id);
            if ($result->get()) {
                $data['data']    = $result->first();
                $data['message'] = 'Professor details loaded successfully.';
                return response($data, 200);
            } else {
                $data['data']    = [];
                $data['message'] = 'Professor not found';
                return response($data, 404);
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     * @return json
     */
    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'edit_name'        => 'required|string|min:3|max:60',
                'edit_dept_id'     => 'required|integer',
                'edit_designation' => 'required|integer',
                'edit_address'     => 'string',
                'edit_contact_no'  => 'required|string',
                'edit_email_id'    => 'required|email',
            ]);

            if ($validator->passes()) {
                $ncr_id       = Auth::guard('nodalcentre')->user()->id;
                $ncr_user_tbl = Auth::guard('nodalcentre')->user()->user_table_name;

                $role    = ['', 'DSC 1', 'DSC 2 ', 'Chairperson', 'Co-Chairperson'];
                $role_id = [0, 3, 3, 14, 5];

                $update_data = [
                    'role'          => $role[$request->edit_designation],
                    'role_id'       => $role_id[$request->edit_designation],
                    'name'          => $request->edit_name,
                    'dept_id'       => $request->edit_dept_id,
                    'designation'   => $request->edit_designation,
                    'address'       => $request->edit_address,
                    'contact_no'    => $request->edit_contact_no,
                    'email_id'      => $request->edit_email_id,
                    'status'        => $request->edit_status,
                    'employee_type' => $request->edit_proffesor_type,
                    'expert_status' => $request->edit_expert_status,
                    'updated_by'    => $ncr_id,
                    'updated_at'    => Carbon::now(),
                ];

                $updateStatus = DB::table($ncr_user_tbl)->where('id', $request->edit_professor_id)->update($update_data);
                if ($updateStatus) {

                    $details = [
                        "to_address" => $request->edit_email_id,
                        "subject"    => 'User details updation mail',
                        "username"   => $request->edit_email_id,
                        "password"   => '12345678',
                    ];

                    $mail = Mail::send('emails.nodalMail_Info', $details, function ($message) use ($details) {
                        $message->to($details['to_address']);
                        $message->subject($details['subject']);
                    });

                    $data['data']    = $updateStatus;
                    $data['message'] = 'Professor updated successfully.';
                    return response($data, 200);
                } else {
                    $data['data']    = [];
                    $data['message'] = 'Sorry, not updated.';
                    return response($data, 304);
                }
            } else {
                $data['data']    = [];
                $data['message'] = $validator->errors();
                return response($data, 403);
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return json
     */
    public function destroy(Request $request)
    {
        try {
            $ncr_user_tbl = Auth::guard('nodalcentre')->user()->user_table_name;
            // $professors = $tbl_professors->where('professor_id', $request->id);
            $professors = DB::table($ncr_user_tbl)->where('id', $request->id);
            if ($professors->get()) {
                $professors->delete();
                $data['data']    = [];
                $data['message'] = 'Data deleted successfully.';
                return response($data, 200);
            } else {
                $data['data']    = [];
                $data['message'] = 'Professor not found.';
                return response($data, 404);
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Get professors with respect to department
     * @return json
     */
    public function getProfessorsRespectToDept(Request $request)
    {
        try {
            $ncr_user_tbl = Auth::guard('nodalcentre')->user()->user_table_name;
            $data['data'] = DB::table($ncr_user_tbl)->where('dept_id', $request->dept_id)->get();
            // ->map(function ($r) {
            //     return [
            //         'contact_no'     => $r->contact_no ?? '',
            //         'address'        => $r->address ?? '',
            //         'dept_id'        => $r->dept_id ?? '',
            //         'designation'    => $r->designation ?? '',
            //         'email_id'       => $r->email_id ?? '',
            //         'expert_status'  => $r->expert_status ?? '',
            //         'name'           => $r->name ?? '',
            //         'ncr_id'         => $r->ncr_id ?? '',
            //         'professor_id'   => $r->professor_id ?? '',
            //         'proffesor_type' => $r->proffesor_type ?? '',
            //         'status'         => $r->status ?? '',
            //     ];
            // });
            $data['message'] = 'Loaded successfully.';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Method courseworkList
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function courseworkList(Request $request)
    {
        $user_id = $request->session()->get('userdata')['userID'];
        $coursework_user = DB::table('tbl_phd_courseworks as c')->where('user_id', $user_id)
        ->leftJoin('tbl_course_works_application_remarks as r', 'c.id', 'r.course_sub_id')
        ->first('r.dsc_type');
        if (session('userdata')['role_id'] == '14'){
            $dsc_type = 1;
        }elseif(session('userdata')['role_id'] == '5'){
            $dsc_type = 2;
        }elseif(session('userdata')['role_id'] == '16'){
            $dsc_type = 6;
        }elseif(session('userdata')['role_id'] == '3'){
            if($coursework_user->dsc_type == 3){
                $dsc_type = 3;
            }else{
                $dsc_type = 4;
            }
        }else{
            //
        }
          $data['application_remarks'] = DB::table('tbl_phd_courseworks as c')->select('p.enrollment_no', 'p.name', 'p.topic_of_phd_work', 'p.student_category', 'r.status', 'c.id', 'r.dsc_type', 'r.user_id')->where('dsc_type', $dsc_type)
        ->leftJoin('tbl_course_works_application_remarks as r', 'c.id', 'r.course_sub_id')
        ->leftJoin('phd_application_info as p', 'p.id', 'r.appl_id')
        ->where('r.user_id', $user_id)
        ->get();
        return view('admin.dsc.coursework_list')->with($data);
    }

    /**
     * Method courseworkDetails
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @author AlokDas
     * @return void
     */
    public function courseworkDetails(Request $request, $id = null)
    {
        $user_id = $request->session()->get('userdata')['userID'];
        $role = $request->session()->get('userdata')['role_id'];
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

        $data['coursework_remarks'] = TblCourseWorksApplicationRemarks::select('status', 'remarks')->where('user_type', $role)->where('user_id', $user_id)->where('appl_id', $data['details']->appl_id)->first();

        // Get all the 6 dsc infos to make the Login process by passing appl id
        $data['chairpersonDetails'] = Helpers::getChairpersons($data['details']->appl_id);

        // Session data
        $session_data = $request->session()->get('userdata');
        return view('admin.dsc.coursework_details')->with($data);
    }

    /**
     * Method updateCourseworkSubmit
     * Update the remarks of all the coursework from the respective dsc users
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function updateCourseworkRemarks(Request $request)
    {
        try {
            //return $request;
            $user_id = $request->session()->get('userdata')['userID'];
            $role = $request->session()->get('userdata')['role_id'];
            $appl_id = $request->appl_id;
            $data['data']    = TblCourseWorksApplicationRemarks::where('user_type', $role)->where('user_id', $user_id)->where('appl_id', $appl_id)->update($update_data = [
                'status'  => $request->recommendation_status,
                'remarks' => $request->remarks,
            ]);
            return redirect()->route('dsc.coursework-list');
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
         $stu_sem_repo = DB::table('semester_progress_reports as s')->select('s.*', 'd.ncr_user_id')
        ->leftJoin('phd_application_info as i', 'i.stud_id', '=', 's.stud_id')
        ->leftJoin('tbl_dsc_expert as d', 'i.id', '=', 'd.appl_id')
        ->whereIn('s.status', [2,4,5,6,7,8,9,10])
        ->where('d.ncr_user_id', $user_id)
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
        ->leftJoin('tbl_dsc_expert as d', 'i.id', '=', 'd.appl_id')
        ->whereIn('p.status', [4,6,7,8,9,10,11,12,13,14,15])
        ->where('i.nodal_id', $nodal_id)
        ->where('d.ncr_user_id', $user_id)
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
