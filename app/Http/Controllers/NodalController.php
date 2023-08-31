<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\ChangeResearchSupervisor;
use App\Models\Coursework;
use App\Models\DomainExpertList;
use App\Models\DscDomainExpert;
use App\Models\Organisation;
use App\Models\PhdApplicationInfo;
use App\Models\PhdDiscontinuation;
use App\Models\PhdOtherDocument;
use App\Models\PhdStudentMaternityLeave;
use App\Models\PhdSupervisor;
use App\Models\RenewalRegistration;
use App\Models\SemesterProgressReport;
use App\Models\SemesterPublication;
use App\Models\Student;
use App\Models\StudentQualification;
use Auth;
use CourseWorkSubjects;
use DSCExperts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use NodalCentre;
use PhdCourseWorks;
use TblCourseWorksApplicationRemarks;
use TblRemarks;
use Carbon\Carbon;

class NodalController extends Controller
{
    /**
     * Method nodal_index
     * @author AlokDas
     * @return void
     */
    public function nodal_index()
    {
        $nodal       = NodalCentre::allNodalCentre();
        $nodal_count = $nodal->count();

        return view('admin.controlcell.nodal_view', compact('nodal', 'nodal_count'));
    }

    /**
     * Method add_nodal
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function add_nodal(Request $request)
    {
        $nodal = NodalCentre::insert(
            [
                'college_name' => $request->college_name,
                'email'        => $request->email,
                'phone'        => $request->phone,
                'address'      => $request->address,
                'password'     => Hash::make($request->password),
            ]
        );
        $nodalId = DB::getPdo()->lastInsertId();
        $tb_name = 'nodal_user_' . $nodalId;
        Schema::create($tb_name, function ($table) {
            $table->bigIncrements('id');
            $table->string('role')->nullable()->comment('Role names will be explicitely given as per the designation');
            $table->bigInteger('role_id')->comment('Roles id will also be given as per the designation. PK of roles');
            $table->bigInteger('ncr_id')->comment('PK of nodal_center');
            $table->bigInteger('dept_id')->comment('PK of departments');
            $table->string('name', 100)->comment('Name of employee');
            $table->string('designation', 100)->comment('1: Professor 2:Associate Professor 3:Chairperson 4:Co-Chairperson');
            $table->text('address')->nullable()->default('')->comment('Professor\'s address');
            $table->string('contact_no', 20)->nullable()->comment('Professor contact no');
            $table->string('email_id', 50)->nullable()->comment('Professor email id');
            $table->string('password')->nullable()->comment('Professor password');
            $table->tinyInteger('status')->default(0)->comment('0: Inactive 1: Active');
            $table->tinyInteger('employee_type')->default(0)->comment('0: Internal 1: External');
            $table->tinyInteger('expert_status')->default(0)->comment('0: Inexpert 1: Expert');
            $table->bigInteger('created_by')->nullable()->comment('PK of User table');
            $table->bigInteger('updated_by')->nullable()->comment('PK of User table');
            $table->timestamps();
            $table->softDeletes();
        });

        $update_nodal = NodalCentre::where('id', $nodalId)->update(['user_table_name' => $tb_name]);

        $details = [
            "to_address" => $request->email,
            "subject"    => 'Nodal center creation mail',
            "username"   => $request->email,
            "password"   => $request->password,
        ];

        $mail = Mail::send('emails.nodalMail_Info', $details, function ($message) use ($details) {
            $message->to($details['to_address']);
            $message->subject($details['subject']);
        });

        return redirect()->route('nodal')->with(['success' => 'Nodal center and their user table has been created successfully.']);
    }

    /**
     * Method edit_nodal
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function edit_nodal(Request $request)
    {
        $nodal = DB::table('nodal_centres')->find($request->id);
        return response()->json($nodal);
    }

    /**
     * Method update_nodal
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function update_nodal(Request $request)
    {

        $nodal_id = $request->hid_id;

        DB::table('nodal_centres')
            ->where('id', $nodal_id)
            ->update(
                [
                    'college_name' => $request->college_name,
                    'email'        => $request->email,
                    'phone'        => $request->phone,
                    'address'      => $request->address,
                ]
            );
        return redirect()->route('nodal')->with('success', 'Nodal Updated Successfully');
    }

    /**
     * Method delete_nodal
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function delete_nodal(Request $request)
    {
        //return $request->id;

        $nodal = DB::table('nodal_centres')->find($request->id);
        // return $nodal;
        if (!$nodal) {
            return response()->json([
                'success' => false,
                'message' => 'Nodal not found',
            ], 400);
        }

        $nodal_delete = DB::table('nodal_centres')->where('id', $request->id)->delete();

        if ($nodal_delete) {
            return response()->json([
                'success' => true,
                'message' => 'Nodal deleted successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Nodal can not be deleted',
            ], 500);
        }
    }

    /**
     * Method dashboard
     *santosh code
     * @return void
     */
    public function dashboard()
    {
        return view('nodalcentre.dashboard');
    }

