<?php

namespace App\Http\Controllers;

use App\Models\CoDetailsOfSupervisor;
use App\Models\CoDetailsPublicationJournals;
use App\Models\CoOtherSimilarTest;
use App\Models\CoPublicationJournals;
use App\Models\CoSupervisorApplicationInfo;
use App\Models\CoSupervisorEmployment;
use App\Models\CoSupervisorQualification;
use App\Models\CourseWorkSubjects;
use App\Models\PhdCourseWorks;
use App\Models\SemesterPublication;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TblCourseWorksApplicationRemarks;


class CoSupervisor extends Controller
{
    public function cosup_apply(Request $request)
    {

        $user_data = $request->session()->get('userdata');
        $user_id   = $user_data['userID'];

        $user_details      = DB::table('co_supervisors')->where('id', $user_id)->first();
        $supervisorDetails = DB::table('cosupervisor_application_info')->where('sup_id', $user_id)->first();

        if ($supervisorDetails == '') {
            return view('admin.cosupervisor.supervisorApply', compact('user_id', 'user_details'));
        } else {

            $draft_status = $supervisorDetails->draft_status;
            return view('admin.cosupervisor.supervisorApplyStatus', compact('draft_status', 'user_id', 'supervisorDetails'));
        }
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

        DB::table('cosupervisor_application_info')->insert([
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

        return redirect()->route('cosup.education.view', [$user_id])->with('success', 'you form has saved as draft please look throughly and then submit.');
    }

    public function sup_education_view(Request $request, $id)
    {
        return view('admin.cosupervisor.supervisor_education', compact('id'));
    }

    public function info_draft_view($id)
    {
        //return $id;
        $supervisor = CoSupervisorApplicationInfo::where('sup_id', $id)->first();
        return view('admin.cosupervisor.supervisor_info_draft', compact('supervisor', 'id'));
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

        DB::table('cosupervisor_application_info')
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

        $draft_status = DB::table('cosupervisor_application_info')->where('sup_id', $id)->first();
        $draft_status = $draft_status->draft_status;
        if ($draft_status == 2 || $draft_status == 3) {
            return redirect()->route('codraft.education.view', [$id])->with('success', 'you form has saved as draft please look throughly and then submit.');
        } else {
            return redirect()->route('cosup.education.view', [$id])->with('success', 'you form has saved as draft please look throughly and then submit.');
        }
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
            $SupervisorQualification                   = new CoSupervisorQualification();
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
            DB::table('cosupervisor_qualifications')->insert([
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

        if ($request->employer_name) {
            for ($i = 0; $i < count($request->employer_name); $i++) {
                $SupervisorEmployment                        = new CoSupervisorEmployment();
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

        $student_details = DB::table('cosupervisor_application_info')
            ->where('sup_id', $id)
            ->update([
                'teaching_experience'    => $request->teaching_exp,
                'research_experience'    => $request->research_exp,
                'post_phd_experience'    => $request->phd_exp,
                'recognised_institution' => $request->full_time_total_exp,
                'draft_status'           => 2,

            ]);

        return redirect()->route('cosup.journal.view', [$id])->with('success', 'you form has saved as draft please look throughly and then submit.');
    }

    public function draft_education_view($id)
    {
        $supervisors             = CoSupervisorApplicationInfo::where('sup_id', $id)->first();
        $SupervisorQualification = CoSupervisorQualification::where('sup_id', $id)->get();
        $SupervisorEmployment    = CoSupervisorEmployment::where('sup_id', $id)->get();
        return view('admin.cosupervisor.supervisor_education_draft', compact('id', 'supervisors', 'SupervisorEmployment', 'SupervisorQualification'));
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
                $SupervisorEmployment                        = new CoSupervisorEmployment();
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

        $student_details = DB::table('cosupervisor_application_info')
            ->where('sup_id', $id)
            ->update([
                'teaching_experience'    => $request->teaching_exp,
                'research_experience'    => $request->research_exp,
                'post_phd_experience'    => $request->phd_exp,
                'recognised_institution' => $request->full_time_total_exp,
            ]);

        $draft_status = DB::table('cosupervisor_application_info')->where('sup_id', $id)->first();
        $draft_status = $draft_status->draft_status;
        if ($draft_status == 3) {
            return redirect()->route('cojournal.draft.view', [$id])->with('success', 'you form has saved as draft please look throughly and then submit.');
        } else {
            return redirect()->route('cosup.journal.view', [$id])->with('success', 'you form has saved as draft please look throughly and then submit.');
        }
        return view('admin.cosupervisor.supervisor_journal', compact('id'));
    }

    public function sup_journal_view($id)
    {
        //return $id;
        return view('admin.cosupervisor.supervisor_journal', compact('id'));
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
                $PublicationJournals                  = new CoPublicationJournals();
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
                $DetailsPublicationJournals                  = new CoDetailsPublicationJournals();
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
                $OtherSimilarTest                          = new CoOtherSimilarTest();
                $OtherSimilarTest->sup_id                  = $id;
                $OtherSimilarTest->student_name            = $request->phd_student_name[$i];
                $OtherSimilarTest->supervisor_cosupervisor = $request->phd_select_sup_cosup[$i];
                $OtherSimilarTest->university_regd_no      = $request->phd_regdno_enrol_status[$i];
                $OtherSimilarTest->university_name         = $request->phd_university_name[$i];
                $OtherSimilarTest->save();

            }
        }

        $DetailsOfSupervisor                             = new CoDetailsOfSupervisor();
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

        $supervisor_application_info = DB::table('cosupervisor_application_info')
            ->where('sup_id', $id)
            ->update([
                'employer_certificate' => $employee_certificate,
                'photo'                => $employee_photo,
                'draft_status'         => 3,

            ]);

        //return 'done';

        // return redirect()->route('sup.preview', [$id])->with('success', 'you form has saved as draft please look throughly and then submit.');
        return redirect()->route('cojournal.draft.view', [$id])->with('success', 'you form has saved as draft please look throughly and then submit.');
        //return view('admin.supervisor.supervisor_journal', compact('id'));
    }

    public function journal_draft_view($id)
    {
        //return $id;
        $supervisors                = CoSupervisorApplicationInfo::where('sup_id', $id)->first();
        $PublicationJournals        = CoPublicationJournals::where('sup_id', $id)->get();
        $DetailsPublicationJournals = CoDetailsPublicationJournals::where('sup_id', $id)->get();
        // $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id',$id)->get();
        $OtherSimilarTest    = CoOtherSimilarTest::where('sup_id', $id)->get();
        $DetailsOfSupervisor = CoDetailsOfSupervisor::where('sup_id', $id)->first();
        return view('admin.cosupervisor.supervisor_journal_draft', compact('id', 'PublicationJournals', 'DetailsPublicationJournals', 'OtherSimilarTest', 'DetailsOfSupervisor', 'supervisors'));
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
            ]);
        if ($request->best_three_title_of_paper) {
            for ($i = 0; $i < count($request->best_three_title_of_paper); $i++) {
                $PublicationJournals                  = new CoPublicationJournals();
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
                $DetailsPublicationJournals                  = new CoDetailsPublicationJournals();
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
                $OtherSimilarTest                          = new CoOtherSimilarTest();
                $OtherSimilarTest->sup_id                  = $id;
                $OtherSimilarTest->student_name            = $request->phd_student_name[$i];
                $OtherSimilarTest->supervisor_cosupervisor = $request->phd_select_sup_cosup[$i];
                $OtherSimilarTest->university_regd_no      = $request->phd_regdno_enrol_status[$i];
                $OtherSimilarTest->university_name         = $request->phd_university_name[$i];
                $OtherSimilarTest->save();

            }
        }

        $DetailsOfSupervisor                             = CoDetailsOfSupervisor::where('sup_id', $id)->first();
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

        return redirect()->route('cosup.preview', [$id])->with('success', 'you form has saved as draft please look throughly and then submit.');

    }

    public function sup_preview($id)
    {
        //return $id;

        $supervisors = CoSupervisorApplicationInfo::where('sup_id', $id)->first();
        // $last_supervisor_id = $supervisors->id;

        $SupervisorQualification = CoSupervisorQualification::where('sup_id', $id)->get();

        $SupervisorEmployment       = CoSupervisorEmployment::where('sup_id', $id)->get();
        $PublicationJournals        = CoPublicationJournals::where('sup_id', $id)->get();
        $DetailsPublicationJournals = CoDetailsPublicationJournals::where('sup_id', $id)->get();

        $OtherSimilarTest    = CoOtherSimilarTest::where('sup_id', $id)->get();
        $DetailsOfSupervisor = CoDetailsOfSupervisor::where('sup_id', $id)->first();

        return view('admin.cosupervisor.supervisorview', compact('id', 'SupervisorQualification', 'SupervisorEmployment', 'PublicationJournals', 'DetailsPublicationJournals', 'supervisors', 'OtherSimilarTest', 'DetailsOfSupervisor'));
    }

    public function sup_preview_submit(Request $request)
    {
        //return $request;
        $user_id = $request->user_id;
        DB::table('cosupervisor_application_info')
            ->where('sup_id', $user_id)
            ->update([
                'draft_status'       => 4,
                'application_status' => 1,
            ]);

        $supervisorDetails = CoSupervisorApplicationInfo::where('sup_id', $user_id)->first();
        $draft_status      = $supervisorDetails->draft_status;

        // supervisorApplyStatus.blade
        return view('admin.cosupervisor.supervisorApplyStatus', compact('draft_status', 'supervisorDetails'));
    }

    public function sup_delete_employment(Request $request)
    {
        //return $request;
        $SupervisorEmployment = CoSupervisorEmployment::find($request->id);
        $SupervisorCerti      = $SupervisorEmployment->employment_cerificate;
        unlink("upload/phdsupervisor/" . $SupervisorCerti);
        // unlink("uploads/".$image->image_name);
        // unlink(substr($prsImage, 1));

        $dlt_qual = CoSupervisorEmployment::find($request->id);
        $dlt_qual->delete();
        $QualDetail = CoSupervisorEmployment::where('sup_id', $request->sup_id)->get();
        return response()->json($QualDetail);
    }

    public function sup_delete_publication(Request $request)
    {
        //return $request;
        $PublicationJournals = CoPublicationJournals::find($request->id);
        $SupervisorCerti     = $PublicationJournals->frontpage_cover;
        unlink("upload/supervisor_publish/" . $SupervisorCerti);
        // unlink("uploads/".$image->image_name);
        // unlink(substr($prsImage, 1));

        $dlt_qual = CoPublicationJournals::find($request->id);
        $dlt_qual->delete();
        $QualDetail = CoPublicationJournals::where('sup_id', $request->sup_id)->get();
        return response()->json($QualDetail);
    }
    public function sup_del_pub_detail(Request $request)
    {
        //return $request;
        $DetailsPublicationJournals = CoDetailsPublicationJournals::find($request->id);
        $SupervisorCerti            = $DetailsPublicationJournals->book_cover;
        unlink("upload/supervisor_publish/" . $SupervisorCerti);
        // unlink("uploads/".$image->image_name);
        // unlink(substr($prsImage, 1));

        $dlt_qual = CoDetailsPublicationJournals::find($request->id);
        $dlt_qual->delete();
        $QualDetail = CoDetailsPublicationJournals::where('sup_id', $request->sup_id)->get();
        return response()->json($QualDetail);
    }
    public function sup_other_test_del(Request $request)
    {
        //return $request;

        $dlt_qual = CoOtherSimilarTest::find($request->id);
        $dlt_qual->delete();
        $QualDetail = CoOtherSimilarTest::where('sup_id', $request->sup_id)->get();
        return response()->json($QualDetail);
    }

    /**
     * Method courseworkApplication
     * @author UrmilaSwain
     * @return void
     */
    public function courseworkApplication()
    {
        $data['page_title']          = 'Coursework application list';
        $data['application_remarks'] = TblCourseWorksApplicationRemarks::with(['get_application_details', 'get_coursework_subject_details'])->get();
        // dd($data['application_remarks']->toArray());
        return view('admin.cosupervisor.coursework.coursework_list')->with($data);
    }

    /**
     * Method courseworkApplicationView
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @author AlokDas
     * @return void
     */
    public function courseworkApplicationView(Request $request, $id = null)
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
        $data['coursework_appl_remarks'] = TblCourseWorksApplicationRemarks::select('dsc6_status', 'dsc6_remarks')->where('course_sub_id', $id)->first();
        $data['submitted'] = $coursework_subjects->isNotEmpty() ? 1 : 0;
        return view('admin.cosupervisor.coursework.coursework_details')->with($data);
    }

    public function courseworkApplicationUpdate(Request $request)
    {
        try {
            //return $request;
            $update_data = [
                'dsc6_status'  => $request->recommendation_status,
                'dsc6_remarks' => $request->comment,
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
        $user_id = session()->get('userdata')['userID'];
        $stu_sem_repo = DB::table('semester_progress_reports as s')->select('s.*')
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
    //Provisional registration DSC recommendation
    public function provisionalRegList(){
        $user_id  = session('userdata')['userID'];
        $provision = DB::table('provisional_registrations as p')->select('i.enrollment_no', 'i.name', 'p.id as app_id', 'p.status')->leftJoin('phd_application_info as i', 'p.appl_id', '=', 'i.id')
       ->leftJoin('phd_supervisors as s', 's.appl_id', '=', 'i.id')
       ->whereIn('p.status', [2,4,5,6,7,8,9,10,11,12,13,14,15])
       ->get();
       return view('admin.cosupervisor.provisional-reg.provisional_reg_list', compact('provision'));
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
        
        return view('admin.cosupervisor.provisional-reg.provisional_reg_view', compact('info', 'coursework_sub', 'provisional', 'id'));
   }
   public function provisionRegSubmit(Request $request, $id){
       //return $request;
       $student_details = DB::table('provisional_registrations')
           ->where('id', $id)
           ->update([
               'status'    => $request->status,
               'cosup_remark'    => $request->cosup_remark,
           ]);
       return redirect()->route('cosup.provisional-registration-list')->with('success', 'you form has been successfully submitted.');
   }
}
