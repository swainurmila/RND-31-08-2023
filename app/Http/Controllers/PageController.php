<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Menu;
use Page;

class PageController extends Controller
{
    /**
     * Page listing view
     * @return view
     */
    public function index()
    {
        $data['title']          = 'Pages';
        $data['sub_page_title'] = 'View Pages';
        $data['page_title']     = 'Page List';
        $data['pages']          = Page::get();
        return view('admin.pages.index')->with($data);
    }

    /**
     * Page creation view
     * @return view
     */
    public function create(Request $request)
    {
        $data['title']          = 'pages';
        $data['sub_page_title'] = 'Create pages';
        $data['page_title']     = 'Create pages';
        return view('admin.pages.create')->with($data);
    }

    /**
     * Page store method
     * @request form data
     * @return view
     */
    public function store(Request $request)
    {
        try {

            $page = new Page();
            $menu = new Menu();
            $slug = Str::slug($request->page_title);

            $pageCondition = [
                'slug' => $slug,
            ];
            $menuCondition = [
                'slug' => $slug,
            ];

            $check_page = $page->where($pageCondition)->get();
            $check_menu = $menu->where($menuCondition)->get();

            if ($check_page->isEmpty() || $check_menu->isEmpty()) {

                $status      = ($request->status == 'on') ? 1 : 0;
                $insert_data = [
                    'page_title' => $request->page_title,
                    'slug'       => $slug,
                    'content'    => $request->details,
                    'status'     => $status,
                    'created_at' => Carbon::now(),
                ];

                $page_id = $page->insertGetId($insert_data);
                if ($page_id) {
                    $menu::create([
                        'title'      => $request->page_title,
                        'slug'       => $slug,
                        'page_id'    => $page_id,
                        'status'     => $status,
                        'created_at' => Carbon::now(),
                    ]);
                    return redirect()->route('pages')->with('success', 'Page Added successfully');
                } else {
                    return redirect()->route('pages.create')->with('success', 'Page Added successfully');
                }

            } else {
                return redirect()->route('pages.create')->with('warning', 'Page already exists.');

                // $data['data']    = [];
                // $data['message'] = 'Page and menu already exists.';
                // return response($data, 200);
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Page updation view
     * @return view
     */
    public function edit($id)
    {
        $data['title']          = 'Pages';
        $data['sub_page_title'] = 'Edit pages';
        $data['page']           = Page::find($id);
        $data['page_title']     = 'Edit page';
        return view('admin.pages.edit')->with($data);
    }

    /**
     * Update method
     * @return view
     */
    public function update(Request $request, $id)
    {
        try {
            $status = ($request->status == 'on') ? 1 : 0;

            $update_data = [
                'page_title' => $request->page_title,
                'slug'       => Str::slug($request->page_title),
                'content'    => $request->details,
                'status'     => $status,
                'updated_by' => Carbon::now(),
            ];

            $updateStatus = Page::find($id)->update($update_data);
            if ($updateStatus) {
                // Mail::send('emails.forgetPassword', ['token' => 'asas', 'logtype' => 'sas'], function ($message) use ($request) {
                //     $message->to('abc@gmail.com');
                //     $message->subject('Page updation');
                // });

                return redirect()->route('pages')->with('success', 'Page Updated successfully');
            } else {
                return redirect()->route('pages.edit', $id)->with('success', 'Failed to update the page');
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Delete method to delete page
     * @return view
     */
    public function destroy(Request $request)
    {
        try {
            $id   = $request->id;
            $page = Page::find($id);
            if ($page->get()->isNotEmpty()) {
                $status = $page->destroy($id);
                $menu   = Menu::where('page_id', $id);
                if ($menu->get()->isNotEmpty()) {
                    $status = $menu->delete();
                    return redirect()->route('pages')->with('success', 'Page was deleted successfully.');
                } else {
                    return redirect()->route('pages')->with('warning', 'Menu already exists.');
                }
            } else {
                return redirect()->route('pages')->with('warning', 'Page already exists.');
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Menu listing page view
     * @return view
     */
    public function MenuIndex()
    {
        $data['title']          = "Menus";
        $data['sub_page_title'] = "Menus";
        $data['menu']           = Menu::all();
        $data['page']           = Page::all();
        $data['page_title']     = 'Menu list';
        return view('admin.menu.index')->with($data);
    }

    /**
     * Menu data for edit page
     * @return json
     */
    public function MenuEdit(Request $request)
    {
        try {
            $menus           = Menu::where('id', '=', $request->menuid)->first();
            $data['data']    = $menus;
            $data['message'] = 'Menu loaded successfully.';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Menu data will get updated
     * @return view
     */
    public function MenuUpdate(Request $request)
    {
        try {
            $status     = ($request->new_tab == 'on' ? 1 : 0);
            $updateData = [
                'title'      => $request->title,
                'alis_title' => $request->alis_title,
                'slug'       => $request->slug,
                'cust_slug'  => $request->cust_slug,
                'new_tab'    => $status,
                'parent_id'  => $request->parent_id,
                'sort_order' => $request->sort_order,
            ];
            $menu = Menu::find($request->hid_id)->update($updateData);
            if ($menu) {
                return redirect()->back()->with('success', 'Menu updated Successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to update menu.');
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Page will be displayed as per the menu dynamically.
     * @return view
     */
    public function PageDisplay($slug)
    {
        $menu             = new Menu();
        $data['menus']    = $menu->where('parent_id', '=', 0)->get();
        $data['allMenus'] = $menu->pluck('title', 'id')->all();
        $data['page']     = Page::where('slug', $slug)->firstOrFail();
        return view('frontend.innerpage')->with($data);
    }

    /**
     * After
     * @return route
     */
    public function DeleteMenu(Request $request, $id)
    {
        try {
            // $id              = $request->id;
            $menu            = Menu::find($id)->delete();
            $data['id']      = $id;
            $data['data']    = $menu;
            $data['message'] = 'Menu deleted successfully.';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Page will be redirected to home after logout.
     * @return view
     */
    public function logout_home(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

}
