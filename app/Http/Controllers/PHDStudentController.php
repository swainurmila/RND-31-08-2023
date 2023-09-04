<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\ChangeNodalCenter;
use App\Models\ChangeResearchSupervisor;
use App\Models\CoSupervisor;
use App\Models\CoSupervisorMaster;
use App\Models\Coursework;
use App\Models\Department;
use App\Models\DraftDetails;
use App\Models\ExtentionCompleteWork;
use App\Models\NodalCentre;
use App\Models\Organisation;
use App\Models\PhdApplicationInfo;
use App\Models\PhdDiscontinuation;
use App\Models\PhdStudentMaternityLeave;
use App\Models\PhdSupervisor;
use App\Models\RenewalRegistration;
use App\Models\ResearchworkChangeTitle;
use App\Models\SemesterPayment;
use App\Models\SemesterPlannedWork;
use App\Models\SemesterProgressReport;
use App\Models\SemesterPublication;
use App\Models\SemisterRegistrationPayment;
use App\Models\Student;
use App\Models\StudentLog; //App\Models\Supervisor;
use App\Models\StudentQualification;
use App\Models\SupervisorMaster;
use App\Models\User;
use Carbon\Carbon;
use CourseWorkSubjects;
use DateInterval;
use DateTime;
use DSCExperts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mail;
use PDF;
use PhdCourseWorks;
use Supervisor;

class PHDStudentController extends Controller
{
    public function __construct()
    {
    }

    public function store_info(Request $request)
    {
        // echo '<pre>';
        // var_dump($request->all());die();
        //return $request;
        $user_id = session('userdata')['userID'];

        if ($request->hasFile('cate_certi')) {
            $avatarPath = $request->file('cate_certi');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path       = $request->file('cate_certi')->move('upload/caste_certificate/', $avatarName);
            $img_path   = 'upload/caste_certificate/' . $avatarName;
        } else {
            $avatarName = null;
        }

        if ($request->hasFile('han_certi')) {
            $handPath = $request->file('han_certi');
            $handName = time() . '.' . $handPath->getClientOriginalExtension();
            $path     = $request->file('han_certi')->move('upload/hadicap_certificate/', $handName);
            $img_path = 'upload/hadicap_certificate/' . $handName;
        } else {
            $handName = null;
        }

        if ($request->hasFile('upload_aadhar_card')) {
            $aadharPath = $request->file('upload_aadhar_card');
            $aadharName = time() . '.' . $aadharPath->getClientOriginalExtension();
            $path       = $request->file('upload_aadhar_card')->move('upload/aadhar/', $aadharName);
            $img_path   = 'upload/aadhar/' . $aadharName;
        } else {
            $aadharName = "";
        }
        $name_prefix = $request->name_prefix;

        $date = Carbon::now()->format('d-m-Y');
        // return $request;
        $appl_id = DB::table('phd_application_info')->insertGetId([
            'stud_id'              => $user_id,
            'name'                 => $name_prefix . '. ' . $request->candidate_full_name,
            //'registration_no'         => $reg_no,
            //'registration_date'       => $date,
            'name_of_faculty'      => $request->name_of_faculty,
            'academic_programme'   => $request->academic_programme,
            'topic_of_phd_work'    => $request->topic_of_phd_work,
            'ncr_department'       => $request->ncr_department_name,
            'father_husband'       => $request->father_husband_name,
            'mother'               => $request->mothers_name,
            'permannt_address'     => $request->permanent_address,
            'present_address'      => $request->present_address,
            'email'                => $request->phdstudent_email,
            'phone'                => $request->phdstudent_mobile,
            'dob'                  => $request->date_of_birth,
            'nationality'          => $request->phd_nationality,
            'student_category'     => $request->student_category,
            'category'             => $request->general_category,
            'category_certificate' => $avatarName,
            'hadicap_certificate'  => $handName,
            'nodal_id'             => $request->nodal_centre,
            'aadhar_card'          => $request->aadhar_card,
            'aadhar_certificate'   => $aadharName,
            'draft_status'         => 1,
            'created_at'           => Carbon::now(),

        ]);

        // return view('admin.phdstudents.studentApplyform2');
        return redirect()->route('education.view', [$appl_id])->with('success', 'your personal details has been saved');
    }

    public function draft_info($id)
    {
        // return 4;
        $student       = DB::table('phd_application_info')->where('id', $id)->first();
        $department    = Department::all();
        $nodal_centre  = NodalCentre::allNodalCentre();
        $stu_name      = $student->name;
        $stu_name_exp  = explode(' ', $stu_name);
        $name_prefix   = $stu_name_exp[0];
        $stu_full_name = $stu_name_exp[1] . ' ' . $stu_name_exp[2];
        return view('admin.phdstudents.student_info_draft', compact('student', 'department', 'name_prefix', 'stu_full_name', 'id', 'nodal_centre'));
    }

    public function draft_info_store(Request $request, $id)
    {
        // return $request;
        // $ses = session()->all();
        // $user_data = $request->session()->get('userdata');
        // $user_id = $user_data['userID'];

        if ($request->hasFile('cate_certi')) {
            $avatarPath = $request->file('cate_certi');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path       = $request->file('cate_certi')->move('upload/caste_certificate/', $avatarName);
            $img_path   = 'upload/caste_certificate/' . $avatarName;
        } else {
            $avatarName = $request->cate_hid_ceti;
        }

        if ($request->hasFile('han_certi')) {
            $handPath = $request->file('han_certi');
            $handName = time() . '.' . $handPath->getClientOriginalExtension();
            $path     = $request->file('han_certi')->move('upload/hadicap_certificate/', $handName);
            $img_path = 'upload/hadicap_certificate/' . $handName;
        } else {
            $handName = $request->han_hid_ceti;
        }

        if ($request->hasFile('upload_aadhar_card')) {
            $aadharPath = $request->file('upload_aadhar_card');
            $aadharName = time() . '.' . $aadharPath->getClientOriginalExtension();
            $path       = $request->file('upload_aadhar_card')->move('upload/aadhar/', $aadharName);
            $img_path   = 'upload/aadhar/' . $aadharName;
        } else {
            $aadharName = $handName = $request->adha_hid_card;
        }

        $name_prefix = $request->name_prefix;
        $today       = Carbon::today();
        $date_arr    = explode(" ", $today);
        $date        = $date_arr[0];

        //$dob = Carbon::parse($request->date_of_birth)->format('m-d-Y');
        $student_details = DB::table('phd_application_info')
            ->where('id', $id)
            ->update([
                'name'                 => $name_prefix . '. ' . $request->candidate_full_name,
                'name_of_faculty'      => $request->name_of_faculty,
                'academic_programme'   => $request->academic_programme,
                'topic_of_phd_work'    => $request->topic_of_phd_work,
                'ncr_department'       => $request->ncr_department_name,
                'father_husband'       => $request->father_husband_name,
                'mother'               => $request->mothers_name,
                'permannt_address'     => $request->permanent_address,
                'present_address'      => $request->present_address,
                'email'                => $request->phdstudent_email,
                'phone'                => $request->phdstudent_mobile,
                'dob'                  => $request->date_of_birth,
                'nationality'          => $request->phd_nationality,
                'student_category'     => $request->student_category,
                'category'             => $request->general_category,
                'category_certificate' => $avatarName,
                'hadicap_certificate'  => $handName,
                'aadhar_certificate'   => $aadharName,
                'nodal_id'             => $request->nodal_centre,

            ]);

        $student = DB::table('phd_application_info')
            ->where('id', $id)->first();
        $last_stu_id = $student->id;

        $StudentQualification = StudentQualification::where('appl_id', $last_stu_id)->get();

        $stuquali_count = $StudentQualification->count();

        // return view('admin.phdstudents.studentApplyform2');
        if ($stuquali_count > 0) {
            return redirect()->route('draft.education', [$id]);
        } else {
            return redirect()->route('education.view', [$id])->with('success', 'your personal details has been saved');
        }
    }

    /**
     * Method enrollment_view
     * @param $id $id [explicite description]
     * @author AlokDas
     * @return void
     */
    public function enrollment_view($id)
    {
        $student = DB::table('phd_application_info as pa')->select('pa.*', 'n.college_name')
            ->leftJoin('nodal_centres as n', 'n.id', 'pa.nodal_id')
            ->where('pa.id', $id)->first();
        $last_stu_id = $student->id;

        $data['student']                = $student;
        $data['supervisor']             = PhdSupervisor::where('appl_id', $last_stu_id)->first();
        $data['student_qualifications'] = StudentQualification::where('appl_id', $last_stu_id)->get();
        $data['organisation']           = Organisation::where('appl_id', $last_stu_id)->get();
        $data['OtherDocuments']         = DB::table('phd_other_documents')->where('appl_id', $id)->get();

        return view('admin.phdstudents.student-enrollment-view')->with($data);
    }

    /**
     * Method get_phd_application_details
     * @param returns all the data related with phdApplicationInfo table by $appl_id
     * @author AlokDas
     * @return void
     */
    public function get_phd_application_details($appl_id)
    {
        return PhdApplicationInfo::where('id', $appl_id)
            ->with('get_department_details')
            ->with('get_supervisor_details:appl_id,supervisor_name,supervisor_address,co_supervisor_name,co_supervisor_address')
            ->with('get_nodal_center_details:id,college_name')
            ->with(['get_domain_experts_details' => function ($q) {
                $q->where('status', 1);
                $q->select('*');
                // $q->with('getProfessorDetails:professor_id,name,status');
            }])
            ->with('get_remarks_details')
            ->get()
            ->map(function ($r) {
                $nodal_user_table = NodalCentre::select('user_table_name')->where('id', $r->nodal_id)->first();
                return [
                    'id'                              => $r->id,
                    'email'                           => $r->email,
                    'name'                            => $r->name,
                    'father_name'                     => $r->father_husband,
                    'address'                         => $r->permannt_address,
                    'enrollment_no'                   => $r->enrollment_no,
                    'enrollment_date'                 => date('d/m/Y', strtotime($r->enrollment_date)),
                    'department'                      => $r->ncr_department,
                    'dob'                             => date('d/m/Y', strtotime($r->dob)),
                    'category'                        => $r->category,
                    'category_of_studentship'         => $r->student_category,
                    'faculty_name'                    => $r->name_of_faculty,
                    'descipline'                      => $r->get_department_details->departments_title,
                    'broad_area_of_research_proposed' => $r->topic_of_phd_work,
                    'place_of_employment'             => '----NA----',
                    'supervisor_name'                 => $r->get_supervisor_details->supervisor_name,
                    'supervisor_address'              => $r->get_supervisor_details->supervisor_address,
                    'co_supervisor_name'              => $r->get_supervisor_details->co_supervisor_name,
                    'co_supervisor_address'           => $r->get_supervisor_details->co_supervisor_address,
                    'chairperson'                     => DB::table($nodal_user_table->user_table_name)->where('designation', 3)->pluck('name')->first(),
                    'co_chairperson'                  => DB::table($nodal_user_table->user_table_name)->where('designation', 4)->pluck('name')->first(),
                    'dsc_member1'                     => DB::table($nodal_user_table->user_table_name)->where('id', $r->get_domain_experts_details[0]->ncr_user_id)->pluck('name')->first(),
                    'dsc_member2'                     => DB::table($nodal_user_table->user_table_name)->where('id', $r->get_domain_experts_details[1]->ncr_user_id)->pluck('name')->first(),
                    'principle_supervisor_member1'    => $r->get_supervisor_details->supervisor_name,
                    'principle_co_supervisor_member1' => $r->get_supervisor_details->co_supervisor_name,
                    'notification_no'                 => $r->notification_no,
                    'notification_date'               => $r->notification_date,
                    'notified'                        => $r->notified,
                ];
            })->first();
    }

    /**
     * Method notify_student
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function notify_student(Request $request)
    {
        try {
            $email_details = [
                'appl_id'    => $request->id,
                'to_address' => $request->to,
                'subject'    => 'Phd Application Notification Mail',
            ];
            $data['student_details'] = $this->get_phd_application_details($request->id);
            // dd($data['student_details']);

            $mail = Mail::send('emails.phdApplicationMail_Info', $data, function ($message) use ($email_details, $data) {
                $message->to($email_details['to_address']);
                $message->subject($email_details['subject']);
                $pdf = PDF::loadView('emails.phdApplication_mailAttachment', $data)->setPaper('a4', 'portrait')->stream('phd_application_form.pdf');
                $message->attachData($pdf, 'phd_application_form_dsc.pdf');
            });
            $update_notify   = PhdApplicationInfo::where('id', $request->id)->update(['notified' => true]);
            $data['data']    = $update_notify;
            $data['message'] = 'Student mail sent successfully.';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Method notify_student
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function update_notify_student_details(Request $request)
    {
        try {
            $update_details = [
                'id'                => $request->appl_id,
                'notification_no'   => $request->notification_no,
                'notification_date' => $request->notification_date,
            ];

            $update_notification = PhdApplicationInfo::where('id', $request->appl_id)->update($update_details);
            $data['data']        = $update_notification;
            $data['message']     = 'Notification updated successfully.';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Method notify_student_view
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function notify_student_view(Request $request, $appl_id)
    {
        $data['page_title']      = 'Student notification form';
        $data['student_details'] = $this->get_phd_application_details($appl_id);
        // dd($data['student_details']);
        return view('emails.phdApplication_notificationMail')->with($data);
        // return view('emails.phdApplication_mailAttachment')->with($data);
    }

    public function education_view($id)
    {
        $application          = DB::table('phd_application_info')->where('id', $id)->first();
        $StudentQualification = StudentQualification::where('appl_id', $id)->get();
        $stuquali_count       = $StudentQualification->count();
        $Organisation         = Organisation::where('appl_id', $id)->get();
        $PhdSupervisor        = PhdSupervisor::where('appl_id', $id)->first();
        $supervisor           = Supervisor::select(['id', 'first_name', 'last_name'])->get();
        $cosupervisor         = CoSupervisor::select(['id', 'first_name', 'last_name'])->get();

        return view('admin.phdstudents.studentApplyform2', compact('id', 'StudentQualification', 'Organisation', 'PhdSupervisor', 'stuquali_count', 'supervisor', 'cosupervisor'));
    }

    /**
     * Method store_education
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @author AlokDas
     * @return void
     */
    public function store_education(Request $request, $id)
    {
        // return $request;
        $student = DB::table('phd_application_info')->where('id', $id)->first();
        // $stu_id = $student->id;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo');
            $photoname = time() . '.' . $photoPath->getClientOriginalExtension();
            $path2     = $request->file('photo')->move('upload/photo/', $photoname);
            $img_path2 = 'upload/photo/' . $photoname;
        } else {
            $photoname = "";
        }

        if ($request->hasFile('signature')) {
            $signaturePath = $request->file('signature');
            $signaturename = time() . '.' . $signaturePath->getClientOriginalExtension();
            $path3         = $request->file('signature')->move('upload/signature/', $signaturename);
            $img_path3     = 'upload/signature/' . $signaturename;
        } else {
            $signaturename = "";
        }

