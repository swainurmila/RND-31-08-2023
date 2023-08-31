<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\ChangeNodalCenter;
use App\Models\ChangeResearchSupervisor;
use App\Models\CoDetailsOfSupervisor;
use App\Models\CoDetailsPublicationJournals;
use App\Models\CoOtherSimilarTest;
use App\Models\CoPublicationJournals;
use App\Models\CoSupervisorApplicationInfo;
use App\Models\CoSupervisorEmployment;
use App\Models\CoSupervisorQualification;
use App\Models\Coursework;
use App\Models\CourseWorkSubjects;
use App\Models\DetailsOfSupervisor;
use App\Models\DetailsPublicationJournals;
use App\Models\NodalCentre;
use App\Models\OfficeOrderFormationDsc;
use App\Models\Organisation;
use App\Models\OtherSimilarTest;
use App\Models\PhdApplicationInfo;
use App\Models\PhdCourseWorks;
use App\Models\PhdDiscontinuation;
use App\Models\PhdOtherDocument;
use App\Models\PhdStudentMaternityLeave;
use App\Models\PhdSupervisor;
use App\Models\PublicationJournals;
use App\Models\RenewalRegistration;
use App\Models\SemesterPublication;
use App\Models\Student;
use App\Models\StudentQualification;
use App\Models\SupervisorApplicationInfo;
use App\Models\SupervisorEmployment;
use App\Models\SupervisorQualification;
use DSCExperts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TblRemarks;

class ControlcellApplicationController extends Controller
{
    //santosh code

    /**
     * Method appliedApplication
     * @author AlokDas
     * @return void
     */
    public function appliedApplication()
    {
        $application = PhdApplicationInfo::select('phd_application_info.*')
            ->leftjoin('students as s', 's.id', '=', 'phd_application_info.stud_id')
            ->leftjoin('change_research_supervisor_name as sn', 'phd_application_info.stud_id', '=', 'sn.student_id')
            ->where([['phd_application_info.stu_payment_status', 1]]);
        $data['applications'] = $application
            ->whereIn('application_status', [6, 7, 8, 9, 10, 11, 12])
            // ->whereIn('application_status', [4, 6, 7, 8, 9, 10, 11])
            ->where('deleted_at', null)->get();
        $data['app_status'] = Helpers::appStatus();
        $data['data']       = Helpers::RndDashboardCountNo(session('userdata')['role']);
        return view('controlcell.application.index')->with($data);
    }

    public function supervisor_appliedApplication()
    {
        $applications = Helpers::SupervisorAppliedApplication();
        $app_status   = Helpers::SupervisorAppStatus();
        return view('controlcell.supervisor.index', compact('applications', 'app_status'));
    }

    public function cosupervisor_appliedApplication()
    {
        //return 1;
        $applications = Helpers::cosupervisor_appliedApplication();
        // dd($applications);

        $app_status = Helpers::CoSupervisorAppStatus();
        return view('controlcell.cosupervisor.index', compact('applications', 'app_status'));
    }

    /**
     * Method viewApplication
     * @param $id $id [explicite description]
     * @author AlokDas
     * @return void
     */
    public function viewApplication($id)
    {
        $data['student']                = PhdApplicationInfo::find($id);
        $data['transaction_history']    = DB::table('transaction_history')->where('appl_id', $id)->first(['transaction_id']);
        $data['supervisor']             = PhdSupervisor::where('appl_id', $id)->first();
        $data['student_qualifications'] = StudentQualification::where('appl_id', $id)->get();
        $data['organisation']           = Organisation::where('appl_id', $id)->get();
        return view('controlcell.application.view')->with($data);
    }

