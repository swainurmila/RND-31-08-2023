<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\CoDetailsOfSupervisor;
use App\Models\CoDetailsPublicationJournals;
use App\Models\CoOtherSimilarTest;
use App\Models\CoPublicationJournals;
use App\Models\CoSupervisorApplicationInfo;
use App\Models\CoSupervisorEmployment;
use App\Models\CoSupervisorQualification;
use App\Models\Department;
use App\Models\DetailsOfSupervisor;
use App\Models\DetailsPublicationJournals;
use App\Models\Menu;
use App\Models\NodalCentre;
use App\Models\Organisation;
use App\Models\OtherSimilarTest;
use App\Models\PhdApplicationInfo;
use App\Models\PhdOfficialVerified;
use App\Models\PhdOtherDocument;
use App\Models\PhdSupervisor;
use App\Models\PublicationJournals;
use App\Models\StudentQualification;
use App\Models\SupervisorEmployment;
use App\Models\SupervisorQualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SupervisorApplicationInfo;
use App\Models\PhdEntrance;
use App\Models\PhdEntranceQualification;
use App\Models\PhdEntranceCertificate;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return view
     */
    public function dashboard()
    {
        // for phd students
        // $phdstudents =
        $stu_paid   = PhdApplicationInfo::where('stu_payment_status', 1)->get();
        $stu_appaly = PhdApplicationInfo::where('application_status', 1)->get();
        $sup_appaly = SupervisorApplicationInfo::whereIn('application_status', [2, 3, 4, 5])->get();
        $sup_list   = SupervisorApplicationInfo::where('application_status', 4)->get();

        // Department
        $department = Department::all();
        $number     = 22;
        foreach ($department as $value) {
            $dep_title[] = $value['departments_title'];
            $color[]     = $value['color'];
            $number      = $number + 1;
            $numbers[]   = $number;
        }

        // $dep_title = $department->map(function ($value, $key) {
        //     return $value->departments_title;
        // })->toArray();
        // $color = $department->map(function ($value, $key) {
        //     return $value->color;
        // })->toArray();

        $dep_title       = '"' . implode('", "', $dep_title) . '"';
        $phd_entrance_selected = DB::table('phd_entrances')->where('status', 1)->count();
        $phd_entrance_applied = DB::table('phd_entrances')->where('status', 0)->count();
        $nodal_list      = NodalCentre::all();
        $supervisor_list = DB::table('supervisor_application_info as sup_info')->select('sup_info.*', 'sup.email')
            ->join('supervisors as sup', 'sup.id', 'sup_info.sup_id')
            ->get();

        return view('admin.dashboard', compact('stu_paid', 'stu_appaly', 'sup_appaly', 'sup_list', 'dep_title', 'nodal_list', 'supervisor_list', 'department', 'color', 'numbers', 'phd_entrance_selected', 'phd_entrance_applied'));
    }

    /**
     * Method nodal_list
     * @return view
     */
    public function nodal_list()
    {
        $nodal       = NodalCentre::allNodalCentre();
        $nodal_count = $nodal->count();

        return view('admin.controlcell.nodal_view', compact('nodal', 'nodal_count'));
    }

    /**
     * Method stuappliedApplication
     * @return view
     */
    public function stuappliedApplication()
    {
        $data['title']          = 'Student Application';
        $data['sub_page_title'] = 'Student application';
        $data['page_title']     = 'Student PhD application list';
        $data['applications']   = Helpers::StuappliedApplication();
        $data['app_status']     = Helpers::appStatus();
        return view('admin.applications.phdapplications')->with($data);
    }

    /**
     * Method SupPreviewApplication
     * @param $id $id [explicite description]
     * @return view
     */
    public function SupPreviewApplication($id)
    {
        $supervisors                = SupervisorApplicationInfo::where('sup_id', $id)->first();
        $SupervisorQualification    = SupervisorQualification::where('sup_id', $id)->get();
        $SupervisorEmployment       = SupervisorEmployment::where('sup_id', $id)->get();
        $PublicationJournals        = PublicationJournals::where('sup_id', $id)->get();
        $DetailsPublicationJournals = DetailsPublicationJournals::where('sup_id', $id)->get();
        $OtherSimilarTest           = OtherSimilarTest::where('sup_id', $id)->get();
        $DetailsOfSupervisor        = DetailsOfSupervisor::where('sup_id', $id)->first();

        return view('admin.applications.supapplicationsView', compact('id', 'SupervisorQualification', 'SupervisorEmployment', 'PublicationJournals', 'DetailsPublicationJournals', 'supervisors', 'OtherSimilarTest', 'DetailsOfSupervisor'));
    }

    /**
     * Method StuPreviewApplication
     * @param $id $id [explicite description]
     * @return view
     */
    public function StuPreviewApplication($id)
    {
        $data['student']                = PhdApplicationInfo::select('phd_application_info.*', 'nodal_centres.college_name')->join('nodal_centres', 'phd_application_info.nodal_id', 'nodal_centres.id')->where('phd_application_info.id', $id)->first();
        $data['transaction_history']    = DB::table('transaction_history')->where('appl_id', $id)->first(['transaction_id']);
        $data['supervisor']             = PhdSupervisor::where('appl_id', $id)->first();
        $data['student_qualifications'] = StudentQualification::where('appl_id', $id)->get();
        $data['organisation']           = Organisation::where('appl_id', $id)->get();
        $data['documents']              = PhdOtherDocument::where('appl_id', $id)->get();
        $data['page_title']             = 'PHD Student preview application form';
        return view('admin.applications.phdapplications_view')->with($data);
    }

    /**
     * Method stuApprovedApplication
     * @return view
     */
    public function stuApprovedApplication()
    {
        $flag                 = 1;
        $applications         = PhdApplicationInfo::whereIn('application_status', [2, 4, 6]);
        $data['applications'] = $applications->get();
        $data['app_status']   = $applications->count(); //Helpers::appStatus($flag);
        $data['page_title']   = 'PHD Students Approved Applications';
        return view('admin.applications.phdapplications_approve')->with($data);
    }

    /**
     * Method SupallApplication
     * @return view
     */
    public function SupallApplication()
    {
        $applications = Helpers::SupervisorAllApplications();
        $app_status   = Helpers::SupervisorAppStatus();
        return view('admin.applications.supapplications', compact('applications', 'app_status'));
    }

    /**
     * Method supervisor_approvedApplication
     * @return view
     */
    public function supervisor_approvedApplication()
    {
        $supervisor_app_info  = SupervisorApplicationInfo::whereIn('application_status', [2, 4]);
        $data['applications'] = $supervisor_app_info->get();
        $data['app_status']   = $supervisor_app_info->count();
        return view('admin.applications.supapplications')->with($data);
        //return view('controlcell.supervisor.all_app_index', compact('applications','app_status'));
    }

    /**
     * Method cosupervisor_appliedApplication
     * @return view
     */
    public function cosupervisor_appliedApplication()
    {
        $data['applications'] = Helpers::CoSupappliedApplication();
        $data['app_status']   = Helpers::CoSupervisorAppStatus();
        return view('admin.applications.cosupapplications')->with($data);
    }

    /**
     * Method cosupervisor_approvedApplication only approved list
     * @return view
     */
    public function cosupervisor_approvedApplication()
    {
        $cosupervisor_app_info  = CoSupervisorApplicationInfo::whereIn('application_status', [2, 4]);
        $data['applications'] = $cosupervisor_app_info->get();
        $data['app_status']   = $cosupervisor_app_info->count();
        return view('controlcell.cosupervisor.all_app_index')->with($data);
        //return view('controlcell.supervisor.all_app_index', compact('applications','app_status'));
    }

    /**
     * Method CoSupPreviewApplication
     * @param $id $id [explicite description]
     * @return view
     */
    public function CoSupPreviewApplication($id)
    {
        $data['supervisors']                = CoSupervisorApplicationInfo::where('sup_id', $id)->first();
        $data['SupervisorQualification']    = CoSupervisorQualification::where('sup_id', $id)->get();
        $data['SupervisorEmployment']       = CoSupervisorEmployment::where('sup_id', $id)->get();
        $data['PublicationJournals']        = CoPublicationJournals::where('sup_id', $id)->get();
        $data['DetailsPublicationJournals'] = CoDetailsPublicationJournals::where('sup_id', $id)->get();
        $data['OtherSimilarTest']           = CoOtherSimilarTest::where('sup_id', $id)->get();
        $data['DetailsOfSupervisor']        = CoDetailsOfSupervisor::where('sup_id', $id)->first();

        return view('admin.applications.cosupapplicationsView')->with($data);
    }

    /**
     * Method research_supervisor
     * @return view
     */
    public function research_supervisor()
    {
        $menus = Menu::where('parent_id', '=', 0)->get();
        return view('forms.research_supervisor', compact('menus'));
    }

    // subash code starts
    /**
     * Method uploadStudentRegistration
     * @return view
     */
    public function uploadStudentRegistration()
    {
        return view('admin.applications.phd-semister-registration');
    }

    /**
     * Method uploadStudentRegistrationForm
     * @param Request $request [explicite description]
     * @return route
     */
    public function uploadStudentRegistrationForm(Request $request)
    {
        $phd_off                  = new PhdOfficialVerified();
        $phd_off->registration_id = $request->registration_id;
        $phd_off->verified        = $request->approved_status;
        $tmp_file                 = $request->official_document->getClientOriginalName();
        $file_name                = $request->file('official_document')->getClientOriginalName();
        if ($phd_off->save()) {
            $request->official_document->move(public_path('upload/phdstudent-upload-doc/'), $tmp_file);
            DB::table('semister_registration_payment')->where('sem_res_id', $request->registration_id)->update(['bput_doc' => $file_name]);
            $msg = '<div class="offset-md-0 col-md-offset-0 col-md-12 animated fadeInDown alert alert-success" role="alert"><strong>Data Insert Successfull.</strong></div>';
            return redirect("admin/phd-student-registration")->with('message', $msg);
        } else {
            $msg = '<div class="offset-md-0 col-md-offset-0 col-md-12 animated fadeInDown alert alert-danger" role="alert"><strong>Data Insert Failed.</strong></div>';
            return redirect("admin/phd-student-registration")->with('message', $msg);
        }
    }
    // subash end here
    //PHD entrance application
    public function entranceApplicationList(Request $request)
    {
        if ($request->ajax()) {
            $phd_data = PhdEntrance::select('phd_entrances.*', 'phd_entrances.id as eid', 'p.program', 'd.departments_title' )->leftJoin('programs as p', 'p.id', '=', 'phd_entrances.department')
            ->leftJoin('departments as d', 'd.id', '=', 'phd_entrances.branch')->get();
            return DataTables::of($phd_data)
                ->addColumn('action', function ($row) {
                    $btn =  '<a href="' . route('stu.entrance-application-view', [$row->id]) . '" class="edit btn btn-success btn-sm">View</a>';
                return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view("admin.applications.entrance-application");
    }
    public function entranceApplicationView($id){
        $phd_data       = PhdEntrance::where('id', $id)->first();
        $phd_data_quali = PhdEntranceQualification::where('stud_id', $id)->get();
        $phdCerti       = PhdEntranceCertificate::where('stud_id', $id)->first();
        $selection_ncr  = explode(',', $phd_data->selection_ncr);
        $enclosures     = explode(',', $phd_data->enclosures);
        $prog = DB::table("phd_entrances as e")->select('p.program', 'd.departments_title')->leftJoin('programs as p', 'p.id', '=', 'e.department')
        ->leftJoin('departments as d', 'd.id', '=', 'e.branch')->where('e.id', $id)->first();
        return view('admin.applications.entrance-application-view', compact('phd_data', 'phd_data_quali', 'selection_ncr', 'enclosures', 'phdCerti', 'id', 'prog'));
    }
}
