<?php

namespace App\Http\Controllers;

use App\Models\Portal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    /**
     * Portal listing page
     * @return void
     */
    public function index()
    {
        $data['title']          = 'Portal';
        $data['sub_page_title'] = 'View portal';
        $data['page_title']     = 'Portal List';
        $data['portal']         = Portal::get();
        return view('admin.portalSection.index')->with($data);
    }

    /**
     * Portal creation page
     * @return void
     */
    public function create()
    {
        $data['title']          = 'Add Portal';
        $data['sub_page_title'] = 'Create portal';
        $data['page_title']     = 'Create portal';
        return view('admin.portalSection.create')->with($data);
    }

    /**
     * Portal store method
     * @return void
     */
    public function store(Request $request)
    {
        try {
            if ($request->hasFile('image2')) {
                $avatarPath = $request->file('image2');
                $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
                $path       = $request->file('image2')->move('upload/portal/', $avatarName);
                $img_path   = 'upload/portal/' . $avatarName;
            } else {
                $avatarName = "";
            }

            $insert_data = [
                'title'       => $request->title,
                'description' => $request->description,
                'image'       => $avatarName,
                'link'        => $request->link,
                // 'status'      => $request->status,
            ];

            $portal      = new Portal();
            $checkPortal = $portal->where(['title' => $request->title])->orWhere(['link' => $request->link])->get();
            if ($checkPortal->isEmpty()) {
                $createStatus = $portal->insertGetId($insert_data);
                if ($createStatus) {
                    return redirect()->route('portal.index')->with('success', 'Portal added successfully.');
                } else {
                    return redirect()->route('portal.index')->with('error', 'Failed to add portal.');
                }
            } else {
                return redirect()->route('portal.create')->with('warning', 'Portal already exists.');
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id = null)
    {
        try {
            $portal          = new Portal();
            $data['data']    = is_null($id) ? $portal->get() : $portal->find($id)->get();
            $data['message'] = 'Portal data loaded successfully.';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data['title']          = 'Portal';
        $data['sub_page_title'] = 'Edit portal';
        $data['portal']         = Portal::find($id);
        $data['id']             = $id;
        $data['page_title']     = 'Edit portal';
        return view('admin.portalSection.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            if ($request->hasFile('image2')) {
                $avatarPath = $request->file('image2');
                $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
                $path       = $request->file('image2')->move('upload/portal/', $avatarName);
                $img_path   = 'upload/portal/' . $avatarName;
            } else {
                $avatarName = $request->image_hid ?? '';
            }

            // $status = ($request->status == 'on') ? 1 : 0;
            $update_data = [
                'title'       => $request->title,
                'image'       => $avatarName,
                'link'        => $request->link,
                'description' => $request->description,
                'updated_by'  => Carbon::now(),
            ];

            $updateStatus = Portal::find($id)->update($update_data);
            if ($updateStatus) {
                return redirect()->route('portal.index')->with('success', 'Portal List Updated successfully.');
            } else {
                return redirect()->route('portal.edit', $id)->with('success', 'Failed to update the portal list.');
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     * METHOD NOT IN USE
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Request $request, $id)
    // {
    //     try {
    //         $portal = Portal::find($id);
    //         if ($portal->get()->isNotEmpty()) {
    //             $status  = $portal->destroy($id);
    //             $message = 'Data deleted successfully.';
    //             // return redirect()->route('portal.index')->with('success', 'Portal was deleted successfully.');
    //         } else {
    //             $message = 'Portal already exists.';
    //             return redirect()->route('portal.index')->with('warning', 'Portal already exists.');
    //         }

    //         $data['data']    = [];
    //         $data['message'] = $message;
    //         return response($data, 200);
    //     } catch (\Exception $e) {
    //         $data['data']    = [];
    //         $data['message'] = $e->getMessage();
    //         return response($data, 500);
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DeletePortal(Request $request)
    {
        try {
            $id     = $request->id;
            $portal = Portal::find($id);
            if ($portal->get()->isNotEmpty()) {
                $status  = $portal->destroy($id);
                $message = 'Data deleted successfully.';
            } else {
                $message = 'Portal already exists.';
                return redirect()->route('portal.index')->with('warning', 'Portal already exists.');
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
