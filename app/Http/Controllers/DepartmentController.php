<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    /**
     * Method index
     * @return view
     */
    public function index()
    {
        $data['page_title']  = 'Department';
        $data['departments'] = Department::get();
        return view('admin.departments.index')->with($data);
    }

    /**
     * Method create
     * @return view
     */
    public function create(Request $request)
    {
        $data['title']          = 'Add department';
        $data['sub_page_title'] = 'Create department';
        $data['page_title']     = 'Create department';
        return view('admin.departments.create')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $request
     * @return json
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required',
                'color' => 'required|unique:departments',
                // 'captcha' => 'required|captcha',
            ]);
            $department = new Department();

            $check_title = $department->where('departments_title', $request->title)->get()->isNotEmpty();
            if ($check_title) {
                return redirect()->route('departments.create')->with('warning', 'Department already exists.');
            } else {
                $create_status = $department->InsertGetId([
                    'departments_title' => $request->title,
                    'color'             => $request->color,
                ]);

                return redirect()->route('departments')->with('success', 'Department added successfully.');
            }

            // $data['data']    = $department;
            // $data['message'] = 'Department added successfully.';
            // return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Edit page.
     * @param  int  $id
     * @return view
     */
    public function edit(Request $request, $id)
    {
        $data['id']             = $id;
        $data['title']          = 'Portal';
        $data['sub_page_title'] = 'Edit portal';
        $data['page_title']     = 'Edit portal';
        $data['departments']    = Department::find($id);
        return view('admin.departments.edit')->with($data);
    }

    /**
     * Update the specified resource from storage.
     * @param  int  $id
     * @return route
     */
    public function update(Request $request, $id)
    {
        try {
            $departments                    = Department::find($id);
            $departments->departments_title = $request->input('title');
            $departments->save();
            return redirect()->route('departments')->with('success', 'Department updated successfully.');

            // $data['data']    = [];
            // $data['message'] = 'Department updated successfully.';
            // return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $id     = $request->id;
            $portal = Department::find($id);
            if ($portal->get()->isNotEmpty()) {
                $status  = $portal->destroy($id);
                $message = 'Department deleted successfully.';
            } else {
                $message = 'Department already exists.';
                return redirect()->route('departments')->with('warning', 'Department already exists.');
            }

            $data['data']    = $portal->get();
            $data['message'] = $message;
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }
}
