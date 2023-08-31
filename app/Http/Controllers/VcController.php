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
use App\Models\Student;
use App\Models\StudentQualification;
use App\Models\SupervisorApplicationInfo;
use App\Models\SupervisorEmployment;
use App\Models\SupervisorQualification;
use App\Models\PhdCourseWorks;
use App\Models\CourseWorkSubjects;
use DSCExperts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TblRemarks;
use Carbon\Carbon;

class VcController extends Controller
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
        $data['applications'] = $application->whereIn('phd_application_info.application_status', [8, 10, 11, 12])->get();
        $data['app_status']   = Helpers::appStatus();
        return view('vc.application.index')->with($data);
    }

    public function vc_appliedApplication()
    {
        // return 1;
        $applications = Helpers::SupervisorAppliedApplication();
        // dd($applications);

        $app_status = Helpers::SupervisorAppStatus();
        return view('vc.supervisor.index', compact('applications', 'app_status'));
    }
    public function vc_coappliedApplication()
    {
        //return 1;
        $applications = Helpers::cosupervisor_appliedApplication();
        // dd($applications);

        $app_status = Helpers::CoSupervisorAppStatus();
        return view('vc.cosupervisor.index', compact('applications', 'app_status'));
    }

    // public function previewApplication($id)
    // {
    //     $student = PhdApplicationInfo::select('phd_application_info.*', 'nodal_centres.college_name')->join('nodal_centres', 'phd_application_info.nodal_id', 'nodal_centres.id')->where('phd_application_info.id', $id)->first();
    //     $transaction_history = DB::table('transaction_history')->where('appl_id', $id)->first(['transaction_id']);
    //     $supervisor = PhdSupervisor::where('appl_id', $id)->first();
    //     $student_qualifications = StudentQualification::where('appl_id', $id)->get();
    //     $organisation = Organisation::where('appl_id', $id)->get();
    //     $documents = PhdOtherDocument::where('appl_id', $id)->get();

    //     return view('vc.application.preview', compact('student', 'supervisor', 'student_qualifications', 'organisation', 'transaction_history', 'documents'));
    // }
    public function VcPreviewApplication($id)
    {
        $supervisors = SupervisorApplicationInfo::where('sup_id', $id)->first();
        //$last_supervisor_id = $supervisors->id;

        $SupervisorQualification = SupervisorQualification::where('sup_id', $id)->get();

        $SupervisorEmployment       = SupervisorEmployment::where('sup_id', $id)->get();
        $PublicationJournals        = PublicationJournals::where('sup_id', $id)->get();
        $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id', $id)->get();
        // $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id',$id)->get();
        $OtherSimilarTest    = OtherSimilarTest::where('sup_id', $id)->get();
        $DetailsOfSupervisor = DetailsOfSupervisor::where('sup_id', $id)->first();

        return view('vc.supervisor.single-application', compact('id', 'SupervisorQualification', 'SupervisorEmployment', 'PublicationJournals', 'DetailsPublicationJournals', 'supervisors', 'OtherSimilarTest', 'DetailsOfSupervisor'));
    }
    public function Vc_CoPreviewApplication($id)
    {
        //return 1;
        $supervisors = CoSupervisorApplicationInfo::where('sup_id', $id)->first();
        //$last_supervisor_id = $supervisors->id;

        $SupervisorQualification = CoSupervisorQualification::where('sup_id', $id)->get();

        $SupervisorEmployment       = CoSupervisorEmployment::where('sup_id', $id)->get();
        $PublicationJournals        = CoPublicationJournals::where('sup_id', $id)->get();
        $DetailsPublicationJournals = CoDetailsPublicationJournals::where('sup_id', $id)->get();
        // $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id',$id)->get();
        $OtherSimilarTest    = CoOtherSimilarTest::where('sup_id', $id)->get();
        $DetailsOfSupervisor = CoDetailsOfSupervisor::where('sup_id', $id)->first();

        return view('vc.cosupervisor.single-application', compact('id', 'SupervisorQualification', 'SupervisorEmployment', 'PublicationJournals', 'DetailsPublicationJournals', 'supervisors', 'OtherSimilarTest', 'DetailsOfSupervisor'));
    }

    // public function vc_remark_store(Request $request, $id)
    //     {
    //       // return $id;
    //        // return $request;
    //        $supervisors = SupervisorApplicationInfo::where('sup_id', $id)->first();
    //        //$sup_id = $supervisors->id;
    //        DB::table('supervisor_application_info')
    //            ->where('sup_id', $id)
    //            ->update([
    //                'control_cell_status'  => $request->sup_certi_status,
    //                'vc_remarks'           => $request->vc_remark,
    //            ]);

    //        for ($i = 0; $i < count($request->sup_quali_remarks); $i++) {

    //            DB::table('supervisor_qualifications')
    //            ->where('sup_id', $id)
    //            ->update([
    //                'data_status'              => $request->sup_quali_status[$i],
    //                'vc_remarks'     => $request->sup_quali_remarks[$i],
    //            ]);
    //        }

    //        for ($i = 0; $i < count($request->sup_emp_remarks); $i++) {

    //            DB::table('supervisor_employments')
    //            ->where('sup_id', $id)
    //            ->update([
    //                'data_status'              => $request->sup_emp_status[$i],
    //                'vc_remarks'     => $request->sup_emp_remarks[$i],
    //            ]);
    //        }

    //        for ($i = 0; $i < count($request->sup_pub_remarks); $i++) {
    //            DB::table('publication_journals')
    //            ->where('sup_id', $id)
    //            ->update([
    //                'data_status'              => $request->sup_pub_status[$i],
    //                'vc_remarks'     => $request->sup_pub_remarks[$i],
    //            ]);
    //        }

    //        for ($i = 0; $i < count($request->sup_jour_remarks); $i++) {
    //            DB::table('details_publication_journals')
    //            ->where('sup_id', $id)
    //            ->update([
    //                'data_status'              => $request->sup_jour_status[$i],
    //                'vc_remarks'     => $request->sup_jour_remarks[$i],
    //            ]);
    //        }

    //        for ($i = 0; $i < count($request->sup_det_remarks); $i++) {
    //            DB::table('other_similar_tests')
    //            ->where('sup_id', $id)
    //            ->update([
    //                'data_status'              => $request->sup_det_status[$i],
    //                'vc_remarks'     => $request->sup_det_remarks[$i],
    //            ]);
    //        }

    //         return redirect()->route('vc.sup.vc.remark.draft', [$id])->with('success','you form has saved as draft please look throughly and then submit.');

    //     }

    public function vc_remark_store(Request $request, $id)
    {
        // return $id;
        // return $request;
        $supervisors = SupervisorApplicationInfo::where('sup_id', $id)->first();
        //$sup_id = $supervisors->id;
        DB::table('supervisor_application_info')
            ->where('sup_id', $id)
            ->update([
                'control_cell_status' => $request->sup_certi_status,
                'vc_remarks'          => $request->vc_remark,
                'application_status'  => ($request->sup_certi_status == 'Approved') ? 4 : 5,

            ]);

        return redirect()->route('vc.vc-all-application');

    }

    public function vc_coremark_store(Request $request, $id)
    {
        // return $id;
        // return $request;
        $supervisors = CoSupervisorApplicationInfo::where('sup_id', $id)->first();
        //$sup_id = $supervisors->id;
        DB::table('cosupervisor_application_info')
            ->where('sup_id', $id)
            ->update([
                'control_cell_status' => $request->sup_certi_status,
                'vc_remarks'          => $request->vc_remark,
                'application_status'  => ($request->sup_certi_status == 'Approved') ? 4 : 5,

            ]);

        return redirect()->route('vc.co-all-application');

    }

    public function vc_remark_draft($id)
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

        return view('vc.supervisor.preview', compact('id', 'SupervisorQualification', 'SupervisorEmployment', 'PublicationJournals', 'DetailsPublicationJournals', 'supervisors', 'OtherSimilarTest', 'DetailsOfSupervisor'));
        // return redirect()->route('control-cell.sup-all-application');
    }

    public function vc_remark_submit(Request $request, $id)
    {
        //return $request;

        // return $app_remark = $request->sup_certi_status;

        DB::table('supervisor_application_info')
            ->where('sup_id', $id)
            ->update([
                'application_status'  => ($request->sup_certi_status == 'Approved') ? 4 : 5,
                'control_cell_status' => $request->sup_certi_status,
            ]);
        return redirect()->route('vc.vc-all-application');
    }

    public function VcallApplication()
    {
        dd('as');
        //return 1;
        $applications = Helpers::SupervisorAllApplications();
        //dd($applications);
        $app_status = Helpers::SupervisorAppStatus();
        return view('vc.supervisor.all_app_index', compact('applications', 'app_status'));
    }
    public function VccoallApplication()
    {
        //return 1;
        $applications = Helpers::CoSupervisorAllApplications();
        //dd($applications);
        $app_status = Helpers::CoSupervisorAppStatus();
        return view('vc.cosupervisor.all_app_index', compact('applications', 'app_status'));
    }

    // public function approveApplication(Request $request, $id)
    // {
    //     DB::table('phd_application_info')
    //         ->where('id', $id)
    //         ->update([
    //             'application_status' => ($request->status == 6) ? 6 : 7,
    //             'vc_remarks' => $request->application_remark,
    //         ]);
    //     return redirect()->route('vc.applied-application')->with('success', 'Application has submitted successfully.');
    // }

    public function allApplication()
    {
        $applications = Helpers::allApplications();
        $app_status   = Helpers::appStatus();

        return view('vc.application.all-application', compact('applications', 'app_status'));
    }
    public function singleApplication($id)
    {
        $student                = PhdApplicationInfo::select('phd_application_info.*', 'nodal_centres.college_name')->join('nodal_centres', 'phd_application_info.nodal_id', 'nodal_centres.id')->where('phd_application_info.id', $id)->first();
        $supervisor             = PhdSupervisor::where('appl_id', $id)->first();
        $student_qualifications = StudentQualification::where('appl_id', $id)->get();
        $organisation           = Organisation::where('appl_id', $id)->get();
        $applicationStatus      = Helpers::applicationStatus($id);
        $transaction_history    = DB::table('transaction_history')->where('appl_id', $id)->first(['transaction_id']);
        $documents              = PhdOtherDocument::where('appl_id', $id)->get();

        return view('vc.application.single-application', compact('student', 'supervisor', 'student_qualifications', 'organisation', 'applicationStatus', 'transaction_history', 'documents'));
    }

    // subash code starts here
    /**
     * Method approveApplication
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @param $type $type [explicite description]
     * @author AlokDas
     * @return void
     */
    public function approveApplication(Request $request, $id, $type)
    {
        if ($type == 'Nodal') {
            DB::table('change_nodal_center')->where('id', $id)->update([
                'vice_chancellor' => 1,
                'vc_remarks'      => $request->application_remark,
            ]);
        } elseif ($type == 'PHD') {
            DB::table('phd_application_info')->where('id', $id)->update([
                // 'application_status' => ($request->status == 6) ? 6 : 7,
                // 'vc_remarks'         => $request->application_remark,
                'application_status' => $request->status,
                'vc_remarks'         => $request->application_remark,
            ]);
            TblRemarks::where('appl_id', $id)->update([
                'vc'         => $request->domain_expert_vc_remarks,
                'vc_overall' => $request->application_remark,
            ]);

            foreach ($request->professor_id as $pid) {
                DSCExperts::where('appl_id', $id)->where('ncr_user_id', $pid)->update(['status' => 1]);
            }

        } elseif ($type == 'Supervisor') {
            DB::table('change_research_supervisor_name')->where('res_ch_id', $id)->update([
                'vice_chancellor' => 1,
                'vc_remarks'      => $request->application_remark,
            ]);
        } elseif ($type == 'Student') {
            DB::table('researchwork_change_title')->where('res_id', $id)->update([
                'vice_chancellor' => 1,
                'vc_remarks'      => $request->application_remark,
            ]);
        }

        return redirect()->route('vc.applied-application')->with('success', 'Application has submitted successfully.');
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
            $student                = PhdApplicationInfo::select('phd_application_info.*', 'nodal_centres.college_name')->join('nodal_centres', 'phd_application_info.nodal_id', 'nodal_centres.id')->where('phd_application_info.id', $id)->first();
            $transaction_history    = DB::table('transaction_history')->where('appl_id', $id)->first(['transaction_id']);
            $supervisor             = PhdSupervisor::where('appl_id', $id)->first();
            $student->res_id        = $student->id;
            $student_qualifications = StudentQualification::where('appl_id', $id)->get();
            $organisation           = Organisation::where('appl_id', $id)->get();
            $documents              = PhdOtherDocument::where('appl_id', $id)->get();
            $domain_experts         = DSCExperts::where('appl_id', $id)
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
            $tbl_remarks = TblRemarks::where('appl_id', $id)->first();
        } elseif ($type == 'Nodal') {
            $student                = ChangeNodalCenter::select('*')->get()->where('id', $id)->first();
            $student->res_id        = $student->id;
            $transaction_history    = '';
            $supervisor             = '';
            $documents              = '';
            $organisation           = '';
            $student_qualifications = '';
        } elseif ($type == 'Supervisor') {
            $student                = ChangeResearchSupervisor::select('*')->get()->where('res_ch_id ', $id)->first();
            $student->res_id        = $student->res_ch_id;
            $transaction_history    = '';
            $supervisor             = '';
            $documents              = '';
            $organisation           = '';
            $student_qualifications = '';
        } elseif ($type == 'Student') {
            $student                = ResearchworkChangeTitle::select('*')->get()->where('res_id', $id)->first();
            $student->res_id        = $student->res_id;
            $transaction_history    = '';
            $supervisor             = '';
            $documents              = '';
            $organisation           = '';
            $student_qualifications = '';
        }

        return view('vc.application.preview', compact('student', 'supervisor', 'student_qualifications', 'organisation', 'transaction_history', 'documents', 'type', 'domain_experts', 'tbl_remarks'));
    }

    // renewal code
    public function renewalRequest()
    {
        $value = RenewalRegistration::all();
        return view('vc.supervisor.renewal_request', compact('value'));
    }
    public function renewalRegistration($id)
    {
        $nodal_centre = NodalCentre::all();
        $value        = RenewalRegistration::find($id);
        return view('vc.supervisor.renewal_registration', compact('nodal_centre', 'value'));
    }
    public function renewalRegistrationStore(Request $request, $id)
    {
        $value            = RenewalRegistration::find($id);
        $value->status    = $request->status;
        $value->remark_vc = $request->remark_vc;
        $value->save();
        return redirect('vice-chancellor/renewal-request')->with('message', 'The form has been submitted successfully!');
    }
    //Discontinuation as Ph.D
    public function discontinueRequest()
    {
        $value = PhdDiscontinuation::all();
        return view('vc.supervisor.discontinue_request', compact('value'));
    }
    public function discontinueRegistration($id)
    {
        $nodal = PhdDiscontinuation::select('nodal_centres.college_name', 'phd_discontinuations.present_center')
            ->leftJoin('nodal_centres', 'nodal_centres.id', '=', 'phd_discontinuations.present_center')->orderby('phd_discontinuations.id', 'desc')
            ->where('phd_discontinuations.id', $id)
            ->first();
        $value = PhdDiscontinuation::find($id);
        return view('vc.supervisor.discontinue_registration', compact('nodal', 'value'));
    }
    public function discontinueRegistrationStore(Request $request, $id)
    {
        //return $request;
        $value            = PhdDiscontinuation::find($id);
        $value->status    = $request->status;
        $value->remark_vc = $request->remark_vc;
        $value->save();
        return redirect('vice-chancellor/discontinue-request')->with('message', 'The form has been submitted successfully!');
    }
    //Domain
    public function domainRequest()
    {
        $value = DscDomainExpert::all();
        return view('vc.supervisor.domain_expert_request', compact('value'));
    }
    public function domainRemark($id)
    {
        $nodal = DscDomainExpert::select('dsc_domain_expert.name_of_ncr', 'dsc_domain_expert.name_of_ncr', 'dsc_domain_expert.student_name', 'dsc_domain_expert.enrollment_no', 'dsc_domain_expert.title_of_rearch_work', 'dsc_domain_expert.faculty_of_branch', 'dsc_domain_expert.request_status', 'dsc_domain_expert.ncr_remark', 'dsc_domain_expert.dsc_id', 'nodal_centres.college_name', 'dsc_domain_expert.vc_remark')
            ->leftJoin('nodal_centres', 'nodal_centres.id', '=', 'dsc_domain_expert.name_of_ncr')->orderby('dsc_domain_expert.dsc_id', 'asc')
            ->where('dsc_domain_expert.dsc_id', $id)
            ->first();

        //$value = DscDomainExpert::find($id);
        $expert = DomainExpertList::all();
        return view('vc.supervisor.domain_expert_list', compact('nodal', 'expert'));
    }
    public function domainRemarkStore($id, Request $request)
    {
        // $check1 = $request->check[0];
        // $check2 = $request->check[1];

        // return $id;
        //return $request;
        if ($request->check) {
            //return 1;
            for ($i = 0; $i < count($request->check); $i++) {
                DB::table('domain_expert_lists')->where('id', $request->check[$i])->update([
                    'status' => 1,
                ]);
            }
        }
        $value = DB::table('dsc_domain_expert')->where('dsc_id', $id)->update(
            ['request_status' => $request->request_status,
                'vc_remark'       => $request->vc_remark]);
        // $value = DscDomainExpert::find($id);
        // $value->request_status = $request->request_status;
        // $value->vc_remark = $request->vc_remark;
        // $value->save();
        //return 123;
        return redirect('vice-chancellor/domain-request')->with('message', 'The form has been submitted successfully!');
    }

    public function special_leave_listing()
    {
        //return 1;
        $leave_list = PhdStudentMaternityLeave::where('nodal_status', '1')->get();
        return view('vc.leave.index', compact('leave_list'));
    }
    public function special_leave_view($id)
    {
        //return $id;
        $student = PhdStudentMaternityLeave::where('id', $id)->first();
        return view('vc.leave.special_leave_view', compact('student'));
    }
    public function special_leave_status(Request $request, $id)
    {
        //return $id;
        DB::table('phd_student_maternity_leaves')
            ->where('id', $id)
            ->update([
                'vc_status' => $request->sup_leav_approve,
                'vc_remark' => $request->sem_remarks,
            ]);
        return redirect()->route('vc.leave.list');
    }
    public function changeNodalCenter()
    {
        $value = ChangeNodalCenter::all();
        return view('vc.application.change_nodal', compact('value'));
    }
    public function changeNodalView($id)
    {
        $std = Student::select('students.registration_date', 'c.student_id', 'p.enrollment_date')
            ->leftjoin('change_nodal_center as c', 'students.id', '=', 'c.student_id')->orderby('c.id', 'desc')
            ->leftjoin('phd_application_info as p', 'c.student_id', '=', 'p.stud_id')
            ->first();
        $value = ChangeNodalCenter::find($id);
        return view('vc.application.change_nodal_view', compact('value', 'std'));
    }
    public function changeNodalRemark(Request $request, $id)
    {
        //return $request;
        $value                  = ChangeNodalCenter::find($id);
        $value->vice_chancellor = $request->vice_chancellor;
        $value->vc_remarks      = $request->vc_remarks;
        $value->save();
        return redirect('/vice-chancellor/change-nodal-request')->with('message', 'Remank is updated successfully');
    }
    // Change research supervisor/co-supervio=sor
    public function change_supervisor_request()
    {
        $value = ChangeResearchSupervisor::all();
        return view('vc.application.change_supervisor_request', compact('value'));
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
        return view('vc.application.change_supervisor_view', compact('value', 'std'));
    }
    public function change_supervisor_remark($id, Request $request)
    {
        //return $request;
        $value = DB::table('change_research_supervisor_name')->where('res_ch_id', $id)->update(
            ['status'    => $request->status,
                'vc_remarks' => $request->vc_remarks]);
        return redirect('vice-chancellor/change_supervisor')->with('message', 'The form has been submitted successfully!');
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
        return view("vc.coursework.view_coursework")->with($data);
    }
    public function viewCourseworkUpdate(Request $request){
        //return $request;
        $update_data = [
            'status'  => $request->recommendation_status,
            'vc_comment' => $request->comment,
        ];

        $data['data']    = PhdCourseWorks::where('id', $request->coursework_id)->update($update_data);
        $data['message'] = 'Status updated successfully';
        return redirect()->route('vc.applied-application')->with($data);    
   }
   //PROVISIONAL REGISTRATION 
   public function provisionalRegList(){
    $provision = DB::table('provisional_registrations as p')->select('i.enrollment_no', 'i.name', 'p.id as app_id', 'p.status')->leftJoin('phd_application_info as i', 'p.appl_id', '=', 'i.id')
    ->leftJoin('phd_supervisors as s', 's.appl_id', '=', 'i.id')
    ->whereIn('p.status', [10,12,13,14,15])
    ->get();
    return view('controlcell.provisional_registration.provisional_reg_list', compact('provision'));
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
    
return view('vc.provisional_registration.provisional_reg_view', compact('info', 'coursework_sub', 'provisional', 'id'));
}
public function provisionRegSubmit(Request $request, $id){
    //return $request;
    $date = Carbon::now()->format('Y-m-d');
    $student_details = DB::table('provisional_registrations')
        ->where('id', $id)
        ->update([
            'approve_date' => $date,
            'status'    => $request->status,
            'vc_remark'    => $request->vc_remark,
        ]);
    return redirect()->route('vc.provisional-registration-list')->with('success', 'you form has been successfully submitted.');
}

}