        if ($request->hasFile('phd_app_certi')) {
            $PhdAppPath = $request->file('phd_app_certi');
            $PhdAppName = time() . '.' . $PhdAppPath->getClientOriginalExtension();
            $path3      = $request->file('phd_app_certi')->move('upload/phd_app_certi/', $PhdAppName);
            $img_path3  = 'upload/phd_app_certi/' . $PhdAppName;
        } else {
            $PhdAppName = "";
        }
        //$stu_id = DB::getPdo()->lastInsertId();
        if ($request->stu_quali) {
            //return 1;
            for ($i = 0; $i < count($request->stu_quali); $i++) {
                $StudentQualification                   = new StudentQualification();
                $StudentQualification->appl_id          = $id;
                $StudentQualification->exam_passed      = $request->stu_quali[$i];
                $StudentQualification->Specialization   = $request->stu_spec[$i];
                $StudentQualification->board_university = $request->stu_univer[$i];
                $StudentQualification->year_of_passing  = $request->stu_pass_year[$i];
                $StudentQualification->division         = $request->stu_division[$i];
                $StudentQualification->percentage       = $request->stu_percentage[$i];
                $StudentQualification->certificate      = $request->formFile_hid[$i];
                $StudentQualification->marksheet        = $request->marksheet_hid[$i];
                $StudentQualification->save();
            }
        }

        if ($request->other_doc_title_hid) {
            //return 1;
            for ($i = 0; $i < count($request->other_doc_title_hid); $i++) {
                // $OtherDocuments = new StudentQualification();
                // $OtherDocuments->appl_id = $id;
                // $OtherDocuments->doc_title = $request->other_doc_title_hid[$i];
                // $OtherDocuments->doc_path = $request->other_doc_hid[$i];
                // $StudentQualification->save();
                DB::table('phd_other_documents')->insert([
                    'appl_id'   => $id,
                    'doc_title' => $request->other_doc_title_hid[$i],
                    'doc_path'  => $request->other_doc_hid[$i],
                ]);
            }
        }

        if ($request->stu_orga) {

            for ($i = 0; $i < count($request->stu_orga); $i++) {
                $Organisation                    = new Organisation();
                $Organisation->appl_id           = $id;
                $Organisation->organisation_name = $request->stu_orga[$i];
                $Organisation->designation       = $request->stu_desig[$i];
                $Organisation->duration          = $request->stu_duration[$i];
                $Organisation->natutre_of_job    = $request->stu_jobnature[$i];
                $Organisation->noc_certificate   = $request->noc_certi_hid[$i];
                $Organisation->save();
            }
        }

        $student_details = DB::table('phd_application_info')
            ->where('id', $id)
            ->update([
                'photo'             => $photoname,
                'signature'         => $signaturename,
                'phd_app_file'      => $PhdAppName,
                'topic_of_phd_work' => $request->phd_proposed_work,

            ]);

        $supervisor      = Supervisor::find($request->phdstudent_propose_supervisor);
        $supervisor_name = $supervisor->first_name . ' ' . $supervisor->last_name;

        $PhdSupervisor                  = new PhdSupervisor();
        $PhdSupervisor->appl_id         = $id;
        $PhdSupervisor->supervisor_name = $supervisor_name;
        $PhdSupervisor->sup_id          = $request->phdstudent_propose_supervisor;
        // $PhdSupervisor->sup_id             = $request->sup_id;
        $PhdSupervisor->supervisor_email   = $request->phdstudent_supervisor_email;
        $PhdSupervisor->supervisor_address = $request->phdstudent_supervisor_add;
        $PhdSupervisor->supervisor_phone   = $request->phdstudent_supervisor_phone;
        $PhdSupervisor->co_supervisor_name = $request->phdstudent_propose_cosupervisor;
        //$PhdSupervisor->cosup_id              = $request->cosup_id;
        $PhdSupervisor->co_supervisor_email   = $request->phdstudent_cosupervisor_email;
        $PhdSupervisor->co_supervisor_address = $request->phdstudent_cosupervisor_add;
        $PhdSupervisor->co_supervisor_phone   = $request->phdstudent_cosupervisor_phone;
        $PhdSupervisor->save();

        DB::table('phd_application_info')
            ->where('id', $id)
            ->update([
                'draft_status' => 2,
            ]);

