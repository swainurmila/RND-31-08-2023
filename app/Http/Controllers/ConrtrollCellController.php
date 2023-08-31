<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DetailsOfSupervisor;
use App\Models\DetailsPublicationJournals;
use App\Models\NodalCentre;
use App\Models\Organisation;
use App\Models\OtherSimilarTest;
use App\Models\PhdApplicationConfig;
use App\Models\PhdApplicationInfo;
use App\Models\PhdSupervisor;
use App\Models\PublicationJournals;
use App\Models\Student;
use App\Models\StudentQualification;
use App\Models\Supervisor;
use App\Models\SupervisorApplicationInfo;
use App\Models\SupervisorEmployment;
use App\Models\SupervisorQualification;
use DB;
use Illuminate\Http\Request;

class ConrtrollCellController extends Controller
{
    public function dashboard()
    {
        $stu_paid   = PhdApplicationInfo::where('stu_payment_status', 1)->get();
        $stu_appaly = PhdApplicationInfo::where('application_status', 1)->get();
        $sup_appaly = SupervisorApplicationInfo::whereIn('application_status', [2, 3, 4, 5])->get();
        $sup_list   = SupervisorApplicationInfo::where('application_status', 4)->get();

        // Department
        $department = Department::all();
        foreach ($department as $value) {
            $dep_title[] = $value['departments_title'];
            $color[]     = $value['color'];
            $number      = $num + 1;
            $numbers[]   = $number;
        }
        //return $dep_title;

        $dep_title = '"' . implode('", "', $dep_title) . '"';

        $nodal_list      = NodalCentre::all();
        $supervisor_list = DB::table('supervisor_application_info as sup_info')->select('sup_info.*', 'sup.email')
            ->join('supervisors as sup', 'sup.id', 'sup_info.sup_id')
            ->get();

        return view('controlcell.dashboard', compact('stu_paid', 'stu_appaly', 'sup_appaly', 'sup_list', 'department', 'dep_title', 'nodal_list', 'supervisor_list', 'department', 'color', 'numbers'));
    }
    public function Cell_Sup_List()
    {
        $title          = "Supervisor";
        $sub_page_title = "supervisor list";
        //$student = Student::where('vicechancellor_status', 1)->get();
        $supervisor = PhdSupervisor::select('*')
            ->whereIn('control_cell_status', [1, 2, 3, 4])
            ->get();
        $supervisor_count = PhdSupervisor::select('*')
            ->whereIn('control_cell_status', [1, 2, 3, 4])
            ->get()->count();
        return view('admin.phdcell.supervisorList', compact('title', 'sub_page_title', 'supervisor', 'supervisor_count'));
    }

    public function PhdCell_index()
    {
        $student = Student::select('*')
            ->whereIn('control_cell_status', [1, 2])
        //->whereIn('vc_stu_status', [1])
            ->get();
        $student_count = PhdApplicationInfo::select('*')
            ->whereIn('control_cell_status', [1, 2])
            ->get()->count();
        return view('admin.controlcell.home', compact('student', 'student_count'));
    }

    public function feeConfig(Request $request)
    {
        $appl_status = PhdApplicationConfig::applicationDetails('phd');
        return view('admin.controlcell.fee_config', compact('appl_status'));
    }

