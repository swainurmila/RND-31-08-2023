<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Anouncement listing view
     * @return view
     */
    public function index(Request $request)
    {
        $data['title']          = 'Pages';
        $data['sub_page_title'] = 'View Pages';
        $data['page_title']     = 'Annoouncement List';
        $data['announcements']  = Announcement::latest('created_at')->get();
        return view('admin.announcements.index')->with($data);
    }

    /**
     * Anouncement creation view
     * @return view
     */
    public function create(Request $request)
    {
        $data['title']          = 'announcements';
        $data['sub_page_title'] = 'Create announcements';
        $data['page_title']     = 'Create announcements';
        return view('admin.announcements.create')->with($data);
    }

    /**
     * Anouncement store method
     * @return view
     */
    public function store(Request $request)
    {
        try {
            $announcement = new Announcement();

            $condition = [
                'announcements_title' => $request->title,
            ];

            $check_announcement = $announcement->where($condition)->get();
            if ($check_announcement->isEmpty()) {
                $status      = 1; //($request->status == 'on') ? 1 : 0;
                $insert_data = array_merge($condition, [
                    // 'status'     => $status, // Status will be added later
                    'created_at' => Carbon::now(),
                ]);

                $record_id = $announcement->insertGetId($insert_data);
                if ($record_id) {
                    return redirect()->route('announcements')->with('success', 'Announcement added successfully.');
                } else {
                    return redirect()->route('announcements.create')->with('success', 'Failed to add an announcement.');
                }

            } else {
                return redirect()->route('announcements.create')->with('warning', 'Announcement already exists.');

                // $data['data']    = [];
                // $data['message'] = 'Page and menu already exists.';
                // return response($data, 400);
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Anouncement edit view
     * @return view
     */
    public function edit(Request $request, $id)
    {
        $data['title']          = 'Announcements';
        $data['sub_page_title'] = 'Edit Announcements';
        $data['announcements']  = Announcement::find($id);
        $data['page_title']     = 'Edit Announcements';
        return view('admin.announcements.edit')->with($data);
    }

    /**
     * Anouncement update method
     * @return view
     */
    public function update(Request $request, $id)
    {
        try {
            $update_data = [
                'announcements_title' => $request->title,
                'updated_by'          => Carbon::now(),
                // 'status'              => 1, //($request->status == 'on') ? 1 : 0, // Status will be added later.
            ];

            $updateStatus = Announcement::find($id)->update($update_data);
            if ($updateStatus) {
                return redirect()->route('announcements')->with('success', 'Announcement updated successfully');
            } else {
                return redirect()->route('announcements.edit', $id)->with('success', 'Failed to update the announcement');
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Anouncement Delete method
     * @return view
     */
    public function destroy(Request $request)
    {
        try {
            $announcement    = Announcement::destroy($request->id);
            $data['data']    = $announcement;
            $data['message'] = 'Announcement deleted successfully.';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }
}
