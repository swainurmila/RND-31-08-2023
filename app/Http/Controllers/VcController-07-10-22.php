<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Organisation;
use App\Models\PhdApplicationInfo;
use App\Models\PhdOtherDocument;
use App\Models\PhdSupervisor;
use App\Models\StudentQualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VcController extends Controller
{
    //santosh code

    public function appliedApplication()
    {
        $applications = Helpers::appliedApplication();
        $app_status = Helpers::appStatus();
        return view('vc.application.index', compact('applications', 'app_status'));
    }

    public function previewApplication($id)
    {
        $student = PhdApplicationInfo::select('phd_application_info.*', 'nodal_centres.college_name')->join('nodal_centres', 'phd_application_info.nodal_id', 'nodal_centres.id')->where('phd_application_info.id', $id)->first();
        $transaction_history = DB::table('transaction_history')->where('appl_id', $id)->first(['transaction_id']);
        $supervisor = PhdSupervisor::where('appl_id', $id)->first();
        $student_qualifications = StudentQualification::where('appl_id', $id)->get();
        $organisation = Organisation::where('appl_id', $id)->get();
        $documents = PhdOtherDocument::where('appl_id', $id)->get();

        return view('vc.application.preview', compact('student', 'supervisor', 'student_qualifications', 'organisation', 'transaction_history', 'documents'));
    }

    public function approveApplication(Request $request, $id)
    {
        DB::table('phd_application_info')
            ->where('id', $id)
            ->update([
                'application_status' => ($request->status == 6) ? 6 : 7,
                'vc_remarks' => $request->application_remark,
            ]);
        return redirect()->route('vc.applied-application')->with('success', 'Application has submitted successfully.');
    }

    public function allApplication()
    {
        $applications = Helpers::allApplications();
        $app_status = Helpers::appStatus();

        return view('vc.application.all-application', compact('applications', 'app_status'));
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

        return view('vc.application.single-application', compact('student', 'supervisor', 'student_qualifications', 'organisation', 'applicationStatus', 'transaction_history', 'documents'));
    }
}