    /**
     * Method appliedApplication
     * @author AlokDas
     * @return void
     */
    public function appliedApplication()
    {
        $nodal_id    = Auth::guard('nodalcentre')->user()->id;
        $application = PhdApplicationInfo::select('phd_application_info.*')
            ->leftjoin('students as s', 's.id', '=', 'phd_application_info.stud_id')
            ->leftjoin('change_research_supervisor_name as sn', 'phd_application_info.stud_id', '=', 'sn.student_id')
            ->where([['phd_application_info.stu_payment_status', 1]])
            ->where([['phd_application_info.deleted_at', null]]);
        $applications = $application->where('phd_application_info.nodal_id', $nodal_id)
            ->whereIn('phd_application_info.application_status', [2, 4, 5, 6, 7, 8, 9, 10, 11, 12])
            ->where('phd_application_info.application_status', '!=', 0)
            ->with(['get_supervisor_details', 'get_coursework_details'])
            ->get();
        $app_status = Helpers::appStatus();
        $page_title = 'Student pending applications';
        // dd($applications->toArray());

        return view('nodalcentre.application.index', compact('applications', 'app_status', 'page_title'));
    }

    /**
     * Method viewApplication
     * @param $id $id [explicite description]
     * @author AlokDas
     * @return void
     */
    public function viewApplication($id)
    {
        $data['student'] = PhdApplicationInfo::select('phd_application_info.*', 'nodal_centres.college_name')
            ->join('nodal_centres', 'phd_application_info.nodal_id', 'nodal_centres.id')
            ->where('phd_application_info.id', $id)
            ->first();
        $data['coursework_status']      = PhdApplicationInfo::where('phd_application_info.id', $id)->with('get_coursework_details:appl_id,status')->first();
        $data['transaction_history']    = DB::table('transaction_history')->where('appl_id', $id)->first(['transaction_id']);
        $data['supervisor']             = PhdSupervisor::where('appl_id', $id)->first();
        $data['student_qualifications'] = StudentQualification::where('appl_id', $id)->get();
        $data['organisation']           = Organisation::where('appl_id', $id)->get();
        $data['documents']              = PhdOtherDocument::where('appl_id', $id)->get();
        $data['domain_experts']         = DSCExperts::where('appl_id', $id)
            ->with('getProfessorDetails')
            ->get()
            ->map(function ($r) {
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
        // dd($data['coursework_status']->toArray());

        return view('nodalcentre.application.view')->with($data);
    }

    /**
     * Method editApplication
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @author AlokDas
     * @return void
     */
    public function editApplication(Request $request, $id)
    {
        //return $request;
        // dd($request->all());
        if ($request->qualification_remarks) {
            for ($i = 0; $i < count($request->qualification_remarks); $i++) {
                $StudentQualification                = StudentQualification::find($request->qualification_id[$i]);
                $StudentQualification->nodal_remarks = $request->qualification_remarks[$i];
                $StudentQualification->save();
            }
        }
        if ($request->org_remarks) {
            for ($i = 0; $i < count($request->org_remarks); $i++) {
                $organisation                = Organisation::find($request->org_id[$i]);
                $organisation->nodal_remarks = $request->org_remarks[$i];
                $organisation->save();
            }
        }
        if ($request->other_remarks) {
            for ($i = 0; $i < count($request->other_remarks); $i++) {
                $phdSupervisor                = PhdSupervisor::find($request->other_id[$i]);
                $phdSupervisor->nodal_remarks = $request->other_remarks[$i];
                $phdSupervisor->save();
            }
        }
        if ($request->oth_doc_remarks) {
            for ($i = 0; $i < count($request->oth_doc_remarks); $i++) {
                $phdSupervisor               = PhdOtherDocument::find($request->oth_doc_id[$i]);
                $phdSupervisor->nodal_remark = $request->oth_doc_remarks[$i];
                $phdSupervisor->save();
            }
        }

        // $request->ncr_recommendation_status;
        PhdApplicationInfo::where('id', $id)
            ->update([
                'application_status' => $request->ncr_recommendation_status,
                'nodal_remarks'      => $request->phd_app_nodal_remarks,
            ]);

        $tbl_remarks_status = TblRemarks::where('appl_id', $request->appl_id);
        if ($tbl_remarks_status->get()->isNotEmpty()) {
            $tbl_remarks_status->update([
                'appl_id'     => $request->appl_id,
                'ncr'         => $request->domain_expert_remarks,
                'ncr_overall' => $request->phd_app_nodal_remarks,
            ]);
        } else {
            $tbl_remarks_status->insert([
                'appl_id'     => $request->appl_id,
                'ncr'         => $request->domain_expert_remarks,
                'ncr_overall' => $request->phd_app_nodal_remarks,
            ]);
        }

        return redirect()->route('nodalcentre.applied-application')->with('success', 'Application has saved successfully.');
    }

    /**
     * Method previewApplication
     * @param $id $id [explicite description]
     * @author AlokDas
     * @return void
     */
    public function previewApplication($id)
    {
        $student                = PhdApplicationInfo::find($id);
        $transaction_history    = DB::table('transaction_history')->where('appl_id', $id)->first(['transaction_id']);
        $supervisor             = PhdSupervisor::where('appl_id', $id)->first();
        $student_qualifications = StudentQualification::where('appl_id', $id)->get();
        $organisation           = Organisation::where('appl_id', $id)->get();
        $documents              = PhdOtherDocument::where('appl_id', $id)->get();
        $domain_experts         = DSCExperts::where('appl_id', $id)->with('getProfessorDetails')->get()->map(function ($r) {
            $designation_array = ['', 'Professor', 'Associate Professor', 'Chairperson', 'Co-Chairperson'];
            return [
                'professor_id' => $r->getProfessorDetails->professor_id ?? '',
                'name'         => $r->getProfessorDetails->name ?? '',
                'designation'  => $r->getProfessorDetails->designation ? $designation_array[$r->getProfessorDetails->designation] : '',
                'address'      => $r->getProfessorDetails->address ?? '',
                'email_id'     => $r->getProfessorDetails->email_id ?? '',
                'contact_no'   => $r->getProfessorDetails->contact_no ?? '',
            ];
        });
        $tbl_remarks = TblRemarks::where('appl_id', $id)->pluck('ncr')->first();

        return view('nodalcentre.application.preview', compact('student', 'supervisor', 'student_qualifications', 'organisation', 'transaction_history', 'documents', 'domain_experts', 'tbl_remarks'));
    }

    /**
     * Method approveApplication
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @author AlokDas
     * @return void
     */
    public function approveApplication(Request $request, $id)
    {
        DB::table('phd_application_info')
            ->where('id', $id)
            ->update([
                'application_status' => ($request->status == 2) ? 2 : 3,
                'nodal_remarks'      => $request->application_remark,
            ]);
        return redirect()->route('nodalcentre.applied-application')->with('success', 'Application has submitted successfully.');
    }

    /**
     * Method allApplication
     * @author AlokDas
     * @return void
     */
    public function allApplication()
    {
        $application  = PhdApplicationInfo::select(['id', 'stud_id', 'name', 'enrollment_no', 'stu_payment_status', 'stu_payment_status', 'enrollment_date', 'email', 'phone', 'topic_of_phd_work', 'student_category', 'application_status', 'notification_no', 'notification_date', 'notified'])->where([['stu_payment_status', 1]]);
        $nodal_id     = Auth::guard('nodalcentre')->user()->id;
        $applications = $application->where('nodal_id', $nodal_id)->whereIn('application_status', [2, 4, 5, 6, 7, 8, 9, 10, 11, 12])->where('deleted_at', null)->get();
        // $applications = Helpers::allApplications();
        $app_status = Helpers::appStatus();
        return view('nodalcentre.application.all-application', compact('applications', 'app_status'));
    }

    /**
     * Method singleApplication
     * @param $id $id [explicite description]
     * @author AlokDas
     * @return void
     */
    public function singleApplication($id)
    {
        $student = PhdApplicationInfo::select('phd_application_info.*', 'nodal_centres.college_name')
            ->join('nodal_centres', 'phd_application_info.nodal_id', 'nodal_centres.id')
            ->where('phd_application_info.id', $id)
            ->first();
        $supervisor             = PhdSupervisor::where('appl_id', $id)->first();
        $student_qualifications = StudentQualification::where('appl_id', $id)->get();
        $organisation           = Organisation::where('appl_id', $id)->get();
        $applicationStatus      = Helpers::applicationStatus($id);
        $transaction_history    = DB::table('transaction_history')
            ->where('appl_id', $id)
            ->first(['transaction_id']);
        $documents      = PhdOtherDocument::where('appl_id', $id)->get();
        $domain_experts = DSCExperts::where('appl_id', $id)->with('getProfessorDetails')->get()->map(function ($r) {
            $designation_array = ['', 'Professor', 'Associate Professor', 'Chairperson', 'Co-Chairperson'];
            return [
                'professor_id' => $r->getProfessorDetails->professor_id ?? '',
                'name'         => $r->getProfessorDetails->name ?? '',
                'designation'  => $r->getProfessorDetails->designation ? $designation_array[$r->getProfessorDetails->designation] : '',
                'address'      => $r->getProfessorDetails->address ?? '',
                'email_id'     => $r->getProfessorDetails->email_id ?? '',
                'contact_no'   => $r->getProfessorDetails->contact_no ?? '',
            ];
        });
        $tbl_remarks = TblRemarks::where('appl_id', $id)->first();

        return view('nodalcentre.application.single-application', compact('student', 'supervisor', 'student_qualifications', 'organisation', 'applicationStatus', 'transaction_history', 'documents', 'domain_experts', 'tbl_remarks'));
    }

    /**
     * Method applicationInvoice
     * @param Request $request [explicite description]
     * @return void
     */
    public function applicationInvoice(Request $request)
    {
        $student     = PhdApplicationInfo::find($request->id);
        $transaction = DB::table('transaction_history')->where('appl_id', $request->id)->first();
        $data        = array(
            'payment_for'      => 'PHD Application Fee',
            'name'             => $student->name,
            'regd_no'          => $student->registration_no,
            'transaction_id'   => $transaction->transaction_id,
            'en_no'            => $student->enrollment_no,
            'transaction_date' => $transaction->transaction_date,
            'amount'           => $transaction->amount,
        );
        return response()->json($data);
    }

    /**
     * Method renewalRequest
     * renewal
     * @return void
     */
    public function renewalRequest()
    {
        $value = RenewalRegistration::all();
        return view('nodalcentre.application.renewal_request', compact('value'));
    }

    /**
     * Method renewalRegistration
     * @param $id $id [explicite description]
     * @return void
     */
    public function renewalRegistration($id)
    {
        $nodal_centre = NodalCentre::all();
        $value        = RenewalRegistration::find($id);
        return view('nodalcentre.application.renewal_registration', compact('nodal_centre', 'value'));
    }

    /**
     * Method renewalRegistrationStore
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @return void
     */
    public function renewalRegistrationStore(Request $request, $id)
    {
        $value                      = RenewalRegistration::find($id);
        $value->status              = $request->status;
        $value->remark_nodal_center = $request->remark_nodal_center;
        $value->save();
        return redirect('nodalcentre/renewal-request')->with('message', 'The form has been submitted successfully!');
    }

    // =====================================

    /**
     * Method nodal_semester_list
     * @return void
     */
    public function nodal_semester_list()
    {
        // return 1;
        //return Auth::guard('student')->user()->id;
        $semister_list = DB::table('phd_semister_registration as psr')
            ->whereNotNull('semester')->get();
        $semester_details = [];
        if (count($semister_list) > 0) {
            foreach ($semister_list as $value) {
                $p_info                  = PhdApplicationInfo::select('student_category', 'enrollment_no', 'name', 'enrollment_date')->where('stud_id', $value->stud_id)->orderby('id', 'desc')->first();
                $value->enrollment_no    = $p_info->enrollment_no;
                $value->enrollment_date  = $p_info->enrollment_date;
                $value->name             = $p_info->name;
                $value->student_category = $p_info->student_category;
                $semester_details[]      = $value;

            }
        }

        // return $value;
        //return $semester_details[0]['semester_list_new']->semester;
        //PhdApplicationInfo::select()->where
        // $app_info = $semister_list = DB::table('phd_semister_registration as psr')

        return view('nodalcentre.semester.index', compact('semester_details'));
    }

    /**
     * Method nodal_semester_view
     * @param $id $id [explicite description]
     * @return void
     */
    public function nodal_semester_view($id)
    {
        $phd_semister_registration = DB::table('phd_semister_registration as psr')
        // ->select('psr.*','pai.academic_programme','d.departments_title','d.id')
        // ->leftJoin('phd_application_info as pai','department as d','pai.academic_programme','=','d.id')
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

        $list_of_coursework = [];

        foreach ($course_list as $key => $value) {
            $data = Coursework::where('course_id', $value)->first(['course_name', 'credit']);

            // $value->list = $data->course_name;
            // $value->credit =  $data->credit;
            // $value->status =  $course_status[$key];
            $list_of_coursework[] = array(
                'list'   => $data->course_name,
                'credit' => $data->credit,
                'status' => $course_status[$key],
            );
        }
        // return $list_of_coursework;
        //return $list_of_coursework[0]['list'];

        // $info = Student::select('students.registration_no', 'students.registration_date', 'p.ncr_department', 'p.enrollment_no', 'p.name', 'p.enrollment_date','p.title_phd_work','ps.supervisor_name','nodal.college_name','nodal.id as nod_id')
        // ->leftJoin('phd_application_info as p', 'students.id', '=', 'p.stud_id')
        // ->leftJoin('nodal_centres as nodal', 'nodal.id', '=', 'p.nodal_id')
        // //->leftJoin('phd_semister_registration as psr', 'psr.semister_reg_id', '=', 'p.nodal_id')
        // ->leftJoin('phd_supervisors as ps', 'ps.appl_id', '=', 'p.id')->orderby('p.id', 'desc')
        // ->where('students.id',$stud_id)->first();
        return view('nodalcentre.semester.phd_semesterform', compact('phd_semister_registration', 'reg_details', 'list_of_coursework'));
    }

    /**
     * Method semester_status
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @return void
     */
    public function semester_status(Request $request, $id)
    {
        //return $request;

        DB::table('phd_semister_registration')
            ->where('semister_reg_id', $id)
            ->update(
                [
                    'nodal_status' => $request->nod_sem_approve,
                    'nodal_remark' => $request->nod_remarks,

                ]
            );

        return redirect()->route('nodalcentre.semester.list');

    }

    /**
     * Method sup_semester_list
     * @return void
     */
    public function sup_semester_list()
    {
        //return Auth::guard('supervisor')->id();
        $nodal_id = Auth::guard('nodalcentre')->id();
         $stu_sem_repo = DB::table('semester_progress_reports')
            ->whereIn('status', [2,4,5,6,7,8,9,10])
            ->where('nodal_center', $nodal_id)
            ->get();

        return view('nodalcentre.semester.report.semester-progress-listing', compact('stu_sem_repo'));
    }

    /**
     * Method sup_semester_view
     * @param $id $id [explicite description]
     * @return void
     */
    public function sup_semester_view($id)
    {
        $stu_id               = SemesterProgressReport::find($id)->pluck('stud_id')->first();
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

        return view('nodalcentre.semester.report.semester-progress-view', compact('student_sem_detaills', 'sem_publication', 'supervisor', 'id', 'cosupervisor'));
    }

    /**
     * Method sup_semester_store
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @return void
     */
    public function sup_semester_store(Request $request, $id)
    {
        //return $request;
        $upload_dsc_letter = '';
        if ($request->hasFile('dsc_letter')) {
            $data = $request->file('dsc_letter');
            $extension = $data->getClientOriginalExtension();
            $filename = time() .'dsc_letter' . '.' . $extension;
            $path = public_path('upload/semester_prog_dsc_letter/');
            $upload_success = $data->move($path, $filename);
            $upload_dsc_letter = '/upload/semester_prog_dsc_letter/' . $filename;
        }
        $student_details = DB::table('semester_progress_reports')
            ->where('id', $id)
            ->update([
                'status' => $request->status,
                'nodal_remark' => $request->remark,
                'dsc_file' => $upload_dsc_letter,
            ]);

        return redirect()->route('nodalcentre.nod.semester.list');
    }
    //-------------------------------------------

    /**
     * Method discontinueRequest
     * discontinuation as phd
     * @return void
     */
    public function discontinueRequest()
    {
        $value = PhdDiscontinuation::all();
        return view('nodalcentre.application.discontinue_request', compact('value'));
    }

    /**
     * Method discontinueRegistration
     * @param $id $id [explicite description]
     * @return void
     */
    public function discontinueRegistration($id)
    {
        $nodal = NodalCentre::select('nodal_centres.college_name', 'p.present_center')
            ->leftJoin('phd_discontinuations as p', 'nodal_centres.id', '=', 'p.present_center')->orderby('p.id', 'desc')
            ->first();
        $value = PhdDiscontinuation::find($id);
        return view('nodalcentre.application.discontinue_registration', compact('nodal', 'value'));
    }

    /**
     * Method discontinueRegistrationStore
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @return void
     */
    public function discontinueRegistrationStore(Request $request, $id)
    {
        //return $request;
        $value                      = PhdDiscontinuation::find($id);
        $value->status              = $request->status;
        $value->remark_nodal_center = $request->remark_nodal_center;
        $value->save();
        return redirect('nodalcentre/discontinue-request')->with('message', 'The form has been submitted successfully!');
    }

    //Domain Expert code
    /**
     * Method domainRequest
     * @return void
     */
    public function domainRequest()
    {
        $nodal = NodalCentre::select('nodal_centres.college_name', 'd.name_of_ncr')
            ->leftJoin('dsc_domain_expert as d', 'nodal_centres.id', '=', 'd.name_of_ncr')
            ->first();
        $value = DscDomainExpert::all();
        return view('nodalcentre.semester.domain_expert', compact('value', 'nodal'));
    }

    /**
     * Method domainRemark
     * @param $id $id [explicite description]
     * @return void
     */
    public function domainRemark($id)
    {
        $nodal = DscDomainExpert::select('dsc_domain_expert.name_of_ncr', 'dsc_domain_expert.name_of_ncr', 'dsc_domain_expert.student_name', 'dsc_domain_expert.enrollment_no', 'dsc_domain_expert.title_of_rearch_work', 'dsc_domain_expert.faculty_of_branch', 'dsc_domain_expert.request_status', 'dsc_domain_expert.ncr_remark', 'dsc_domain_expert.dsc_id', 'nodal_centres.college_name', 'dsc_domain_expert.vc_remark')
            ->leftJoin('nodal_centres', 'nodal_centres.id', '=', 'dsc_domain_expert.name_of_ncr')->orderby('dsc_domain_expert.dsc_id', 'asc')
            ->where('dsc_domain_expert.dsc_id', $id)
            ->first();
        //$value = DscDomainExpert::find($id);
        $expert = DomainExpertList::all();
        return view('nodalcentre.semester.domain_expert_list', compact('nodal', 'expert'));
    }

    /**
     * Method domainRemarkStore
     * @param $id $id [explicite description]
     * @param Request $request [explicite description]
     * @return void
     */
    public function domainRemarkStore($id, Request $request)
    {
        //return $request;
        $value = DB::table('dsc_domain_expert')->where('dsc_id', $id)->update(
            ['request_status' => $request->request_status,
                'ncr_remark'      => $request->ncr_remark]);
        return redirect('nodalcentre/domain-request')->with('message', 'The form has been submitted successfully!');
    }

    /**
     * Method special_leave_listing
     * @return void
     */
    public function special_leave_listing()
    {
        //return 1;
        $leave_list = PhdStudentMaternityLeave::where('supervisor_status', 1)->get();
        return view('nodalcentre.leave.index', compact('leave_list'));
    }

    /**
     * Method special_leave_view
     * @param $id $id [explicite description]
     * @return void
     */
    public function special_leave_view($id)
    {
        //return $id;
        $student = PhdStudentMaternityLeave::where('id', $id)->first();
        return view('nodalcentre.leave.special_leave_view', compact('student'));
    }

    /**
     * Method special_leave_status
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @return void
     */
    public function special_leave_status(Request $request, $id)
    {
        //return $id;
        DB::table('phd_student_maternity_leaves')
            ->where('id', $id)
            ->update([
                'nodal_status' => $request->sup_leav_approve,
                'nodal_remark' => $request->sem_remarks,
            ]);
        return redirect()->route('nodalcentre.leave.list');
    }
//change research supervisor/ co-supervisor

    /**
     * Method change_supervisor_request
     * @return void
     */
    public function change_supervisor_request()
    {
        $value = ChangeResearchSupervisor::all();
        return view('nodalcentre.application.change_supervisor_request', compact('value'));
    }

    /**
     * Method view_change_supervisor
     * @param $id $id [explicite description]
     * @return void
     */
    public function view_change_supervisor($id)
    {
        $value = ChangeResearchSupervisor::select(['change_research_supervisor_name.*', 'nodal_centres.*', 'supervisors.*'])
            ->where('change_research_supervisor_name.res_ch_id', $id)
            ->leftJoin('nodal_centres', 'change_research_supervisor_name.name_of_ncr', '=', 'nodal_centres.id')
            ->leftJoin('supervisors', 'supervisors.id', '=', 'change_research_supervisor_name.present_research_supervisor')
            ->first();
        $std = Student::select('students.registration_date', 'c.student_id', 'p.enrollment_date', 'p.name_of_faculty', 'p.enrollment_no')
            ->leftjoin('change_nodal_center as c', 'students.id', '=', 'c.student_id')->orderby('c.id', 'desc')
            ->leftjoin('phd_application_info as p', 'c.student_id', '=', 'p.stud_id')
            ->first();

        // dd(ChangeResearchSupervisor::where(['res_ch_id' => $id])->with(['get_present_supervisor_details', 'get_proposed_supervisor_details', 'get_nodal_center_details:id,college_name'])->get()->toArray());
        return view('nodalcentre.application.change_supervisor_view', compact('value', 'std'));
    }

    /**
     * Method change_supervisor_remark
     * @param $id $id [explicite description]
     * @param Request $request [explicite description]
     * @return void
     */
    public function change_supervisor_remark($id, Request $request)
    {
        //return $request;
        $value = DB::table('change_research_supervisor_name')->where('res_ch_id', $id)->update(
            ['status'    => $request->status,
                'dsc_remark' => $request->dsc_remark]);
        return redirect('nodalcentre/change_supervisor')->with('message', 'The form has been submitted successfully!');
    }

    /**
     * Method extention_listing
     * @return void
     */
    public function extention_listing()
    {
        $student = Helpers::ExtensionWork();
        return view('nodalcentre.ext_complete_work.index', compact('student'));
    }

    /**
     * Method extention_work_view
     * @param $id $id [explicite description]
     * @return void
     */
    public function extention_work_view($id)
    {
        //return $id;
        $student = DB::table('extention_complete_works  as ecw')->select('ecw.*', 'n.college_name')
            ->Join('nodal_centres as n', 'n.id', '=', 'ecw.nodal_center')
            ->where('ecw.id', $id)
            ->first();
        $comp_not_compl = $student->component_not_completed;
        $comp_not_compl = explode(',', $comp_not_compl);

        return view('nodalcentre.ext_complete_work.extensiton_work_view', compact('student', 'comp_not_compl'));
    }

    /**
     * Method extention_work_status
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @return void
     */
    public function extention_work_status(Request $request, $id)
    {
        $student = DB::table('extention_complete_works')->where('id', $id)
            ->update([
                'application_status' => $request->sup_leav_approve,
                'nodal_remark'       => $request->sem_remarks,
            ]);
        return redirect()->route('nodalcentre.extention.work.listing');
    }

    /**
     * Method viewCoursework
     * Coursework at nodalcenter
     * @param $id $id [explicite description]
     * @author UrmilaSwain
     * @return void
     */
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
        $data['submitted']          = $coursework_subjects->isNotEmpty() ? 1 : 0;
        $data['coursework_remarks'] = TblCourseWorksApplicationRemarks::where('appl_id', $data['details']->appl_id)->get();

        // dd($data['coursework_remarks']->toArray());
        return view("nodalcentre.coursework.view_coursework")->with($data);
    }

    /**
     * Method viewCourseworkSubmit
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function viewCourseworkSubmit(Request $request)
    {
        try {
            //return $request;
        
            foreach ($request->subject_code as $key => $value) {
                $insert_subject_data[$key] = [
                    'appl_id'      => $request->appl_id,
                    'subject_code' => $value,
                    'course_title' => $request->course_title[$key],
                    'credits'      => $request->credit[$key],
                    'remarks'      => $request->sub_remark[$key],
                ];
            }
            $coursework_status = CourseWorkSubjects::insert($insert_subject_data);
            if ($coursework_status) {
                // Get all the 6 dsc infos to make the Login process by passing appl id
                 $dsc           = Helpers::getChairpersons($request->appl_id);
                $course_sub_id = PhdCourseWorks::where('appl_id', $request->appl_id)->first()->id;
                $role_array    = [0, 14, 5, 3, 3, 2, 16];
                $ncr_id        = Auth::guard('nodalcentre')->user()->id;
                $key = 0;
                for ($i = 0; $i < count($dsc); $i++) {
                    $key                                      = $key + 1;
                    $insert_remarks_data[$i]['appl_id']       = $request->appl_id;
                    $insert_remarks_data[$i]['course_sub_id'] = $course_sub_id;
                    $insert_remarks_data[$i]['ncr_id']        = $ncr_id;
                    $insert_remarks_data[$i]['user_type']     = $role_array[$key];
                    $insert_remarks_data[$i]['user_id']       = $dsc['dsc' . $key] ?? 2;
                    $insert_remarks_data[$i]['dsc_type']      = $key;
                }

                 $subjectRemarks = TblCourseWorksApplicationRemarks::insert($insert_remarks_data);
                if ($subjectRemarks) {
                    return redirect()->route('nodalcentre.applied-application');
                } else {
                    return redirect()->route('nodalcentre.view-coursework', ['id' => $request->coursework_id])->with(['warning' => 'Error: Course work remarks was not added.']);
                }
            } else {
                return redirect()->route('nodalcentre.view-coursework', ['id' => $request->coursework_id])->with(['warning' => 'Error: Course subjects was not added.']);
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }
    public function viewCourseworkUpdate(Request $request){
        //return $request;
        $upload_dsc_letter = '';
        if ($request->hasFile('dsc_letter')) {
            $data = $request->file('dsc_letter');
            $extension = $data->getClientOriginalExtension();
            $filename = time() .'dsc_letter' . '.' . $extension;
            $path = public_path('upload/dsc_coursework_letter/');
            $upload_success = $data->move($path, $filename);
            $upload_dsc_letter = '/upload/dsc_coursework_letter/' . $filename;
            // $value->grade_sheet = $upload_gradesheet;
        }
        $update_data = [
            'status'  => $request->ncr_recommendation_status,
            'nodal_comment' => $request->coursework_nodal_remarks,
            'dsc_letter' =>$upload_dsc_letter,
        ];
    
        $result = PhdCourseWorks::where('id', $request->coursework_id)->update($update_data);
        $message = 'Status updated successfully';
        return redirect()->route('nodalcentre.applied-application')->with(['data' => $result, 'message' => $message]);    
    }
    public function dscCourseworkLetter($id){
        $data['details']    = PhdCourseWorks::where('id', $id)->first();
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
            $totalCredits = 0;
        
            foreach ($coursework_subjects as $subject) {
                $totalCredits += $subject->credits;
            }
            $data['totalCredits'] = $totalCredits;
            $pdf = \PDF::loadView("nodalcentre.coursework.dsc_recommendation_letter", $data);
            return $pdf->download('dsc_recommendation_letter.pdf');
            // return view("nodalcentre.coursework.dsc_recommendation_letter")->with($data);
       }
       public function dscSemesterLetter($id){
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

          $sem_publication = SemesterPublication::where('prog_repo_id', $id)->get();
          $pdf = \PDF::loadView('nodalcentre.semester.sem_progess_dsc_letter', compact('student_sem_detaills', 'supervisor', 'cosupervisor', 'sem_publication'));
          return $pdf->download('sem_progess_dsc_letter.pdf');
       }
       //Semester registration at nodal center
       public function phd_semester_register(){
        $nodal_id = Auth::guard('nodalcentre')->id();
            $info = DB::table('semester_payments as p')->select('i.enrollment_no', 'i.name', 's.semester', 's.status', 'p.id as app_id')
            ->leftJoin('semester_regisration_statuses as s', 's.sem_payment_id', '=', 'p.id')
            ->leftJoin('phd_application_info as i', 'i.id', '=', 's.appl_id')
            ->where('i.nodal_id', $nodal_id)
            ->whereIn('s.status', [2,4,5,6,7,8,9,10])
            ->get();
            return view('nodalcentre.semester.semester_register', compact('info'));
       }
       public function phd_semester_register_view($id, Request $request){
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
        return view('nodalcentre.semester.semester_register_view', compact('coursework_sub', 'info', 'payment_details','payemt_status', 'id'));
       }
       public function phd_semester_register_store(Request $request, $id){
        //return $request;
        $reg_details = DB::table('semester_regisration_statuses')
            ->where('sem_payment_id', $id)
            ->update([
                'ncr_cert'    => $request->ncr_cert,
                'status'    => $request->status,
                'ncr_remark'    => $request->ncr_remark,
            ]); 

        return redirect()->route('nodalcentre.semester-register')->with('success', 'your form has successfully submitted');
       }
        //provisional registration
    public function provisionalRegList(){
        $user_id  = session('userdata')['userID'];
        $provision = DB::table('provisional_registrations as p')->select('i.enrollment_no', 'i.name', 'p.id as app_id', 'p.status')->leftJoin('phd_application_info as i', 'p.appl_id', '=', 'i.id')
        ->leftJoin('phd_supervisors as s', 's.appl_id', '=', 'i.id')
        ->whereIn('p.status', [2,6,7,8,9,10,11,12,13,14,15])
        ->where('i.nodal_id', $user_id)
        ->get();
        return view('nodalcentre.provisional-reg.provisional_reg_list', compact('provision'));
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
        
        return view('nodalcentre.provisional-reg.provisional_reg_view', compact('info', 'coursework_sub', 'provisional', 'id'));
    }
    public function provisionRegSubmit(Request $request, $id){
        //return $request;
        $prov_status = DB::table('provisional_registrations')->select('status')->where('id', $id)->first();
        $date = Carbon::now()->format('Y-m-d');
        if ($file = $request->file('dsc_signed_cert')) {
            $data           = $request->file('dsc_signed_cert');
            $extension      = $data->getClientOriginalExtension();
            $filename       = time() . uniqid(rand()) . 'dsc_signed_cert' . '.' . $extension;
            $path           = public_path('upload/provisional_dsc_letter/');
            $upload_success = $data->move($path, $filename);
            $upload_file    = '/upload/provisional_dsc_letter/' . $filename;
        }
        if($prov_status->status == 9){
            $student_details = DB::table('provisional_registrations')
            ->where('id', $id)
            ->update([
                'status'    => $request->status,
                'ncr_remark'    => $request->ncr_remark,
            ]);
        } else{
            $student_details = DB::table('provisional_registrations')
            ->where('id', $id)
            ->update([
                'dsc_approve_date' => $date,
                'dsc_signed_cert' => $upload_file,
                'status'    => $request->status,
                'ncr_remark'    => $request->ncr_remark,
            ]);
        }
        
        return redirect()->route('nodalcentre.provisional-registration-list')->with('success', 'you form has been successfully submitted.');
    }
    public function provisionalDscLetter($id){
        $provisional = DB::table('provisional_registrations')->where('id', $id)->first();
        $info = Student::select('students.registration_no', 'students.registration_date', 'p.ncr_department', 'p.enrollment_no', 'p.name', 'p.enrollment_date', 'p.topic_of_phd_work', 'ps.supervisor_name', 'nodal.college_name', 'nodal.id as nod_id', 'd.departments_title', 'p.id as appl_id', 'students.father_husband','p.permannt_address', 'p.name_of_faculty', 'p.dob', 'p.category', 'p.student_category')
            ->leftJoin('phd_application_info as p', 'students.id', '=', 'p.stud_id')
            ->leftJoin('nodal_centres as nodal', 'nodal.id', '=', 'p.nodal_id')
            ->rightJoin('departments as d', 'd.id', '=', 'p.academic_programme')
            ->leftJoin('phd_supervisors as ps', 'ps.appl_id', '=', 'p.id')->orderby('p.id', 'desc')
            ->where('students.id', $provisional->stud_id)->first();
        $coursework_sub = DB::table('tbl_course_work_subjects as c')->where('appl_id', $info->appl_id)->get();
        $pdf = \PDF::loadView("nodalcentre.provisional-reg.provision_dsc_letter", compact('provisional', 'info', 'coursework_sub'));
            return $pdf->download('provisional_dsc_letter.pdf');
    }
}
