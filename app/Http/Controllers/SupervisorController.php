<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\ChangeNodalCenter;
use App\Models\ChangeResearchSupervisor;
use App\Models\Department;
use App\Models\DetailsOfSupervisor;
use App\Models\DetailsPublicationJournals;
use App\Models\DomainExpertList;
use App\Models\DscDomainExpert;
use App\Models\NodalCentre;
use App\Models\Organisation;
use App\Models\OtherSimilarTest;
use App\Models\PhdApplicationInfo;
use App\Models\PhdDiscontinuation;
use App\Models\PhdOtherDocument;
use App\Models\PhdStudentMaternityLeave;
use App\Models\PhdSupervisor;
use App\Models\PublicationJournals;
use App\Models\RenewalRegistration;
use App\Models\SemesterProgressReport;
use App\Models\SemesterPublication;
use App\Models\Student;
use App\Models\StudentQualification;
use App\Models\Supervisor;
use App\Models\SupervisorApplicationInfo;
use App\Models\SupervisorEmployment;
use App\Models\SupervisorQualification;
use App\Models\User;
use App\Models\VcApprovedDomain;
use App\Models\CourseWorkSubjects;
use App\Models\TblCourseWorksApplicationRemarks;
use Auth;
use DSCExperts;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use PhdCourseWorks;
use TblRemarks;

//use Carbon\Carbon;
//use Illuminate\Support\Facades\Session;
//use Psy\SuperglobalsEnv;