    public function draft_student_store(Request $request, $id)
    {
        //return $request;
        $student = Student::where('user_id', $id)->first();
        $stu_id  = $student->id;
        DB::table('students')
            ->where('user_id', $id)
            ->update([
                'data_status'          => $request->stu_certi_status,
                'control_cell_remarks' => $request->stu_certi_remarks,
            ]);

        if ($request->stu_org_remarks != "") {
            for ($i = 0; $i < count($request->stu_org_remarks); $i++) {

                DB::table('organisations')
                    ->where('id', $request->organisation[$i])
                    ->update([
                        'data_status'          => $request->stu_org_status[$i],
                        'control_cell_remarks' => $request->stu_org_remarks[$i],
                    ]);
            }
        }
        if ($request->stu_quali_remarks != "") {
            for ($i = 0; $i < count($request->stu_quali_remarks); $i++) {

                DB::table('student_qualifications')
                    ->where('id', $request->student_qualifications[$i])
                    ->update([
                        'data_status'          => $request->stu_quali_status[$i],
                        'control_cell_remarks' => $request->stu_quali_remarks[$i],
                    ]);
            }
        }

        return redirect()->route('rndcell.draft_student', [$id])->with('success', 'you form has saved as draft please look throughly and then submit.');

    }
    public function draft_student($id)
    {
        //return $id;
        $title          = "phdStudents";
        $sub_page_title = "Draft phdStudent";
        //$student_id = $id;
        $student     = Student::where('user_id', $id)->first();
        $last_stu_id = $student->id;

        $supervisor             = PhdSupervisor::where('stu_id', $last_stu_id)->first();
        $student_qualifications = StudentQualification::where('stu_id', $last_stu_id)->get();
        $organisation           = Organisation::where('stu_id', $last_stu_id)->get();
        //$student = Student::where('user_id', $student_id)->first();

        // return redirect()->route('rndcell.draft_student', [$id])->with('success','you form has saved as draft please look throughly and then submit.');
        return view('admin.phdcell.studentDraft', compact('id', 'student', 'last_stu_id', 'supervisor', 'organisation', 'student_qualifications', 'title', 'sub_page_title'));

    }
    public function preview_student($id)
    {
        //return $id;
        $title          = "phdStudents";
        $sub_page_title = "Draft phdStudent";
        //$student_id = $id;
        $student     = Student::where('user_id', $id)->first();
        $last_stu_id = $student->id;

        $supervisor             = PhdSupervisor::where('stu_id', $last_stu_id)->first();
        $student_qualifications = StudentQualification::where('stu_id', $last_stu_id)->get();
        $organisation           = Organisation::where('stu_id', $last_stu_id)->get();
        //$student = Student::where('user_id', $student_id)->first();

        // return redirect()->route('rndcell.draft_student', [$id])->with('success','you form has saved as draft please look throughly and then submit.');
        return view('admin.phdcell.stduentPreview', compact('id', 'student', 'last_stu_id', 'supervisor', 'organisation', 'student_qualifications', 'title', 'sub_page_title'));
    }
    public function prev_student_subm($id)
    {
        DB::table('students')
            ->where('user_id', $id)
            ->update([
                'control_cell_status' => 2,
                'registrar_status'    => 1,
                'review_status'       => 2,
            ]);
        return redirect()->route('PhdCell.index')->with('success', 'you form has saved and sent to registar');
    }

    public function payment_status(Request $request, $id)
    {
        //return $id;

        if ($request->payment_status == 'on') {
            $payment_status = 'approve';
        } else {
            $payment_status = 'reject';
        }
        $student = DB::table('students')->where('user_id', $id)
            ->update([
                'payment_status' => $payment_status,
            ]);

        return redirect()->back()->with('success', 'payment link has been approved for this user');

    }

    public function PhdCell_view_student($id)
    {
        $title          = "phdStudents";
        $sub_page_title = "View phdStudent";
        //$student_id = $id;
        $student     = Student::where('user_id', $id)->first();
        $last_stu_id = $student->id;

        $supervisor             = PhdSupervisor::where('stu_id', $last_stu_id)->first();
        $student_qualifications = StudentQualification::where('stu_id', $last_stu_id)->get();
        $organisation           = Organisation::where('stu_id', $last_stu_id)->get();
        //$student = Student::where('user_id', $student_id)->first();

        return view('admin.phdcell.studentview', compact('student', 'id', 'title', 'sub_page_title', 'student_qualifications', 'organisation', 'supervisor'));
    }

    public function view_supervisor($id)
    {
        $title              = "supervisors";
        $sub_page_title     = "Draft supervisor form";
        $supervisors        = PhdSupervisor::where('user_id', $id)->first();
        $last_supervisor_id = $supervisors->id;

        $SupervisorQualification = SupervisorQualification::where('sup_id', $last_supervisor_id)->get();

        $SupervisorEmployment       = SupervisorEmployment::where('sup_id', $last_supervisor_id)->get();
        $PublicationJournals        = PublicationJournals::where('sup_id', $last_supervisor_id)->get();
        $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id', $last_supervisor_id)->get();
        // $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id',$last_supervisor_id)->get();
        $OtherSimilarTest    = OtherSimilarTest::where('sup_id', $last_supervisor_id)->get();
        $DetailsOfSupervisor = DetailsOfSupervisor::where('sup_id', $last_supervisor_id)->first();

        return view('admin.phdcell.supervisorview', compact('id', 'last_supervisor_id', 'SupervisorQualification', 'SupervisorEmployment', 'PublicationJournals', 'DetailsPublicationJournals', 'supervisors', 'OtherSimilarTest', 'DetailsOfSupervisor', 'title', 'sub_page_title'));
    }

