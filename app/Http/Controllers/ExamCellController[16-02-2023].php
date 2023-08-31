<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\PhdEntrance;
use App\Models\PhdEntranceQualification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamCellController extends Controller
{
    public function test_list_index()
    {
        $data = PhdEntrance::where('status',2)->get();
        return view('admin.examcell.index',compact('data'));
    }

    public function entrance_test_view($id)
    {
       // return $id;
       $data = PhdEntrance::where('id',$id)->first();
       $data_quali = PhdEntranceQualification::where('stud_id',$id)->get();
       $selection_ncr = explode(',',$data->selection_ncr);
       $enclosures = explode(',',$data->enclosures); 
       return view('admin.examcell.studentview',compact('data','data_quali','selection_ncr','enclosures'));
    }

    //  Entrance Module ===========
    public function entrance_form()
    {
        $menus = Menu::where('parent_id', '=', 0)->get();
        $allMenus = Menu::pluck('title', 'id')->all();
        //$page = Page::where('slug', $slug)->firstOrFail();
      return view('frontend.front_entrance.entrance_form',compact('menus', 'allMenus'));
    }
    public function entrance_form_two($id)
    {
       
        $menus = Menu::where('parent_id', '=', 0)->get();
        $allMenus = Menu::pluck('title', 'id')->all();
        //$page = Page::where('slug', $slug)->firstOrFail();
      return view('frontend.front_entrance.entrance_form2',compact('menus', 'allMenus','id'));
    }
    public function entrance_form_three()
    {
        $menus = Menu::where('parent_id', '=', 0)->get();
        $allMenus = Menu::pluck('title', 'id')->all();
        //$page = Page::where('slug', $slug)->firstOrFail();
      return view('frontend.front_entrance.entrance_form3',compact('menus', 'allMenus'));
    }

    //  End Entrance Module ===========
    public function phd_entran_apply(Request $request)
    {
       //return $request;
       //  $dob = $request->dob;
       //    $dob = Carbon::createFromFormat('m-d-Y', $dob)
       //                 ->format('Y-m-d');
        if ($request->hasFile('photo2')) {
            $avatarPath = $request->file('photo2');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path = $request->file('photo2')->move('upload/phd_entrance/', $avatarName);
            $img_path = 'upload/phd_entrance/' . $avatarName;
            //return 11;
        } else {
            //return 22;
            $avatarName = "";
        }
        //return $img_path;
       $arr = collect($request->selection_ncr2)->implode(",");

       $data = [
        'selection_ncr' => $arr,
        'draft_status' => 1,
        'photo'=> $avatarName,
       ];

       

       
       
       PhdEntrance::create($request->all() + $data);

       $last_id = PhdEntrance::latest('id')->first(['id']);
       //return $last_id = $last_id->id;
      
        if($request->stu_quali)
        {
            foreach($request->stu_quali as $key => $item)
            {
                 $phd_entrance_qualifications = new PhdEntranceQualification();
                 $phd_entrance_qualifications->stud_id = $last_id->id;
                 $phd_entrance_qualifications->degree = $request->stu_quali[$key];
                 $phd_entrance_qualifications->university_board = $request->stu_univer[$key];
                 $phd_entrance_qualifications->year_of_passing = $request->stu_pass_year[$key];
                 $phd_entrance_qualifications->division = $request->stu_division[$key];
                 $phd_entrance_qualifications->precentage = $request->stu_percentage[$key];
                 $phd_entrance_qualifications->subject = $request->stu_spec[$key];
                 $phd_entrance_qualifications->save();
            }
        }
       
       return redirect()->route('phd_entran_draft',$last_id->id);
    }

    public function phd_entran_draft($id)
    {
        //return $id;
        $menus = Menu::where('parent_id', '=', 0)->get();
        $allMenus = Menu::pluck('title', 'id')->all();

        $phd_data = PhdEntrance::where('id',$id)->first();
        $phd_data_quali = PhdEntranceQualification::where('stud_id',$id)->get();

       // return $phd_data->selection_ncr;
        $selection_ncr = explode(',',$phd_data->selection_ncr);
        
        return view('frontend.front_entrance.entrance_form_draft', compact('menus','allMenus','phd_data','phd_data_quali','selection_ncr','id'));

        
    }

    public function remove_qualification(Request $request)
    {
        //return $request;
        $phd_data_quali = PhdEntranceQualification::find($request->id); //primary id
        $phd_data_quali->delete();

        $data = PhdEntranceQualification::where('stud_id',$request->stud_id)->get();

        return response()->json($data);
    }

    public function entrance_form_update(Request $request,$id)
    {
       // return $request;
       // return $request->except('_token');
        //return $request->except('_token','selection_ncr2','draft_status','photo_hid','stu_quali','stu_univer','stu_pass_year','stu_division','stu_percentage','stu_spec');
        if ($request->hasFile('photo2')) {
            $avatarPath = $request->file('photo2');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path = $request->file('photo2')->move('upload/phd_entrance/', $avatarName);
            $img_path = 'upload/phd_entrance/' . $avatarName;
            //return 11;
        } else {
            //return 22;
            $avatarName = $request->photo_hid;
        }
        //return $img_path;
       $arr = collect($request->selection_ncr2)->implode(",");
        // $data = $request->except('_token');
        // $data['selection_ncr'] = $arr;
        // $data['photo'] = $avatarName;
        // $data['draft_status'] = 2;
       // return $data;
    //    $data = [
    //     'selection_ncr' => $arr,
    //     'draft_status' => 2,
    //     'photo'=> $avatarName
        
    //    ];

      // return $data;
        
       PhdEntrance::where("id", $id)->update([
        'name' => $request->name,
        'father_husband_name' => $request->father_husband_name,
        'photo' => $avatarName,
        'selection_ncr' => $arr,
        'present_address' => $request->present_address,
        'permanent_address' => $request->permanent_address,
        'mobile' => $request->mobile,
        'email' => $request->email,
        'gender' => $request->gender,
        'marital_status' => $request->marital_status,
        'dob' => $request->dob,
        'category' => $request->category,
        'nationality' => $request->nationality,
        'draft_status' => 2,
        'mother_tounge' => $request->mother_tounge
       ]);

       if($request->stu_quali)
        {
            foreach($request->stu_quali as $key => $item)
            {
                 $phd_entrance_qualifications = new PhdEntranceQualification();
                 $phd_entrance_qualifications->stud_id = $id;
                 $phd_entrance_qualifications->degree = $request->stu_quali[$key];
                 $phd_entrance_qualifications->university_board = $request->stu_univer[$key];
                 $phd_entrance_qualifications->year_of_passing = $request->stu_pass_year[$key];
                 $phd_entrance_qualifications->division = $request->stu_division[$key];
                 $phd_entrance_qualifications->precentage = $request->stu_percentage[$key];
                 $phd_entrance_qualifications->subject = $request->stu_spec[$key];
                 $phd_entrance_qualifications->save();
            }
        }

        $status = PhdEntrance::where('id',$id)->first(['status']);
        $status = $status->status;
        if($status == 1)
        {
            return redirect()->route('phd_entran_two_draft',[$id]);
        }else{
            return redirect()->route('entrance_form_two',[$id]);
        }

        

    }

    public function phd_entran_two_apply(Request $request)
    {
        // $request->except('_token','id');
        //return $request;

        if ($request->hasFile('signature2')) {
            $avatarPath = $request->file('signature2');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path = $request->file('signature2')->move('upload/phd_entrance/', $avatarName);
            $img_path = 'upload/phd_entrance/' . $avatarName;
            //return 11;
        } else {
            //return 22;
            $avatarName = '';
        }
        $id = $request->id;
        $check_info = collect($request->check_info)->implode(",");
        PhdEntrance::where("id", $id)
                ->update([
                    'department' => $request->department,
                    'branch' => $request->branch,
                    'claim_entrance' => $request->claim_entrance,
                    'claim_entrance' => $request->claim_entrance,
                    'date' => $request->date,
                    'place' => $request->place,
                    'dd_no' => $request->dd_no,
                    'dd_date' => $request->dd_date,
                    'dd_bank' => $request->dd_bank,
                    'signature' => $avatarName,
                    'enclosures' => $check_info,
                    'draft_status' => 3,
                    'status' => 1
                ]);

        return redirect()->route('phd_entran_two_draft',[$id]);
    }

    public function phd_entran_two_draft($id)
    {
        //return 1;
        $menus = Menu::where('parent_id', '=', 0)->get();
        $allMenus = Menu::pluck('title', 'id')->all();

        $phd_data = PhdEntrance::where('id',$id)->first();
       

        // return $phd_data->selection_ncr;
        $enclosures = explode(',',$phd_data->enclosures); 
        //return $id; 
        return view('frontend.front_entrance.entrance_form2_draft',compact('id','menus','allMenus','phd_data','enclosures'));
    }

    public function phd_entran_two_update(Request $request,$id)
    {
        $menus = Menu::where('parent_id', '=', 0)->get();
        $allMenus = Menu::pluck('title', 'id')->all();
        if ($request->hasFile('signature2')) {
            $avatarPath = $request->file('signature2');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path = $request->file('signature2')->move('upload/phd_entrance/', $avatarName);
            $img_path = 'upload/phd_entrance/' . $avatarName;
            //return 11;
        } else {
            //return 22;
            $avatarName = $request->photo_hid;
        }
        $id = $request->id;
        $check_info = collect($request->check_info)->implode(",");
        PhdEntrance::where("id", $id)
                ->update([
                    'department' => $request->department,
                    'branch' => $request->branch,
                    'claim_entrance' => $request->claim_entrance,
                    'claim_entrance' => $request->claim_entrance,
                    'date' => $request->date,
                    'place' => $request->place,
                    'dd_no' => $request->dd_no,
                    'dd_date' => $request->dd_date,
                    'dd_bank' => $request->dd_bank,
                    'signature' => $avatarName,
                    'enclosures' => $check_info,
                    'draft_status' => 3,
                    'status' => 2
                ]);

        return view('frontend.front_entrance.thankyou', compact('menus','allMenus'));

    }
    public function official_document_view()
    {
        return view('admin.examcell.official_form');
    }
    
}