    /**
     * Method previewApplication
     * @param $id $id [explicite description]
     * @param $type $type [explicite description]
     * @author AlokDas
     * @return void
     */
    public function previewApplication($id, $type)
    {
        if ($type == 'PHD') {
            $data['student']                = PhdApplicationInfo::select('phd_application_info.*', 'nodal_centres.college_name')->join('nodal_centres', 'phd_application_info.nodal_id', 'nodal_centres.id')->where('phd_application_info.id', $id)->first();
            $data['transaction_history']    = DB::table('transaction_history')->where('appl_id', $id)->first(['transaction_id']);
            $data['supervisor']             = PhdSupervisor::where('appl_id', $id)->first();
            $data['student_qualifications'] = StudentQualification::where('appl_id', $id)->get();
            $data['organisation']           = Organisation::where('appl_id', $id)->get();
            $data['documents']              = PhdOtherDocument::where('appl_id', $id)->get();
        } elseif ($type == 'Nodal') {
            $data['student']                = ChangeNodalCenter::select('*')->get()->where('id', $id)->first();
            $data['transaction_history']    = '';
            $data['supervisor']             = '';
            $data['documents']              = '';
            $data['organisation']           = '';
            $data['student_qualifications'] = '';
        } elseif ($type == 'Supervisor') {
            $data['student']                = ChangeResearchSupervisor::select('*')->get()->where('res_ch_id', $id)->first();
            $student->id                    = $student->res_ch_id;
            $data['transaction_history']    = '';
            $data['supervisor']             = '';
            $data['documents']              = '';
            $data['organisation']           = '';
            $data['student_qualifications'] = '';
        }
        $data['domain_experts'] = DSCExperts::where('appl_id', $id)->with('getProfessorDetails')->get()->map(function ($r) {
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

        $data['type']        = $type;
        $data['tbl_remarks'] = TblRemarks::where('appl_id', $id)->first();
        // dd($data['domain_experts']);
        return view('controlcell.application.preview')->with($data);
    }

    public function SupPreviewApplication($id)
    {
        $supervisors                = SupervisorApplicationInfo::where('sup_id', $id)->first();
        $SupervisorQualification    = SupervisorQualification::where('sup_id', $id)->get();
        $SupervisorEmployment       = SupervisorEmployment::where('sup_id', $id)->get();
        $PublicationJournals        = PublicationJournals::where('sup_id', $id)->get();
        $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id', $id)->get();
        // $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id',$id)->get();
        $OtherSimilarTest    = OtherSimilarTest::where('sup_id', $id)->get();
        $DetailsOfSupervisor = DetailsOfSupervisor::where('sup_id', $id)->first();
        return view('controlcell.supervisor.single-application', compact('id', 'SupervisorQualification', 'SupervisorEmployment', 'PublicationJournals', 'DetailsPublicationJournals', 'supervisors', 'OtherSimilarTest', 'DetailsOfSupervisor'));
    }
    public function CoSupPreviewApplication($id)
    {
        $supervisors = CoSupervisorApplicationInfo::where('sup_id', $id)->first();
        //$last_supervisor_id = $supervisors->id;

        $SupervisorQualification = CoSupervisorQualification::where('sup_id', $id)->get();

        $SupervisorEmployment       = CoSupervisorEmployment::where('sup_id', $id)->get();
        $PublicationJournals        = CoPublicationJournals::where('sup_id', $id)->get();
        $DetailsPublicationJournals = CoDetailsPublicationJournals::where('sup_id', $id)->get();
        // $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id',$id)->get();
        $OtherSimilarTest    = CoOtherSimilarTest::where('sup_id', $id)->get();
        $DetailsOfSupervisor = CoDetailsOfSupervisor::where('sup_id', $id)->first();

        return view('controlcell.cosupervisor.single-application', compact('id', 'SupervisorQualification', 'SupervisorEmployment', 'PublicationJournals', 'DetailsPublicationJournals', 'supervisors', 'OtherSimilarTest', 'DetailsOfSupervisor'));
    }

    public function control_remark_store(Request $request, $id)
    {
        // return $id;
        // return $request;
        $supervisors = SupervisorApplicationInfo::where('sup_id', $id)->first();
        $sup_id      = $supervisors->id;
        DB::table('supervisor_application_info')
            ->where('sup_id', $id)
            ->update([
                'control_cell_status'  => $request->sup_certi_status,
                'control_cell_remarks' => $request->sup_certi_remarks,
            ]);

        for ($i = 0; $i < count($request->sup_quali_remarks); $i++) {

            DB::table('supervisor_qualifications')
                ->where('sup_id', $id)
                ->update([
                    'data_status'          => $request->sup_quali_status[$i],
                    'control_cell_remarks' => $request->sup_quali_remarks[$i],
                ]);
        }

        for ($i = 0; $i < count($request->sup_emp_remarks); $i++) {

            DB::table('supervisor_employments')
                ->where('sup_id', $id)
                ->update([
                    'data_status'          => $request->sup_emp_status[$i],
                    'control_cell_remarks' => $request->sup_emp_remarks[$i],
                ]);
        }

        for ($i = 0; $i < count($request->sup_pub_remarks); $i++) {
            DB::table('publication_journals')
                ->where('sup_id', $id)
                ->update([
                    'data_status'          => $request->sup_pub_status[$i],
                    'control_cell_remarks' => $request->sup_pub_remarks[$i],
                ]);
        }

        for ($i = 0; $i < count($request->sup_jour_remarks); $i++) {
            DB::table('details_publication_journals')
                ->where('sup_id', $id)
                ->update([
                    'data_status'          => $request->sup_jour_status[$i],
                    'control_cell_remarks' => $request->sup_jour_remarks[$i],
                ]);
        }

        for ($i = 0; $i < count($request->sup_det_remarks); $i++) {
            DB::table('other_similar_tests')
                ->where('sup_id', $id)
                ->update([
                    'data_status'          => $request->sup_det_status[$i],
                    'control_cell_remarks' => $request->sup_det_remarks[$i],
                ]);
        }

        return redirect()->route('control-cell.sup.control.remark.draft', [$id])->with('success', 'you form has saved as draft please look throughly and then submit.');

    }
    public function cocontrol_remark_store(Request $request, $id)
    {
        // return $id;
        // return $request;
        $supervisors = CoSupervisorApplicationInfo::where('sup_id', $id)->first();
        $sup_id      = $supervisors->id;
        DB::table('cosupervisor_application_info')
            ->where('sup_id', $id)
            ->update([
                'control_cell_status'  => $request->sup_certi_status,
                'control_cell_remarks' => $request->sup_certi_remarks,
            ]);

        for ($i = 0; $i < count($request->sup_quali_remarks); $i++) {

            DB::table('cosupervisor_qualifications')
                ->where('sup_id', $id)
                ->update([
                    'data_status'          => $request->sup_quali_status[$i],
                    'control_cell_remarks' => $request->sup_quali_remarks[$i],
                ]);
        }

        for ($i = 0; $i < count($request->sup_emp_remarks); $i++) {

            DB::table('cosupervisor_employments')
                ->where('sup_id', $id)
                ->update([
                    'data_status'          => $request->sup_emp_status[$i],
                    'control_cell_remarks' => $request->sup_emp_remarks[$i],
                ]);
        }

        for ($i = 0; $i < count($request->sup_pub_remarks); $i++) {
            DB::table('copublication_journals')
                ->where('sup_id', $id)
                ->update([
                    'data_status'          => $request->sup_pub_status[$i],
                    'control_cell_remarks' => $request->sup_pub_remarks[$i],
                ]);
        }

        for ($i = 0; $i < count($request->sup_jour_remarks); $i++) {
            DB::table('codetails_publication_journals')
                ->where('sup_id', $id)
                ->update([
                    'data_status'          => $request->sup_jour_status[$i],
                    'control_cell_remarks' => $request->sup_jour_remarks[$i],
                ]);
        }

        for ($i = 0; $i < count($request->sup_det_remarks); $i++) {
            DB::table('coother_similar_tests')
                ->where('sup_id', $id)
                ->update([
                    'data_status'          => $request->sup_det_status[$i],
                    'control_cell_remarks' => $request->sup_det_remarks[$i],
                ]);
        }

        return redirect()->route('control-cell.cosup.control.remark.draft', [$id])->with('success', 'you form has saved as draft please look throughly and then submit.');

    }

    public function control_remark_draft($id)
    {
        //return $id;

        $supervisors = SupervisorApplicationInfo::where('sup_id', $id)->first();
        //$last_supervisor_id = $supervisors->id;

        $SupervisorQualification = SupervisorQualification::where('sup_id', $id)->get();

        $SupervisorEmployment       = SupervisorEmployment::where('sup_id', $id)->get();
        $PublicationJournals        = PublicationJournals::where('sup_id', $id)->get();
        $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id', $id)->get();
        // $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id',$id)->get();
        $OtherSimilarTest    = OtherSimilarTest::where('sup_id', $id)->get();
        $DetailsOfSupervisor = DetailsOfSupervisor::where('sup_id', $id)->first();

        return view('controlcell.supervisor.preview', compact('id', 'SupervisorQualification', 'SupervisorEmployment', 'PublicationJournals', 'DetailsPublicationJournals', 'supervisors', 'OtherSimilarTest', 'DetailsOfSupervisor'));
        // return redirect()->route('control-cell.sup-all-application');
    }
    public function cosup_control_remark_draft($id)
    {
        //return $id;

        $supervisors = CoSupervisorApplicationInfo::where('sup_id', $id)->first();
        //$last_supervisor_id = $supervisors->id;

        $SupervisorQualification = CoSupervisorQualification::where('sup_id', $id)->get();

        $SupervisorEmployment       = CoSupervisorEmployment::where('sup_id', $id)->get();
        $PublicationJournals        = CoPublicationJournals::where('sup_id', $id)->get();
        $DetailsPublicationJournals = CoDetailsPublicationJournals::where('sup_id', $id)->get();
        // $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id',$id)->get();
        $OtherSimilarTest    = CoOtherSimilarTest::where('sup_id', $id)->get();
        $DetailsOfSupervisor = CoDetailsOfSupervisor::where('sup_id', $id)->first();

        return view('controlcell.cosupervisor.preview', compact('id', 'SupervisorQualification', 'SupervisorEmployment', 'PublicationJournals', 'DetailsPublicationJournals', 'supervisors', 'OtherSimilarTest', 'DetailsOfSupervisor'));
        // return redirect()->route('control-cell.sup-all-application');
    }

    public function control_remark_submit(Request $request, $id)
    {
        //return $request;

        // return $app_remark = $request->sup_certi_status;

        DB::table('supervisor_application_info')
            ->where('sup_id', $id)
            ->update([
                'application_status' => ($request->sup_certi_status == 'Approved') ? 2 : 3,
            ]);
        return redirect()->route('control-cell.sup-all-application');
    }
    public function cosup_control_remark_submit(Request $request, $id)
    {

        DB::table('cosupervisor_application_info')
            ->where('sup_id', $id)
            ->update([
                'application_status' => ($request->sup_certi_status == 'Approved') ? 2 : 3,
            ]);
        return redirect()->route('control-cell.cosup-all-application');
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
        // dd($request->all());
        //return $request;

        $check_status = PhdApplicationInfo::where('id', $request->appl_id)->first();
        if ($check_status) {
            // dd($check_status);

            if ($check_status->application_status == 10) {
                $update_application = PhdApplicationInfo::where('id', $request->appl_id)->update(['application_status' => $request->transfer_to_status]);
                if ($update_application) {
                    $update_remarks = TblRemarks::where('appl_id', $request->appl_id)->update(['transfer_to_rnd_remarks' => $request->transfer_to_remarks]);
                    if ($update_remarks) {
                        return redirect()->route('control-cell.all-application')->with('success', 'Application has submitted successfully.');
                    } else {
                        $data['data']    = [];
                        $data['message'] = 'Failed to update remarks.';
                        return response($data, 500);
                    }
                }
            } else {
                PhdApplicationInfo::where('id', $id)
                    ->update([
                        'application_status' => $request->rndcell_recommendation_status,
                    ]);

                $tbl_remarks_status = TblRemarks::where('appl_id', $request->appl_id);
                if ($tbl_remarks_status->get()->isNotEmpty()) {
                    $tbl_remarks_status->update([
                        'appl_id'          => $request->appl_id,
                        'rnd_cell'         => $request->domain_expert_rndcell_remarks,
                        'rnd_cell_overall' => $request->phd_app_rndcell_remarks,
                    ]);
                } else {
                    $tbl_remarks_status->insert([
                        'appl_id'          => $request->appl_id,
                        'rnd_cell'         => $request->domain_expert_rndcell_remarks,
                        'rnd_cell_overall' => $request->phd_app_rndcell_remarks,
                    ]);
                }
                return redirect()->route('control-cell.applied-application')->with('success', 'Application has submitted successfully.');
            }
        } else {
            $data['data']    = $check_status;
            $data['message'] = 'No data available.';
            return response($data, 500);
        }

    }

    /**
     * Method allApplication
     * @author AlokDas
     * @return void
     */
    public function allApplication()
    {
        $application          = PhdApplicationInfo::select(['id', 'stud_id', 'name', 'enrollment_no', 'stu_payment_status', 'stu_payment_status', 'enrollment_date', 'email', 'phone', 'topic_of_phd_work', 'student_category', 'application_status', 'notification_no', 'notification_date', 'notified'])->where([['stu_payment_status', 1]]);
        $data['applications'] = $application->where([['application_status', '!=', 2]])->where('application_status', '!=', 1)->get();
        $data['app_status']   = Helpers::SupervisorAppStatus();

        return view('controlcell.application.all-application')->with($data);
    }

    /**
     * Method singleApplication
     * @param $id $id [explicite description]
     * @author AlokDas
     * @return void
     */
    public function singleApplication($id)
    {
        $student                = PhdApplicationInfo::select('phd_application_info.*', 'nodal_centres.college_name')->join('nodal_centres', 'phd_application_info.nodal_id', 'nodal_centres.id')->where('phd_application_info.id', $id)->first();
        $supervisor             = PhdSupervisor::where('appl_id', $id)->first();
        $student_qualifications = StudentQualification::where('appl_id', $id)->get();
        $organisation           = Organisation::where('appl_id', $id)->get();
        $applicationStatus      = Helpers::applicationStatus($id);
        $transaction_history    = DB::table('transaction_history')->where('appl_id', $id)->first(['transaction_id']);
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
                'status'       => $r->status ?? '',
            ];
        });
        $tbl_remarks = TblRemarks::where('appl_id', $id)->first();
        return view('controlcell.application.single-application', compact('student', 'supervisor', 'student_qualifications', 'organisation', 'applicationStatus', 'transaction_history', 'documents', 'domain_experts', 'tbl_remarks'));
    }

    public function SupallApplication()
    {
        $applications = Helpers::SupervisorAllApplications();
        $app_status   = Helpers::SupervisorAppStatus();
        return view('controlcell.supervisor.all_app_index', compact('applications', 'app_status'));
    }

    public function CoSupallApplication()
    {
        try {
            $data['applications'] = Helpers::CoSupervisorAllApplications();
            $data['app_status']   = Helpers::CoSupervisorAppStatus();
            return view('controlcell.cosupervisor.all_app_index')->with($data);
            // return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    //subash code for extra forms
    public function dscDomainExpert()
    {
        $nodal_centre = DB::table('nodal_centres')->select('college_name')->get();
        return view('admin.controlcell.proposed-dsc-domain-expert', compact('nodal_centre'));
    }

    public function proposedDomainExpertSubmit(Request $request)
    {
        $this->validate($request, [
            'candidate_name'            => 'required',
            'father_husband_name'       => 'required',
            'corres_address'            => 'required',
            'enrollment_no'             => 'required',
            'department_ncr'            => 'required',
            'dob'                       => 'required',
            'category'                  => 'required',
            'category_of_studentship'   => 'required',
            'faculty_dept'              => 'required',
            'discipline_specialization' => 'required',
            'broadarea_of_research_pur' => 'required',
            'sponsored_student'         => 'required',
            'supervisor_name'           => 'required',
            'supervisor_address'        => 'required',
            'head_of_institute'         => 'required',
            'head_of_dept'              => 'required',
            'expert_member_1'           => 'required',
            'expert_member_2'           => 'required',
            'co_sup_convencer'          => 'required',
            'principal_convencer'       => 'required',
        ]);
        $new_dsc                            = new OfficeOrderFormationDsc();
        $new_dsc->candidate_name            = $request->candidate_name;
        $new_dsc->father_husband_name       = $request->father_husband_name;
        $new_dsc->corres_address            = $request->corres_address;
        $new_dsc->enrollment_no             = $request->enrollment_no;
        $new_dsc->department_ncr            = $request->department_ncr;
        $new_dsc->dob                       = $request->dob;
        $new_dsc->category                  = $request->category;
        $new_dsc->category_of_studentship   = $request->category_of_studentship;
        $new_dsc->faculty_dept              = $request->faculty_dept;
        $new_dsc->discipline_specialization = $request->discipline_specialization;
        $new_dsc->broadarea_of_research_pur = $request->broadarea_of_research_pur;
        $new_dsc->sponsored_student         = $request->sponsored_student;
        $new_dsc->supervisor_name           = $request->supervisor_name;
        $new_dsc->supervisor_address        = $request->supervisor_address;
        $new_dsc->head_of_institute         = $request->head_of_institute;
        $new_dsc->head_of_dept              = $request->head_of_dept;
        $new_dsc->expert_member_1           = $request->expert_member_1;
        $new_dsc->expert_member_2           = $request->expert_member_2;
        $new_dsc->co_sup_convencer          = $request->co_sup_convencer;
        $new_dsc->principal_convencer       = $request->principal_convencer;
        if ($new_dsc->save()) {
            $msg = '<div class="offset-md-0 col-md-offset-0 col-md-12 animated fadeInDown alert alert-success" role="alert"><strong>Data Insert Successfull.</strong></div>';
            return redirect("control-cell/proposed-dsc-domain-expert")->with('message', $msg);
        } else {
            $msg = '<div class="offset-md-0 col-md-offset-0 col-md-12 animated fadeInDown alert alert-danger" role="alert"><strong>Failed to Insert Data.</strong></div>';
            return redirect("control-cell/proposed-dsc-domain-expert")->with('message', $msg);
        }
    }

    // end of subash code

    // renewal
    public function renewalRequest()
    {
        $value = RenewalRegistration::all();
        return view('controlcell.supervisor.renewal_request', compact('value'));
    }
    public function renewalRegistration($id)
    {
        $nodal_centre = NodalCentre::all();
        $value        = RenewalRegistration::find($id);
        return view('controlcell.supervisor.renewal_registration', compact('nodal_centre', 'value'));
    }
    public function renewalRegistrationStore(Request $request, $id)
    {
        $value                     = RenewalRegistration::find($id);
        $value->status             = $request->status;
        $value->remark_controlcell = $request->remark_controlcell;
        $value->save();
        return redirect('control-cell/renewal-request')->with('message', 'The form has been submitted successfully!');
    }
    // end of renewal
    public function defenceVivaVoice()
    {
        return view('admin.controlcell.defence-viva-voice');
    }
    public function provisionalRegPhd()
    {
        return view('admin.controlcell.provisional_reg_phd');
    }
    public function dscFormation()
    {
        return view('admin.controlcell.dsc_formation');
    }
    public function control_semester_list()
    {

        $semister_list = DB::table('phd_semister_registration as psr')
            ->whereNotNull('semester')->where('nodal_status', 1)->get();
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
        //return $semester_details;
        return view('controlcell.semester.index', compact('semester_details'));
    }

    public function control_semester_view($id)
    {
        //return $id;

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

            $list_of_coursework[] = array(
                'list'   => $data->course_name,
                'credit' => $data->credit,
                'status' => $course_status[$key],
            );
        }

        return view('controlcell.semester.phd_semesterform', compact('phd_semister_registration', 'reg_details', 'list_of_coursework'));
    }
    public function control_semester_status(Request $request, $id)
    {
        // return $request;

        DB::table('phd_semister_registration')
            ->where('semister_reg_id', $id)
            ->update(
                [
                    'control_status' => $request->nod_sem_approve,
                    'control_remark' => $request->con_remarks,

                ]
            );

        return redirect()->route('control-cell.semester.list');

    }

    public function sup_semester_list()
    {
        //return Auth::guard('supervisor')->id();
        //$sup_id = Auth::guard('nodalcentre')->id();
        $stu_sem_repo = DB::table('semester_progress_reports')
            ->whereIn('status', [6, 8, 9, 10])
            ->get();

        return view('controlcell.semester.report.semester-progress-listing', compact('stu_sem_repo'));

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

        return view('controlcell.semester.report.semester-progress-view', compact('student_sem_detaills', 'sem_publication', 'supervisor', 'id', 'cosupervisor'));
    }

    public function sup_semester_store(Request $request, $id)
    {
        //return $request;
        $student_details = DB::table('semester_progress_reports')
            ->where('id', $id)
            ->update([
                'status'          => $request->status,
                'control_remarks' => $request->remark,
            ]);

        return redirect()->route('control-cell.control.semester.list');
    }
    //Discontinuation as Ph.D
    public function discontinueRequest()
    {
        $value = PhdDiscontinuation::all();
        return view('controlcell.supervisor.discontinue_request', compact('value'));
    }
    public function discontinueRegistration($id)
    {
        $nodal = NodalCentre::select('nodal_centres.college_name', 'p.present_center')
            ->leftJoin('phd_discontinuations as p', 'nodal_centres.id', '=', 'p.present_center')->orderby('p.id', 'desc')
            ->first();
        $value = PhdDiscontinuation::find($id);
        return view('controlcell.supervisor.discontinue_registration', compact('nodal', 'value'));
    }
    public function discontinueRegistrationStore(Request $request, $id)
    {
        //return $request;
        $value                     = PhdDiscontinuation::find($id);
        $value->status             = $request->status;
        $value->remark_controlcell = $request->remark_controlcell;
        $value->save();
        return redirect('control-cell/discontinue-request')->with('message', 'The form has been submitted successfully!');
    }

    public function special_leave_listing()
    {
        //return 1;
        $leave_list = PhdStudentMaternityLeave::where('vc_status', 1)->get();
        return view('controlcell.leave.index', compact('leave_list'));
    }
    public function special_leave_view($id)
    {
        //return $id;
        // $application = PhdStudentMaternityLeave::find($id)->pluck('stud_id')->first();

        // $student = PhdStudentMaternityLeave::where('id',$id)->first();
        $student = DB::table('phd_student_maternity_leaves as psml')->select('psml.*', 'pai.id as app_id', 'pai.created_at')
            ->Join('phd_application_info as pai', 'pai.stud_id', '=', 'psml.stud_id')
            ->where('psml.id', $id)
            ->orderBy('pai.id', 'desc')
            ->first();

        return view('controlcell.leave.special_leave_view', compact('student'));
    }
    public function special_leave_status(Request $request, $id)
    {
        //return $id;
        DB::table('phd_student_maternity_leaves')
            ->where('id', $id)
            ->update([
                'control_status'  => $request->sup_leav_approve,
                'control_remarks' => $request->sem_remarks,
                'control_review'  => $request->control_review,
            ]);
        return redirect()->route('control-cell.leave.list');
    }

    public function extention_listing()
    {
        $student = Helpers::ExtensionWork();
        return view('controlcell.ext_complete_work.index', compact('student'));
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

        return view('controlcell.ext_complete_work.extensiton_work_view', compact('student', 'comp_not_compl'));
    }
    public function extention_work_status(Request $request, $id)
    {
        $student = DB::table('extention_complete_works')->where('id', $id)
            ->update([
                'application_status' => $request->sup_leav_approve,
                'control_remarks'    => $request->sem_remarks,
            ]);
        return redirect()->route('control-cell.extention.work.listing');
    }
    //Change nodal center
    public function changeNodalCenter()
    {
        $value = ChangeNodalCenter::all();
        return view('controlcell.application.change_nodal', compact('value'));
    }
    public function changeNodalView($id)
    {
        $std = Student::select('students.registration_date', 'c.student_id', 'p.enrollment_date')
            ->leftjoin('change_nodal_center as c', 'students.id', '=', 'c.student_id')->orderby('c.id', 'desc')
            ->leftjoin('phd_application_info as p', 'c.student_id', '=', 'p.stud_id')
            ->first();
        $value = ChangeNodalCenter::find($id);
        return view('controlcell.application.change_nodal_view', compact('value', 'std'));
    }
    public function changeNodalRemark(Request $request, $id)
    {
        //return $request;
        $value                     = ChangeNodalCenter::find($id);
        $value->rd_approved        = $request->rd_approved;
        $value->controlcell_remark = $request->controlcell_remark;
        $value->save();
        return redirect('/control-cell/change-nodal-request')->with('message', 'Remank is updated successfully');
    }
    //change reaearch supervisor/co-supervisor
    public function change_supervisor_request()
    {
        $value = ChangeResearchSupervisor::all();
        return view('controlcell.application.change_supervisor_request', compact('value'));
    }
    public function view_change_supervisor($id)
    {
        $value = ChangeResearchSupervisor::where('change_research_supervisor_name.res_ch_id', $id)
            ->leftJoin('nodal_centres', 'change_research_supervisor_name.name_of_ncr', '=', 'nodal_centres.id')
            ->first();
        $std = Student::select('students.registration_date', 'c.student_id', 'p.enrollment_date', 'p.name_of_faculty', 'p.enrollment_no')
            ->leftjoin('change_nodal_center as c', 'students.id', '=', 'c.student_id')->orderby('c.id', 'desc')
            ->leftjoin('phd_application_info as p', 'c.student_id', '=', 'p.stud_id')
            ->first();
        return view('controlcell.application.change_supervisor_view', compact('value', 'std'));
    }
    public function change_supervisor_remark($id, Request $request)
    {
        //return $request;
        $value = DB::table('change_research_supervisor_name')->where('res_ch_id', $id)->update(
            ['status'   => $request->status,
                'rd_remark' => $request->rd_remark]);
        return redirect('control-cell/change_supervisor')->with('message', 'The form has been submitted successfully!');
    }

    /**
     * Method update_transfer_to_je_remarks
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function update_transfer_to_je_remarks(Request $request)
    {
        try {
            $appl_id             = $request->appl_id;
            $transfer_to_status  = $request->transfer_to_status;
            $transfer_to_remarks = $request->transfer_to_remarks;

            // 12 means Approved by RnD Cell and Transfered to JE
            $update_application = PhdApplicationInfo::where('id', $appl_id)->update(['application_status' => $transfer_to_status]);
            if ($update_application) {
                $update_remarks = TblRemarks::where('appl_id', $appl_id)->update(['transfer_to_rnd_remarks' => $transfer_to_remarks]);
                if ($update_remarks) {
                    $data['data']    = $update_remarks;
                    $data['message'] = 'Remarks updated successfully.';
                    return redirect()->route('control-cell.applied-application');
                    // return response($data, 200);
                } else {
                    $data['data']    = [];
                    $data['message'] = 'Failed to update remarks.';
                    return redirect()->route('control-cell.applied-application');
                }
            } else {
                $data['data']    = [];
                $data['message'] = 'Failed to update application status.';
                return response($data, 500);
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
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
        return view("controlcell.coursework.view_coursework")->with($data);
    }
    public function viewCourseworkUpdate(Request $request)
    {
        //return $request;
        $update_data = [
            'status'          => $request->recommendation_status,
            'rndcell_comment' => $request->comment,
        ];

        $data['data']    = PhdCourseWorks::where('id', $request->coursework_id)->update($update_data);
        $data['message'] = 'Status updated successfully';
        return redirect()->route('control-cell.applied-application')->with($data);
    }
    public function courseworkTransfer(Request $request)
    {
        //return $request;
        $update_data = [
            'status' => $request->transfer_status,
        ];

        $data['data']    = PhdCourseWorks::where('id', $request->coursework_id)->update($update_data);
        $data['message'] = 'Status updated successfully';
        return redirect()->route('control-cell.applied-application')->with($data);
    }

    //Semester Registration at control cell
    public function semesterRegister()
    {
        $info = DB::table('semester_payments as p')->select('i.enrollment_no', 'i.name', 's.semester', 's.status', 'p.id as app_id')
            ->leftJoin('semester_regisration_statuses as s', 's.sem_payment_id', '=', 'p.id')
            ->leftJoin('phd_application_info as i', 'i.id', '=', 's.appl_id')
            ->whereIn('s.status', [6, 8, 9, 10])
            ->get();
        return view('controlcell.semester.semester_register', compact('info'));
    }
    public function semesterRegisterView($id, Request $request)
    {
        $info = DB::table('semester_payments as p')->select('i.enrollment_no', 'i.name', 'p.semester', 'p.id as app_id', 'st.registration_no', 'st.registration_date', 'i.ncr_department', 'nodal.college_name', 'nodal.id as nod_id', 'd.departments_title', 'i.id as appl_id', 'i.topic_of_phd_work', 'i.enrollment_date', 'ps.supervisor_name')
            ->leftJoin('phd_application_info as i', 'i.id', '=', 'p.appl_id')
            ->leftJoin('students as st', 'st.id', '=', 'i.stud_id')
            ->leftJoin('nodal_centres as nodal', 'nodal.id', '=', 'i.nodal_id')
            ->rightJoin('departments as d', 'd.id', '=', 'i.academic_programme')
            ->leftJoin('phd_supervisors as ps', 'ps.appl_id', '=', 'p.appl_id')
            ->where('p.id', $id)->first();
        $coursework_sub  = DB::table('tbl_course_work_subjects as c')->where('appl_id', $info->appl_id)->get();
        $payment_details = DB::table('semester_payments')->where('id', $id)->first();
        $payemt_status   = DB::table('semester_regisration_statuses')->where('sem_payment_id', $id)->first();
        return view('controlcell.semester.semester_register_view', compact('coursework_sub', 'info', 'payment_details', 'payemt_status', 'id'));
    }
    public function semesterRegisterStore(Request $request, $id)
    {
        // return $request;
        $reg_details = DB::table('semester_regisration_statuses')
            ->where('sem_payment_id', $id)
            ->update([
                'status'     => $request->status,
                'rnd_remark' => $request->rnd_remark,
            ]);

        return redirect()->route('control-cell.semester-register')->with('success', 'your form has successfully submitted');
    }
    public function semesterPayment($id)
    {
        $student = DB::table('semester_payments as s')->select('s.appl_id', 'p.name', 'p.enrollment_no')
            ->leftJoin('phd_application_info as p', 's.appl_id', '=', 'p.id')
            ->where('s.id', $id)->first();

        $transaction = DB::table('transaction_history')->orderBy('id', 'DESC')->where('appl_id', $student->appl_id)->whereIn('type', ['bput semester fee', 'ncr semester fee'])->get();
        return view('admin.phdstudents.semester-payment-invoice', compact('student', 'transaction', 'id'));
    }
    //PROVISIONAL REGISTRATION
    public function provisionalRegList()
    {
        $provision = DB::table('provisional_registrations as p')->select('i.enrollment_no', 'i.name', 'p.id as app_id', 'p.status')->leftJoin('phd_application_info as i', 'p.appl_id', '=', 'i.id')
            ->leftJoin('phd_supervisors as s', 's.appl_id', '=', 'i.id')
            ->whereIn('p.status', [8, 10, 11, 12, 13, 14, 15])
            ->get();
        return view('controlcell.provisional_registration.provisional_reg_list', compact('provision'));
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

        return view('controlcell.provisional_registration.provisional_reg_view', compact('info', 'coursework_sub', 'provisional', 'id'));
    }
    public function provisionRegSubmit(Request $request, $id)
    {
        //return $request;
        $student_details = DB::table('provisional_registrations')
            ->where('id', $id)
            ->update([
                'status'     => $request->status,
                'rnd_remark' => $request->rnd_remark,
            ]);
        return redirect()->route('control-cell.provisional-registration-list')->with('success', 'you form has been successfully submitted.');
    }
    public function provisionRegTransfer(Request $request, $id)
    {
        //return $request;
        $student_details = DB::table('provisional_registrations')
            ->where('id', $id)
            ->update([
                'status' => $request->status,
            ]);
        return redirect()->route('control-cell.provisional-registration-list')->with('success', 'you form has been successfully submitted.');
    }
}