        return redirect()->route('student.view', [$id])->with('success', 'your educational info has been saved');
    }

    public function draft_education($id)
    {
        $student = PhdApplicationInfo::where('id', $id)->first();
        //$last_stu_id = $student->id;

        $StudentQualification = StudentQualification::where('appl_id', $id)->get();
        $Organisation         = Organisation::where('appl_id', $id)->get();
        $PhdSupervisor        = PhdSupervisor::where('appl_id', $id)->first();
        $OtherDocuments       = DB::table('phd_other_documents')->where('appl_id', $id)->get();
        $supervisor           = Supervisor::select(['id', 'first_name', 'last_name'])->get();
        return view('admin.phdstudents.student_quali_draft', compact('id', 'StudentQualification', 'Organisation', 'student', 'PhdSupervisor', 'OtherDocuments', 'supervisor'));
    }

    public function draft_education_store(Request $request, $id)
    {
        $student = PhdApplicationInfo::where('id', $id)->first();
        //$last_stu_id = $student->id;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo');
            $photoname = time() . '.' . $photoPath->getClientOriginalExtension();
            $path2     = $request->file('photo')->move('upload/photo/', $photoname);
            $img_path2 = 'upload/photo/' . $photoname;
        } else {
            $photoname = $request->hid_photo;
        }

        if ($request->hasFile('signature')) {
            $signaturePath = $request->file('signature');
            $signaturename = time() . '.' . $signaturePath->getClientOriginalExtension();
            $path3         = $request->file('signature')->move('upload/signature/', $signaturename);
            $img_path3     = 'upload/signature/' . $signaturename;
        } else {
            $signaturename = $request->signature_hid;
        }

        if ($request->stu_quali) {
            //return 1;
            for ($i = 0; $i < count($request->stu_quali); $i++) {
                $StudentQualification                   = new StudentQualification();
                $StudentQualification->appl_id          = $id;
                $StudentQualification->exam_passed      = $request->stu_quali[$i];
                $StudentQualification->Specialization   = $request->stu_spec[$i];
                $StudentQualification->board_university = $request->stu_univer[$i];
                $StudentQualification->year_of_passing  = $request->stu_pass_year[$i];
                $StudentQualification->division         = $request->stu_division[$i];
                $StudentQualification->percentage       = $request->stu_percentage[$i];
                $StudentQualification->certificate      = $request->formFile_hid[$i];
                $StudentQualification->marksheet        = $request->marksheet_hid[$i];
                $StudentQualification->save();
            }
        }

        if ($request->stu_orga) {

            for ($i = 0; $i < count($request->stu_orga); $i++) {
                $Organisation                    = new Organisation();
                $Organisation->appl_id           = $id;
                $Organisation->organisation_name = $request->stu_orga[$i];
                $Organisation->designation       = $request->stu_desig[$i];
                $Organisation->duration          = $request->stu_duration[$i];
                $Organisation->natutre_of_job    = $request->stu_jobnature[$i];
                $Organisation->noc_certificate   = $request->noc_certi_hid[$i];
                $Organisation->save();
            }
        }

        if ($request->other_doc_title_hid) {
            //return 1;
            for ($i = 0; $i < count($request->other_doc_title_hid); $i++) {

                DB::table('phd_other_documents')->insert([
                    'appl_id'   => $id,
                    'doc_title' => $request->other_doc_title_hid[$i],
                    'doc_path'  => $request->other_doc_hid[$i],
                ]);
            }
        }

        $supervisor      = Supervisor::find($request->phdstudent_propose_supervisor);
        $supervisor_name = $supervisor->first_name . ' ' . $supervisor->last_name;

        $PhdSupervisor                  = PhdSupervisor::where('appl_id', $id)->first();
        $PhdSupervisor->appl_id         = $id;
        $PhdSupervisor->supervisor_name = $supervisor_name;
        $PhdSupervisor->sup_id          = $request->phdstudent_propose_supervisor;
        // $PhdSupervisor->sup_id             = $request->sup_id;
        $PhdSupervisor->supervisor_email   = $request->phdstudent_supervisor_email;
        $PhdSupervisor->supervisor_address = $request->phdstudent_supervisor_add;
        $PhdSupervisor->supervisor_phone   = $request->phdstudent_supervisor_phone;
        $PhdSupervisor->co_supervisor_name = $request->phdstudent_propose_cosupervisor;
        //$PhdSupervisor->cosup_id              = $request->cosup_id;
        $PhdSupervisor->co_supervisor_email   = $request->phdstudent_cosupervisor_email;
        $PhdSupervisor->co_supervisor_address = $request->phdstudent_cosupervisor_add;
        $PhdSupervisor->co_supervisor_phone   = $request->phdstudent_cosupervisor_phone;
        $PhdSupervisor->save();

        return redirect()->route('student.view', [$id])->with('success', 'please review your form');
    }

    public function student_view($id)
    {

        $student = DB::table('phd_application_info as pa')->select('pa.*', 'n.college_name')
            ->leftJoin('nodal_centres as n', 'n.id', 'pa.nodal_id')
            ->where('pa.id', $id)->first();
        $last_stu_id = $student->id;

        $supervisor             = PhdSupervisor::where('appl_id', $last_stu_id)->first();
        $student_qualifications = StudentQualification::where('appl_id', $last_stu_id)->get();
        $organisation           = Organisation::where('appl_id', $last_stu_id)->get();
        $OtherDocuments         = DB::table('phd_other_documents')->where('appl_id', $id)->get();

        $stu_paymetn_status = $student->stu_payment_status;
        if ($stu_paymetn_status == 0) {
            return view('admin.phdstudents.studentPreview', compact('student', 'supervisor', 'student_qualifications', 'organisation', 'id', 'OtherDocuments'));
        } else {
            return view('admin.phdstudents.student_final_preview', compact('student', 'supervisor', 'student_qualifications', 'organisation', 'id', 'OtherDocuments'));
        }
    }

    public function final_submit(Request $request, $id)
    {
        $enrollment_date = Carbon::now()->format('Y-m-d');
        $department      = DB::table("programs as p")->select('p.id')->leftJoin('departments as d', 'd.prg_id', '=', 'p.id')->leftJoin('phd_application_info as i', 'i.academic_programme', '=', 'd.id')->where('i.id', $id)->first();
        $dept            = '0' . $department->id;
        $roll_no         = DB::table('phd_application_info as pa')->select('s.id')
            ->leftJoin('students as s', 's.id', 'pa.stud_id')
            ->where('pa.id', $id)->first();
        $roll_no        = Str::padLeft($roll_no->id, 3, '0');
        $letter_number  = [1 => 'A', 2 => 'B', 3 => 'C', 4 => 'D', 5 => 'E', 6 => 'F', 7 => 'G', 8 => 'H', 9 => 'I', 0 => 'X'];
        $enrollmentData = [];
        $startYear      = 2001;
        for ($i = 0; $i < 26; $i++) {
            $enrollmentData[chr(65 + $i)] = $startYear + $i;
        }
        $currentYear = date('Y');
        // $currentYear = 2028;
        if ($currentYear < 2027) {
            $currentAlphabet = null;
            foreach ($enrollmentData as $alphabet => $yr) {
                if ($yr == $currentYear) {
                    $currentAlphabet = $alphabet;
                    break;
                }
            }
        } else {
            $curr_year = substr($currentYear, -2);
            $digits    = str_split((string) $curr_year);
            $first_no  = $digits[0];
            $second_no = $digits[1];

            $first_letter    = $letter_number[$first_no];
            $second_letter   = $letter_number[$second_no];
            $currentAlphabet = $first_letter . $second_letter;
        }
        $enrollment_no = 'DS' . $currentAlphabet . $dept . $roll_no;
        // $sereachitem  = 'PHDEN' . $year;
        $check_enroll = PhdApplicationInfo::where('id', $id)->first(['enrollment_no']);
        PhdApplicationInfo::where('id', $id)->update([
            'application_status' => 1,
            'enrollment_no'      => $enrollment_no,
            'enrollment_date'    => $enrollment_date,
        ]);

        $transaction = DB::table('transaction_history')->orderBy('id', 'DESC')->where('appl_id', $id)->first();

        $student = PhdApplicationInfo::select('enrollment_no', 'name')->where('id', $id)->first();
        //    $chars      = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        //    $length = 22;
        //    $rand_chars = substr( str_shuffle( $chars ), 0, $length );
        //    $rand_chars = 'PAY'.$rand_chars;

        //    $date = Carbon::now()->format('d-m-Y');

        //    $paymentstatus ="success";

        //$transaction_id =
        //$enrol_di

        // if($reg_no_first){
        //    $last_reg_no = $reg_no_first->enrollment_no;
        // if (!empty($phdapp->enrollment_no)) {
        //     return $enroll_no = str_replace('PHDEN', '', $phdapp->enrollment_no);
        //     $increment = $enroll_no + 1;
        //     $enroll_no = str_pad($increment, 3, '0', STR_PAD_LEFT);
        //     return $enroll_no = 'PHDEN'.$year.$enroll_no;
        // } else {
        //     return 'else';
        //     $enroll_no = str_pad(1, 3, '0', STR_PAD_LEFT);
        //     $year=  Carbon::now()->format('Y');
        //     $year=  substr( $year, -2);
        //     $enroll_no = 'PHDEN'.$year.$enroll_no;

        //     $en_num = str_replace('PHDEN','', 1);
        //     $increment = $en_num + 1;
        //     $enroll_no;
        // }
        // }else{
        //        $enroll_no;
        // }

        // return $enroll_no;

        // DB::table('users')->where('id',$id)->update([
        //     'draft_status' =>  3,
        // ]);
        //return  view('')
        //return redirect()->route('invoice',[$id]);
        return view('admin.phdstudents.student_invoice', compact('student', 'transaction'));
    }

    public function invoice($id)
    {
        $student = DB::table('phd_application_info as pa')->select('pa.name', 'pa.enrollment_no')
            ->join('transaction_history as t', 't.appl_id', '=', 'pa.id')
            ->where('pa.id', $id)->first();
        // $stu_id = $student->id;
        $transaction = DB::table('transaction_history')->where('appl_id', $id)->first();

        return view('admin.phdstudents.student_invoice', compact('transaction', 'student'));
    }

    /**
     * Method show_dsc_of_student
     * @param $id $id [explicite description]
     * @author AlokDas
     * @return void
     */
    public function show_dsc_of_student($id)
    {
        $data['student']        = PhdApplicationInfo::select('name', 'enrollment_no', 'application_status')->where('id', $id)->first();
        $data['domain_experts'] = DSCExperts::where('appl_id', $id)
            ->with(['getProfessorDetails.getDepartmentDetails',
                //  'getApplicationDetails'
            ])
            ->get()
            ->map(function ($r) {
                $designation_array = ['', 'Professor', 'Associate Professor', 'Chairperson', 'Co-Chairperson'];
                // $status            = ['Inactive', 'Active'];
                // $status_color      = ['warning', 'success'];
                // $type              = ['Internal', 'External'];
                // $expert_type       = ['Inexpert', 'Expert'];

                return [
                    // "application"    => $r->toArray(),
                    'professor_id'   => $r->getProfessorDetails->professor_id ?? '',
                    'professor_name' => $r->getProfessorDetails->name ?? '',
                    'dept_name'      => $r->getProfessorDetails->getDepartmentDetails->departments_title ?? '',
                    'designation'    => $designation_array[$r->getProfessorDetails->designation],
                    'proffesor_type' => $r->getProfessorDetails->proffesor_type,
                    'expert_status'  => $r->getProfessorDetails->expert_status,
                    'expert_status'  => $r->getProfessorDetails->expert_status,
                    'status'         => $r->status,
                ];
            });
        $data['page_title'] = 'Students Domain experts list';

        return view('admin.phdstudents.student_dsc_experts_view')->with($data);
    }

    public function semister_pay_invoice($id)
    {

        $student = DB::table('phd_application_info as pa')->select('pa.name', 'pa.enrollment_no')
            ->join('transaction_history as t', 't.appl_id', '=', 'pa.stud_id')
            ->where('pa.stud_id', $id)->orderBy('pa.id', 'DESC')->first();

        $appl_id = DB::table('phd_semister_registration')->select('*')
            ->where('stud_id', $id)->orderBy('semister_reg_id', 'DESC')->first();
        $transaction = DB::table('transaction_history')->where('appl_id', $appl_id->semister_reg_id)->Where('type', 'semester fee')->first();

        return view('admin.phdstudents.student_invoice', compact('transaction', 'student', 'appl_id'));
    }
    public function sem_nodal_fee($id)
    {

        return view('admin.phdstudents.upload_nodal_fee', compact('id'));
    }
    public function sem_nodal_fee_upload(Request $request)
    {
        //return $request;
        $this->validate($request, [
            'draft_no'     => 'required',
            'bank_name'    => 'required',
            'ncr_fee_file' => 'required',
            'pay_date'     => 'required',

        ]);
        $id = $request->id;
        if ($request->hasFile('ncr_fee_file')) {
            // return 1;
            $avatarPath = $request->file('ncr_fee_file');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path       = $request->file('ncr_fee_file')->move('upload/ncr_fees_invoice/', $avatarName);
            $img_path   = 'upload/ncr_fees_invoice/' . $avatarName;
        }

        $student_details = DB::table('phd_semister_registration')
            ->where('stud_id', $id)->orderBy('semister_reg_id', 'DESC')
            ->update([
                'draft_no'       => $request->draft_no,
                'bank_name'      => $request->bank_name,
                'date'           => $request->pay_date,
                'ncr_fee_file'   => $avatarName,
                'payment_status' => 1,
            ]);

        //return redirect()->route('semister.invoice',[$id]);
        return redirect()->route('semester.list', [$id]);
    }

    public function semProgressReport()
    {
        $student = Student::select('students.registration_no', 'students.registration_date', 'p.ncr_department', 'p.enrollment_no', 'p.name', 'p.student_category', 'p.enrollment_date', 'p.topic_of_phd_work', 'p.name_of_faculty', 'ps.supervisor_name', 'ps.co_supervisor_name', 'nodal.college_name', 'nodal.id as nod_id', 'ps.sup_id', 'ps.cosup_id', 'p.nodal_id')
            ->leftJoin('phd_application_info as p', 'students.id', '=', 'p.stud_id')
            ->leftJoin('nodal_centres as nodal', 'nodal.id', '=', 'p.nodal_id')
            ->leftJoin('phd_supervisors as ps', 'ps.appl_id', '=', 'p.id')->orderby('p.id', 'desc')
            ->where('students.id', Auth::guard('student')->user()->id)->first();
        $count        = $student->student_category == 'Full Time' ? 6 : 7;
        $ldate        = DB::table('semester_progress_reports')->select('created_at')->where('stud_id', Auth::guard('student')->user()->id)->orderBy('created_at', 'desc')->first();
        $ldate        = $ldate ? Carbon::parse($ldate->created_at) : null;
        $current_date = Carbon::now();
        $diffInDays   = $current_date->diffInDays($ldate);
        $stud_id      = DB::table('semester_progress_reports')->select('id', 'status', 'dsc_file', 'stud_id')->where('stud_id', Auth::guard('student')->user()->id)->first();
        // return $stud_id->id;
        $semester_plan_work = null;
        if ($stud_id) {
            $semester_plan_work = DB::table('semester_planned_works as w')->select('w.*', 'r.status', 'r.dsc_file')->leftJoin('semester_progress_reports as r', 'w.prog_repo_id', 'r.id')->where('r.stud_id', $stud_id->stud_id)->get();
        }
        $supervisor = Supervisor::all();

        return view('admin.phdstudents.sem-progress-report', compact('student', 'count', 'semester_plan_work', 'supervisor', 'stud_id', 'diffInDays'));
    }

    public function SemProgListing()
    {
        // return Auth::guard('student')->id();
        $semester_prog_report = DB::table('semester_progress_reports as spr')->select('spr.*', 'spw.*', 'spr.id as id')
            ->leftJoin('semester_planned_works  as spw', 'spw.prog_repo_id', '=', 'spr.id')
            ->where('spr.stud_id', Auth::guard('student')->id())
            ->get();
        return view('admin.phdstudents.semester-progress-listing', compact('semester_prog_report'));
    }
    public function SemProgView($id)
    {
        // return $id;
        $student_sem_detaills = DB::table('semester_progress_reports as spr')
            ->select('spr.*', 'spw.*', 'spr.id as id', 'nodal.college_name', 'spr.semester as sem')
            ->leftJoin('semester_planned_works as spw', 'spw.prog_repo_id', '=', 'spr.id')
            ->leftJoin('nodal_centres as nodal', 'nodal.id', '=', 'spr.nodal_center')
            ->where('spr.stud_id', Auth::guard('student')->id())
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

        return view('admin.phdstudents.semester-progress-view', compact('student_sem_detaills', 'sem_publication', 'supervisor', 'cosupervisor'));
    }

    public function SemProgSubmit(Request $request)
    {
        //return $request;
        //Auth::guard('student')->id();
        SemesterProgressReport::create($request->all() + ['stud_id' => Auth::guard('student')->id(),
            'status'                                                    => 1]);

        $report_id = DB::getPdo()->lastInsertId();

        $SemesterPlannedWork               = new SemesterPlannedWork();
        $SemesterPlannedWork->prog_repo_id = $report_id;
        $SemesterPlannedWork->semester     = $request->semester_prog;
        $SemesterPlannedWork->form_date    = $request->startDate;
        $SemesterPlannedWork->to_date      = $request->endDate;
        $SemesterPlannedWork->planned_work = $request->planned_work;
        $SemesterPlannedWork->actual_work  = $request->actual_work;
        $SemesterPlannedWork->save();

        // if ($request->startDate) {
        //     return 1;

        //     for ($i = 0; $i < count($request->startDate ?? []); $i++) {
        //         $SemesterPlannedWork = new SemesterPlannedWork();
        //         if ($request->startDate[$i] != '') {
        //             $SemesterPlannedWork->prog_repo_id = $report_id;
        //             $SemesterPlannedWork->semester     = $request->semester;
        //             $SemesterPlannedWork->form_date    = $request->startDate[$i];
        //             $SemesterPlannedWork->to_date      = $request->endDate[$i];
        //             $SemesterPlannedWork->planned_work = $request->planned_work[$i];
        //             $SemesterPlannedWork->actual_work  = $request->actual_work[$i];
        //             $SemesterPlannedWork->save();
        //         }
        //     }
        // }

        if ($request->pub_author) {
            //return 'publication';

            for ($i = 0; $i < count($request->pub_author); $i++) {
                $SemesterPublication               = new SemesterPublication();
                $SemesterPublication->prog_repo_id = $report_id;
                $SemesterPublication->author       = $request->pub_author[$i];
                $SemesterPublication->title_paper  = $request->pub_title_of_the_paper[$i];
                $SemesterPublication->journal      = $request->pub_journal[$i];
                $SemesterPublication->vol_no       = $request->pub_vol_no[$i];
                $SemesterPublication->page_no      = $request->pub_page_no[$i];
                $SemesterPublication->attach_file  = $request->pub_attached_copy[$i];
                $SemesterPublication->save();

            }
        }

        //SemesterProgressReport::where('id',$report_id)->first([])

        return redirect()->route('sem_progress_listing')->with('success', 'Application is successfully submitted');
        //return 1;
    }

    public function attached_copy(Request $request)
    {
        if ($request->hasFile('file')) {
            $avatarPath = $request->file('file');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path       = $request->file('file')->move('upload/semester/publication/', $avatarName);
            $img_path   = 'upload/semester/publication/' . $avatarName;
            return response()->json([
                'img_path' => $img_path,
                'img_name' => $avatarName,
            ]);
        };
    }

    public function thesisSubmission()
    {
        return view('admin.phdstudents.thesis-submission');
    }
    public function store(Request $request)
    {
        //return $request;

        $ses       = session()->all();
        $user_data = $request->session()->get('userdata');
        $user_id   = $user_data['userID'];

        if ($request->hasFile('cate_certi')) {
            $avatarPath = $request->file('cate_certi');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path       = $request->file('cate_certi')->move('upload/caste_certificate/', $avatarName);
            $img_path   = 'upload/caste_certificate/' . $avatarName;
            // return response()->json([
            //     'img_path' => $img_path,
            //     'img_name' => $avatarName,
            // ]);
        } else {
            $avatarName = "";
        }

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo');
            $photoname = time() . '.' . $photoPath->getClientOriginalExtension();
            $path2     = $request->file('photo')->move('upload/photo/', $photoname);
            $img_path2 = 'upload/photo/' . $photoname;
        } else {
            $photoname = "";
        }

        if ($request->hasFile('signature')) {
            $signaturePath = $request->file('signature');
            $signaturename = time() . '.' . $signaturePath->getClientOriginalExtension();
            $path3         = $request->file('signature')->move('upload/signature/', $signaturename);
            $img_path3     = 'upload/signature/' . $signaturename;
        } else {
            $signaturename = "";
        }

        //$reg_no_first = DB::table('students')->

        $name_prefix = $request->name_prefix;
        $reg_no      = str_pad(1, 6, '0', STR_PAD_LEFT);
        $reg_no      = 'RND' . $reg_no;
        $today       = Carbon::today();

        $date_arr = explode(" ", $today);
        $date     = $date_arr[0];

        $reg_no_first = DB::table('students')->latest('id')->first();

        if ($reg_no_first) {
            $last_reg_no = $reg_no_first->registration_no;
            if (!empty($reg_no_first->registration_no)) {
                $reg_no    = str_replace('RND', '', $last_reg_no);
                $increment = $reg_no + 1;
                $reg_no    = str_pad($increment, 6, '0', STR_PAD_LEFT);
                $reg_no    = 'RND' . $reg_no;
            } else {
                $reg_no;
            }
        } else {
            $reg_no;
        }
        // $last_reg_no = $reg_no_first->registration_no;
        // if (!empty($reg_no_first->registration_no)) {
        //     $reg_no = str_replace('RND', '', $last_reg_no);
        //     $increment = $reg_no + 1;
        //     $reg_no = str_pad($increment, 6, '0', STR_PAD_LEFT);
        //      $reg_no = 'RND' . $reg_no;
        // } else {
        //     $reg_no;
        // }

        $student_details = DB::table('students')->insert([
            'user_id'              => $user_id,
            'name'                 => $name_prefix . '. ' . $request->candidate_full_name,
            'registration_no'      => $reg_no,
            'registration_date'    => $date,
            'name_of_faculty'      => $request->name_of_faculty,
            'academic_programme'   => $request->academic_programme,
            'topic_of_phd_work'    => $request->topic_of_phd_work,
            'ncr_department'       => $request->ncr_department_name,
            'father_husband'       => $request->father_husband_name,
            'mother'               => $request->mothers_name,
            'permannt_address'     => $request->permanent_address,
            'present_address'      => $request->present_address,
            // 'enrollment_no'           => $request->enrollment_no,
            // 'enrollment_date'         => $request->enrollment_date,
            'email'                => $request->phdstudent_email,
            'phone'                => $request->phdstudent_mobile,
            'dob'                  => $request->date_of_birth,
            'nationality'          => $request->phd_nationality,
            'student_category'     => $request->student_category,
            'category'             => $request->general_category,
            'category_certificate' => $avatarName,
            'photo'                => $photoname,
            'signature'            => $signaturename,
        ]);

        $stu_id = DB::getPdo()->lastInsertId();

        if ($request->stu_quali) {
            //return 1;
            for ($i = 0; $i < count($request->stu_quali); $i++) {
                $StudentQualification                   = new StudentQualification();
                $StudentQualification->stu_id           = $stu_id;
                $StudentQualification->exam_passed      = $request->stu_quali[$i];
                $StudentQualification->Specialization   = $request->stu_spec[$i];
                $StudentQualification->board_university = $request->stu_univer[$i];
                $StudentQualification->year_of_passing  = $request->stu_pass_year[$i];
                $StudentQualification->division         = $request->stu_division[$i];
                $StudentQualification->percentage       = $request->stu_percentage[$i];
                $StudentQualification->certificate      = $request->formFile_hid[$i];
                $StudentQualification->save();
            }
        }

        if ($request->stu_orga) {

            for ($i = 0; $i < count($request->stu_orga); $i++) {
                $Organisation                    = new Organisation();
                $Organisation->stu_id            = $stu_id;
                $Organisation->organisation_name = $request->stu_orga[$i];
                $Organisation->designation       = $request->stu_desig[$i];
                $Organisation->duration          = $request->stu_duration[$i];
                $Organisation->natutre_of_job    = $request->stu_jobnature[$i];
                $Organisation->noc_certificate   = $request->noc_certi_hid[$i];
                $Organisation->save();
            }
        }

        $PhdSupervisor                  = new PhdSupervisor();
        $PhdSupervisor->stu_id          = $stu_id;
        $PhdSupervisor->supervisor_name = $request->phdstudent_propose_supervisor;
        //$PhdSupervisor->sup_id                = $request->sup_id;
        $PhdSupervisor->supervisor_email   = $request->phdstudent_supervisor_email;
        $PhdSupervisor->supervisor_address = $request->phdstudent_supervisor_add;
        $PhdSupervisor->supervisor_phone   = $request->phdstudent_supervisor_phone;
        $PhdSupervisor->co_supervisor_name = $request->phdstudent_propose_cosupervisor;
        //$PhdSupervisor->cosup_id              = $request->cosup_id;
        $PhdSupervisor->co_supervisor_email   = $request->phdstudent_cosupervisor_email;
        $PhdSupervisor->co_supervisor_address = $request->phdstudent_cosupervisor_add;
        $PhdSupervisor->co_supervisor_phone   = $request->phdstudent_cosupervisor_phone;
        $PhdSupervisor->save();

        // if ($request->hasFile('dd_file')) {
        //     $draftPath = $request->file('dd_file');
        //     $draftname = time() . '.' . $draftPath->getClientOriginalExtension();
        //     $path4 = $request->file('dd_file')->move('upload/dd_receipt/', $draftname);
        //     $img_path4 = 'upload/dd_receipt/' . $draftname;
        // }  else {
        //     $draftname = "";
        // }

        // $DraftDetails = new DraftDetails();
        // $DraftDetails->stu_id = $stu_id;
        // $DraftDetails->reg_no = $reg_no;
        // $DraftDetails->receipt_dd_no = $request->receipt_dd_no;
        // $DraftDetails->date = $request->dd_date;
        // $DraftDetails->bank_name = $request->bank_name;
        // $DraftDetails->dd_file = $draftname;
        // $DraftDetails->amount = $request->amount;
        // $DraftDetails->save();

        // return redirect()->back()->with('message','You have applied for PHD Program successfully');

        //$stu_details = DB::table('students')->where('id', $stu_id)->first();
        //$supervisor_details = Db::table('phd_supervisors')->where('stu_id', $stu_id)->first();

        // return view('frontend.phdStudents.phdstudentform', compact('stu_details', 'supervisor_details'));
        // return redirect()->route('Merchant view')->with( ['stu_id' => $PhdSupervisor] );

        //return redirect()->route('phdStudents.view',[$stu_id]);

        $user               = User::find($user_id);
        $user->draft_status = 1;
        $user->update();

        return redirect()->route('stu.draft', [$user_id])->with('success', 'you form has saved as draft please look throughly and then submit.');
    }

    public function stu_draft_data(Request $request, $id)
    {
        //return $id;
        $title          = "Phd students";
        $sub_page_title = "Draft Phd students form";
        $student        = Student::where('user_id', $id)->first();
        // $student = DB::table('students as s')->select('s.*')
        // ->leftJoin('')
        // ->where('user_id',$id)->first();
        $stu_name      = $student->name;
        $stu_name_exp  = explode(' ', $stu_name);
        $name_prefix   = $stu_name_exp[0];
        $stu_full_name = $stu_name_exp[1] . ' ' . $stu_name_exp[2];
        $last_stu_id   = $student->id;

        $department           = Department::all();
        $StudentQualification = StudentQualification::where('stu_id', $last_stu_id)->get();
        $Organisation         = Organisation::where('stu_id', $last_stu_id)->get();
        $PhdSupervisor        = PhdSupervisor::where('stu_id', $last_stu_id)->first();

        return view('admin.phdstudents.studentDraft', compact('id', 'last_stu_id', 'StudentQualification', 'Organisation', 'department', 'student', 'PhdSupervisor', 'title', 'sub_page_title', 'name_prefix', 'stu_full_name'));
    }

    public function stu_draft_store(Request $request, $id)
    {
        //return $id;
        //return $request;
        $ses         = session()->all();
        $user_data   = $request->session()->get('userdata');
        $user_id     = $user_data['userID'];
        $student     = Student::where('user_id', $id)->first();
        $last_stu_id = $student->id;

        if ($request->hasFile('cate_certi')) {
            $avatarPath = $request->file('cate_certi');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path       = $request->file('cate_certi')->move('upload/caste_certificate/', $avatarName);
            $img_path   = 'upload/caste_certificate/' . $avatarName;
            // return response()->json([
            //     'img_path' => $img_path,
            //     'img_name' => $avatarName,
            // ]);
        } else {
            $avatarName = $request->cate_hid_ceti;
        }

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo');
            $photoname = time() . '.' . $photoPath->getClientOriginalExtension();
            $path2     = $request->file('photo')->move('upload/photo/', $photoname);
            $img_path2 = 'upload/photo/' . $photoname;
        } else {
            $photoname = $request->hid_photo;
        }

        if ($request->hasFile('signature')) {
            $signaturePath = $request->file('signature');
            $signaturename = time() . '.' . $signaturePath->getClientOriginalExtension();
            $path3         = $request->file('signature')->move('upload/signature/', $signaturename);
            $img_path3     = 'upload/signature/' . $signaturename;
        } else {
            $signaturename = $request->signature_hid;
        }

        DB::table('students')
            ->where('user_id', $id)
            ->update([
                'user_id'              => $user_id,
                'name'                 => $request->name_prefix . '. ' . $request->candidate_full_name,
                'name_of_faculty'      => $request->name_of_faculty,
                'academic_programme'   => $request->academic_programme,
                'topic_of_phd_work'    => $request->topic_of_phd_work,
                'ncr_department'       => $request->ncr_department_name,
                'father_husband'       => $request->father_husband_name,
                'mother'               => $request->mothers_name,
                'permannt_address'     => $request->permanent_address,
                'present_address'      => $request->present_address,
                // 'enrollment_no'           => $request->enrollment_no,
                // 'enrollment_date'         => $request->enrollment_date,
                'email'                => $request->phdstudent_email,
                'phone'                => $request->phdstudent_mobile,
                'dob'                  => $request->date_of_birth,
                'nationality'          => $request->phd_nationality,
                'student_category'     => $request->student_category,
                'category'             => $request->general_category,
                'category_certificate' => $avatarName,
                'photo'                => $photoname,
                'signature'            => $signaturename,
            ]);

        if ($request->stu_quali) {
            //return 1;
            for ($i = 0; $i < count($request->stu_quali); $i++) {
                $StudentQualification                   = new StudentQualification();
                $StudentQualification->stu_id           = $last_stu_id;
                $StudentQualification->exam_passed      = $request->stu_quali[$i];
                $StudentQualification->Specialization   = $request->stu_spec[$i];
                $StudentQualification->board_university = $request->stu_univer[$i];
                $StudentQualification->year_of_passing  = $request->stu_pass_year[$i];
                $StudentQualification->division         = $request->stu_division[$i];
                $StudentQualification->percentage       = $request->stu_percentage[$i];
                $StudentQualification->certificate      = $request->formFile_hid[$i];
                $StudentQualification->save();
            }
        }

        if ($request->stu_orga) {

            for ($i = 0; $i < count($request->stu_orga); $i++) {
                $Organisation                    = new Organisation();
                $Organisation->stu_id            = $last_stu_id;
                $Organisation->organisation_name = $request->stu_orga[$i];
                $Organisation->designation       = $request->stu_desig[$i];
                $Organisation->duration          = $request->stu_duration[$i];
                $Organisation->natutre_of_job    = $request->stu_jobnature[$i];
                $Organisation->noc_certificate   = $request->noc_certi_hid[$i];
                $Organisation->save();
            }
        }

        //$PhdSupervisor = new PhdSupervisor();

        $PhdSupervisor                  = PhdSupervisor::where('stu_id', $last_stu_id)->first();
        $PhdSupervisor->stu_id          = $last_stu_id;
        $PhdSupervisor->supervisor_name = $request->phdstudent_propose_supervisor;
        //$PhdSupervisor->sup_id                = $request->sup_id;
        $PhdSupervisor->supervisor_email   = $request->phdstudent_supervisor_email;
        $PhdSupervisor->supervisor_address = $request->phdstudent_supervisor_add;
        $PhdSupervisor->supervisor_phone   = $request->phdstudent_supervisor_phone;
        $PhdSupervisor->co_supervisor_name = $request->phdstudent_propose_cosupervisor;
        //$PhdSupervisor->cosup_id              = $request->cosup_id;
        $PhdSupervisor->co_supervisor_email   = $request->phdstudent_cosupervisor_email;
        $PhdSupervisor->co_supervisor_address = $request->phdstudent_cosupervisor_add;
        $PhdSupervisor->co_supervisor_phone   = $request->phdstudent_cosupervisor_phone;
        $PhdSupervisor->save();

        return redirect()->route('stu.draft', [$user_id])->with('success', 'you form has saved as draft please look throughly and then submit.');
    }

    public function delete_stu_certificate(Request $request)
    {
        //return $request;
        $StudentQualification = StudentQualification::find($request->id);
        $studentCerti         = $StudentQualification->certificate;
        unlink("upload/phdstudent/" . $studentCerti);
        // unlink("uploads/".$image->image_name);
        // unlink(substr($prsImage, 1));

        $dlt_qual = StudentQualification::find($request->id);
        $dlt_qual->delete();
        $QualDetail = StudentQualification::where('appl_id', $request->appl_id)->get();
        return response()->json($QualDetail);
    }

    public function delete_stu_orga_certi(Request $request)
    {
        //return $request;
        $Organisation = Organisation::find($request->id);
        $OrgaCerti    = $Organisation->noc_certificate;
        unlink("upload/phdstudent/" . $OrgaCerti);
        // unlink("uploads/".$image->image_name);
        // unlink(substr($prsImage, 1));

        $dlt_qual = Organisation::find($request->id);
        $dlt_qual->delete();
        $QualDetail = Organisation::where('appl_id', $request->appl_id)->get();
        return response()->json($QualDetail);
    }
    public function delete_stu_other_certi(Request $request)
    {
        //return $request;

        $OtherDocument = DB::table('phd_other_documents')->where('id', $request->id)->first();
        $doc_path      = $OtherDocument->doc_path;
        unlink("upload/phdstudent/other_doc/" . $doc_path);

        DB::table('phd_other_documents')->where('id', $request->id)->delete();
        $QualDetail = DB::table('phd_other_documents')->where('appl_id', $request->appl_id)->get();
        return response()->json($QualDetail);
    }

    public function phdstudentform($id)
    {

        //return $stu_id = DB::getPdo()->lastInsertId();
        $supervisor_details2    = DB::table('phd_supervisors')->where('stu_id', $id)->get();
        $stu_details            = DB::table('students')->where('id', $id)->first();
        $supervisor_details     = DB::table('phd_supervisors')->where('stu_id', $id)->first();
        $organisations          = DB::table('organisations')->where('stu_id', $id)->get();
        $supervisor_master      = SupervisorMaster::all();
        $student_qualifications = DB::table('student_qualifications')->where('stu_id', $id)->get();
        return view('frontend.phdStudents.phdstudentform', compact('stu_details', 'supervisor_details', 'organisations', 'student_qualifications', 'supervisor_master', 'supervisor_details2'));
    }
    // For Admin

    public function admin_index()
    {
        //return 1;
        //dd(session()->all());return session();
        //return session(['userdata' => 'pos_id']);
        $user_id = Session::get('userdata')['pos_id'];
        $role    = Session::get('userdata')['role'];
        // $student =  PhdSupervisor::select('phd_supervisors.supervisor_name','s.*','draf.*','stq.*','stq.stu_id as stu2','org.*')
        // ->leftjoin('students as s','s.id','=', 'phd_supervisors.stu_id')
        // ->leftjoin('draft_details as draf','draf.stu_id','=', 'phd_supervisors.stu_id')
        // ->leftjoin('student_qualifications as stq','stq.stu_id','=', 'phd_supervisors.stu_id')
        // ->leftjoin('organisations as org','org.stu_id','=', 'phd_supervisors.stu_id')
        // ->where('sup_id',$user_id)->get();

        $student = PhdSupervisor::select('phd_supervisors.*', 's.*', 'draf.*')
            ->leftjoin('students as s', 'phd_supervisors.stu_id', '=', 's.id')
            ->leftjoin('draft_details as draf', 'phd_supervisors.stu_id', '=', 'draf.stu_id')
        //->leftjoin('student_qualifications as stq', 'phd_supervisors.stu_id' ,'=', 'stq.stu_id')
        //->leftjoin('organisations as org','phd_supervisors.stu_id' ,'=','org.stu_id' )
            ->where('sup_id', $user_id)->get();
        $studentdetails = [];
        foreach ($student as $value) {
            $sid              = $value->stu_id;
            $qualification    = DB::table('student_qualifications')->where('stu_id', $sid)->get();
            $organisation     = DB::table('organisations')->where('stu_id', $sid)->get();
            $studentdetails[] = array(
                'maindata' => $value,
                'ql'       => $qualification,
                'org'      => $organisation,
            );
        }

        //return  $studentdetails;

        $title          = "phdStudents";
        $sub_page_title = "View phdStudents";

        // $student = Student::select('*')->where('id',$get_sup_id->stu_id)->get();
        $student_count = $student->count();

        return view('admin.phdstudents.index', compact('title', 'sub_page_title', 'student', 'student_count', 'studentdetails'));
    }

    public function view_student($id)
    {

        $user_id                = Session::get('userdata')['pos_id'];
        $role                   = Session::get('userdata')['role'];
        $title                  = "phdStudents";
        $sub_page_title         = "View phdStudent";
        $student_id             = $id;
        $supervisor             = PhdSupervisor::where('stu_id', $student_id)->where('sup_id', $user_id)->first();
        $student_qualifications = StudentQualification::where('stu_id', $student_id)->get();
        $organisation           = Organisation::where('stu_id', $student_id)->get();
        $student                = Student::where('id', $student_id)->first();

        //$student

        return view('admin.phdstudents.studentview', compact('student', 'student_id', 'title', 'sub_page_title', 'student_qualifications', 'organisation', 'supervisor'));
    }
    public function stu_preview($id)
    {

        $title          = "phdStudents";
        $sub_page_title = "View phdStudent";

        $student     = Student::where('user_id', $id)->first();
        $last_stu_id = $student->id;

        $supervisor             = PhdSupervisor::where('stu_id', $last_stu_id)->first();
        $student_qualifications = StudentQualification::where('stu_id', $last_stu_id)->get();
        $organisation           = Organisation::where('stu_id', $last_stu_id)->get();

        //$student

        return view('admin.phdstudents.studentview', compact('student', 'id', 'title', 'sub_page_title', 'student_qualifications', 'organisation', 'supervisor'));
    }

    public function stu_preview_submit(Request $request)
    {
        $user_id = $request->user_id;
        DB::table('users')
            ->where('id', $user_id)
            ->update([
                'draft_status' => 2,
            ]);

        $supervisor = DB::table('students')->where('user_id', $user_id)
            ->update([
                'control_cell_status' => 1,
                'review_status'       => 1,
            ]);

        $draft_status = User::where('id', $user_id)->first();
        $draft_status = $draft_status->draft_status;

        $student = DB::table('students')->where('user_id', $user_id)->first();

        // if($user->draft_status == 1){
        //     $msg = "please complete the form";
        // }else{

        // }

        $title          = "Phd Student";
        $sub_page_title = "PHD Student apply status";

        // supervisorApplyStatus.blade
        return view('admin.phdstudents.sutdentApplyStatus', compact('title', 'sub_page_title', 'draft_status', 'student'));
    }

    public function view_concent($id)
    {
        //return 1;

        $title                  = "phdStudents";
        $sub_page_title         = "View phdStudent";
        $student_id             = $id;
        $supervisor             = PhdSupervisor::where('stu_id', $student_id)->first();
        $student_qualifications = StudentQualification::where('stu_id', $student_id)->get();
        $organisation           = Organisation::where('stu_id', $student_id)->get();
        $student                = Student::where('id', $student_id)->first();
        return view('admin.phdstudents.consent', compact('student', 'student_id', 'title', 'sub_page_title', 'student_qualifications', 'organisation', 'supervisor'));
    }

    public function add_remarks(Request $request, $id)
    {
        // return $request;
        // return $id;
        //dd(session());
        $user_id = Session::get('userdata')['pos_id'];
        $role    = Session::get('userdata')['role'];

        $student                     = Student::find($id);
        $student->supervisor_remarks = $request->super_remark;
        $student->supervisor_status  = $request->recommended;
        $student->update();

        //$PhdSupervisor = PhdSupervisor::find($id);
        $PhdSupervisor = DB::table('phd_supervisors')
            ->where('stu_id', $id)
            ->where('sup_id', $user_id)
            ->update([
                'sup_status'  => $request->recommended,
                'sup_remarks' => $request->super_remark,
            ]);

        //return redirect()->route('view_student',[$id]);
        if ($request->recommended == 11) {
            $reco = "not recommended";
        } else {
            $reco = "recommended";
        }
        $StudentLog             = new StudentLog();
        $StudentLog->stu_id     = $id;
        $StudentLog->stu_reg_no = $student->registration_no;
        $StudentLog->user_id    = $user_id;
        $StudentLog->role       = $role;
        $StudentLog->status     = $reco;
        $StudentLog->remarks    = $request->super_remark;
        $StudentLog->save();
        return redirect()->route('phdStudents.admin.index');
    }

    // for chairperson

    public function chairperson_index()
    {
        $title          = "phdStudents";
        $sub_page_title = "View phdStudent";
        $student        = Student::where('supervisor_status', 1)->get();
        $student_count  = Student::where('supervisor_status', 1)->get()->count();
        return view('admin.chairperson.index', compact('title', 'sub_page_title', 'student', 'student_count'));
    }

    public function headncr_index()
    {
        $title          = "phdStudents";
        $sub_page_title = "View phdStudent";

        $student = PhdSupervisor::select('phd_supervisors.*', 's.*', 'draf.*')
            ->leftjoin('students as s', 'phd_supervisors.stu_id', '=', 's.id')
            ->leftjoin('draft_details as draf', 'phd_supervisors.stu_id', '=', 'draf.stu_id')
        //->leftjoin('student_qualifications as stq', 'phd_supervisors.stu_id' ,'=', 'stq.stu_id')
        //->leftjoin('organisations as org','phd_supervisors.stu_id' ,'=','org.stu_id' )
            ->where('sup_status', 1)->get();
        $studentdetails = [];
        foreach ($student as $value) {
            $sid              = $value->stu_id;
            $qualification    = DB::table('student_qualifications')->where('stu_id', $sid)->get();
            $organisation     = DB::table('organisations')->where('stu_id', $sid)->get();
            $studentdetails[] = array(
                'maindata' => $value,
                'ql'       => $qualification,
                'org'      => $organisation,
            );
        }

        //return $studentdetails;

        //$student = Student::where('supervisor_status', 1)->get();
        $student_count = Student::all()->count();
        return view('admin.headncr.index', compact('title', 'sub_page_title', 'studentdetails', 'student_count'));
    }
    public function picrnd_index()
    {
        $title          = "phdStudents";
        $sub_page_title = "View phdStudent";
        $student        = Student::where('head_ncr_status', 1)->get();
        $student_count  = Student::where('head_ncr_status', 1)->get()->count();
        return view('admin.picrnd.index', compact('title', 'sub_page_title', 'student', 'student_count'));
    }

    public function picrnd_view_student($id)
    {
        $title                  = "phdStudents";
        $sub_page_title         = "View phdStudent";
        $student_id             = $id;
        $supervisor             = PhdSupervisor::where('stu_id', $student_id)->first();
        $student_qualifications = StudentQualification::where('stu_id', $student_id)->get();
        $organisation           = Organisation::where('stu_id', $student_id)->get();
        $student                = Student::where('id', $student_id)->first();
        //return $student;
        return view('admin.picrnd.studentview', compact('student', 'student_id', 'title', 'sub_page_title', 'student_qualifications', 'organisation', 'supervisor'));
    }

    public function picrnd_add_remarks(Request $request, $id)
    {
        //return "ghghgf";

        $student                 = Student::find($id);
        $student->picrnd_remarks = $request->picrnd_remarks;
        $student->picrnd_status  = $request->recommended;
        $student->update();
        //return redirect('admin/headncr/student-verification/' . $id);
        return redirect()->back()->with('status', 'remarks Updated Successfully');
    }

    public function juniorexe_index()
    {
        $title          = "phdStudents";
        $sub_page_title = "View phdStudent";
        $student        = Student::where('vicechancellor_status', 1)->get();
        $student_count  = Student::where('vicechancellor_status', 1)->get()->count();
        return view('admin.juniorexe.index', compact('title', 'sub_page_title', 'student', 'student_count'));
    }

    public function juniorexe_view_student($id)
    {
        $title                  = "phdStudents";
        $sub_page_title         = "View phdStudent";
        $student_id             = $id;
        $supervisor             = PhdSupervisor::where('stu_id', $student_id)->first();
        $draft_details          = DraftDetails::where('stu_id', $student_id)->first();
        $student_qualifications = StudentQualification::where('stu_id', $student_id)->get();
        $organisation           = Organisation::where('stu_id', $student_id)->get();
        $student                = Student::where('id', $student_id)->first();
        //return $student;
        return view('admin.juniorexe.studentview', compact('student', 'student_id', 'title', 'sub_page_title', 'student_qualifications', 'organisation', 'supervisor', 'draft_details'));
    }

    public function juniorexe_add_remarks(Request $request, $id)
    {
        //return "ghghgf";

        $student                    = Student::find($id);
        $student->juniorexe_remarks = $request->juniorexe_remarks;
        $student->juniorexe_status  = $request->recommended;
        $student->update();
        //return redirect('admin/headncr/student-verification/' . $id);
        return redirect()->back()->with('status', 'remarks Updated Successfully');
    }

    public function chiarperson_view_student($id)
    {
        $title                  = "phdStudents";
        $sub_page_title         = "View phdStudent";
        $student_id             = $id;
        $supervisor             = PhdSupervisor::where('stu_id', $student_id)->first();
        $student_qualifications = StudentQualification::where('stu_id', $student_id)->get();
        $organisation           = Organisation::where('stu_id', $student_id)->get();
        $student                = Student::where('id', $student_id)->first();
        return view('admin.chairperson.studentview', compact('student', 'student_id', 'title', 'sub_page_title', 'student_qualifications', 'organisation', 'supervisor'));
    }

    public function headncr_view_student($id)
    {
        $title                  = "phdStudents";
        $sub_page_title         = "View phdStudent";
        $student_id             = $id;
        $supervisor             = PhdSupervisor::where('stu_id', $student_id)->first();
        $student_qualifications = StudentQualification::where('stu_id', $student_id)->get();
        $organisation           = Organisation::where('stu_id', $student_id)->get();
        $student                = Student::where('id', $student_id)->first();
        //return $student;
        return view('admin.headncr.studentview', compact('student', 'student_id', 'title', 'sub_page_title', 'student_qualifications', 'organisation', 'supervisor'));
    }

    public function headncr_view_concent($id)
    {
        $title                  = "phdStudents";
        $sub_page_title         = "View phdStudent";
        $student_id             = $id;
        $supervisor             = PhdSupervisor::where('stu_id', $student_id)->first();
        $student_qualifications = StudentQualification::where('stu_id', $student_id)->get();
        $organisation           = Organisation::where('stu_id', $student_id)->get();
        $student                = Student::where('id', $student_id)->first();
        //return $student;
        return view('admin.headncr.concent', compact('student', 'student_id', 'title', 'sub_page_title', 'student_qualifications', 'organisation', 'supervisor'));
    }

    public function chiarperson_add_remarks(Request $request, $id)
    {
        //return "ghghgf";

        $student                      = Student::find($id);
        $student->chairperson_remarks = $request->chair_remark;
        $student->chairperson_status  = 1;
        $student->update();
        return redirect('admin/chairperson/student-verification/' . $id);
        //return redirect()->back()->with('status','remarks Updated Successfully');
    }

    public function headncr_add_remarks(Request $request, $id)
    {
        //return "ghghgf";

        $student                   = Student::find($id);
        $student->head_ncr_remarks = $request->head_ncr_remarks;
        $student->head_ncr_status  = $request->recommended;
        $student->update();
        //return redirect('admin/headncr/student-verification/' . $id);
        return redirect()->back()->with('status', 'remarks Updated Successfully');
    }

    public function chiarperson_stu_verify($id)
    {
        $student        = Student::find($id);
        $title          = "phdStudents";
        $sub_page_title = "View phdStudent";
        return view('admin.chairperson.studentverification', compact('title', 'sub_page_title', 'student'));
    }

    public function Vice_Chancellor_index()
    {
        $title          = "phdStudents";
        $sub_page_title = "View phdStudent";
        $student        = Student::where('picrnd_status', 1)->get();
        $student_count  = Student::where('picrnd_status', 1)->get()->count();
        return view('admin.vicechancellor.index', compact('title', 'sub_page_title', 'student', 'student_count'));
    }
    public function Vice_Chancellor_view_student($id)
    {
        $title                  = "phdStudents";
        $sub_page_title         = "View phdStudent";
        $student_id             = $id;
        $supervisor             = PhdSupervisor::where('stu_id', $student_id)->first();
        $student_qualifications = StudentQualification::where('stu_id', $student_id)->get();
        $organisation           = Organisation::where('stu_id', $student_id)->get();
        $student                = Student::where('id', $student_id)->first();
        return view('admin.vicechancellor.studentview', compact('student', 'student_id', 'title', 'sub_page_title', 'student_qualifications', 'organisation', 'supervisor'));
    }

    public function Vice_Chancellor_add_remarks(Request $request, $id)
    {
        //return "ghghgf";

        $student                        = Student::find($id);
        $student->vicechancellor_remark = $request->vice_remark;
        $student->vicechancellor_status = $request->vice_status;
        $student->update();
        return redirect()->route('ViceChancellor.index');
        //return redirect()->back()->with('status','remarks Updated Successfully');
    }

    public function PhdCell_index()
    {
        $title          = "phdStudents";
        $sub_page_title = "View phdStudent";
        //$student = Student::where('vicechancellor_status', 1)->get();
        $student = Student::select('*')
            ->whereIn('vicechancellor_remark', [0, 1])
            ->get();
        $student_count = Student::select('*')
            ->whereIn('vicechancellor_remark', [0, 1])
            ->get()->count();
        return view('admin.phdcell.index', compact('title', 'sub_page_title', 'student', 'student_count'));
    }
    public function PhdCell_view_student($id)
    {
        $title                  = "phdStudents";
        $sub_page_title         = "View phdStudent";
        $student_id             = $id;
        $supervisor             = PhdSupervisor::where('stu_id', $student_id)->first();
        $student_qualifications = StudentQualification::where('stu_id', $student_id)->get();
        $organisation           = Organisation::where('stu_id', $student_id)->get();
        $student                = Student::where('id', $student_id)->first();
        return view('admin.phdcell.studentview', compact('student', 'student_id', 'title', 'sub_page_title', 'student_qualifications', 'organisation', 'supervisor'));
    }

    public function upload_certi(Request $request)
    {
        if ($request->hasFile('file')) {
            $avatarPath = $request->file('file');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path       = $request->file('file')->move('upload/phdstudent/', $avatarName);
            $img_path   = 'upload/phdstudent/' . $avatarName;
            return response()->json([
                'img_path' => $img_path,
                'img_name' => $avatarName,
            ]);
        };
    }
    public function upload_marksheet(Request $request)
    {
        //return $request;
        if ($request->hasFile('file')) {
            $avatarPath = $request->file('file');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path       = $request->file('file')->move('upload/phdstudent/', $avatarName);
            $img_path   = 'upload/phdstudent/' . $avatarName;
            return response()->json([
                'img_path' => $img_path,
                'img_name' => $avatarName,
            ]);
        };
    }

    public function upload_noc(Request $request)
    {
        if ($request->hasFile('file')) {
            $avatarPath = $request->file('file');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path       = $request->file('file')->move('upload/phdstudent/', $avatarName);
            $img_path   = 'upload/phdstudent/' . $avatarName;
            return response()->json([
                'img_path' => $img_path,
                'img_name' => $avatarName,
            ]);
        };
    }
    public function upload_other(Request $request)
    {
        if ($request->hasFile('file')) {
            $avatarPath = $request->file('file');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path       = $request->file('file')->move('upload/phdstudent/other_doc/', $avatarName);
            $img_path   = 'upload/phdstudent/other_doc/' . $avatarName;
            return response()->json([
                'img_path' => $img_path,
                'img_name' => $avatarName,
            ]);
        };
    }
    public function applicationStatus()
    {
        return view('frontend.applicationStatus');
    }
    public function findForm(Request $request)
    {

        //return $request;
        //return $last3 = DB::table('phd_supervisors')->latest('id')->first();
        $stu_details = Student::where('registration_no', $request->reg_no)->where('dob', $request->dob)->first();
        //return $stu_details->id;
        $supervisor_details2 = DB::table('phd_supervisors')->where('stu_id', $stu_details->id)->get();
        $supervisor_master   = SupervisorMaster::all();
        //$PhdSupervisor = PhdSupervisor::where('stu_id',$stu_details->id)->first();
        // $PhdSupervisor->sup_status;
        if ($stu_details) {
            $supervisor_details = Db::table('phd_supervisors')->where('stu_id', $stu_details->id)->latest('id')->first();
            //$supervisor_details = DB::table('phd_supervisors')->latest('id')->first();
            return view('frontend.phdStudents.phdstudentform', compact('stu_details', 'supervisor_master', 'supervisor_details', 'supervisor_details2'));
            // return view('frontend.phdStudents.home', compact('stu_details', 'supervisor_details'));
        } else {
            return back()->with('error', 'Please enter a correct data');
        }
    }

    public function Supervisor_add(Request $request)
    {
        //return $request;

        //PhdSupervisor = new PhdSupervisor();
        //return $request->$id;
        // $PhdSupervisor = PhdSupervisor::find($request->stu_reg);
        $PhdSupervisor                  = new PhdSupervisor();
        $PhdSupervisor->stu_id          = $request->stu_reg;
        $PhdSupervisor->sup_id          = $request->sup_id;
        $PhdSupervisor->supervisor_name = $request->super_add;
        $PhdSupervisor->save();

        return back()->with('message', 'your application sent to new supervisor');
    }

    public function find_Supervisor(Request $request)
    {

        $supervisor   = SupervisorMaster::select('name', 'id')->where('department_id', $request->id)->get();
        $cosupervisor = CoSupervisorMaster::select('name', 'id')->where('department_id', $request->id)->get();
        //return response()->json($supervisor);
        return response()->json([
            'supervisor'   => $supervisor,
            'cosupervisor' => $cosupervisor,
        ]);
    }

    /**
     * Method stu_apply Student PHD application form
     * @param Request $request [explicite description]
     * @return void
     */
    public function stu_apply(Request $request)
    {
        $page_title = 'Apply PHD Form';
        $user_id    = session('userdata')['userID'];
        //$user_id = $user_data['userID'];
        $department = Department::all();
        $student    = DB::table('students')->select('students.*', DB::raw("CONCAT(first_name,' ',last_name) AS name"))->where('id', $user_id)->first();

        $appl_details = DB::table('phd_application_info as pa')
            ->where('pa.stud_id', $student->id)->orderBy('id', 'DESC')->first();

        $nodal_centre = NodalCentre::allNodalCentre();
        if ($appl_details != "") {
            $draft_status = $appl_details->draft_status;
        } else {
            $draft_status = 0;
        }
        if ($draft_status == 0) {
            return view('admin.phdstudents.studentApply', compact('user_id', 'department', 'student', 'nodal_centre', 'page_title'));
        } else if ($draft_status == 1) {
            return view('admin.phdstudents.sutdentApplyStatus', compact('draft_status', 'user_id', 'student', 'appl_details', 'page_title'));
        } else {
            return view('admin.phdstudents.sutdentApplyStatus', compact('draft_status', 'user_id', 'student', 'appl_details', 'page_title'));
        }
    }

    public function semisterRegistrationForm()
    {
        $user_id = session('userdata')['userID'];
        $info    = Student::select('students.registration_no', 'students.registration_date', 'p.ncr_department', 'p.enrollment_no', 'p.name', 'p.enrollment_date', 'p.topic_of_phd_work', 'ps.supervisor_name', 'nodal.college_name', 'nodal.id as nod_id', 'd.departments_title', 'p.id as appl_id')
            ->leftJoin('phd_application_info as p', 'students.id', '=', 'p.stud_id')
            ->leftJoin('nodal_centres as nodal', 'nodal.id', '=', 'p.nodal_id')
            ->rightJoin('departments as d', 'd.id', '=', 'p.academic_programme')
            ->leftJoin('phd_supervisors as ps', 'ps.appl_id', '=', 'p.id')->orderby('p.id', 'desc')
            ->where('students.id', Auth::guard('student')->user()->id)->first();
        $coursework_sub = DB::table('tbl_course_work_subjects as c')->where('appl_id', $info->appl_id)->get();
        return view('admin.phdstudents.semister-registration-form', compact('info', 'coursework_sub'));
    }
    public function semisterRegistrationFormSubmit(Request $request)
    {
        //return $request;
        $user_id = session('userdata')['userID'];
        $appl_id = DB::table('phd_application_info')->where('stud_id', $user_id)->first('id');
        // return $appl_id->id;

        $sem                = new SemesterPayment();
        $sem->appl_id       = $appl_id->id;
        $sem->semester      = $request->semester;
        $sem->month_elapsed = $request->month_elapsed;
        $sem->reg_status    = $request->reg_status;
        $sem->draft_status  = 1;
        $sem->created_at    = Carbon::now();
        $sem->save();
        // dd([$request->sub_status,  DB::table('tbl_course_work_subjects')->where('appl_id', $appl_id->id)->get()]);
        if ($request->sub_status != "") {
            foreach (CourseWorkSubjects::where('appl_id', $appl_id->id)->get() as $key => $value) {
                CourseWorkSubjects::where('id', $value->id)->update(['status' => $request->sub_status[$key]]);
            }
        }
        $last_id = $sem->id;
        return redirect()->action([PHDStudentController::class, 'semisterRegistrationPayment'], ['id' => $last_id])->with('success', 'Application submitted successfully.');
    }
    //semester registration payment form
    public function semisterRegistrationPayment($id)
    {
        $sem_payment = DB::table('semester_payments as p')->select('p.*', 'i.name', 'i.enrollment_no')->leftJoin('phd_application_info as i', 'i.id', '=', 'p.appl_id')->where('p.id', $id)->first();
        return view('admin.phdstudents.semester_payment_page', compact('sem_payment'));
    }
    public function semisterRegistrationPaymentSubmit(Request $request)
    {
        //return $request;
        $current_id    = $request->app_id;
        $payemt_info   = DB::table('semester_payments')->where('id', $current_id)->first();
        $chars         = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $length        = 22;
        $rand_chars    = substr(str_shuffle($chars), 0, $length);
        $rand_chars    = 'PAY' . $rand_chars;
        $paymentstatus = "success";
        if ($file = $request->file('ncr_preceipt')) {
            $data           = $request->file('ncr_preceipt');
            $extension      = $data->getClientOriginalExtension();
            $filename       = time() . uniqid(rand()) . 'file' . '.' . $extension;
            $path           = public_path('upload/Semester_registration_receipt/');
            $upload_success = $data->move($path, $filename);
            $upload_file    = '/upload/Semester_registration_receipt/' . $filename;
        }
        $upload_file    = $upload_file;
        $payemt_details = DB::table('semester_payments')
            ->where('id', $current_id)->update([
            'ncr_pmode'    => $request->payment_mode,
            'ncr_pbank'    => $request->ncr_pbank,
            'ncr_pdate'    => $request->ncr_pdate,
            'ncr_pamount'  => $request->ncr_pamount,
            'ncr_preceipt' => $upload_file,
        ]);

        if (in_array($payemt_info->ncr_pmode, ['draft', 'cheque'])) {
            DB::table('transaction_history')->insert([
                'appl_id'              => $request->appl_id,
                'type'                 => 'ncr semester fee',
                'transaction_id'       => $rand_chars,
                'transaction_date'     => $request->ncr_pdate,
                'transaction_response' => $paymentstatus,
                'amount'               => $request->ncr_pamount,
            ]);
        }
        return redirect()->back()->with('success', 'Payment submitted successfully.');
        //   return redirect()->action([PHDStudentController::class, 'semisterRegistrationPreview'], ['id' => $current_id])->with('success', 'Payment submitted successfully.');
    }
    public function semisterBputPaymentSubmit(Request $request)
    {
        $current_id    = $request->app_id;
        $payemt_info   = DB::table('semester_payments')->where('id', $current_id)->first();
        $chars         = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $length        = 22;
        $rand_chars    = substr(str_shuffle($chars), 0, $length);
        $rand_chars    = 'PAY' . $rand_chars;
        $paymentstatus = "success";
        DB::table('transaction_history')->insert([
            'appl_id'              => $request->appl_id,
            'type'                 => 'bput semester fee',
            'transaction_id'       => $rand_chars,
            'transaction_date'     => $request->bput_pdate,
            'transaction_response' => $paymentstatus,
            'amount'               => $request->bput_pamount,
        ]);
        $payemt_details = DB::table('semester_payments')
            ->where('id', $current_id)->update([
            'bput_pamount' => $request->bput_pamount,
            'bput_pdate'   => $request->bput_pdate,
            'draft_status' => 2,
        ]);
        return redirect()->action([PHDStudentController::class, 'semisterRegistrationPreview'], ['id' => $current_id])->with('success', 'Payment submitted successfully.');
    }
    public function semesterPayment($id)
    {
        $student = DB::table('semester_payments as s')->select('s.appl_id', 'p.name', 'p.enrollment_no')
            ->leftJoin('phd_application_info as p', 's.appl_id', '=', 'p.id')
            ->where('s.id', $id)->first();

        $transaction = DB::table('transaction_history')->orderBy('id', 'DESC')->where('appl_id', $student->appl_id)->whereIn('type', ['bput semester fee', 'ncr semester fee'])->get();
        return view('admin.phdstudents.semester-payment-invoice', compact('student', 'transaction', 'id'));
    }
    public function semisterRegistrationPreview($id)
    {
        $info = Student::select('students.registration_no', 'students.registration_date', 'p.ncr_department', 'p.enrollment_no', 'p.name', 'p.enrollment_date', 'p.topic_of_phd_work', 'ps.supervisor_name', 'nodal.college_name', 'nodal.id as nod_id', 'd.departments_title', 'p.id as appl_id')
            ->leftJoin('phd_application_info as p', 'students.id', '=', 'p.stud_id')
            ->leftJoin('nodal_centres as nodal', 'nodal.id', '=', 'p.nodal_id')
            ->rightJoin('departments as d', 'd.id', '=', 'p.academic_programme')
            ->leftJoin('phd_supervisors as ps', 'ps.appl_id', '=', 'p.id')->orderby('p.id', 'desc')
            ->where('students.id', Auth::guard('student')->user()->id)->first();
        $coursework_sub  = DB::table('tbl_course_work_subjects as c')->where('appl_id', $info->appl_id)->get();
        $payment_details = DB::table('semester_payments')->where('id', $id)->first();
        $payemt_status   = DB::table('semester_regisration_statuses')->where('sem_payment_id', $id)->first();
        return view('admin.phdstudents.semester_registration_preview', compact('coursework_sub', 'info', 'payment_details', 'payemt_status'));
    }
    public function semisterRegisterSubmit(Request $request)
    {
        //return $request;
        $payemt_details = DB::table('semester_regisration_statuses')
            ->insert([
                'sem_payment_id' => $request->app_id,
                'appl_id'        => $request->appl_id,
                'semester'       => $request->semester,
                'status'         => 1,
            ]);
        $payemt_details = DB::table('semester_payments')
            ->where('id', $request->app_id)->update([
            'draft_status' => 3,
        ]);
        return redirect()->route("semester.list")->with('success', 'Payment submitted successfully.');
    }
    public function semester_list()
    {
        $user_id = Auth::guard('student')->id();
        $info    = DB::table('semester_payments as p')->select('i.enrollment_no', 'i.name', 's.semester', 's.status', 'p.id as app_id')
            ->leftJoin('semester_regisration_statuses as s', 's.sem_payment_id', '=', 'p.id')
            ->leftJoin('phd_application_info as i', 'i.id', '=', 's.appl_id')
            ->where('i.stud_id', $user_id)->get();
        return view('admin.phdstudents.semester-listing', compact('info'));
    }
    public function semisterRegistrationView($id)
    {
        $info = Student::select('students.registration_no', 'students.registration_date', 'p.ncr_department', 'p.enrollment_no', 'p.name', 'p.enrollment_date', 'p.topic_of_phd_work', 'ps.supervisor_name', 'nodal.college_name', 'nodal.id as nod_id', 'd.departments_title', 'p.id as appl_id')
            ->leftJoin('phd_application_info as p', 'students.id', '=', 'p.stud_id')
            ->leftJoin('nodal_centres as nodal', 'nodal.id', '=', 'p.nodal_id')
            ->rightJoin('departments as d', 'd.id', '=', 'p.academic_programme')
            ->leftJoin('phd_supervisors as ps', 'ps.appl_id', '=', 'p.id')->orderby('p.id', 'desc')
            ->where('students.id', Auth::guard('student')->user()->id)->first();
        $coursework_sub  = DB::table('tbl_course_work_subjects as c')->where('appl_id', $info->appl_id)->get();
        $payment_details = DB::table('semester_payments')->where('id', $id)->first();
        $payemt_status   = DB::table('semester_regisration_statuses')->where('sem_payment_id', $id)->first();
        return view('admin.phdstudents.semester_registration_preview', compact('coursework_sub', 'info', 'payment_details', 'payemt_status'));
    }
    // public function semister_reg_fee($id)
    // {
    //     //return $id;
    //     return view('admin.phdstudents.semister_paymetn_page', compact('id'));
    // }
    // public function semister_reg_pay(){
    //     //return $id;
    //     return view('admin.phdstudents.semister_paymetn_page',compact('id'));
    // }
    public function fetchCourseWork(Request $request)
    {
        $dept_id            = $request->id;
        $coursework         = new Coursework();
        $department_details = $coursework->select('course_name', 'course_id')->where('dept_id', $dept_id)->get();
        return ($department_details);
    }
    public function fetchCourseWorkCredit(Request $request)
    {
        $course_id          = $request->id;
        $coursework         = new Coursework();
        $department_details = $coursework->select('credit')->where('course_id', $course_id)->first();
        return ($department_details->credit);
    }
    public function semisterPaymentFee($id)
    {
        return view('admin.phdstudents.semester-payment-fee', compact('id'));
    }
    public function semisterPaymentFeeSubmit(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'bput_fee'      => 'required',
            'college_fee'   => 'required',
            'bank_name'     => 'required',
            'semester_type' => 'required',
            'semester_no'   => 'required',
        ]);
        $php_res_pay                  = new SemisterRegistrationPayment();
        $php_res_pay->bput_fee        = $request->bput_fee;
        $php_res_pay->college_fee     = $request->college_fee;
        $php_res_pay->total_fee       = $request->college_fee + $request->bput_fee;
        $php_res_pay->paid_date       = date('Y-m-d');
        $php_res_pay->bank_name       = $request->bank_name;
        $php_res_pay->semester_type   = $request->semester_type;
        $php_res_pay->semester_no     = $request->semester_no;
        $php_res_pay->sem_res_stud_id = $request->sem_res_id;
        if ($php_res_pay->save()) {
            $id  = $php_res_pay->id;
            $msg = '<div class="offset-md-0 col-md-offset-0 col-md-12 animated fadeInDown alert alert-success" role="alert"><strong>Data Insert Successfull.</strong></div>';
            return redirect("phdstudent/semester-payment-fee/$id")->with(['message' => $msg, 'id' => $id]);
        } else {
            $msg = '<div class="offset-md-0 col-md-offset-0 col-md-12 animated fadeInDown alert alert-danger" role="alert"><strong>Data Insert Failed.</strong></div>';
            return redirect("phdstudent/semester-payment-fee/$id")->with('message', $msg);
        }
    }
    public function semisterPaymentPage($id)
    {
        $payemt_details = DB::table('semister_registration_payment')->where('sem_res_id', $id)->select('transaction_id_bput', 'transaction_id_college')->first();
        return view('admin.phdstudents.payment-page', compact('payemt_details', 'id'));
    }
    public function finalPayment($id, $type)
    {
        if ($type == 'bput') {
            $payemt_details = DB::table('semister_registration_payment')->where('sem_res_id', $id)->update(['transaction_id_bput' => uniqid()]);
        } else {
            $payemt_details = DB::table('semister_registration_payment')->where('sem_res_id', $id)->update(['transaction_id_college' => uniqid()]);
        }
        $payemt_details = DB::table('semister_registration_payment')->where('sem_res_id', $id)->select('transaction_id_bput', 'transaction_id_college')->first();
        if (!empty($payemt_details->transaction_id_bput) && !empty($payemt_details->transaction_id_college)) {
            return redirect("phdstudent/payment-success-page/" . $id);
        } else {
            return redirect("phdstudent/payment-page/" . $id);
        }
    }
    public function paymentSuccessPage($id)
    {
        return view('admin.phdstudents.payment-success-page', compact('id'));
    }

    public function semester_list_view($id)
    {
        //return $id;
        $phd_semister_registration = DB::table('phd_semister_registration as psr')
            ->where('semister_reg_id', $id)->first();

        $course_list   = $phd_semister_registration->course_list;
        $course_status = $phd_semister_registration->status;
        $course_list   = (explode(",", $course_list));
        $course_status = (explode(",", $course_status));

        $stud_id = $phd_semister_registration->stud_id;

        $reg_details = DB::table('phd_semister_registration as psr')->select('d.departments_title', 'psr.*', 'th.*')
            ->leftJoin('departments as d', 'd.id', '=', 'psr.dept_name')
            ->leftJoin('transaction_history as th', 'th.appl_id', '=', 'psr.semister_reg_id')
            ->where('psr.semister_reg_id', $id)->first();

        $semester = $reg_details->semester;
        $semester = explode("_", $semester);
        $semester = $semester[1];

        $list_of_coursework = [];

        foreach ($course_list as $key => $value) {
            $data = Coursework::where('course_id', $value)->first(['course_name', 'credit']);

            $list_of_coursework[] = array(
                'list'   => $data->course_name,
                'credit' => $data->credit,
                'status' => $course_status[$key],
            );
        }
        // return $list_of_coursework;
        //return $list_of_coursework[0]['list'];
        return view('admin.phdstudents.student-semester-view', compact('phd_semister_registration', 'reg_details', 'list_of_coursework', 'semester'));
    }

    //Change of nodal research center code
    public function changeOfNodalResearchCentre()
    {
        $info = Student::select('p.name', 'students.registration_no', 'students.registration_date', 'p.nodal_id', 'p.enrollment_no', 'p.enrollment_date', 'p.name_of_faculty', 'students.registration_no')
            ->leftJoin('phd_application_info as p', 'students.id', '=', 'p.stud_id')->orderby('p.id', 'desc')
            ->where('students.id', Auth::guard('student')->user()->id)
            ->first();
        return view('admin.phdstudents.changeof-nodal-reserach-center', compact('info'));
    }

    public function changeOfNodalResearchCentreForm(Request $request)
    {
        //return $request;
        $this->validate($request, [
            'name'                    => 'required',
            'faculty_of'              => 'required',
            'registration_no'         => 'required',
            'enrollment_no'           => 'required',
            'branch_name'             => 'required',
            'topic_of_research'       => 'required',
            'present_status_research' => 'required',
            'present_nodal_centre'    => 'required',
            'present_supervisor_name' => 'required',
            'co_supervisor_name'      => 'required',
            'proposed_nodal_centre'   => 'required',
            'proposed_supervisor'     => 'required',
            'proposed_co_supervisor'  => 'required',
            'document'                => 'required',
        ]);
        $change_nodal = new ChangeNodalCenter();
        if ($file = $request->file('document')) {
            $data           = $request->file('document');
            $extension      = $data->getClientOriginalExtension();
            $filename       = time() . uniqid(rand()) . 'document' . '.' . $extension;
            $path           = public_path('upload/reason_change_nodal/');
            $upload_success = $data->move($path, $filename);
            $upload_file    = '/upload/reason_change_nodal/' . $filename;
        } else {
            $upload_file = $change_nodal->document;
        }
        $change_nodal->student_id              = Auth::guard('student')->user()->id;
        $change_nodal->name                    = $request->name;
        $change_nodal->faculty_of              = $request->faculty_of;
        $change_nodal->registration_no         = $request->registration_no;
        $change_nodal->enrollment_no           = $request->enrollment_no;
        $change_nodal->branch_name             = $request->branch_name;
        $change_nodal->topic_of_research       = $request->topic_of_research;
        $change_nodal->present_status_research = $request->present_status_research;
        $change_nodal->present_nodal_centre    = $request->present_nodal_centre;
        $change_nodal->present_supervisor_name = $request->present_supervisor_name;
        $change_nodal->co_supervisor_name      = $request->co_supervisor_name;
        $change_nodal->proposed_nodal_centre   = $request->proposed_nodal_centre;
        $change_nodal->proposed_supervisor     = $request->proposed_supervisor;
        $change_nodal->proposed_co_supervisor  = $request->proposed_co_supervisor;
        $change_nodal->document                = $upload_file;
        $change_nodal->save();
        return redirect('/phdstudent/changeof-nodal-reserach-center')->with('message', 'The form has been submitted successfully!');
    }
    public function changeNodalStatus()
    {
        $value = ChangeNodalCenter::all();
        return view('admin.phdstudents.change_nodal_status', compact('value'));
    }
    public function viewchangeNodalStatus($id)
    {
        $value = ChangeNodalCenter::find($id);
        $std   = Student::select('students.registration_date', 'c.student_id', 'p.enrollment_date')
            ->leftjoin('change_nodal_center as c', 'students.id', '=', 'c.student_id')->orderby('c.id', 'desc')
            ->leftjoin('phd_application_info as p', 'c.student_id', '=', 'p.stud_id')
            ->first();
        return view('admin.phdstudents.change_nodal_view_status', compact('value', 'std'));
    }
    //End of change of nodal research center code

     //Change of research supervisor
 public function changeOfResearchSupervisor()
 {
     $info = Student::select('p.name', 'students.registration_no', 'students.registration_date', 'p.nodal_id', 'p.enrollment_no', 'p.enrollment_date', 'p.name_of_faculty', 'students.registration_no', 'nodal_centres.college_name', 'p.academic_programme', 'd.departments_title', 'p.topic_of_phd_work', 's.supervisor_name', 's.co_supervisor_name', 's.sup_id', 's.cosup_id')
   ->leftJoin('phd_application_info as p', 'students.id', '=', 'p.stud_id')->orderby('p.id', 'desc')
   ->leftJoin('nodal_centres', 'p.nodal_id', '=', 'nodal_centres.id')
   ->leftJoin('departments as d', 'p.academic_programme', '=', 'd.id')
   ->leftJoin('phd_supervisors as s', 'p.id', '=', 's.appl_id')
   ->where('students.id', Auth::guard('student')->user()->id)
   ->first();
  //$nodal      = NodalCentre::all();
  $supervisor = Supervisor::select(['id', 'first_name', 'last_name'])->get();

  // $research = DB::table('nodal_centres')->select('college_name', 'id')->get();
  return view('admin.phdstudents.change-supervisor.changeof-research-supervisor', compact('info', 'supervisor'));
 }
 public function changeOfResearchSupervisorForm(Request $request)
 {
  //return $request;
  $this->validate($request, [
   'phd_student_name'             => 'required',
   'branch_name'                  => 'required',
   'enrollment_no'                => 'required',
   'title_of_phd'                 => 'required',
   'present_research_supervisor'  => 'required',
   'proposed_research_supervisor' => 'required',
   'approved_by_bput'             => 'required',
   'reason_for_change'            => 'required',
  ]);
  $appl_id = PhdApplicationInfo::where('stud_id', Auth::guard('student')->user()->id)->first('id');
  $change_sup = new ChangeResearchSupervisor();
  if ($file = $request->file('document')) {
   $data           = $request->file('document');
   $extension      = $data->getClientOriginalExtension();
   $filename       = time() . uniqid(rand()) . 'document' . '.' . $extension;
   $path           = public_path('upload/Supervisor_recognisation_letter/');
   $upload_success = $data->move($path, $filename);
   $upload_file    = '/upload/Supervisor_recognisation_letter/' . $filename;
  } else {
   $upload_file = $change_sup->recognisation_letter;
  }
  $change_sup->student_id                   = Auth::guard('student')->user()->id;
  $change_sup->appl_id                      = $appl_id->id;
  $change_sup->present_research_supervisor  = $request->pre_sup_id;
  $change_sup->proposed_research_supervisor = $request->proposed_research_supervisor;
  $change_sup->pres_cosupervisor_name       = $request->pres_cosup_id;
  $change_sup->pros_resc_cosupervisor       = $request->pros_resc_cosupervisor;
  $change_sup->approved_by_bput             = $request->approved_by_bput;
  $change_sup->recognisation_letter         = $upload_file;
  $change_sup->reason_for_change            = $request->reason_for_change;
  $change_sup->status                       = 1;
  if ($change_sup->save()) {
   $msg = '<div class="offset-md-0 col-md-offset-0 col-md-12 animated fadeInDown alert alert-success" role="alert"><strong>Data Insert Successfull.</strong></div>';
   return redirect("/phdstudent/change-supervisor-view")->with('message', $msg);
  } else {
   $msg = '<div class="offset-md-0 col-md-offset-0 col-md-12 animated fadeInDown alert alert-danger" role="alert"><strong>Data Insert Failed.</strong></div>';
   return redirect("/phdstudent/change-supervisor-view")->with('message', $msg);
  }
 }
 public function viewChangeOfSupervisor()
 {
  $info = Student::select('p.name', 'students.registration_no', 'students.registration_date', 'p.nodal_id', 'p.enrollment_no', 'p.enrollment_date', 'p.name_of_faculty', 'students.registration_no', 'nodal_centres.college_name', 'p.academic_programme', 'd.departments_title', 'p.topic_of_phd_work', 's.supervisor_name', 's.co_supervisor_name', 's.sup_id', 's.cosup_id')
  ->leftJoin('phd_application_info as p', 'students.id', '=', 'p.stud_id')->orderby('p.id', 'desc')
  ->leftJoin('nodal_centres', 'p.nodal_id', '=', 'nodal_centres.id')
  ->leftJoin('departments as d', 'p.academic_programme', '=', 'd.id')
  ->leftJoin('phd_supervisors as s', 'p.id', '=', 's.appl_id')
  ->where('students.id', Auth::guard('student')->user()->id)
  ->first();
  $details = DB::table('change_research_supervisor_name as c')->select('*', 's.first_name', 's.last_name', 'c.id as app_id')->leftJoin('supervisors as s', 'c.present_research_supervisor', '=', 's.id')->where('student_id', Auth::guard('student')->user()->id)->first();
   $pro_sup =  DB::table('change_research_supervisor_name as c')->select('s.first_name', 's.last_name')->leftJoin('supervisors as s', 'c.proposed_research_supervisor', '=', 's.id')->where('student_id', Auth::guard('student')->user()->id)->first();
   $pre_cosup = DB::table('change_research_supervisor_name as c')->select('s.first_name', 's.last_name')->leftJoin('supervisors as s', 'c.pres_cosupervisor_name', '=', 's.id')->where('student_id', Auth::guard('student')->user()->id)->first();
   $pro_cosup = DB::table('change_research_supervisor_name as c')->select('s.first_name', 's.last_name')->leftJoin('supervisors as s', 'c.pros_resc_cosupervisor', '=', 's.id')->where('student_id', Auth::guard('student')->user()->id)->first();
  return view('admin.phdstudents.change-supervisor.co-supervisor-change-view', compact('details', 'info', 'pro_sup', 'pre_cosup', 'pro_cosup'));
 }
    public function changeOfCoSupervisorList()
    {
        $nodal = NodalCentre::select('nodal_centres.college_name', 'p.name_of_ncr')
            ->leftJoin('change_research_supervisor_name as p', 'nodal_centres.id', '=', 'p.name_of_ncr')
            ->get();
        $details = DB::table('change_research_supervisor_name')->select('*')->get();
        return view('admin.phdstudents.co-supervisor-change-list', compact('details', 'nodal'));
    }
    public function viewChangeSupervisorForm($id)
    {
        $value = ChangeResearchSupervisor::where('change_research_supervisor_name.res_ch_id', $id)
            ->leftJoin('nodal_centres', 'change_research_supervisor_name.name_of_ncr', '=', 'nodal_centres.id')
            ->first();
        $std = Student::select('students.registration_date', 'c.student_id', 'p.enrollment_date', 'p.name_of_faculty', 'p.enrollment_no')
            ->leftjoin('change_nodal_center as c', 'students.id', '=', 'c.student_id')->orderby('c.id', 'desc')
            ->leftjoin('phd_application_info as p', 'c.student_id', '=', 'p.stud_id')
            ->first();
        return view('admin.phdstudents.view-researh-supervisor-changeform', compact('value', 'std'));
    }
    //end of change research supervisor
    public function changeOfNodalResearchCentreList()
    {
        $details = DB::table('change_nodal_center')->select('*')->get();
        return view('admin.phdstudents.changeof-nodal-reserach-centrelist', compact('details'));
    }
    public function changeOfNodalResearchCentreView()
    {
        return view('admin.phdstudents.changeof-nodal-reserach-centre-view');
    }
    public function special_leave()
    {
        //return Auth::guard('student')->user()->id;
        $student = DB::table('phd_application_info as pai')
            ->select('pai.*', 'd.id as dep_id', 'd.departments_title', 'nodal.id as nod_id', 'nodal.college_name')
            ->leftJoin('departments as d', 'd.id', '=', 'pai.academic_programme')
            ->leftJoin('nodal_centres as nodal', 'nodal.id', '=', 'pai.nodal_id')
            ->where('stud_id', Auth::guard('student')->user()->id)
            ->orderBy('pai.id', 'desc')
            ->first();
        return view('admin.phdstudents.leave.special_leave', compact('student'));
    }
    public function special_leave_store(Request $request)
    {
        //return $request;
        PhdStudentMaternityLeave::create($request->all() + ['stud_id' => Auth::guard('student')->user()->id]);
        return redirect()->route('special.leave.list');
    }
    public function special_leave_listing()
    {
        //return 1;
        $leave_list = PhdStudentMaternityLeave::where('stud_id', Auth::guard('student')->user()->id)->get();
        return view('admin.phdstudents.leave.index', compact('leave_list'));
    }
    public function special_leave_view($id)
    {
        //return $id;
        $student = PhdStudentMaternityLeave::where('id', $id)->first();
        return view('admin.phdstudents.leave.special_leave_view', compact('student'));
    }
    // subash ends here
    public function myProfile()
    {
        // $data['id']['web']           = Auth::guard('web')->user()->id;
        // $data['id']['nodalcentre']   = Auth::guard('nodalcentre')->user()->id;
        // $data['id']['student']       = Auth::guard('student')->user()->id;
        $data['id']['supervisor'] = Auth::guard('supervisor')->user()->id;
        // $data['id']['co-supervisor'] = Auth::guard('co-supervisor')->user()->id;
        //$details = new Student;
        $student = Student::select('students.*')->leftjoin('phd_application_info', 'phd_application_info.stud_id', '=', 'students.id')->where('students.id', Auth::guard('student')->user()->id)->first();
        // dd($student);
        return view('admin.phdstudents.profile', compact('student'));
    }

    public function ext_to_complete_work()
    {
        $student = Helpers::ExtensionWork();
        //return $student = Helpers::ExtensionWorkStatus();
        return view('admin.phdstudents.ext_complete_work.index', compact('student'));
    }
    public function extention_work_apply()
    {
        // return Auth::guard('student')->user()->id;
        $student = DB::table('phd_application_info as pa')->select('pa.*', 'n.college_name', 'd.departments_title as branch')
            ->leftJoin('nodal_centres as n', 'n.id', 'pa.nodal_id')
            ->leftJoin('departments  as d', 'd.id', 'pa.academic_programme')
            ->orderby('pa.id', 'desc')
            ->where('pa.stud_id', Auth::guard('student')->user()->id)->first();
        return view('admin.phdstudents.ext_complete_work.ext_complete_work', compact('student'));
    }
    public function extention_to_work_view($id)
    {
        $student = DB::table('extention_complete_works  as ecw')->select('ecw.*', 'n.college_name')
            ->Join('nodal_centres as n', 'n.id', '=', 'ecw.nodal_center')
            ->where('ecw.id', $id)
            ->first();
        $comp_not_compl = $student->component_not_completed;
        $comp_not_compl = explode(',', $comp_not_compl);

        return view('admin.phdstudents.ext_complete_work.extensiton_work_view', compact('student', 'comp_not_compl'));
    }

    public function extention_work_store(Request $request)
    {

        $component_not_completed = implode(',', $request->component_not_completed);

        unset($request['component_not_completed']);
        //return ($request->all());
        //return $component_not_completed;
        ExtentionCompleteWork::create($request->all() + ['stud_id' => Auth::guard('student')->user()->id] + ['component_not_completed' => $component_not_completed] + ['application_status' => 1]);

        return redirect()->route('ext_to_complete_work');
    }

    // renewal registratin
    public function renewalRegistrationForm()
    {
        $nodal_centre = NodalCentre::all();
        $info         = Student::select('students.first_name', 'students.last_name', 'students.registration_no', 'students.registration_date', 'p.ncr_department', 'p.enrollment_no', 'p.enrollment_date')
            ->leftJoin('phd_application_info as p', 'students.id', '=', 'p.stud_id')->orderby('p.id', 'desc')
            ->where('students.id', Auth::guard('student')->user()->id)
            ->first();
        return view('admin.phdstudents.renewal_registration_form', compact('info', 'nodal_centre'));
    }
    public function renewalRegistrationFormSubmit(Request $request)
    {
        // return $request;
        $value                           = new RenewalRegistration();
        $value->stud_id                  = Auth::guard('student')->user()->id;
        $value->name                     = $request->name;
        $value->ncr_name                 = $request->ncr_name;
        $value->faculty                  = $request->faculty;
        $value->discipline               = $request->discipline;
        $value->enrollment_no            = $request->enrollment_no;
        $value->enrollment_date          = $request->enrollment_date;
        $value->regd_no                  = $request->regd_no;
        $value->registration_date        = $request->registration_date;
        $value->topic                    = $request->topic;
        $value->progress                 = $request->progress;
        $value->schedule_period          = $request->schedule_period;
        $value->reason_of_non_completion = $request->reason_of_non_completion;
        $value->expected_completion      = $request->expected_completion;
        $value->expected_submission      = $request->expected_submission;
        $value->save();
        return redirect('phdstudent/renewal-request')->with('message', 'The form has been submitted successfully!');
    }
    public function renewalRequest()
    {
        $value = RenewalRegistration::all();
        return view('admin.phdstudents.renewal_request', compact('value'));
    }
    public function renewalRegistration($id)
    {
        $nodal_centre = NodalCentre::all();
        $value        = RenewalRegistration::find($id);
        return view('admin.phdstudents.renewal_registration', compact('nodal_centre', 'value'));
    }
    // end of renewal form

    //code for discontinuation as Ph.D student
    public function discontinue_phd()
    {
        $nodal = NodalCentre::all();
        $info  = Student::select('students.first_name', 'students.last_name', 'students.registration_no', 'students.registration_date', 'p.ncr_department', 'p.enrollment_no', 'p.enrollment_date')
            ->leftJoin('phd_application_info as p', 'students.id', '=', 'p.stud_id')->orderby('p.id', 'desc')
            ->where('students.id', Auth::guard('student')->user()->id)
            ->first();

        return view('admin.phdstudents.discontinue_phd', compact('info', 'nodal'));
    }
    public function discontinue_phd_store(Request $request)
    {
        //return $request;
        $value = new PhdDiscontinuation;
        if ($file = $request->file('file')) {
            $data           = $request->file('file');
            $extension      = $data->getClientOriginalExtension();
            $filename       = time() . uniqid(rand()) . 'file' . '.' . $extension;
            $path           = public_path('upload/published_research_paper/');
            $upload_success = $data->move($path, $filename);
            $upload_file    = '/upload/published_research_paper/' . $filename;
        } else {
            $upload_file = $value->file;
        }
        $value->stud_id                = Auth::guard('student')->user()->id;
        $value->name                   = $request->name;
        $value->enrollment_no          = $request->enrollment_no;
        $value->enrollment_date        = $request->enrollment_date;
        $value->faculty                = $request->faculty;
        $value->regd_no                = $request->regd_no;
        $value->registration_date      = $request->registration_date;
        $value->branch                 = $request->branch;
        $value->topic                  = $request->topic;
        $value->present_center         = $request->present_center;
        $value->research_details       = $request->research_details;
        $value->file                   = $upload_file;
        $value->progress               = $request->progress;
        $value->discontinuation_reason = $request->discontinuation_reason;
        $value->save();
        return redirect('phdstudent/discontinue-request')->with('message', 'The form has been submitted successfully!');
    }
    public function discontinueRequest()
    {
        $value = PhdDiscontinuation::all();
        return view('admin.phdstudents.discontinue_request', compact('value'));
    }
    public function discontinueRegistration($id)
    {
        $nodal = NodalCentre::select('nodal_centres.college_name', 'p.present_center')
            ->leftJoin('phd_discontinuations as p', 'nodal_centres.id', '=', 'p.present_center')->orderby('p.id', 'desc')
            ->first();
        $value = PhdDiscontinuation::where('phd_discontinuations.id', $id)->first();
        return view('admin.phdstudents.discontinuephd_view', compact('value', 'nodal'));
    }
