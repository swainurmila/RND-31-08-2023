<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\DetailsOfSupervisor;
use App\Models\DetailsPublicationJournals;
use App\Models\Organisation;
use App\Models\OtherSimilarTest;
use App\Models\PhdApplicationInfo;
use App\Models\PhdOtherDocument;
use App\Models\PhdSupervisor;
use App\Models\PublicationJournals;
use App\Models\Student;
use App\Models\StudentQualification;
use App\Models\SupervisorApplicationInfo;
use App\Models\SupervisorEmployment;
use App\Models\SupervisorQualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlcellApplicationController extends Controller
{
    //santosh code

    public function appliedApplication()
    {
        //return 1;
        $applications = Helpers::appliedApplication();
        $app_status = Helpers::appStatus();
        return view('controlcell.application.index', compact('applications', 'app_status'));
    }
    public function supervisor_appliedApplication()
    {
       // return 1;
         $applications = Helpers::SupervisorAppliedApplication();
        // dd($applications);
      
        $app_status = Helpers::SupervisorAppStatus();
        return view('controlcell.supervisor.index', compact('applications','app_status'));
    }
    public function viewApplication($id)
    {
        $student = PhdApplicationInfo::find($id);
        $transaction_history = DB::table('transaction_history')->where('appl_id', $id)->first(['transaction_id']);
        $supervisor = PhdSupervisor::where('appl_id', $id)->first();
        $student_qualifications = StudentQualification::where('appl_id', $id)->get();
        $organisation = Organisation::where('appl_id', $id)->get();

        return view('controlcell.application.view', compact('student', 'supervisor', 'student_qualifications', 'organisation', 'transaction_history'));
    }

    public function previewApplication($id)
    {
        $student = PhdApplicationInfo::select('phd_application_info.*', 'nodal_centres.college_name')->join('nodal_centres', 'phd_application_info.nodal_id', 'nodal_centres.id')->where('phd_application_info.id', $id)->first();
        $transaction_history = DB::table('transaction_history')->where('appl_id', $id)->first(['transaction_id']);
        $supervisor = PhdSupervisor::where('appl_id', $id)->first();
        $student_qualifications = StudentQualification::where('appl_id', $id)->get();
        $organisation = Organisation::where('appl_id', $id)->get();
        $documents = PhdOtherDocument::where('appl_id', $id)->get();

        return view('controlcell.application.preview', compact('student', 'supervisor', 'student_qualifications', 'organisation', 'transaction_history', 'documents'));
    }
    public function SupPreviewApplication($id)
    {
    

       
        $supervisors = SupervisorApplicationInfo::where('sup_id', $id)->first();
        //$last_supervisor_id = $supervisors->id;
        

        $SupervisorQualification = SupervisorQualification::where('sup_id', $id)->get();

        $SupervisorEmployment = SupervisorEmployment::where('sup_id', $id)->get();
        $PublicationJournals = PublicationJournals::where('sup_id', $id)->get();
        $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id', $id)->get();
        // $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id',$id)->get();
        $OtherSimilarTest = OtherSimilarTest::where('sup_id', $id)->get();
        $DetailsOfSupervisor = DetailsOfSupervisor::where('sup_id', $id)->first();


        return view('controlcell.supervisor.single-application', compact('id', 'SupervisorQualification', 'SupervisorEmployment', 'PublicationJournals', 'DetailsPublicationJournals', 'supervisors', 'OtherSimilarTest', 'DetailsOfSupervisor'));
    }

    public function control_remark_store(Request $request, $id)
        {
           // return $id;
           // return $request;
            $supervisors = SupervisorApplicationInfo::where('sup_id', $id)->first();
            $sup_id = $supervisors->id;
            DB::table('supervisor_application_info')
                ->where('sup_id', $id)
                ->update([
                    'control_cell_status'      => $request->sup_certi_status,
                    'control_cell_remarks'     => $request->sup_certi_remarks,
                ]);
    
    
            for ($i = 0; $i < count($request->sup_quali_remarks); $i++) {
                
            DB::table('supervisor_qualifications')
                ->where('sup_id', $id)
                ->update([
                    'data_status'              => $request->sup_quali_status[$i],
                    'control_cell_remarks'     => $request->sup_quali_remarks[$i],
                ]);
            }
    
            for ($i = 0; $i < count($request->sup_emp_remarks); $i++) {
               
                DB::table('supervisor_employments')
                ->where('sup_id', $id)
                ->update([
                    'data_status'              => $request->sup_emp_status[$i],
                    'control_cell_remarks'     => $request->sup_emp_remarks[$i],
                ]);
            }
    
            for ($i = 0; $i < count($request->sup_pub_remarks); $i++) {
                DB::table('publication_journals')
                ->where('sup_id', $id)
                ->update([
                    'data_status'              => $request->sup_pub_status[$i],
                    'control_cell_remarks'     => $request->sup_pub_remarks[$i],
                ]);
            }
    
            for ($i = 0; $i < count($request->sup_jour_remarks); $i++) {
                DB::table('details_publication_journals')
                ->where('sup_id', $id)
                ->update([
                    'data_status'              => $request->sup_jour_status[$i],
                    'control_cell_remarks'     => $request->sup_jour_remarks[$i],
                ]);
            }
    
            for ($i = 0; $i < count($request->sup_det_remarks); $i++) {
                DB::table('other_similar_tests')
                ->where('sup_id', $id)
                ->update([
                    'data_status'              => $request->sup_det_status[$i],
                    'control_cell_remarks'     => $request->sup_det_remarks[$i],
                ]);
            }

           
    
            return redirect()->route('control-cell.sup.control.remark.draft', [$id])->with('success','you form has saved as draft please look throughly and then submit.'); 
           
        }
    

    public function control_remark_draft($id)
    {
        //return $id;

        $supervisors = SupervisorApplicationInfo::where('sup_id', $id)->first();
        //$last_supervisor_id = $supervisors->id;
        

        $SupervisorQualification = SupervisorQualification::where('sup_id', $id)->get();

        $SupervisorEmployment = SupervisorEmployment::where('sup_id', $id)->get();
        $PublicationJournals = PublicationJournals::where('sup_id', $id)->get();
        $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id', $id)->get();
        // $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id',$id)->get();
        $OtherSimilarTest = OtherSimilarTest::where('sup_id', $id)->get();
        $DetailsOfSupervisor = DetailsOfSupervisor::where('sup_id', $id)->first();

        


        return view('controlcell.supervisor.preview', compact('id', 'SupervisorQualification', 'SupervisorEmployment', 'PublicationJournals', 'DetailsPublicationJournals', 'supervisors', 'OtherSimilarTest', 'DetailsOfSupervisor'));
       // return redirect()->route('control-cell.sup-all-application');
    }

    public function control_remark_submit(Request $request,$id)
    {
        //return $request;

       // return $app_remark = $request->sup_certi_status;

        

        DB::table('supervisor_application_info')
        ->where('sup_id', $id)
        ->update([
            'application_status'              => ($request->sup_certi_status == 'Approved') ? 2 : 3,
        ]);
        return redirect()->route('control-cell.sup-all-application');
    }

    public function approveApplication(Request $request, $id)
    {

        DB::table('phd_application_info')
            ->where('id', $id)
            ->update([
                'application_status' => ($request->status == 4) ? 4 : 5,
                'control_cell_remarks' => $request->application_remark,
            ]);
        return redirect()->route('control-cell.applied-application')->with('success', 'Application has submitted successfully.');
    }

    public function allApplication()
    {
        $applications = Helpers::allApplications();
        //dd($applications);
        $app_status = Helpers::SupervisorAppStatus();
        return view('controlcell.application.all-application', compact('applications', 'app_status'));
    }
    public function singleApplication($id)
    {
        $student = PhdApplicationInfo::select('phd_application_info.*', 'nodal_centres.college_name')->join('nodal_centres', 'phd_application_info.nodal_id', 'nodal_centres.id')->where('phd_application_info.id', $id)->first();
        $supervisor = PhdSupervisor::where('appl_id', $id)->first();
        $student_qualifications = StudentQualification::where('appl_id', $id)->get();
        $organisation = Organisation::where('appl_id', $id)->get();
        $applicationStatus = Helpers::applicationStatus($id);
        $transaction_history = DB::table('transaction_history')->where('appl_id', $id)->first(['transaction_id']);
        $documents = PhdOtherDocument::where('appl_id', $id)->get();

        return view('controlcell.application.single-application', compact('student', 'supervisor', 'student_qualifications', 'organisation', 'applicationStatus', 'transaction_history', 'documents'));
    }

    public function SupallApplication()
    {
        //return 1;
        $applications = Helpers::SupervisorAllApplications();
        //dd($applications);
        $app_status = Helpers::SupervisorAppStatus();
        return view('controlcell.supervisor.all_app_index', compact('applications','app_status'));
    }
}
