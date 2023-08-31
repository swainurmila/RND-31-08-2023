<?php

namespace App\Http\Controllers;

use App\Models\CoSupervisorMaster;
use App\Models\Department;
use App\Models\Institute;
use App\Models\Role;
use App\Models\SupervisorMaster;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasterController extends Controller
{
    //

    public function index()
    {

        $roles      = Role::all();
        $role_count = Role::all()->count();
        return view('admin.master.roles.index', compact('roles', 'role_count'));
    }

    public function add_role(Request $request)
    {
        $role                   = new Role();
        $role->role             = $request->role;
        $role->role_description = $request->role_desc;
        $role->save();

        return redirect()->route('roles')->with('message', 'The role has been saved successfully.');
    }

    public function edit_role(Request $request)
    {
        $role = Role::find($request->id);
        return response()->json($role);

    }

    public function update_role(Request $request)
    {

        $role_id                = $request->hid_id;
        $role                   = Role::find($role_id);
        $role->role             = $request->edit_role;
        $role->role_description = $request->edit_role_desc;
        $role->update();
        return redirect()->route('roles')->with('status', 'Student Updated Successfully');
    }

    public function delete_role(Request $request)
    {

        $role = Role::find($request->id);
        if (!$role) {
            return response()->json([
                'success' => false,
                'message' => 'role not found',
            ], 400);
        }

        if ($role->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'role deleted successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'role can not be deleted',
            ], 500);
        }

    }

    public function institute_index()
    {

        $title           = "Institutes";
        $sub_page_title  = "View Institutes";
        $institute       = Institute::all();
        $institute_count = Institute::all()->count();
        return view('admin.master.institute.index', compact('title', 'sub_page_title', 'institute', 'institute_count'));
    }

    public function institute_add(Request $request)
    {

        //return $request;
        // $institute = new Institute();
        // $institute->name = $request->role;
        // $institute->address = $request->role_desc;
        // $institute->save();

        Institute::create($request->all());

        return redirect()->route('institute.index')->with('success', 'Institute has been saved successfully.');
    }

    public function edit_institute(Request $request)
    {
        $role = Institute::find($request->id);
        return response()->json($role);
    }
    public function update_institute(Request $request)
    {

        $institute_id       = $request->hid_id;
        $institute          = Institute::find($institute_id);
        $institute->name    = $request->name;
        $institute->address = $request->address;
        $institute->update();
        return redirect()->route('institute.index')->with('success', 'Institute Updated Successfully');
    }

    public function delete_institute(Request $request)
    {

        $institute = Institute::find($request->id);
        if (!$institute) {
            return response()->json([
                'success' => false,
                'message' => 'institute not found',
            ], 400);
        }

        if ($institute->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'institute deleted successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'institute can not be deleted',
            ], 500);
        }

    }

    public function supervisor_index()
    {
        $title            = "Supervisor";
        $sub_page_title   = "View Supervisor";
        $supervisor       = SupervisorMaster::all();
        $institute        = Institute::all();
        $department       = Department::all();
        $supervisor_count = SupervisorMaster::all()->count();

        $super_master_dep = DB::table('supervisor_masters as sm')->select('sm.name as s_name', 'sm.*', 'dpt.departments_title', 'isti.name')
        //->where('sm.id',2)
            ->leftJoin('departments as dpt', 'sm.department_id', '=', 'dpt.id')
            ->leftJoin('institutes as isti', 'sm.institute_id', '=', 'isti.id')
            ->get();

        return view('admin.master.supervisor.index', compact('title', 'sub_page_title', 'supervisor', 'supervisor_count', 'department', 'institute', 'super_master_dep'));
    }

    public function supervisor_add(Request $request)
    {
        // SupervisorMaster::create($request->all());

        // return $request;
        $SupervisorMaster                = new SupervisorMaster();
        $SupervisorMaster->name          = $request->name;
        $SupervisorMaster->department_id = $request->department_id;
        $SupervisorMaster->institute_id  = $request->institute_id;
        $SupervisorMaster->save();

        $supervisor_id = DB::getPdo()->lastInsertId();

        $user           = new User();
        $user->role_id  = 2;
        $user->user_id  = $supervisor_id;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->status   = 0;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('supervisor.index')->with('success', 'supervisor has been saved successfully.');
    }

    public function edit_supervisor(Request $request)
    {

        // return $request;
        // $supervisor = SupervisorMaster::find($request->id);
        $super_master_dep = DB::table('supervisor_masters as sm')->select('sm.name as s_name', 'sm.*', 'dpt.departments_title', 'isti.name')
            ->where('sm.id', $request->id)
            ->leftJoin('departments as dpt', 'sm.department_id', '=', 'dpt.id')
            ->leftJoin('institutes as isti', 'sm.institute_id', '=', 'isti.id')
            ->get();
        return response()->json($super_master_dep);
    }

    public function update_supervisor(Request $request)
    {

        $supervisor_id             = $request->hid_id;
        $supervisor                = SupervisorMaster::find($supervisor_id);
        $supervisor->name          = $request->name;
        $supervisor->institute_id  = $request->institute_id;
        $supervisor->department_id = $request->department_id;
        $supervisor->update();
        return redirect()->route('supervisor.index')->with('success', 'supervisor Updated Successfully');
    }

    public function delete_supervisor(Request $request)
    {

        $supervisor = SupervisorMaster::find($request->id);
        if (!$supervisor) {
            return response()->json([
                'success' => false,
                'message' => 'institute not found',
            ], 400);
        }

        if ($supervisor->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'institute deleted successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'institute can not be deleted',
            ], 500);
        }

    }

    // =====

    public function cosupervisor_index()
    {
        $title              = "Co-Supervisor";
        $sub_page_title     = "View Co-Supervisor";
        $cosupervisor       = CoSupervisorMaster::all();
        $institute          = Institute::all();
        $department         = Department::all();
        $cosupervisor_count = CoSupervisorMaster::all()->count();

        $cosuper_master_dep = DB::table('co_supervisor_masters as sm')->select('sm.name as s_name', 'sm.*', 'dpt.departments_title', 'isti.name')
        //->where('sm.id',2)
            ->leftJoin('departments as dpt', 'sm.department_id', '=', 'dpt.id')
            ->leftJoin('institutes as isti', 'sm.institute_id', '=', 'isti.id')
            ->get();

        return view('admin.master.cosupervisor.index', compact('title', 'sub_page_title', 'cosupervisor', 'cosupervisor_count', 'department', 'institute', 'cosuper_master_dep'));
    }

    public function cosupervisor_add(Request $request)
    {
        CoSupervisorMaster::create($request->all());
        return redirect()->route('cosupervisor.index')->with('success', 'co-supervisor has been saved successfully.');
    }

    public function edit_cosupervisor(Request $request)
    {

        // return $request;
        // $supervisor = SupervisorMaster::find($request->id);
        $super_master_dep = DB::table('co_supervisor_masters as sm')->select('sm.name as s_name', 'sm.*', 'dpt.departments_title', 'isti.name')
            ->where('sm.id', $request->id)
            ->leftJoin('departments as dpt', 'sm.department_id', '=', 'dpt.id')
            ->leftJoin('institutes as isti', 'sm.institute_id', '=', 'isti.id')
            ->get();
        return response()->json($super_master_dep);
    }

    public function update_cosupervisor(Request $request)
    {

        $supervisor_id             = $request->hid_id;
        $supervisor                = CoSupervisorMaster::find($supervisor_id);
        $supervisor->name          = $request->name;
        $supervisor->institute_id  = $request->institute_id;
        $supervisor->department_id = $request->department_id;
        $supervisor->update();
        return redirect()->route('cosupervisor.index')->with('success', 'supervisor Updated Successfully');
    }

    public function delete_cosupervisor(Request $request)
    {

        $supervisor = CoSupervisorMaster::find($request->id);
        if (!$supervisor) {
            return response()->json([
                'success' => false,
                'message' => 'institute not found',
            ], 400);
        }

        if ($supervisor->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'institute deleted successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'institute can not be deleted',
            ], 500);
        }

    }

}