    public function draft_supervisor_store(Request $request, $id)
    {
        //return $id;
        // return $request;
        $supervisors = Supervisor::where('user_id', $id)->first();
        $sup_id      = $supervisors->id;
        DB::table('supervisors')
            ->where('user_id', $id)
            ->update([
                'data_status'          => $request->sup_certi_status,
                'control_cell_remarks' => $request->sup_certi_remarks,
            ]);

        for ($i = 0; $i < count($request->sup_quali_remarks); $i++) {

            DB::table('supervisor_qualifications')
                ->where('id', $sup_id)
                ->update([
                    'data_status'          => $request->sup_quali_status[$i],
                    'control_cell_remarks' => $request->sup_quali_remarks[$i],
                ]);
        }

        for ($i = 0; $i < count($request->sup_emp_remarks); $i++) {

            DB::table('supervisor_employments')
                ->where('sup_id', $sup_id)
                ->update([
                    'data_status'          => $request->sup_emp_status[$i],
                    'control_cell_remarks' => $request->sup_emp_remarks[$i],
                ]);
        }

        for ($i = 0; $i < count($request->sup_pub_remarks); $i++) {
            DB::table('publication_journals')
                ->where('sup_id', $sup_id)
                ->update([
                    'data_status'          => $request->sup_pub_status[$i],
                    'control_cell_remarks' => $request->sup_pub_remarks[$i],
                ]);
        }

        for ($i = 0; $i < count($request->sup_jour_remarks); $i++) {
            DB::table('details_publication_journals')
                ->where('sup_id', $sup_id)
                ->update([
                    'data_status'          => $request->sup_jour_status[$i],
                    'control_cell_remarks' => $request->sup_jour_remarks[$i],
                ]);
        }

        for ($i = 0; $i < count($request->sup_det_remarks); $i++) {
            DB::table('other_similar_tests')
                ->where('sup_id', $sup_id)
                ->update([
                    'data_status'          => $request->sup_det_status[$i],
                    'control_cell_remarks' => $request->sup_det_remarks[$i],
                ]);
        }

        return redirect()->route('rndcell.draft_supervisor.data', [$id])->with('success', 'you form has saved as draft please look throughly and then submit.');

    }

    public function draft_supervisor($id)
    {
        //return $id;
        $title              = "supervisors";
        $sub_page_title     = "Draft supervisor form";
        $supervisors        = Supervisor::where('user_id', $id)->first();
        $last_supervisor_id = $supervisors->id;

        $SupervisorQualification = SupervisorQualification::where('sup_id', $last_supervisor_id)->get();

        $SupervisorEmployment       = SupervisorEmployment::where('sup_id', $last_supervisor_id)->get();
        $PublicationJournals        = PublicationJournals::where('sup_id', $last_supervisor_id)->get();
        $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id', $last_supervisor_id)->get();
        // $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id',$last_supervisor_id)->get();
        $OtherSimilarTest    = OtherSimilarTest::where('sup_id', $last_supervisor_id)->get();
        $DetailsOfSupervisor = DetailsOfSupervisor::where('sup_id', $last_supervisor_id)->first();

        return view('admin.phdcell.supervisordraft', compact('id', 'last_supervisor_id', 'SupervisorQualification', 'SupervisorEmployment', 'PublicationJournals', 'DetailsPublicationJournals', 'supervisors', 'OtherSimilarTest', 'DetailsOfSupervisor', 'title', 'sub_page_title'));
    }

    public function preview_supervisor($id)
    {
        //return $id;
        $title              = "supervisors";
        $sub_page_title     = "supervisor preview";
        $supervisors        = Supervisor::where('user_id', $id)->first();
        $last_supervisor_id = $supervisors->id;

        $SupervisorQualification = SupervisorQualification::where('sup_id', $last_supervisor_id)->get();

        $SupervisorEmployment       = SupervisorEmployment::where('sup_id', $last_supervisor_id)->get();
        $PublicationJournals        = PublicationJournals::where('sup_id', $last_supervisor_id)->get();
        $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id', $last_supervisor_id)->get();
        // $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id',$last_supervisor_id)->get();
        $OtherSimilarTest    = OtherSimilarTest::where('sup_id', $last_supervisor_id)->get();
        $DetailsOfSupervisor = DetailsOfSupervisor::where('sup_id', $last_supervisor_id)->first();

        return view('admin.phdcell.supervisorPreview', compact('id', 'last_supervisor_id', 'SupervisorQualification', 'SupervisorEmployment', 'PublicationJournals', 'DetailsPublicationJournals', 'supervisors', 'OtherSimilarTest', 'DetailsOfSupervisor', 'title', 'sub_page_title'));
    }
    public function prev_super_subm($id)
    {
        //return $id;
        DB::table('supervisors')
            ->where('user_id', $id)
            ->update([
                'control_cell_status' => 2,
            ]);
        return redirect()->route('rndcell.sup.list')->with('success', 'you form has saved and sent to registar');
    }

    public function departments()
    {
        $departments = Department::get();
        return view('admin.departments.index', compact('departments'));
    }
}
