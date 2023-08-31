<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Announcement;
use App\Models\Department;
use App\Models\Menu;
use App\Models\Portal;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return 1;
        // $page=  \DB::table('pages')->where('parent_id',0)
        //         ->get()
        //         ->transform(function($item,$key){
        //             $item->sub_page = \DB::table('pages')
        //             ->where('parent_id',$item->id)
        //             ->get();
        //             return $item;
        //         });
        $menus = Menu::where('parent_id', '=', 0)->get();
        $allMenus = Menu::pluck('title','id')->all();
        $announcements =Announcement::get();
        $departments=Department::get();
        $portal=Portal::get();
        return view('index',compact('announcements','departments','menus','allMenus','portal'));
    }

    
}