class SupervisorController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $title          = "supervisors";
        $page_title     = "View supervisors";
        $sub_page_title = "View supervisors";
        return view('frontend.supervisors.index', compact('title', 'sub_page_title', 'page_title'));
    }

    public function create(Request $request)
    {
        return view('frontend.supervisors.create');
    }

    public function quali_certi(Request $request)
    {
        if ($request->hasFile('file')) {
            $avatarPath = $request->file('file');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path       = $request->file('file')->move('upload/supervisor/qualification', $avatarName);
            $img_path   = 'upload/supervisor/qualification/' . $avatarName;
            return response()->json([
                'img_path' => $img_path,
                'img_name' => $avatarName,
            ]);
        };
    }

    public function sup_delete_quali_certi(Request $request)
    {
        //return $request;
        $SupervisorQualification = SupervisorQualification::find($request->id);
        $SupervisorCerti         = $SupervisorQualification->certificate;
        unlink("upload/supervisor/qualification/" . $SupervisorCerti);
        // unlink("uploads/".$image->image_name);
        // unlink(substr($prsImage, 1));

        $dlt_qual = SupervisorQualification::find($request->id);
        $dlt_qual->delete();
        $QualDetail = SupervisorQualification::where('sup_id', $request->sup_id)->get();
        return response()->json($QualDetail);
    }

    public function sup_delete_employment(Request $request)
    {
        //return $request;
        $SupervisorEmployment = SupervisorEmployment::find($request->id);
        $SupervisorCerti      = $SupervisorEmployment->employment_cerificate;
        unlink("upload/phdsupervisor/" . $SupervisorCerti);
        // unlink("uploads/".$image->image_name);
        // unlink(substr($prsImage, 1));

        $dlt_qual = SupervisorEmployment::find($request->id);
        $dlt_qual->delete();
        $QualDetail = SupervisorEmployment::where('sup_id', $request->sup_id)->get();
        return response()->json($QualDetail);
    }
    public function sup_delete_publication(Request $request)
    {
        //return $request;
        $PublicationJournals = PublicationJournals::find($request->id);
        $SupervisorCerti     = $PublicationJournals->frontpage_cover;
        unlink("upload/supervisor_publish/" . $SupervisorCerti);
        // unlink("uploads/".$image->image_name);
        // unlink(substr($prsImage, 1));

        $dlt_qual = PublicationJournals::find($request->id);
        $dlt_qual->delete();
        $QualDetail = PublicationJournals::where('sup_id', $request->sup_id)->get();
        return response()->json($QualDetail);
    }
    public function sup_del_pub_detail(Request $request)
    {
        //return $request;
        $DetailsPublicationJournals = DetailsPublicationJournals::find($request->id);
        $SupervisorCerti            = $DetailsPublicationJournals->book_cover;
        unlink("upload/supervisor_publish/" . $SupervisorCerti);
        // unlink("uploads/".$image->image_name);
        // unlink(substr($prsImage, 1));

        $dlt_qual = DetailsPublicationJournals::find($request->id);
        $dlt_qual->delete();
        $QualDetail = DetailsPublicationJournals::where('sup_id', $request->sup_id)->get();
        return response()->json($QualDetail);
    }
    public function sup_other_test_del(Request $request)
    {
        //return $request;

        $dlt_qual = OtherSimilarTest::find($request->id);
        $dlt_qual->delete();
        $QualDetail = OtherSimilarTest::where('sup_id', $request->sup_id)->get();
        return response()->json($QualDetail);
    }

    public function store(Request $request)
    {
        //return $request;

        $user_id = session('userdata')['userID'];

        if ($request->hasFile('aadhar_card_certi')) {
            $aadharPath = $request->file('aadhar_card_certi');
            $aadharName = time() . '.' . $aadharPath->getClientOriginalExtension();
            $path       = $request->file('aadhar_card_certi')->move('upload/supervisor/aadhar/', $aadharName);
            $img_path   = 'upload/supervisor/aadhar/' . $aadharName;
        } else {
            $aadharName = "";
        }
        //$name_prefix = $request->name_prefix;
        //return $age = Carbon::parse($request->date_of_birth)->diff(Carbon::now())->y;
        //$date = Carbon::now()->format('d-m-Y');

        DB::table('supervisor_application_info')->insert([
            'sup_id'                   => $user_id,
            'name'                     => $request->full_name,
            'faculty'                  => $request->faculty,
            'institution_organisation' => $request->organisation,
            'present_appointment'      => $request->nature_of_appointment,
            'dob'                      => $request->date_of_birth,
            'age'                      => $request->age,
            'marital_status'           => $request->marital_status,
            'gender'                   => $request->gender,
            'permanent_address'        => $request->permanent_address,
            'correspondence_address'   => $request->correspondance_address,
            'nationality'              => $request->natinality,
            'aadhar_no'                => $request->aadhar_card_number,
            'aadhar_file'              => $aadharName,
            'disciline_specialization' => $request->discipline_specialization,
            'draft_status'             => 1,
        ]);

        return redirect()->route('sup.education.view', [$user_id])->with('success', 'you form has saved as draft please look throughly and then submit.');
    }

    public function info_draft_view($id)
    {
        //return $id;
        $supervisor = SupervisorApplicationInfo::where('sup_id', $id)->first();
        $dept       = Department::select('id', 'departments_title')->get();
        return view('admin.supervisor.supervisor_info_draft', compact('supervisor', 'id', 'dept'));
    }
    public function store_info_draft(Request $request, $id)
    {
        //return $id;
        if ($request->hasFile('aadhar_card_certi')) {
            $aadharPath = $request->file('aadhar_card_certi');
            $aadharName = time() . '.' . $aadharPath->getClientOriginalExtension();
            $path       = $request->file('aadhar_card_certi')->move('upload/supervisor/aadhar/', $aadharName);
            $img_path   = 'upload/supervisor/aadhar/' . $aadharName;
        } else {
            $aadharName = $request->aadhar_card_hid;
        }
        //$name_prefix = $request->name_prefix;
        //return $age = Carbon::parse($request->date_of_birth)->diff(Carbon::now())->y;
        //$date = Carbon::now()->format('d-m-Y');

        DB::table('supervisor_application_info')
            ->where('sup_id', $id)
            ->update([

                'name'                     => $request->full_name,
                'faculty'                  => $request->faculty,
                'institution_organisation' => $request->organisation,
                'present_appointment'      => $request->nature_of_appointment,
                'dob'                      => $request->date_of_birth,
                'age'                      => $request->age,
                'marital_status'           => $request->marital_status,
                'gender'                   => $request->gender,
                'permanent_address'        => $request->permanent_address,
                'correspondence_address'   => $request->correspondance_address,
                'nationality'              => $request->natinality,
                'aadhar_no'                => $request->aadhar_card_number,
                'aadhar_file'              => $aadharName,
                'disciline_specialization' => $request->discipline_specialization,
            ]);

        $draft_status = DB::table('supervisor_application_info')->where('sup_id', $id)->first();
        $draft_status = $draft_status->draft_status;
        if ($draft_status == 2) {
            return redirect()->route('draft.education.view', [$id])->with('success', 'you form has saved as draft please look throughly and then submit.');
        } else {
            return redirect()->route('sup.education.view', [$id])->with('success', 'you form has saved as draft please look throughly and then submit.');
        }

    }

    public function sup_education_view(Request $request, $id)
    {
        return view('admin.supervisor.supervisor_education', compact('id'));
    }

    public function store_education(Request $request, $id)
    {

        //return $request;
        //return count($request->spec);

        for ($i = 0; $i < count($request->spec); $i++) {

            if ($request->hasFile('certi')) {
                $CertificatePath = $request->file('certi')[$i];
                $CertificateName = time() . rand(1111, 9999) . '.' . $CertificatePath->extension();

                $path = $CertificatePath->move('upload/supervisor/certificates/', $CertificateName);
                //$files = $CertificateName;
            } else {
                $CertificateName = '';
            }
            if ($request->hasFile('mark')) {
                $MarkPath = $request->file('mark')[$i];
                $MarkName = time() . rand(1111, 9999) . '.' . $MarkPath->extension();
                $path     = $MarkPath->move('upload/supervisor/certificates/', $MarkName);
                //$files = $CertificateName;
            } else {
                $MarkName = '';
            }

            // $arr[] = array(
            //     'img' => $CertificateName,
            //     'img1' => $MarkName
            // );

            // if isset($CertificatePath[0])
            // return $request->file('certi')[1];
            $SupervisorQualification                   = new SupervisorQualification();
            $SupervisorQualification->sup_id           = $id;
            $SupervisorQualification->exam             = $request->exam[$i];
            $SupervisorQualification->specialization   = $request->spec[$i];
            $SupervisorQualification->board_university = $request->board[$i];
            $SupervisorQualification->year             = $request->year[$i];
            $SupervisorQualification->division         = $request->class[$i];
            $SupervisorQualification->percentage       = $request->percent[$i];
            $SupervisorQualification->certificate      = $CertificateName;
            $SupervisorQualification->marksheet        = $MarkName;
            $SupervisorQualification->save();
        }
        //return $arr;

        if ($request->hasFile('mphil_certi')) {
            $MphillPath = $request->file('mphil_certi');
            $MphillName = time() . '.' . $MphillPath->extension();
            $path       = $MphillPath->move('upload/supervisor/certificates/', $MphillName);
            //$files = $CertificateName;
        } else {
            $MphillName = '';
        }
        if ($request->hasFile('mphil_mark')) {
            $MphillMarkPath = $request->file('mphil_mark');
            $MphillMarkName = time() . '.' . $MphillMarkPath->extension();
            $path           = $MphillMarkPath->move('upload/supervisor/certificates/', $MphillMarkName);
            //$files = $CertificateName;
        } else {
            $MphillMarkName = '';
        }

        if ($request->mphil_spec) {
            DB::table('supervisor_qualifications')->insert([
                'sup_id'           => $id,
                'exam'             => $request->mphil_exam,
                'specialization'   => $request->mphil_spec,
                'board_university' => $request->mphil_board,
                'year'             => $request->mphil_year,
                'division'         => $request->mphil_class,
                'percentage'       => $request->mphil_percent,
                'certificate'      => $MphillName,
                'marksheet'        => $MphillMarkName,
            ]);
        }

        if ($request->employer_name != "") {
            for ($i = 0; $i < count($request->employer_name); $i++) {
                $SupervisorEmployment                        = new SupervisorEmployment();
                $SupervisorEmployment->sup_id                = $id;
                $SupervisorEmployment->name                  = $request->employer_name[$i];
                $SupervisorEmployment->address               = $request->employer_address[$i];
                $SupervisorEmployment->designation           = $request->employer_designation[$i];
                $SupervisorEmployment->pay_scale             = $request->pay_scale[$i];
                $SupervisorEmployment->from                  = $request->date_from[$i];
                $SupervisorEmployment->to                    = $request->date_upto[$i];
                $SupervisorEmployment->type                  = $request->employer_type[$i];
                $SupervisorEmployment->appointment_date      = $request->appointment_date[$i];
                $SupervisorEmployment->employment_cerificate = $request->exp_hid_certi[$i];
                $SupervisorEmployment->save();

            }
        }

        $student_details = DB::table('supervisor_application_info')
            ->where('sup_id', $id)
            ->update([
                'teaching_experience'    => $request->teaching_exp,
                'research_experience'    => $request->research_exp,
                'post_phd_experience'    => $request->phd_exp,
                'recognised_institution' => $request->full_time_total_exp,
                'draft_status'           => 2,
                'title_phd_thesis'       => $request->phd_thesis,

            ]);

        return redirect()->route('sup.journal.view', [$id])->with('success', 'you form has saved as draft please look throughly and then submit.');
    }

    public function draft_education_view($id)
    {
        $supervisors             = SupervisorApplicationInfo::where('sup_id', $id)->first();
        $SupervisorQualification = SupervisorQualification::where('sup_id', $id)->get();
        $SupervisorEmployment    = SupervisorEmployment::where('sup_id', $id)->get();
        return view('admin.supervisor.supervisor_education_draft', compact('id', 'supervisors', 'SupervisorEmployment', 'SupervisorQualification'));
    }

    public function draft_store_education(Request $request, $id)
    {
        for ($i = 0; $i < count($request->spec); $i++) {

            // if ($request->hasFile('certi')) {
            //     $CertificatePath = $request->file('certi')[$i];
            //     $CertificateName =time() .rand(1111, 9999). '.' . $CertificatePath->extension();

            //     $path = $CertificatePath->move('upload/supervisor/certificates/', $CertificateName);
            //     //$files = $CertificateName;
            // } else {
            //     $CertificateName = '';
            // }
            // if ($request->hasFile('mark')) {
            //     $MarkPath = $request->file('mark')[$i];
            //     $MarkName = time() .rand(1111, 9999). '.' . $MarkPath->extension();
            //     $path = $MarkPath->move('upload/supervisor/certificates/', $MarkName);
            //     //$files = $CertificateName;
            // } else {
            //     $MarkName = '';
            // }

            // $arr[] = array(
            //     'img' => $CertificateName,
            //     'img1' => $MarkName
            // );

            // $SupervisorQualification = SupervisorQualification::where('sup_id',$id)->get();
            // $SupervisorQualification->sup_id           = $id;
            // $SupervisorQualification->exam             = $request->exam[$i];
            // $SupervisorQualification->specialization   = $request->spec[$i];
            // $SupervisorQualification->board_university = $request->board[$i];
            // $SupervisorQualification->year             = $request->year[$i];
            // $SupervisorQualification->division         = $request->class[$i];
            // $SupervisorQualification->percentage       = $request->percent[$i];
            // $SupervisorQualification->certificate      = $CertificateName;
            // $SupervisorQualification->marksheet        = $MarkName;
            // $SupervisorQualification->save();
        }

        if ($request->employer_name) {
            for ($i = 0; $i < count($request->employer_name); $i++) {
                $SupervisorEmployment                        = new SupervisorEmployment();
                $SupervisorEmployment->sup_id                = $id;
                $SupervisorEmployment->name                  = $request->employer_name[$i];
                $SupervisorEmployment->address               = $request->employer_address[$i];
                $SupervisorEmployment->designation           = $request->employer_designation[$i];
                $SupervisorEmployment->pay_scale             = $request->pay_scale[$i];
                $SupervisorEmployment->from                  = $request->date_from[$i];
                $SupervisorEmployment->to                    = $request->date_upto[$i];
                $SupervisorEmployment->type                  = $request->employer_type[$i];
                $SupervisorEmployment->appointment_date      = $request->appointment_date[$i];
                $SupervisorEmployment->employment_cerificate = $request->exp_hid_certi[$i];
                $SupervisorEmployment->save();

            }
        }

        $student_details = DB::table('supervisor_application_info')
            ->where('sup_id', $id)
            ->update([
                'teaching_experience'    => $request->teaching_exp,
                'research_experience'    => $request->research_exp,
                'post_phd_experience'    => $request->phd_exp,
                'recognised_institution' => $request->full_time_total_exp,
                'title_phd_thesis'       => $request->phd_thesis,
            ]);

        $draft_status = DB::table('supervisor_application_info')->where('sup_id', $id)->first();
        $draft_status = $draft_status->draft_status;
        if ($draft_status == 3) {
            return redirect()->route('journal.draft.view', [$id])->with('success', 'you form has saved as draft please look throughly and then submit.');
        } else {
            return redirect()->route('sup.journal.view', [$id])->with('success', 'you form has saved as draft please look throughly and then submit.');
        }
        return view('admin.supervisor.supervisor_journal', compact('id'));
    }

    public function sup_journal_view($id)
    {
        //return $id;
        return view('admin.supervisor.supervisor_journal', compact('id'));
    }
    public function journal_draft_view($id)
    {
        //return $id;
        $supervisors                = SupervisorApplicationInfo::where('sup_id', $id)->first();
        $PublicationJournals        = PublicationJournals::where('sup_id', $id)->get();
        $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id', $id)->get();
        // $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id',$id)->get();
        $OtherSimilarTest    = OtherSimilarTest::where('sup_id', $id)->get();
        $DetailsOfSupervisor = DetailsOfSupervisor::where('sup_id', $id)->first();
        return view('admin.supervisor.supervisor_journal_draft', compact('id', 'PublicationJournals', 'DetailsPublicationJournals', 'OtherSimilarTest', 'DetailsOfSupervisor', 'supervisors'));
    }

    public function journal_draft_store(Request $request, $id)
    {

        if ($request->hasFile('employee_certificate_file')) {
            $data                 = $request->file('employee_certificate_file');
            $extension            = $data->getClientOriginalExtension();
            $filename             = time() . uniqid(rand()) . 'emp_cert_' . '.' . $extension;
            $path                 = public_path('upload/employee_certificate/');
            $upload_success       = $data->move($path, $filename);
            $employee_certificate = $filename;
        } else {
            $employee_certificate = $request->employee_hid_certificate;
        }

        if ($request->hasFile('upload_photo_file')) {
            $data           = $request->file('upload_photo_file');
            $extension      = $data->getClientOriginalExtension();
            $filename       = time() . uniqid(rand()) . 'emp_photo_' . '.' . $extension;
            $path           = public_path('upload/employee_photo/');
            $upload_success = $data->move($path, $filename);
            $employee_photo = $filename;
        } else {
            $employee_photo = $request->upload_hid_photo;
        }
        // return 1;

        DB::table('supervisor_application_info')
            ->where('sup_id', $id)
            ->update([
                'employer_certificate' => $employee_certificate,
                'photo'                => $employee_photo,
                'no_papers_journals'   => $request->total_journals_paper,

            ]);
        if ($request->best_three_title_of_paper) {
            for ($i = 0; $i < count($request->best_three_title_of_paper); $i++) {
                $PublicationJournals                  = new PublicationJournals();
                $PublicationJournals->sup_id          = $id;
                $PublicationJournals->title           = $request->best_three_title_of_paper[$i];
                $PublicationJournals->author          = $request->best_three_paper_authors[$i];
                $PublicationJournals->name_of_journal = $request->best_three_journal_name[$i];
                $PublicationJournals->vol_year_page   = $request->best_three_vol_year_page[$i];
                $PublicationJournals->indexing        = $request->best_three_indexing[$i];
                $PublicationJournals->frontpage_cover = $request->journal_uplaod_hid[$i];
                $PublicationJournals->save();

            }
        }

        if ($request->atleast_one_title_of_paper) {

            for ($i = 0; $i < count($request->atleast_one_title_of_paper); $i++) {
                $DetailsPublicationJournals                  = new DetailsPublicationJournals();
                $DetailsPublicationJournals->sup_id          = $id;
                $DetailsPublicationJournals->title           = $request->atleast_one_title_of_paper[$i];
                $DetailsPublicationJournals->author          = $request->atleast_one_paper_authors[$i];
                $DetailsPublicationJournals->name_of_journal = $request->atleast_one_journal_name[$i];
                $DetailsPublicationJournals->vol_year_page   = $request->atleast_one_vol_year_page[$i];
                $DetailsPublicationJournals->indexing        = $request->atleast_one_indexing[$i];
                $DetailsPublicationJournals->book_cover      = $request->journal_pdf_hid[$i];
                $DetailsPublicationJournals->save();

            }
        }

        if ($request->phd_student_name) {
            for ($i = 0; $i < count($request->phd_student_name); $i++) {
                $OtherSimilarTest                          = new OtherSimilarTest();
                $OtherSimilarTest->sup_id                  = $id;
                $OtherSimilarTest->student_name            = $request->phd_student_name[$i];
                $OtherSimilarTest->supervisor_cosupervisor = $request->phd_select_sup_cosup[$i];
                $OtherSimilarTest->university_regd_no      = $request->phd_regdno_enrol_status[$i];
                $OtherSimilarTest->university_name         = $request->phd_university_name[$i];
                $OtherSimilarTest->save();

            }
        }

        $DetailsOfSupervisor                             = DetailsOfSupervisor::where('sup_id', $id)->first();
        $DetailsOfSupervisor->sup_id                     = $id;
        $DetailsOfSupervisor->tot_no_supervising         = $request->phd_total_number;
        $DetailsOfSupervisor->no_as_supervisor           = $request->as_supervisor;
        $DetailsOfSupervisor->no_as_cosupervisor         = $request->as_cosupervisor;
        $DetailsOfSupervisor->unreserved                 = $request->as_unreserved;
        $DetailsOfSupervisor->sc_st                      = $request->as_st_sc;
        $DetailsOfSupervisor->differently_abled          = $request->as_differently_abled;
        $DetailsOfSupervisor->test_qualified             = $request->as_national_test_qualified;
        $DetailsOfSupervisor->other                      = $request->as_anyother;
        $DetailsOfSupervisor->area_of_proposed_research  = $request->area_research_work;
        $DetailsOfSupervisor->debarred_from_university   = $request->debarred_action;
        $DetailsOfSupervisor->other_relevant_information = $request->any_other_relevant_info;
        $DetailsOfSupervisor->mail_id_head               = $request->mailid_head_institute;
        $DetailsOfSupervisor->save();

        return redirect()->route('sup.preview', [$id])->with('success', 'you form has saved as draft please look throughly and then submit.');

    }

    public function sup_journal_store(Request $request, $id)
    {

        //return $request;

        if ($request->hasFile('employee_certificate_file')) {
            $data                 = $request->file('employee_certificate_file');
            $extension            = $data->getClientOriginalExtension();
            $filename             = time() . uniqid(rand()) . 'emp_cert_' . '.' . $extension;
            $path                 = public_path('upload/employee_certificate/');
            $upload_success       = $data->move($path, $filename);
            $employee_certificate = $filename;
        } else {
            $employee_certificate = '';
        }

        if ($request->hasFile('upload_photo_file')) {
            $data           = $request->file('upload_photo_file');
            $extension      = $data->getClientOriginalExtension();
            $filename       = time() . uniqid(rand()) . 'emp_photo_' . '.' . $extension;
            $path           = public_path('upload/employee_photo/');
            $upload_success = $data->move($path, $filename);
            $employee_photo = $filename;
        } else {
            $employee_photo = '';
        }

        if ($request->best_three_title_of_paper) {
            for ($i = 0; $i < count($request->best_three_title_of_paper); $i++) {
                $PublicationJournals                  = new PublicationJournals();
                $PublicationJournals->sup_id          = $id;
                $PublicationJournals->title           = $request->best_three_title_of_paper[$i];
                $PublicationJournals->author          = $request->best_three_paper_authors[$i];
                $PublicationJournals->name_of_journal = $request->best_three_journal_name[$i];
                $PublicationJournals->vol_year_page   = $request->best_three_vol_year_page[$i];
                $PublicationJournals->indexing        = $request->best_three_indexing[$i];
                $PublicationJournals->frontpage_cover = $request->journal_uplaod_hid[$i];
                $PublicationJournals->save();

            }
        }

        if ($request->atleast_one_title_of_paper) {

            for ($i = 0; $i < count($request->atleast_one_title_of_paper); $i++) {
                $DetailsPublicationJournals                  = new DetailsPublicationJournals();
                $DetailsPublicationJournals->sup_id          = $id;
                $DetailsPublicationJournals->title           = $request->atleast_one_title_of_paper[$i];
                $DetailsPublicationJournals->author          = $request->atleast_one_paper_authors[$i];
                $DetailsPublicationJournals->name_of_journal = $request->atleast_one_journal_name[$i];
                $DetailsPublicationJournals->vol_year_page   = $request->atleast_one_vol_year_page[$i];
                $DetailsPublicationJournals->indexing        = $request->atleast_one_indexing[$i];
                $DetailsPublicationJournals->book_cover      = $request->journal_pdf_hid[$i];
                $DetailsPublicationJournals->save();

            }
        }

        if ($request->phd_student_name) {
            for ($i = 0; $i < count($request->phd_student_name); $i++) {
                $OtherSimilarTest                          = new OtherSimilarTest();
                $OtherSimilarTest->sup_id                  = $id;
                $OtherSimilarTest->student_name            = $request->phd_student_name[$i];
                $OtherSimilarTest->supervisor_cosupervisor = $request->phd_select_sup_cosup[$i];
                $OtherSimilarTest->university_regd_no      = $request->phd_regdno_enrol_status[$i];
                $OtherSimilarTest->university_name         = $request->phd_university_name[$i];
                $OtherSimilarTest->save();

            }
        }

        $DetailsOfSupervisor                             = new DetailsOfSupervisor();
        $DetailsOfSupervisor->sup_id                     = $id;
        $DetailsOfSupervisor->tot_no_supervising         = $request->phd_total_number;
        $DetailsOfSupervisor->no_as_supervisor           = $request->as_supervisor;
        $DetailsOfSupervisor->no_as_cosupervisor         = $request->as_cosupervisor;
        $DetailsOfSupervisor->unreserved                 = $request->as_unreserved;
        $DetailsOfSupervisor->sc_st                      = $request->as_st_sc;
        $DetailsOfSupervisor->differently_abled          = $request->as_differently_abled;
        $DetailsOfSupervisor->test_qualified             = $request->as_national_test_qualified;
        $DetailsOfSupervisor->other                      = $request->as_anyother;
        $DetailsOfSupervisor->area_of_proposed_research  = $request->area_research_work;
        $DetailsOfSupervisor->debarred_from_university   = $request->debarred_action;
        $DetailsOfSupervisor->other_relevant_information = $request->any_other_relevant_info;
        $DetailsOfSupervisor->mail_id_head               = $request->mailid_head_institute;
        $DetailsOfSupervisor->save();

        $supervisor_application_info = DB::table('supervisor_application_info')
            ->where('sup_id', $id)
            ->update([
                'employer_certificate' => $employee_certificate,
                'photo'                => $employee_photo,
                'draft_status'         => 3,
                'no_papers_journals'   => $request->total_journals_paper,

            ]);

        //return 'done';

        // return redirect()->route('sup.preview', [$id])->with('success', 'you form has saved as draft please look throughly and then submit.');
        return redirect()->route('journal.draft.view', [$id])->with('success', 'you form has saved as draft please look throughly and then submit.');
        //return view('admin.supervisor.supervisor_journal', compact('id'));
    }

    public function sup_preview($id)
    {
        //return $id;

        $supervisors = SupervisorApplicationInfo::select('supervisor_application_info.*', 'd.departments_title')
            ->leftJoin('departments as d', 'supervisor_application_info.disciline_specialization', 'd.id')->where('sup_id', $id)->first();
        // $last_supervisor_id = $supervisors->id;

        $SupervisorQualification = SupervisorQualification::where('sup_id', $id)->get();

        $SupervisorEmployment       = SupervisorEmployment::where('sup_id', $id)->get();
        $PublicationJournals        = PublicationJournals::where('sup_id', $id)->get();
        $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id', $id)->get();

        $OtherSimilarTest    = OtherSimilarTest::where('sup_id', $id)->get();
        $DetailsOfSupervisor = DetailsOfSupervisor::where('sup_id', $id)->first();

        return view('admin.supervisor.supervisorview', compact('id', 'SupervisorQualification', 'SupervisorEmployment', 'PublicationJournals', 'DetailsPublicationJournals', 'supervisors', 'OtherSimilarTest', 'DetailsOfSupervisor'));
    }

    public function sup_preview_submit(Request $request)
    {
        //return $request;
        $user_id = $request->user_id;
        DB::table('supervisor_application_info')
            ->where('sup_id', $user_id)
            ->update([
                'draft_status'       => 4,
                'application_status' => 1,
            ]);

        $supervisorDetails = SupervisorApplicationInfo::where('sup_id', $user_id)->first();
        $draft_status      = $supervisorDetails->draft_status;

        // if($user->draft_status == 1){
        //     $msg = "please complete the form";
        // }else{

        // }

        // supervisorApplyStatus.blade
        return view('admin.supervisor.supervisorApplyStatus', compact('draft_status', 'supervisorDetails'));
    }

    public function sup_draft_data(Request $request, $id)
    {
        //return $id;
        $title              = "supervisors";
        $sub_page_title     = "Draft supervisor form";
        $supervisors        = Supervisor::where('id', $id)->first();
        $last_supervisor_id = $supervisors->id;

        $SupervisorQualification = SupervisorQualification::where('sup_id', $last_supervisor_id)->get();

        $SupervisorEmployment       = SupervisorEmployment::where('sup_id', $last_supervisor_id)->get();
        $PublicationJournals        = PublicationJournals::where('sup_id', $last_supervisor_id)->get();
        $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id', $last_supervisor_id)->get();
        // $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id',$last_supervisor_id)->get();
        $OtherSimilarTest    = OtherSimilarTest::where('sup_id', $last_supervisor_id)->get();
        $DetailsOfSupervisor = DetailsOfSupervisor::where('sup_id', $last_supervisor_id)->first();

        return view('admin.supervisor.supervisorDraft', compact('id', 'last_supervisor_id', 'SupervisorQualification', 'SupervisorEmployment', 'PublicationJournals', 'DetailsPublicationJournals', 'supervisors', 'OtherSimilarTest', 'DetailsOfSupervisor', 'title', 'sub_page_title'));
    }

    public function sup_draft_store(Request $request, $id)
    {

        //return $id;
        $ses                = session()->all();
        $user_data          = $request->session()->get('userdata');
        $user_id            = $user_data['userID'];
        $supervisors        = Supervisor::where('user_id', $id)->first();
        $last_supervisor_id = $supervisors->id;
        //$data = session(['userID']);
        // return Session::get(['userdata']['userID']);
        // return $ses;
        // return $request;
        //profile of supervisor
        if ($request->hasFile('employee_certificate_file')) {
            $data                 = $request->file('employee_certificate_file');
            $extension            = $data->getClientOriginalExtension();
            $filename             = time() . uniqid(rand()) . 'emp_cert_' . '.' . $extension;
            $path                 = public_path('upload/employee_certificate/');
            $upload_success       = $data->move($path, $filename);
            $employee_certificate = $filename;
        } else {
            $employee_certificate = $request->employee_hid_certificate;
        }

        if ($request->hasFile('upload_photo_file')) {
            $data           = $request->file('upload_photo_file');
            $extension      = $data->getClientOriginalExtension();
            $filename       = time() . uniqid(rand()) . 'emp_photo_' . '.' . $extension;
            $path           = public_path('upload/employee_photo/');
            $upload_success = $data->move($path, $filename);
            $employee_photo = $filename;
        } else {
            $employee_photo = $request->upload_hid_photo;
        }

        //$Supervisor = Supervisor::find($id);
        DB::table('supervisors')
            ->where('user_id', $id)
            ->update([
                'faculty'                  => $request->faculty,
                'full_name'                => $request->full_name,
                'institution_organisation' => $request->organisation,
                'present_appointment'      => $request->nature_of_appointment,
                'dob'                      => $request->date_of_birth,
                'age'                      => $request->age,
                'marital_status'           => $request->marital_status,
                'gender'                   => $request->gender,
                'permanent_address'        => $request->permanent_address,
                'correspondence_address'   => $request->correspondance_address,
                'nationality'              => $request->natinality,
                'aadhar_no'                => $request->aadhar_card_number,
                'disciline_specialization' => $request->discipline_specialization,
                'phd_thesis'               => $request->phd_thesis,
                'recognised_institution'   => $request->full_time_total_exp,
                'teaching_experience'      => $request->teaching_exp,
                'research_experience'      => $request->research_exp,
                'post_phd_experience'      => $request->phd_exp,
                'no_papers_journals'       => $request->total_journals_paper,
                'employer_certificate'     => $employee_certificate,
                'photo'                    => $employee_photo,
            ]);

        //         $flight = Flight::find(1);

        // $flight->name = 'Paris to London';

        if ($request->qualification_field) {
            for ($i = 0; $i < count($request->qualification_field); $i++) {
                $SupervisorQualification                   = new SupervisorQualification();
                $SupervisorQualification->sup_id           = $last_supervisor_id;
                $SupervisorQualification->exam             = $request->qualification_field[$i];
                $SupervisorQualification->specialization   = $request->specialization[$i];
                $SupervisorQualification->board_university = $request->board_university[$i];
                $SupervisorQualification->year             = $request->passing_year[$i];
                $SupervisorQualification->division         = $request->division[$i];
                $SupervisorQualification->percentage       = $request->percentage_cgpa[$i];
                $SupervisorQualification->certificate      = $request->formFile_hid[$i];
                $SupervisorQualification->save();
            }
        }

        if ($request->employer_name) {
            for ($i = 0; $i < count($request->employer_name); $i++) {
                $SupervisorEmployment                        = new SupervisorEmployment();
                $SupervisorEmployment->sup_id                = $last_supervisor_id;
                $SupervisorEmployment->name                  = $request->employer_name[$i];
                $SupervisorEmployment->address               = $request->employer_address[$i];
                $SupervisorEmployment->designation           = $request->employer_designation[$i];
                $SupervisorEmployment->pay_scale             = $request->pay_scale[$i];
                $SupervisorEmployment->from                  = $request->date_from[$i];
                $SupervisorEmployment->to                    = $request->date_upto[$i];
                $SupervisorEmployment->type                  = $request->employer_type[$i];
                $SupervisorEmployment->appointment_date      = $request->appointment_date[$i];
                $SupervisorEmployment->employment_cerificate = $request->exp_hid_certi[$i];
                $SupervisorEmployment->save();
            }
        }

        if ($request->best_three_title_of_paper) {
            for ($i = 0; $i < count($request->best_three_title_of_paper); $i++) {
                $PublicationJournals                  = new PublicationJournals();
                $PublicationJournals->sup_id          = $last_supervisor_id;
                $PublicationJournals->title           = $request->best_three_title_of_paper[$i];
                $PublicationJournals->author          = $request->best_three_paper_authors[$i];
                $PublicationJournals->name_of_journal = $request->best_three_journal_name[$i];
                $PublicationJournals->vol_year_page   = $request->best_three_vol_year_page[$i];
                $PublicationJournals->indexing        = $request->best_three_indexing[$i];
                $PublicationJournals->frontpage_cover = $request->journal_uplaod_hid[$i];
                $PublicationJournals->save();
            }
        }

        if ($request->atleast_one_title_of_paper) {

            for ($i = 0; $i < count($request->atleast_one_title_of_paper); $i++) {
                $DetailsPublicationJournals                  = new DetailsPublicationJournals();
                $DetailsPublicationJournals->sup_id          = $last_supervisor_id;
                $DetailsPublicationJournals->title           = $request->atleast_one_title_of_paper[$i];
                $DetailsPublicationJournals->author          = $request->atleast_one_paper_authors[$i];
                $DetailsPublicationJournals->name_of_journal = $request->atleast_one_journal_name[$i];
                $DetailsPublicationJournals->vol_year_page   = $request->atleast_one_vol_year_page[$i];
                $DetailsPublicationJournals->indexing        = $request->atleast_one_indexing[$i];
                $DetailsPublicationJournals->book_cover      = $request->journal_pdf_hid[$i];
                $DetailsPublicationJournals->save();
            }
        }

        if ($request->phd_student_name) {
            for ($i = 0; $i < count($request->phd_student_name); $i++) {
                $OtherSimilarTest                          = new OtherSimilarTest();
                $OtherSimilarTest->sup_id                  = $last_supervisor_id;
                $OtherSimilarTest->student_name            = $request->phd_student_name[$i];
                $OtherSimilarTest->supervisor_cosupervisor = $request->phd_select_sup_cosup[$i];
                $OtherSimilarTest->university_regd_no      = $request->phd_regdno_enrol_status[$i];
                $OtherSimilarTest->university_name         = $request->phd_university_name[$i];
                $OtherSimilarTest->save();
            }
        }

        //$DetailsOfSupervisor = DetailsOfSupervisor::find($last_supervisor_id);
        $DetailsOfSupervisor                             = DetailsOfSupervisor::where('sup_id', $last_supervisor_id)->first();
        $DetailsOfSupervisor->sup_id                     = $last_supervisor_id;
        $DetailsOfSupervisor->tot_no_supervising         = $request->phd_total_number;
        $DetailsOfSupervisor->no_as_supervisor           = $request->as_supervisor;
        $DetailsOfSupervisor->no_as_cosupervisor         = $request->as_cosupervisor;
        $DetailsOfSupervisor->unreserved                 = $request->as_unreserved;
        $DetailsOfSupervisor->sc_st                      = $request->as_st_sc;
        $DetailsOfSupervisor->differently_abled          = $request->as_differently_abled;
        $DetailsOfSupervisor->test_qualified             = $request->as_national_test_qualified;
        $DetailsOfSupervisor->other                      = $request->as_anyother;
        $DetailsOfSupervisor->area_of_proposed_research  = $request->area_research_work;
        $DetailsOfSupervisor->debarred_from_university   = $request->debarred_action;
        $DetailsOfSupervisor->other_relevant_information = $request->any_other_relevant_info;
        $DetailsOfSupervisor->mail_id_head               = $request->mailid_head_institute;
        $DetailsOfSupervisor->save();

        //$user_id
        // $user = User::find($user_id);
        // $user->draft_status = 2;
        // $user->update();

        //return redirect()->back()->with('success','you have registered successfully please cheack your status.');

        return redirect()->route('sup.draft', [$user_id])->with('success', 'you form has saved as draft please look throughly and then submit.');
    }

    public function admin_supervisor_index()
    {
        $title            = "supervisors";
        $sub_page_title   = "View supervisors";
        $supervisors      = Supervisor::all();
        $supervisor_count = Supervisor::all()->count();
        return view('admin.supervisor.index', compact('title', 'sub_page_title', 'supervisor_count', 'supervisors'));
    }

    public function sup_apply_view($id)
    {

        $supervisors = SupervisorApplicationInfo::select('supervisor_application_info.*', 'd.departments_title')
            ->leftJoin('departments as d', 'supervisor_application_info.disciline_specialization', 'd.id')->where('sup_id', $id)->first();
        $sup_id         = $id;
        $title          = "supervisors";
        $sub_page_title = "View supervisors";
        //$supervisors                = Supervisor::all()->first();
        $SupervisorQualification    = SupervisorQualification::where('sup_id', $sup_id)->get();
        $SupervisorEmployment       = SupervisorEmployment::where('sup_id', $sup_id)->get();
        $PublicationJournals        = PublicationJournals::where('sup_id', $sup_id)->get();
        $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id', $sup_id)->get();
        $OtherSimilarTest           = OtherSimilarTest::where('sup_id', $sup_id)->get();
        $DetailsOfSupervisor        = DetailsOfSupervisor::where('sup_id', $sup_id)->first();
        return view('admin.supervisor.supervisorview', compact('title', 'sub_page_title', 'supervisors', 'SupervisorQualification', 'SupervisorEmployment', 'PublicationJournals', 'DetailsPublicationJournals', 'OtherSimilarTest', 'DetailsOfSupervisor', 'id'));
    }

    public function supervisor_upload_certi(Request $request)
    {
        if ($request->hasFile('file')) {
            $avatarPath = $request->file('file');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path       = $request->file('file')->move('upload/phdsupervisor/', $avatarName);
            $img_path   = 'upload/phdsupervisor/' . $avatarName;
            return response()->json([
                'img_path' => $img_path,
                'img_name' => $avatarName,
            ]);
        };
    }

    public function supervisor_upload_journal(Request $request)
    {
        if ($request->hasFile('file')) {
            $avatarPath = $request->file('file');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path       = $request->file('file')->move('upload/supervisor_publish/', $avatarName);
            $img_path   = 'upload/supervisor_publish/' . $avatarName;
            return response()->json([
                'img_path' => $img_path,
                'img_name' => $avatarName,
            ]);
        };
    }

    public function sup_apply(Request $request)
    {

        $user_data         = $request->session()->get('userdata');
        $user_id           = $user_data['userID'];
        $department        = Department::get(['departments_title', 'id']);
        $user_details      = DB::table('supervisors')->where('id', $user_id)->first();
        $supervisorDetails = DB::table('supervisor_application_info')->where('sup_id', $user_id)->first();

        if ($supervisorDetails == "") {
            //return 1;
            return view('admin.supervisor.supervisorApply', compact('user_id', 'user_details', 'department'));
        } else {
            // if( ($supervisorDetails->draft_status == 4) && ($supervisorDetails->application_status == 1) ){ }
            //return $user_id;
            $draft_status = $supervisorDetails->draft_status;
            return view('admin.supervisor.supervisorApplyStatus', compact('draft_status', 'user_id', 'supervisorDetails'));
        }
        // $draft_status = $user_details->draft_status;
        // if ($draft_status == '') {
        //     return view('admin.supervisor.supervisorApply', compact('title', 'sub_page_title', 'user_id', 'supervisorDetails'));
        // } else if ($draft_status == 1) {

        //     return view('admin.supervisor.supervisorApplyStatus', compact('title', 'sub_page_title', 'draft_status', 'user_id', 'supervisorDetails'));
        // } else {
        //     return view('admin.supervisor.supervisorApplyStatus', compact('title', 'sub_page_title', 'draft_status', 'user_id', 'supervisorDetails'));
        // }
    }
    /**
     * Method fetchDomainExpert
     * @author AlokDas
     * @return void
     */
    public function fetchDomainExpert()
    {
        $student = DB::table('phd_application_info')->select('id', 'name', 'stud_id')
            ->where('application_status', '>=', 1)
            ->get();
        $details = DB::table('nodal_centres')->select('*')->get();

        $page_title = 'Domain Expert';
        // $data['page_title'] = 'Domain Expert';
        return view('admin.supervisor.domain-expert', compact('details', 'student', 'page_title'));
    }

    /**
     * Method addDomainExpert
     * @author AlokDas
     * @return void
     */
    public function addDomainExpert(Request $request)
    {
        $name = DB::table('phd_application_info')->select('name')->where('id', $request->student_name)->get();
        foreach ($name as $key => $value) {
            $std = $value->name;
        }
        $this->validate($request, [
            'student_name'         => 'required',
            'enrollment_no'        => 'required',
            'name_of_ncr'          => 'required',
            'faculty_of_branch'    => 'required',
            'title_of_rearch_work' => 'required',
        ]);

        $session_data                        = $request->session()->get('userdata');
        $domain_expert                       = new DscDomainExpert();
        $domain_expert->stud_id              = $request->stud_id;
        $domain_expert->student_name         = $std;
        $domain_expert->enrollment_no        = $request->enrollment_no;
        $domain_expert->name_of_ncr          = $request->ncr_id;
        $domain_expert->faculty_of_branch    = $request->faculty_of_branch;
        $domain_expert->title_of_rearch_work = $request->title_of_rearch_work;
        $user_id                             = $session_data['userID'];
        $supervisor_details                  = DB::table('supervisor_employments')->select('designation')->where('sup_id', $user_id)->first();
        $domain_expert->supervisor_name      = $session_data['name'];
        $domain_expert->designation          = $supervisor_details->designation;
        $domain_expert->save();

        foreach ($request->name_of_domain_expert as $key => $name_of_domain_expert) {
            $expert_list                          = new DomainExpertList();
            $expert_list->dsc_id                  = $domain_expert->id;
            $expert_list->expert_name             = $name_of_domain_expert;
            $expert_list->designation_affiliation = $request->designation_affiliation[$key];
            $expert_list->address                 = $request->address[$key];
            $expert_list->email                   = $request->email[$key];
            $expert_list->mobile                  = $request->mobile[$key];
            $expert_list->save();
        }

        return redirect("supervisor/domain-expert")->with('message', 'Successfully added');
    }

    /**
     * Method requestDomainExpert
     * @return void
     */
    public function requestDomainExpert()
    {
        $expert = DscDomainExpert::all();
        return view('admin.supervisor.domain_expert_request', compact('expert'));
    }
    public function viewDomainExpert($id)
    {
        $nodal = DscDomainExpert::select('dsc_domain_expert.name_of_ncr', 'dsc_domain_expert.name_of_ncr', 'dsc_domain_expert.student_name', 'dsc_domain_expert.enrollment_no', 'dsc_domain_expert.title_of_rearch_work', 'dsc_domain_expert.faculty_of_branch', 'dsc_domain_expert.request_status', 'dsc_domain_expert.ncr_remark', 'dsc_domain_expert.dsc_id', 'nodal_centres.college_name', 'dsc_domain_expert.vc_remark')
            ->leftJoin('nodal_centres', 'nodal_centres.id', '=', 'dsc_domain_expert.name_of_ncr')->orderby('dsc_domain_expert.dsc_id', 'asc')
            ->where('dsc_domain_expert.dsc_id', $id)
            ->first();
        //$value = DscDomainExpert::find($id);
        $expert = DomainExpertList::all();
        return view('admin.supervisor.domain_expert_view', compact('nodal', 'expert'));
    }
    // public function domainExpertList(){
    //     $details = DB::table('dsc_domain_expert')->select('dsc_domain_expert.*','dsc_domain_approval_status.approved_status_vc','dsc_domain_approval_status.approved_status_ncr')->join('dsc_domain_approval_status', 'dsc_domain_approval_status.dsc_id', '=', 'dsc_domain_expert.dsc_id')->get();
    //     //dd($details);
    //     return view('admin.supervisor.domain-expert-list', compact('details'));
    // }

    public function fetchEnroll(Request $request)
    {
        $id     = $request->id;
        $enroll = PhdApplicationInfo::select('phd_application_info.enrollment_no', 'phd_application_info.name_of_faculty', 'phd_application_info.topic_of_phd_work', 'phd_application_info.nodal_id', 'nc.college_name', 'nc.id', 'phd_application_info.stud_id')
            ->leftJoin('nodal_centres as nc', 'phd_application_info.nodal_id', '=', 'nc.id')
            ->orderby('phd_application_info.id', 'desc')
            ->where('phd_application_info.id', $id)
            ->get();
        return response()->json($enroll);
    }
    // public function viewDomainExpert($id){
    //     $session_data = session()->get('userdata');
    //     $user_id = $session_data['userID'];
    //     $supervisor_details = DB::table('supervisor_employments')->select('designation')->where('sup_id',$user_id)->first();
    //     $session_data['designation'] = $supervisor_details->designation;
    //     $details = DB::table('dsc_domain_approval_status')->select('approved_status_ncr','approved_status_vc')->where('dsc_id',$id)->first();
    //     $details->id = $id;
    //     return view('admin.supervisor.view-domain-expert',compact('details','session_data'));
    // }
    public function supervisorApprovedDomainExpert(Request $request)
    {
        //dd($request);
        $update = DB::table('dsc_domain_approval_status')->where('dsc_id', $request->desc_id)->update(['approved_status_sup' => 1]);
        return back();
    }
    public function vcApprovedDomain(Request $request)
    {
        $domain_name_array    = implode(',', $request->domain_name);
        $vc_appr              = new VcApprovedDomain();
        $vc_appr->domain_name = $domain_name_array;
        if ($vc_appr->save()) {
            $update = DB::table('dsc_domain_approval_status')->where('dsc_id', $request->id)->update(['approved_status_vc' => 1]);
            $msg    = '<div class="offset-md-0 col-md-offset-0 col-md-12 animated fadeInDown alert alert-success" role="alert"><strong>Data Insert Successfull.</strong></div>';
            return redirect("supervisor/vc-approved-domains/" . $request->id)->with('message', $msg);
        } else {
            $msg = '<div class="offset-md-0 col-md-offset-0 col-md-12 animated fadeInDown alert alert-danger" role="alert"><strong>Failed to Insert Data.</strong></div>';
            return redirect("supervisor/vc-approved-domains/" . $request->id)->with('message', $msg);
        }
    }
    public function vcApprovedDomainExperts($id)
    {
        $supervisor_details = DB::table('dsc_domain_expert')->select('domain_expert_name')->where('dsc_id', $id)->first();
        $vc_app             = DB::table('dsc_domain_approval_status')->where('dsc_id', $id)->select('approved_status_vc')->first();
        if (!isset($vc_app->approved_status_vc)) {
            $vc = 0;
        } else {
            $vc = 1;
        }
        $explode = explode(',', $supervisor_details->domain_expert_name);
        return view('admin.supervisor.vc-approved-domain', compact('id', 'explode', 'vc'));
    }

    /**
     * Method AppliedForStudentApproval
     * @author AlokDas
     * @return void
     */
    public function AppliedForStudentApproval()
    {
        $applications = Helpers::appliedApplication();
        if (session('userdata')['role'] == 'Nodal Centre') {
            $nodal_id    = Auth::guard('nodalcentre')->user()->id;
            $application = $application->where([['nodal_id', $nodal_id], ['application_status', 1]])->orWhere('application_status', 11)->get();
        } elseif (session('userdata')['role'] == 'control_cell') {
            //$application = $application->where([['application_status', 2]])->get();
            $application = Student::with(['phd_application_info', 'change_nodal_center', 'change_research_supervisor_name'])->get();
        } elseif (session('userdata')['role'] == 'vice-chancellor') {
            //$application->where([['application_status', 4]])->get();
            $application = Student::with(['phd_application_info', 'change_nodal_center', 'change_research_supervisor_name'])->get();
        } elseif (session('userdata')['role'] == 'supervisor') {
            $supervisor_id = Auth::guard('supervisor')->user()->id;


            $applications = PhdApplicationInfo::where('application_status', '!=', 0)->with(['get_supervisor_details', 'get_coursework_details', 'get_coursework_remark' => function ($query) {
                $query->where('dsc_type', 5);
            }])->get();
             
            // $applications = DB::select("SELECT a.*,b.* FROM phd_application_info as a LEFT JOIN phd_supervisors as b ON a.id = b.appl_id WHERE b.sup_id = " . $supervisor_id . " AND a.application_status != 0");
            $applied  = DB::select("SELECT count(*) as applied FROM phd_application_info as a LEFT JOIN phd_supervisors as b ON a.id = b.appl_id WHERE b.sup_id = " . $supervisor_id);
            $pending  = DB::select("SELECT SUM(a.application_status = 1 ) as pending FROM phd_application_info as a LEFT JOIN phd_supervisors as b ON a.id = b.appl_id WHERE b.sup_id = " . $supervisor_id);
            $approved = DB::select("SELECT SUM(a.application_status = 2 || a.application_status=4 || a.application_status=6) as approved FROM phd_application_info as a LEFT JOIN phd_supervisors as b ON a.id = b.appl_id WHERE b.sup_id = " . $supervisor_id);
            $rejected = DB::select("SELECT SUM(a.application_status=3 || a.application_status=5 || a.application_status=7) as rejected FROM phd_application_info as a LEFT JOIN phd_supervisors as b ON a.id = b.appl_id WHERE b.sup_id = " . $supervisor_id);
        }
        $page_title = 'Applied Students PhD Application preview form';

        // dd($applications);
        return view('admin.supervisor.applied-students-approval', compact('applications', 'applied', 'pending', 'approved', 'rejected', 'page_title'));
    }

    /**
     * Method previewAppliedPhdApplication
     * To view the details of phd application applied by the Student for that perticular supervisor.
     * @author AlokDas
     * @return void
     */
    public function previewAppliedPhdApplication(Request $request, $id)
    {
        $data['application'] = PhdApplicationInfo::where('id', $id)
            ->with(['get_department_details' => function ($q) {
                // $q->select(['id,departments_title,color']);
                // $q->where('', '');
            }])
            ->with(['get_supervisor_details', 'get_nodal_center_details'])
            ->get()->map(function ($r) {
            return [
                // 'all'                              => $r->toArray(),
                'application_id'                   => $r->id ?? '-',
                'name_of_candidate'                => $r->name ?? '-',
                'stud_id'                          => $r->stud_id ?? '-',
                'name_of_faculty'                  => $r->name_of_faculty ?? '-',
                'enrollment_no'                    => $r->enrollment_no ?? '-',
                'enrollment_date'                  => $r->enrollment_date ?? '-',
                'candidate_name'                   => $r->name ?? '-',
                'topic_of_phd_work'                => $r->topic_of_phd_work ?? '-',
                'present_research_supervisor_name' => $r->get_supervisor_details->supervisor_name ?? '-',
                'academic_programme'               => $r->academic_programme ?? '-',
                // 'present_research_co_supervisor_name'  => '',
                // 'proposed_supervisor_name'             => '',
                // 'proposed_nodal_research_center'       => '',
                // 'name_of_proposed_co_supervisor'       => '',
                // 'proposed_research_co_supervisor_name' => '',
                // 'approved_by_bput'                     => '',
                'ncr_id'                           => $r->nodal_id,
                'nodal_center'                     => $r->get_nodal_center_details->college_name,
                'nodal_center_email'               => $r->get_nodal_center_details->email ?? '-',
                'nodal_center_ph
                one'               => $r->get_nodal_center_details->phone ?? '-',
                'nodal_center_address'             => $r->get_nodal_center_details->address ?? '-',
                'branch_name'                      => $r->get_department_details->departments_title ?? '-',
                'dob'                              => $r->dob ?? '-',
                'nationality'                      => $r->nationality ?? '-',
                'student_category'                 => $r->student_category ?? '-',
                'category'                         => $r->category ?? '-',
                'aadhar_certificate'               => $r->aadhar_certificate ?? '-',
                'photo'                            => $r->photo ?? '-',
                'signature'                        => $r->signature ?? '-',
                'phd_app_file'                     => $r->phd_app_file ?? '-',
                'stu_payment_status'               => $r->stu_payment_status ?? '-',
                'application_status'               => $r->application_status ?? '-',
            ];
        })->first();

        $data['student']                = PhdApplicationInfo::select('phd_application_info.*', 'nodal_centres.college_name')->join('nodal_centres', 'phd_application_info.nodal_id', 'nodal_centres.id')->where('phd_application_info.id', $id)->first();
        $data['transaction_history']    = DB::table('transaction_history')->where('appl_id', $id)->first(['transaction_id']);
        $data['supervisor']             = PhdSupervisor::where('appl_id', $id)->first();
        $data['student_qualifications'] = StudentQualification::where('appl_id', $id)->get();
        $data['organisation']           = Organisation::where('appl_id', $id)->get();
        $data['documents']              = PhdOtherDocument::where('appl_id', $id)->get();

        $nodal_user_table               = NodalCentre::select('user_table_name')->where('id', $data['application']['ncr_id'])->first();
        $data['professors']             = DB::table($nodal_user_table->user_table_name)->where('dept_id', $data['application']['academic_programme'])->get()->pluck('name', 'professor_id');
        $data['domain_experts_details'] = DSCExperts::where('appl_id', $data['application']['application_id'])
            ->with('getProfessorDetails')
            ->get()
            ->map(function ($r) {
                $designation_array = ['', 'Professor', 'Associate Professor', 'Chairperson', 'Co-Chairperson'];
                return $table_data = DB::table($r->getProfessorDetails->user_table_name)
                    ->select(['id', 'name', 'designation', 'address', 'email_id', 'contact_no'])
                    ->where('id', $r->ncr_user_id)
                    ->get()
                    ->map(function ($r1) {
                        return [
                            'professor_id' => $r1->id ?? '',
                            'name'         => $r1->name ?? '',
                            'designation'  => $r1->designation ?? '',
                            'address'      => $r1->address ?? '',
                            'email_id'     => $r1->email_id ?? '',
                            'contact_no'   => $r1->contact_no ?? '',
                        ];
                    })->first();
            });
        $data['tbl_remarks'] = TblRemarks::where('appl_id', $id)->pluck('supervisor')->first();
        // dd($data);

        $data['page_title'] = 'Applied Students PhD Application preview form';
        return view('supervisors.applied_students.preview')->with($data);
    }

    /**
     * Get professors with respect to department
     * @author AlokDas
     * @return json
     */
    public function getProfessorsRespectToDept(Request $request)
    {
        try {
            $appl_id      = $request->appl_id;
            $ncr_id       = PhdApplicationInfo::where('id', $appl_id)->first()->nodal_id;
            $ncr_user_tbl = NodalCentre::where('id', $ncr_id)->first()->user_table_name;
            // dd([$request->all(), $ncr_id, $ncr_user_tbl]);

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
     * Method submitDscExperts
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return json
     */
    public function submitDscExperts(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'appl_id'       => 'required|integer',
                'domain_expert' => 'required|array',
            ]);

            if ($validator->passes()) {
                $appl_id       = $request->appl_id;
                $ncr_id        = PhdApplicationInfo::where('id', $appl_id)->first()->nodal_id;
                $domain_expert = $request->domain_expert;
                $insert_array  = [];

                foreach ($domain_expert as $key => $val) {
                    $insert_array[$key]['appl_id'] = $appl_id;
                    // $insert_array[$key]['professor_id'] = $val;
                    $insert_array[$key]['ncr_id']      = $ncr_id;
                    $insert_array[$key]['ncr_user_id'] = $val;

                    $insert_array[$key]['created_by'] = Auth::guard('supervisor')->user()->id;
                    $insert_array[$key]['created_at'] = Carbon::now();
                }

                $result = DSCExperts::insert($insert_array);
                if ($result) {
                    $update_application_status = PhdApplicationInfo::where('id', $appl_id)->update(['application_status' => 1]); // 1 means Pending at supervisor. Untill submitting with recommendation status will not change
                    if ($update_application_status) {
                        $data['data']    = $update_application_status;
                        $data['message'] = 'Application id inserted and application status also updated successfully.';
                        return response($data, Response::HTTP_PARTIAL_CONTENT);
                    } else {
                        $data['data']    = [];
                        $data['message'] = 'Failed to update application status';
                        return response($data, Response::HTTP_INTERNAL_SERVER_ERROR);
                    }
                } else {
                    $data['data']    = [];
                    $data['message'] = 'Failed to insert';
                    return response($data, Response::HTTP_INTERNAL_SERVER_ERROR);
                }

            } else {
                $data['data']    = [];
                $data['message'] = $validator->errors();
                return response($data, Response::HTTP_NOT_ACCEPTABLE);
            }
            $data['data']    = $request->all();
            $data['message'] = 'Data updated successfully.';
            return response($data, Response::HTTP_OK);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Method submitRecommendation
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return json
     */
    public function submitRecommendation(Request $request)
    {
        try {
            $appl_id                   = $request->appl_id;
            $domain_expert             = $request->domain_expert;
            $ncr_recommendation_status = $request->ncr_recommendation_status;

            $status = PhdApplicationInfo::where('id', $appl_id)->update([
                'application_status' => $ncr_recommendation_status,
            ]);
            if ($status) {
                $tbl_remarks_status = TblRemarks::where('appl_id', $request->appl_id);
                if ($tbl_remarks_status->get()->isNotEmpty()) {
                    $tbl_remarks_status->update([
                        'appl_id'    => $request->appl_id,
                        'supervisor' => $request->domain_expert,
                    ]);
                } else {
                    $tbl_remarks_status->insert([
                        'appl_id'    => $request->appl_id,
                        'supervisor' => $request->domain_expert,
                    ]);
                }
                $data['data']    = $status;
                $data['message'] = 'Application updated successfully';
                return response($data, Response::HTTP_OK);
            } else {
                $data['data']    = [];
                $data['message'] = 'Application status was not saved';
                return response($data, Response::HTTP_INTERNAL_SERVER_ERROR);
            }

        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Method approveAppliedPhdApplication
     * This method will approve only the Newly applied phd form by the students and will be approved by the supervisor.
     * @param $id $id [explicite description]
     * @author AlokDas
     * @return void
     */
    public function approveAppliedPhdApplication(Request $request, $id)
    {
        $status = PhdApplicationInfo::where('id', $id)->update([
            'application_status' => $request->status,
        ]);
        if ($status) {
            return redirect()->back()->with('message', 'Supervisor has approved the application.');
        } else {
            return redirect()->back()->with('message', 'Failed to update the application status.');
        }
    }

    /**
     * Method previewApplication
     * To view the details of phd application applied by the Student for that perticular supervisor.
     * @author AlokDas
     * @return void
     */
    public function previewApplication($id, $type)
    {
        if ($type == 'PHD') {
            $student                = PhdApplicationInfo::select('phd_application_info.*', 'nodal_centres.college_name')->join('nodal_centres', 'phd_application_info.nodal_id', 'nodal_centres.id')->where('phd_application_info.id', $id)->first();
            $transaction_history    = DB::table('transaction_history')->where('appl_id', $id)->first(['transaction_id']);
            $supervisor             = PhdSupervisor::where('appl_id', $id)->first();
            $student_qualifications = StudentQualification::where('appl_id', $id)->get();
            $organisation           = Organisation::where('appl_id', $id)->get();
            $documents              = PhdOtherDocument::where('appl_id', $id)->get();
        } elseif ($type == 'Nodal') {
            $student                = ChangeNodalCenter::select('*')->get()->where('id', $id)->first();
            $transaction_history    = '';
            $supervisor             = '';
            $documents              = '';
            $organisation           = '';
            $student_qualifications = '';
        } elseif ($type == 'Supervisor') {
            $student                = ChangeResearchSupervisor::select('*')->get()->where('res_ch_id', $id)->first();
            $transaction_history    = '';
            $supervisor             = '';
            $documents              = '';
            $organisation           = '';
            $student_qualifications = '';
        }
        return view('admin.supervisor.preview', compact('student', 'supervisor', 'student_qualifications', 'organisation', 'transaction_history', 'documents', 'type', 'id'));
    }

    public function approveApplication(Request $request, $id)
    {
        $type = $request->type;
        if ($type == 'Nodal') {
            DB::table('change_nodal_center')->where('id', $id)->update([
                'rd_approved' => 1,
                'vc_remarks'  => $request->application_remark,
            ]);
        } elseif ($type == 'PHD') {
            DB::table('phd_application_info')->where('id', $id)->update([
                'application_status' => ($request->status == 1) ? 1 : 2,
                'vc_remarks'         => $request->application_remark,
            ]);
        } elseif ($type == 'Supervisor') {
            DB::table('change_research_supervisor_name')->where('res_ch_id', $id)->update([
                'dsc_approved' => $request->status,
                'vc_remarks'   => $request->application_remark,
            ]);
        }
        $msg = '<div class="offset-md-0 col-md-offset-0 col-md-12 animated fadeInDown alert alert-success" role="alert"><strong>Application has submitted successfully..</strong></div>';
        return redirect("supervisor/preview/" . $id . '/' . $type)->with('success', $msg);
    }

    // Renewal of registration
    public function renewalRequest()
    {
        $value = RenewalRegistration::all();
        return view('admin.supervisor.renewal_request', compact('value'));
    }
    public function renewalRegistration($id)
    {
        $nodal_centre = NodalCentre::all();
        $value        = RenewalRegistration::find($id);
        return view('admin.supervisor.renewal-registration', compact('nodal_centre', 'value'));
    }
    public function renewalRegistrationStore(Request $request, $id)
    {
        $value                    = RenewalRegistration::find($id);
        $value->status            = $request->status;
        $value->remark_supervisor = $request->remark_supervisor;
        $value->save();
        return redirect('supervisor/renewal-request')->with('message', 'The form has been submitted successfully!');
    }

    public function sup_semester_list()
    {
        //return Auth::guard('supervisor')->id();
        $sup_id       = Auth::guard('supervisor')->id();
        $stu_sem_repo = DB::table('semester_progress_reports')
            ->where('supervisor_1', $sup_id)
            ->orWhere('supervisor_2', $sup_id)
            ->get();

        return view('admin.supervisor.semester-progress-listing', compact('stu_sem_repo'));
        // $supervisor = DB::table('supervisors as sup') ->select('sup.id',DB::raw("CONCAT(sup.first_name,' ',sup.last_name) AS sup_name"))
        // ->whereIn('sup.id',[$student_sem_detaills->supervisor_1,$student_sem_detaills->supervisor_2])
        // ->get();
    }

    public function special_leave_listing()
    {
        //return 1;
        $leave_list = PhdStudentMaternityLeave::get();
        return view('admin.supervisor.leave.index', compact('leave_list'));
    }
    public function special_leave_view($id)
    {
        //return $id;
        $student = PhdStudentMaternityLeave::where('id', $id)->first();
        return view('admin.supervisor.leave.special_leave_view', compact('student'));
    }
    public function special_leave_status(Request $request, $id)
    {
        //return $id;
        DB::table('phd_student_maternity_leaves')
            ->where('id', $id)
            ->update([
                'supervisor_status'  => $request->sup_leav_approve,
                'supervisor_remarks' => $request->sem_remarks,
            ]);
        return redirect()->route('sup.leave.list');
    }

    public function sup_semester_view($id)
    {
        // return $id;
        $sup_id =  Auth::guard('supervisor')->user()->id;
        $stu_id               = SemesterProgressReport::find($id)->pluck('stud_id')->first();
         $student_sem_detaills = DB::table('semester_progress_reports as spr')
            ->select('spr.*', 'spw.*', 'spr.id as id', 'nodal.college_name', 'spr.semester as sem')
            ->leftJoin('semester_planned_works as spw', 'spw.prog_repo_id', '=', 'spr.id')
            ->leftJoin('nodal_centres as nodal', 'nodal.id', '=', 'spr.nodal_center')
            ->where('supervisor_1', $sup_id)
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

        return view('admin.supervisor.semester-progress-view', compact('student_sem_detaills', 'sem_publication', 'supervisor', 'id', 'cosupervisor'));
    }

    public function sup_semester_store(Request $request, $id)
    {
         //return $request;
      
        $student_details = DB::table('semester_progress_reports')
            ->where('id', $id)
            ->update([
                'status'  => $request->status,
                'supervisor_remarks' => $request->remarks,
            ]);

        return redirect()->route('sup.semester.list')->with('message', 'Status has been submitted successfully!');
    }

    public function sup_dsc_print($id)
    {
        $stu_id               = SemesterProgressReport::find($id)->pluck('stud_id')->first();
        $student_sem_detaills = DB::table('semester_progress_reports as spr')
            ->select('spr.name', 'spr.enrollment_no', 'spr.enrollment_date')
            ->leftJoin('semester_planned_works as spw', 'spw.prog_repo_id', '=', 'spr.id')
        //->leftJoin('supervisors as sup','sup.id','=','spr.supervisor_1')
            ->where('spr.stud_id', $stu_id)
            ->where('spr.id', $id)
            ->first();
        return view('admin.supervisor.dsc_recommendation', compact('student_sem_detaills'));
    }

    //Discontinuation as Ph.D
    public function discontinueRequest()
    {
        $value = PhdDiscontinuation::all();
        return view('admin.supervisor.discontinue_request', compact('value'));
    }
    public function discontinueRegistration($id)
    {
        $nodal = NodalCentre::select('nodal_centres.college_name', 'p.present_center')
            ->leftJoin('phd_discontinuations as p', 'nodal_centres.id', '=', 'p.present_center')->orderby('p.id', 'desc')
            ->first();
        $value = PhdDiscontinuation::find($id);
        return view('admin.supervisor.discontinue_registration', compact('nodal', 'value'));
    }
    public function discontinueRegistrationStore(Request $request, $id)
    {
        //return $request;
        $value                    = PhdDiscontinuation::find($id);
        $value->status            = $request->status;
        $value->remark_supervisor = $request->remark_supervisor;
        $value->save();
        return redirect('supervisor/discontinue-request')->with('message', 'The form has been submitted successfully!');
    }

    public function extention_listing()
    {
        $student = Helpers::ExtensionWork();
        return view('admin.supervisor.ext_complete_work.index', compact('student'));
    }
    public function extention_work_view($id)
    {
        //return $id;
        $student = DB::table('extention_complete_works  as ecw')->select('ecw.*', 'n.college_name')
            ->Join('nodal_centres as n', 'n.id', '=', 'ecw.nodal_center')
            ->where('ecw.id', $id)
            ->first();
        $comp_not_compl = $student->component_not_completed;
        $comp_not_compl = explode(',', $comp_not_compl);
        return view('admin.supervisor.ext_complete_work.extensiton_work_view', compact('student', 'comp_not_compl'));
    }
    public function extention_work_status(Request $request, $id)
    {
        //return $request;
        $student = DB::table('extention_complete_works')->where('id', $id)
            ->update([
                'application_status' => $request->sup_leav_approve,
                'supervisor_remarks' => $request->sem_remarks,
            ]);
        return redirect()->route('extention.work.listing');
    }

    
    public function get_supervisor_details(Request $request)
    {
        try {
            $id = $request->id;

            $supervisor          = Supervisor::find($id);
            $details['name']     = $supervisor->first_name . ' ' . $supervisor->last_name;
            $details['address1'] = SupervisorApplicationInfo::where('sup_id', $id)->pluck('permanent_address')->first();
            $details['email']    = $supervisor->email;
            $details['phone']    = $supervisor->phone;
            $data['data']        = $details;
            $data['message']     = 'Details loaded successfully.';
            return response($data, Response::HTTP_OK);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    
    public function AppliedCoursework(Request $request)
    {
        $sup_id              = Auth::guard('supervisor')->user()->id;
        $data['page_title']  = 'Applied coursework applications';
        $data['courseworks'] = PhdCourseWorks::with(['get_application_details' => function ($q) use ($sup_id) {
            $q->with(['get_supervisor_details' => function ($q1) use ($sup_id) {
                $q1->where('sup_id', $sup_id);
            }]);
        }])->get();

        return view("admin.supervisor.coursework_list")->with($data);
    }
    public function AppliedCourseworkViewUpdate(Request $request){
        try {
            //return $request;
            $user_id = $request->session()->get('userdata')['userID'];
            $role = $request->session()->get('userdata')['role_id'];
            $data['data']    = TblCourseWorksApplicationRemarks::where('user_type', $role)->where('appl_id', $request->appl_id)->where('user_id', $user_id)->update($update_data = [
                'status'  => $request->recommendation_status,
                'remarks' => $request->remarks,
            ]);
            return redirect()->route('applied-students-approval')->with($data);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }
    
    public function AppliedCourseworkDetails(Request $request, $id = null)
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
          $data['coursework_remarks'] = TblCourseWorksApplicationRemarks::select('status', 'remarks')->where('user_type', $role)->where('user_id', $user_id)->where('appl_id', $data['details']->appl_id)->first();
        $data['submitted']               = $coursework_subjects->isNotEmpty() ? 1 : 0;
        // dd($data['details']->toArray());
        return view("admin.supervisor.coursework_details_view")->with($data);
    }

    
    public function AppliedCourseworkDetailsUpdate(Request $request, $id = null)
    {
        try {
            $update_data = [
                "work_brief_desc_sup"  => $request->sup_research_desc,
                "equip_brief_desc_sup" => $request->sup_equipment_desc,
                "date_of_commence"     => $request->sup_doc,
                "status"               => $request->sup_status,
                "sup_comment"          => $request->sup_comment,
                "sup_id"               => Auth::guard('supervisor')->user()->id,
            ];

            $data['data']    = PhdCourseWorks::where('id', $request->coursework_id)->update($update_data);
            $data['message'] = 'Data updated successfully.';
            return redirect()->back()->with($data);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return redirect()->back()->with($data);
        }
    }
    public function semesterRegistration(){
        $info = DB::table('semester_payments as p')->select('i.enrollment_no', 'i.name', 's.semester', 's.status', 'p.id as app_id')
        ->leftJoin('semester_regisration_statuses as s', 's.sem_payment_id', '=', 'p.id')
        ->leftJoin('phd_application_info as i', 'i.id', '=', 's.appl_id')
        ->whereIn('s.status', [1,2,3,4,5,6,7,8,9,10])
        ->get();
        return view('admin.supervisor.semester_registration', compact('info'));
    }
    public function semesterRegistrationView($id){
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
     return view('admin.supervisor.semester_registration_view', compact('coursework_sub', 'info', 'payment_details','payemt_status', 'id'));
    }
    public function semesterRegistrationStore(Request $request, $id){
        //return $request;
        $reg_details = DB::table('semester_regisration_statuses')
            ->where('sem_payment_id', $id)
            ->update([
                'sup_cert'    => $request->sup_cert,
                'status'    => $request->status,
                'sup_remark'    => $request->sup_remark,
            ]);

        return redirect()->route('sup.semester-registration')->with('success', 'your form has successfully submitted');
    }
     //Provisional registration DSC recommendation
     public function provisionalRegList(){
        $user_id  = session('userdata')['userID'];
         $provision = DB::table('provisional_registrations as p')->select('i.enrollment_no', 'i.name', 'p.id as app_id', 'p.status')->leftJoin('phd_application_info as i', 'p.appl_id', '=', 'i.id')
       ->leftJoin('phd_supervisors as s', 's.appl_id', '=', 'i.id')
       ->where('s.sup_id', $user_id)
       ->whereIn('p.status', [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15])
       ->get();
       return view('admin.supervisor.provisional-reg.provisional_reg_list', compact('provision'));
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
        
        return view('admin.supervisor.provisional-reg.provisional_reg_view', compact('info', 'coursework_sub', 'provisional', 'id'));
   }
   public function provisionRegSubmit(Request $request, $id){
       //return $request;
       $student_details = DB::table('provisional_registrations')
           ->where('id', $id)
           ->update([
               'status'    => $request->status,
               'sup_remark'    => $request->sup_remark,
           ]);

       return redirect()->route('provisional-registration-list')->with('success', 'you form has been successfully submitted.');
   }
}