//end of discontinue phd
    public function inclusionCoSupervisor()
    {
        return view('admin.phdstudents.inclusion_co_supervisor');
    }

    public function recommendationDsc()
    {
        return view('admin.phdstudents.recommendation-dsc');
    }

// Change research work title code
    public function changeTitleRearchWork()
    {
        $info = Student::select('p.name', 'students.registration_no', 'students.registration_date', 'p.name_of_faculty', 'p.enrollment_no', 'p.enrollment_date', 'p.topic_of_phd_work', 'departments.departments_title', 'nodal_centres.college_name')
            ->leftJoin('phd_application_info as p', 'students.id', '=', 'p.stud_id')->orderby('p.id', 'desc')
            ->leftJoin('departments', 'p.academic_programme', '=', 'departments.id')
            ->rightJoin('nodal_centres', 'p.nodal_id', '=', 'nodal_centres.id')
            ->where('students.id', Auth::guard('student')->user()->id)
            ->first();
        $nodal_centre = NodalCentre::all();
        return view('admin.phdstudents.researchwork_change_title', compact('nodal_centre', 'info'));
    }

    public function changeResearchSubmit(Request $request)
    {
        return $request;
        $ncr = Student::select('nodal_centres.id', 'nodal_centres.college_name')
            ->leftJoin('phd_application_info as p', 'students.id', '=', 'p.stud_id')->orderby('p.id', 'desc')
            ->leftJoin('nodal_centres', 'p.nodal_id', '=', 'nodal_centres.id')
            ->where('students.id', Auth::guard('student')->user()->id)
            ->first();

        $change_title                             = new ResearchworkChangeTitle();
        $change_title->student_id                 = Auth::guard('student')->user()->id;
        $change_title->candidate_name             = $request->candidate_name;
        $change_title->department_ncr             = $ncr;
        $change_title->faculty_of_dept            = $request->faculty_of_dept;
        $change_title->enrollment_no              = $request->enrollment_no;
        $change_title->registration_no            = $request->registration_no;
        $change_title->discipline_specialization  = $request->discipline_specialization;
        $change_title->current_title_researchwork = $request->current_title_researchwork;
        $change_title->propose_title_researchwork = $request->propose_title_researchwork;
        $change_title->reason_change_title        = $request->reason_change_title;
        $change_title->scope_of_rearch            = $request->scope_of_rearch;
        $change_title->save();
        return redirect('/phdstudent/change-title-researchwork')->with('message', 'The form has been submitted successfully!');
    }
    //end of change title of research work code

    /**
     * Method courseworkForm
     * @author AlokDas
     * @return void
     */
    public function courseworkForm(Request $request)
    {
        $id                  = Auth::guard('student')->user()->id;
        $data['application'] = PhdApplicationInfo::where('stud_id', $id)->with(['get_supervisor_details' => function ($Q) {
            $Q->select(['appl_id', 'supervisor_name', 'co_supervisor_name']);
        }, 'get_department_details', 'get_nodal_center_details:id,college_name', 'get_coursework_details:appl_id,work_brief_desc,equip_brief_desc,residence_plan_desc,status,id,dsc_letter'])
            ->first();

        if (!empty($data['application'])) {
            $coursework_status = PhdCourseWorks::where('appl_id', $data['application']->id);

            if ($coursework_status->first()) {
                if ($coursework_status->first()->status == 1) {
                    return view("admin.phdstudents.course-work-view")->with($data);
                } else {
                    // TODO Code ...
                    return view("admin.phdstudents.course-work-view")->with($data);
                }
            } else {
                return view("admin.phdstudents.course-work-form")->with($data);
            }
        } else {
            echo 'No Data';
        }

    }

    /**
     * Method coueseworkFormCreate
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function courseworkFormCreate(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'appl_id'              => 'required|integer',
                'research_description' => 'required|string',
                'equipment_facility'   => 'required|string',
                'residence'            => 'required|string',
            ]);

            if ($validator->passes()) {
                $check = PhdCourseWorks::where('appl_id', $request->appl_id)->get();
                if ($check->isNotEmpty()) {
                    $update_data = [
                        'appl_id'             => $request->appl_id,
                        'work_brief_desc'     => $request->research_description,
                        'equip_brief_desc'    => $request->equipment_facility,
                        'residence_plan_desc' => $request->residence,
                        'status'              => 1,
                    ];
                    $coursework_id   = PhdCourseWorks::where('appl_id', $request->appl_id)->update($update_data);
                    $data['data']    = $coursework_id;
                    $data['message'] = 'CourseWork updated successfully';
                } else {
                    $insert_data = [
                        'appl_id'             => $request->appl_id,
                        'work_brief_desc'     => $request->research_description,
                        'equip_brief_desc'    => $request->equipment_facility,
                        'residence_plan_desc' => $request->residence,
                        'status'              => 1,
                        'created_at'          => now(),
                    ];

                    $coursework_id   = PhdCourseWorks::insert($insert_data);
                    $data['data']    = $coursework_id;
                    $data['message'] = 'CourseWork created successfully';
                }
                return redirect()->back()->with($data);
            } else {
                $data['data']    = [];
                $data['message'] = $validator->errors();
                return redirect()->back()->with($data);
                // return response($data, 406);
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return redirect()->back()->with($data);
        }
    }
    //provisional registration DSC recommendation
    public function provisionalRegistration()
    {
        $user_id = session('userdata')['userID'];
        $info    = Student::select('students.registration_no', 'students.registration_date', 'p.ncr_department', 'p.enrollment_no', 'p.name', 'p.enrollment_date', 'p.topic_of_phd_work', 'ps.supervisor_name', 'nodal.college_name', 'nodal.id as nod_id', 'd.departments_title', 'p.id as appl_id', 'students.father_husband', 'p.permannt_address', 'p.name_of_faculty', 'p.dob', 'p.category', 'p.student_category')
            ->leftJoin('phd_application_info as p', 'students.id', '=', 'p.stud_id')
            ->leftJoin('nodal_centres as nodal', 'nodal.id', '=', 'p.nodal_id')
            ->rightJoin('departments as d', 'd.id', '=', 'p.academic_programme')
            ->leftJoin('phd_supervisors as ps', 'ps.appl_id', '=', 'p.id')->orderby('p.id', 'desc')
            ->where('students.id', Auth::guard('student')->user()->id)->first();
        $enrollment_date = new DateTime($info->enrollment_date);
        if ($info->student_category == 'Full Time') {
            $enrollment_date->add(new DateInterval('P3Y'));
            $formatted_date = $enrollment_date->format('Y-m-d');
        } else {
            $enrollment_date->add(new DateInterval('P3Y6M'));
            $formatted_date = $enrollment_date->format('Y-m-d');
        }
        $totalCredits   = 0;
        $coursework_sub = DB::table('tbl_course_work_subjects as c')->where('appl_id', $info->appl_id)->get();
        foreach ($coursework_sub as $subject) {
            $totalCredits += $subject->credits;
        }
        return view('admin.phdstudents.provisional_registration', compact('info', 'coursework_sub', 'formatted_date', 'totalCredits'));
    }
    public function provisionalRegStore(Request $request)
    {
        //return $request;
        $user_id = session('userdata')['userID'];
        $appl_id = DB::table('phd_application_info')->where('stud_id', $user_id)->first('id');
        if ($file = $request->file('grade_sheet')) {
            $data           = $request->file('grade_sheet');
            $extension      = $data->getClientOriginalExtension();
            $filename       = time() . uniqid(rand()) . 'grade_sheet' . '.' . $extension;
            $path           = public_path('upload/provisional_grade_sheet/');
            $upload_success = $data->move($path, $filename);
            $upload_file    = '/upload/provisional_grade_sheet/' . $filename;
        }
        DB::table('provisional_registrations')->insert([
            'appl_id'                => $appl_id->id,
            'stud_id'                => $user_id,
            'thesis_submission_date' => $request->thesis_submission_date,
            'course_completed'       => $request->course_completed,
            'credit_completed'       => $request->credit_completed,
            'grade_sheet'            => $upload_file,
            'status'                 => 1,
        ]);

        if ($request->grades != "") {
            foreach (CourseWorkSubjects::where('appl_id', $appl_id->id)->get() as $key => $value) {
                CourseWorkSubjects::where('id', $value->id)->update(
                    [
                        'grades'         => $request->grades[$key],
                        'passing_date'   => $request->passing_date[$key],
                        'passing_remark' => $request->passing_remark[$key],
                    ]
                );
            }
        }
        return redirect('/phdstudent/provisional_reg_view')->with('message', 'The form has been submitted successfully!');
    }
    public function provisionalRegView()
    {
        $user_id = session('userdata')['userID'];
        $info    = Student::select('students.registration_no', 'students.registration_date', 'p.ncr_department', 'p.enrollment_no', 'p.name', 'p.enrollment_date', 'p.topic_of_phd_work', 'ps.supervisor_name', 'nodal.college_name', 'nodal.id as nod_id', 'd.departments_title', 'p.id as appl_id', 'students.father_husband', 'p.permannt_address', 'p.name_of_faculty', 'p.dob', 'p.category', 'p.student_category')
            ->leftJoin('phd_application_info as p', 'students.id', '=', 'p.stud_id')
            ->leftJoin('nodal_centres as nodal', 'nodal.id', '=', 'p.nodal_id')
            ->rightJoin('departments as d', 'd.id', '=', 'p.academic_programme')
            ->leftJoin('phd_supervisors as ps', 'ps.appl_id', '=', 'p.id')->orderby('p.id', 'desc')
            ->where('students.id', Auth::guard('student')->user()->id)->first();
        $coursework_sub = DB::table('tbl_course_work_subjects as c')->where('appl_id', $info->appl_id)->get();
        $totalCredits   = 0;
        foreach ($coursework_sub as $subject) {
            $totalCredits += $subject->credits;
        }
        $provisional = DB::table('provisional_registrations')->where('stud_id', $user_id)->first();
        return view('admin.phdstudents.provisional_registration_view', compact('info', 'coursework_sub', 'totalCredits', 'provisional'));
    }
//Provisional registration edit & update
    public function provisionalRegistrationEdit()
    {
        $user_id = session('userdata')['userID'];
        $info    = Student::select('students.registration_no', 'students.registration_date', 'p.ncr_department', 'p.enrollment_no', 'p.name', 'p.enrollment_date', 'p.topic_of_phd_work', 'ps.supervisor_name', 'nodal.college_name', 'nodal.id as nod_id', 'd.departments_title', 'p.id as appl_id', 'students.father_husband', 'p.permannt_address', 'p.name_of_faculty', 'p.dob', 'p.category', 'p.student_category')
            ->leftJoin('phd_application_info as p', 'students.id', '=', 'p.stud_id')
            ->leftJoin('nodal_centres as nodal', 'nodal.id', '=', 'p.nodal_id')
            ->rightJoin('departments as d', 'd.id', '=', 'p.academic_programme')
            ->leftJoin('phd_supervisors as ps', 'ps.appl_id', '=', 'p.id')->orderby('p.id', 'desc')
            ->where('students.id', Auth::guard('student')->user()->id)->first();
        $coursework_sub = DB::table('tbl_course_work_subjects as c')->where('appl_id', $info->appl_id)->get();
        $provisional    = DB::table('provisional_registrations')->where('stud_id', $user_id)->first();
        return view('admin.phdstudents.provisional_registration_edit', compact('info', 'coursework_sub', 'provisional'));
    }
    public function provisionalRegUpdate(Request $request, $id)
    {
        //return $request;
        $user_id = session('userdata')['userID'];
        $appl_id = DB::table('phd_application_info')->where('stud_id', $user_id)->first('id');
        if ($file = $request->file('grade_sheet')) {
            $data           = $request->file('grade_sheet');
            $extension      = $data->getClientOriginalExtension();
            $filename       = time() . uniqid(rand()) . 'grade_sheet' . '.' . $extension;
            $path           = public_path('upload/provisional_grade_sheet/');
            $upload_success = $data->move($path, $filename);
            $upload_file    = '/upload/provisional_grade_sheet/' . $filename;
        } else {
            $upload_file = $request->grade_sheet_old;
        }
        DB::table('provisional_registrations')->where('id', $id)->update([
            'appl_id'                => $appl_id->id,
            'stud_id'                => $user_id,
            'thesis_submission_date' => $request->thesis_submission_date,
            'course_completed'       => $request->course_completed,
            'credit_completed'       => $request->credit_completed,
            'grade_sheet'            => $upload_file,
            'status'                 => 1,
        ]);

        if ($request->grades != "") {
            foreach (CourseWorkSubjects::where('appl_id', $appl_id->id)->get() as $key => $value) {
                CourseWorkSubjects::where('id', $value->id)->update(
                    [
                        'grades'         => $request->grades[$key],
                        'passing_date'   => $request->passing_date[$key],
                        'passing_remark' => $request->passing_remark[$key],
                    ]
                );
            }
        }
        return redirect('/phdstudent/provisional_reg_view')->with('message', 'The form has been submitted successfully!');
    }

}
