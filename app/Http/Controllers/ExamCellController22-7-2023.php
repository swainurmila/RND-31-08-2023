<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\PhdEntrance;
use App\Models\PhdEntranceCertificate;
use App\Models\PhdEntranceQualification;
use App\Models\PhdCourseWorks;
use App\Models\CourseWorkSubjects;
use Illuminate\Http\Request;
//use App\Mail\EntranceMail;
use Illuminate\Support\Facades\Mail;
//use Mail;

class ExamCellController extends Controller
{
    public function test_list_index()
    {
        $data = PhdEntrance::where('status', 2)->get();
        return view('admin.examcell.index', compact('data'));
    }

    public function entrance_test_view($id)
    {
        $data          = PhdEntrance::where('id', $id)->first();
        $data_quali    = PhdEntranceQualification::where('stud_id', $id)->get();
        $data_certi    = PhdEntranceCertificate::where('stud_id', $id)->first();
        $selection_ncr = explode(',', $data->selection_ncr);
        $enclosures    = explode(',', $data->enclosures);
        return view('admin.examcell.studentview', compact('data', 'data_quali', 'selection_ncr', 'enclosures', 'data_certi'));
    }

    //  Entrance Module ===========
    public function entrance_form()
    {
        $menus    = Menu::where('parent_id', '=', 0)->get();
        $allMenus = Menu::pluck('title', 'id')->all();
        //$page = Page::where('slug', $slug)->firstOrFail();
        return view('frontend.front_entrance.entrance_form', compact('menus', 'allMenus'));
    }
    public function entrance_form_two($id)
    {

        $menus        = Menu::where('parent_id', '=', 0)->get();
        $allMenus     = Menu::pluck('title', 'id')->all();
        $phd_entrance = PhdEntrance::where('id', $id)->first(['dd_no', 'dd_date', 'dd_bank']);
        //$page = Page::where('slug', $slug)->firstOrFail();
        return view('frontend.front_entrance.entrance_form2', compact('menus', 'allMenus', 'id', 'phd_entrance'));
    }
    public function entrance_form_three()
    {
        $menus    = Menu::where('parent_id', '=', 0)->get();
        $allMenus = Menu::pluck('title', 'id')->all();
        //$page = Page::where('slug', $slug)->firstOrFail();
        return view('frontend.front_entrance.entrance_form3', compact('menus', 'allMenus'));
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
            $path       = $request->file('photo2')->move('upload/phd_entrance/', $avatarName);
            $img_path   = 'upload/phd_entrance/' . $avatarName;
            //return 11;
        } else {
            //return 22;
            $avatarName = "";
        }
        //return $img_path;
        $arr = collect($request->selection_ncr2)->implode(",");

        $reg_no = str_pad(1, 6, '0', STR_PAD_LEFT);
        $reg_no = 'PHDENT' . $reg_no;

        $reg_no_first = PhdEntrance::latest('id')->first();

        if ($reg_no_first) {
            $last_reg_no = $reg_no_first->registration_no;
            if (!empty($reg_no_first->registration_no)) {
                $reg_no    = str_replace('PHDENT', '', $last_reg_no);
                $increment = $reg_no + 1;
                $reg_no    = str_pad($increment, 6, '0', STR_PAD_LEFT);
                $reg_no    = 'PHDENT' . $reg_no;
            } else {
                $reg_no;
            }
        } else {
            $reg_no;
        }

        // return $reg_no;

        $data = [
            'selection_ncr'   => $arr,
            'draft_status'    => 1,
            'photo'           => $avatarName,
            'registration_no' => $reg_no,
        ];

        PhdEntrance::create($request->all() + $data);

        $last_id = PhdEntrance::latest('id')->first(['id']);
        //return $last_id = $last_id->id;

        if ($request->stu_quali) {
            foreach ($request->stu_quali as $key => $item) {
                $phd_entrance_qualifications                   = new PhdEntranceQualification();
                $phd_entrance_qualifications->stud_id          = $last_id->id;
                $phd_entrance_qualifications->degree           = $request->stu_quali[$key];
                $phd_entrance_qualifications->university_board = $request->stu_univer[$key];
                $phd_entrance_qualifications->year_of_passing  = $request->stu_pass_year[$key];
                $phd_entrance_qualifications->division         = $request->stu_division[$key];
                $phd_entrance_qualifications->precentage       = $request->stu_percentage[$key];
                $phd_entrance_qualifications->subject          = $request->stu_spec[$key];
                $phd_entrance_qualifications->save();
            }
        }

        return redirect()->route('phd_entran_draft', $last_id->id);
    }

    public function phd_entran_draft($id)
    {
        //return $id;
        $menus    = Menu::where('parent_id', '=', 0)->get();
        $allMenus = Menu::pluck('title', 'id')->all();

        $phd_data       = PhdEntrance::where('id', $id)->first();
        $phd_data_quali = PhdEntranceQualification::where('stud_id', $id)->get();

        // return $phd_data->selection_ncr;
        $selection_ncr = explode(',', $phd_data->selection_ncr);

        return view('frontend.front_entrance.entrance_form_draft', compact('menus', 'allMenus', 'phd_data', 'phd_data_quali', 'selection_ncr', 'id'));
    }

    public function remove_qualification(Request $request)
    {
        //return $request;
        $phd_data_quali = PhdEntranceQualification::find($request->id); //primary id
        $phd_data_quali->delete();

        $data = PhdEntranceQualification::where('stud_id', $request->stud_id)->get();

        return response()->json($data);
    }

    public function entrance_form_update(Request $request, $id)
    {
        // return $request;
        // return $request->except('_token');
        //return $request->except('_token','selection_ncr2','draft_status','photo_hid','stu_quali','stu_univer','stu_pass_year','stu_division','stu_percentage','stu_spec');
        if ($request->hasFile('photo2')) {
            $avatarPath = $request->file('photo2');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path       = $request->file('photo2')->move('upload/phd_entrance/', $avatarName);
            $img_path   = 'upload/phd_entrance/' . $avatarName;
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
            'name'                => $request->name,
            'father_husband_name' => $request->father_husband_name,
            'photo'               => $avatarName,
            'selection_ncr'       => $arr,
            'present_address'     => $request->present_address,
            'permanent_address'   => $request->permanent_address,
            'mobile'              => $request->mobile,
            'email'               => $request->email,
            'gender'              => $request->gender,
            'marital_status'      => $request->marital_status,
            'dob'                 => $request->dob,
            'category'            => $request->category,
            'nationality'         => $request->nationality,
            'draft_status'        => 2,
            'mother_tounge'       => $request->mother_tounge,
        ]);

        if ($request->stu_quali) {
            foreach ($request->stu_quali as $key => $item) {
                $phd_entrance_qualifications                   = new PhdEntranceQualification();
                $phd_entrance_qualifications->stud_id          = $id;
                $phd_entrance_qualifications->degree           = $request->stu_quali[$key];
                $phd_entrance_qualifications->university_board = $request->stu_univer[$key];
                $phd_entrance_qualifications->year_of_passing  = $request->stu_pass_year[$key];
                $phd_entrance_qualifications->division         = $request->stu_division[$key];
                $phd_entrance_qualifications->precentage       = $request->stu_percentage[$key];
                $phd_entrance_qualifications->subject          = $request->stu_spec[$key];
                $phd_entrance_qualifications->save();
            }
        }

        $status = PhdEntrance::where('id', $id)->first(['status']);
        $status = $status->status;
        if ($status == 1) {
            return redirect()->route('phd_entran_two_draft', [$id]);
        } else {
            return redirect()->route('entrance_form_two', [$id]);
        }
    }

    public function phd_entran_two_apply(Request $request)
    {
        // $request->except('_token','id');
        //return $request;

        //return $request->check_info;
        $files = [];
        if ($request->file('high_school_certificate')) {
            $files['high_school_certificate'] = $request->file('high_school_certificate');
        }

        if ($request->file('memo_high_school')) {
            $files['memo_high_school'] = $request->file('memo_high_school');
        }

        if ($request->file('intermidiate_certificate')) {
            $files['intermidiate_certificate'] = $request->file('intermidiate_certificate');
        }

        if ($request->file('memo_intermediate')) {
            $files['memo_intermediate'] = $request->file('memo_intermediate');
        }

        if ($request->file('ug_certificate')) {
            $files['ug_certificate'] = $request->file('ug_certificate');
        }

        if ($request->file('memo_ug')) {
            $files['memo_ug'] = $request->file('memo_ug');
        }

        if ($request->file('pg_mphil_cerficate')) {
            $files['pg_mphil_cerficate'] = $request->file('pg_mphil_cerficate');
        }

        if ($request->file('memo_pg_mphil')) {
            $files['memo_pg_mphil'] = $request->file('memo_pg_mphil');
        }

        if ($request->file('sc_st_certficate')) {
            $files['sc_st_certficate'] = $request->file('sc_st_certficate');
        }

        if ($request->file('proof_national_eligibility')) {
            $files['proof_national_eligibility'] = $request->file('proof_national_eligibility');
        }

        if ($request->file('passport_photographs')) {
            $files['passport_photographs'] = $request->file('passport_photographs');
        }

        if ($request->file('adhaar_card')) {
            $files['adhaar_card'] = $request->file('adhaar_card');
        }

        $i = 0;
        foreach ($files as $key => $file) {
            ++$i;
            //return $i;
            if ($request->hasFile($key)) {
                $avatarPath = $request->file($key);
                $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
                $path       = $request->file($key)->move('upload/phd_entrance/' . $key . '/', $avatarName);
                $img_path   = '/upload/phd_entrance/' . $key . '/' . $avatarName;
                //return 11;
                //$images_path2[] = $img_path;

            }
            // PhdEntrance::create($request->all() + $data);
            if ($i == 1) {
                PhdEntranceCertificate::create([
                    'stud_id' => $request->id,
                    $key      => $img_path,
                ]);
            } else {
                PhdEntranceCertificate::where('stud_id', $request->id)
                    ->update([
                        $key => $img_path,
                    ]);
            }

        }

        if ($request->hasFile('signature2')) {
            $avatarPath = $request->file('signature2');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path       = $request->file('signature2')->move('upload/phd_entrance/', $avatarName);
            $img_path   = 'upload/phd_entrance/' . $avatarName;
            //return 11;
        } else {
            //return 22;
            $avatarName = '';
        }
        $id         = $request->id;
        $check_info = collect($request->check_info)->implode(",");
        PhdEntrance::where("id", $id)
            ->update([
                'department'     => $request->department,
                'branch'         => $request->branch,
                'claim_entrance' => $request->claim_entrance,
                'claim_entrance' => $request->claim_entrance,
                'date'           => $request->date,
                'place'          => $request->place,
                'dd_no'          => $request->dd_no,
                'dd_date'        => $request->dd_date,
                'dd_bank'        => $request->dd_bank,
                'signature'      => $avatarName,
                'enclosures'     => $check_info,
                'draft_status'   => 3,
                'status'         => 1,
            ]);

        return redirect()->route('phd_entran_two_draft', [$id]);
    }

    public function phd_entran_two_draft($id)
    {
        //return 1;
        $menus    = Menu::where('parent_id', '=', 0)->get();
        $allMenus = Menu::pluck('title', 'id')->all();

        $phd_data = PhdEntrance::where('id', $id)->first();
        $phdCerti = PhdEntranceCertificate::where('stud_id', $id)->first();

        // return $phd_data->selection_ncr;
        $enclosures = explode(',', $phd_data->enclosures);
        //return $id;
        return view('frontend.front_entrance.entrance_form2_draft', compact('id', 'menus', 'allMenus', 'phd_data', 'enclosures', 'phdCerti'));
    }

    public function phd_entran_two_update(Request $request, $id)
    {
		//return $request;
        $files = [];
        if ($request->file('high_school_certificate')) {
            $files['high_school_certificate'] = $request->file('high_school_certificate');
        }

        if ($request->file('memo_high_school')) {
            $files['memo_high_school'] = $request->file('memo_high_school');
        }

        if ($request->file('intermidiate_certificate')) {
            $files['intermidiate_certificate'] = $request->file('intermidiate_certificate');
        }

        if ($request->file('memo_intermediate')) {
            $files['memo_intermediate'] = $request->file('memo_intermediate');
        }

        if ($request->file('ug_certificate')) {
            $files['ug_certificate'] = $request->file('ug_certificate');
        }

        if ($request->file('memo_ug')) {
            $files['memo_ug'] = $request->file('memo_ug');
        }

        if ($request->file('pg_mphil_cerficate')) {
            $files['pg_mphil_cerficate'] = $request->file('pg_mphil_cerficate');
        }

        if ($request->file('memo_pg_mphil')) {
            $files['memo_pg_mphil'] = $request->file('memo_pg_mphil');
        }

        if ($request->file('sc_st_certficate')) {
            $files['sc_st_certficate'] = $request->file('sc_st_certficate');
        }

        if ($request->file('proof_national_eligibility')) {
            $files['proof_national_eligibility'] = $request->file('proof_national_eligibility');
        }

        if ($request->file('passport_photographs')) {
            $files['passport_photographs'] = $request->file('passport_photographs');
        }

        if ($request->file('adhaar_card')) {
            $files['adhaar_card'] = $request->file('adhaar_card');
        }

        $i = 0;
        foreach ($files as $key => $file) {
            ++$i;
            //return $i;
            if ($request->hasFile($key)) {
                $avatarPath = $request->file($key);
                $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
                $path       = $request->file($key)->move('upload/phd_entrance/' . $key . '/', $avatarName);
                $img_path   = '/upload/phd_entrance/' . $key . '/' . $avatarName;
                //return 11;
                //$images_path2[] = $img_path;

            } else {
                $hid_name = 'hid_' . $key;
                $img_path = $request->$hid_name;
            }
            // PhdEntrance::create($request->all() + $data);

            PhdEntranceCertificate::where('stud_id', $request->id)
                ->update([
                    $key => $img_path,
                ]);

        }

        $menus    = Menu::where('parent_id', '=', 0)->get();
        $allMenus = Menu::pluck('title', 'id')->all();
        if ($request->hasFile('signature2')) {
            $avatarPath = $request->file('signature2');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path       = $request->file('signature2')->move('upload/phd_entrance/', $avatarName);
            $img_path   = 'upload/phd_entrance/' . $avatarName;
            //return 11;
        } else {
            //return 22;
            $avatarName = $request->photo_hid;
        }
        $id         = $request->id;
        $check_info = collect($request->check_info)->implode(",");
        PhdEntrance::where("id", $id)
            ->update([
                'department'     => $request->department,
                'branch'         => $request->branch,
                'claim_entrance' => $request->claim_entrance,
                'claim_entrance' => $request->claim_entrance,
                'date'           => $request->date,
                'place'          => $request->place,
                'dd_no'          => $request->dd_no,
                'dd_date'        => $request->dd_date,
                'dd_bank'        => $request->dd_bank,
                'signature'      => $avatarName,
                'enclosures'     => $check_info,
                'draft_status'   => 3,
                'status'         => 2,
            ]);
            $details = [
                "name" =>$request->name,
            ];
			
            \Mail::to($request->email)->send(new \App\Mail\EntranceMail($details));
			//dd("Email is Sent.");
        //return view('frontend.front_entrance.entrance_form_preview');
        // return 11;
        return redirect()->route('phd_entran_preview', [$id]);
        //return view('frontend.front_entrance.thankyou', compact('menus', 'allMenus'));
    }

    public function phd_entran_preview($id)
    {
        //return $id;
        $menus          = Menu::where('parent_id', '=', 0)->get();
        $allMenus       = Menu::pluck('title', 'id')->all();
        $phd_data       = PhdEntrance::where('id', $id)->first();
        $phd_data_quali = PhdEntranceQualification::where('stud_id', $id)->get();
        $phdCerti       = PhdEntranceCertificate::where('stud_id', $id)->first();
        $selection_ncr  = explode(',', $phd_data->selection_ncr);
        $enclosures     = explode(',', $phd_data->enclosures);

        return view('frontend.front_entrance.entrance_form_preview', compact('phd_data', 'phd_data_quali', 'selection_ncr', 'enclosures', 'menus', 'allMenus', 'phdCerti'));
    }

    public function official_document_view()
    {

        return view('admin.examcell.official_form');
    }
    //course work form
    public function appliedCoursework(){
        $data['page_title']          = 'Coursework application list';
        $data['application_remarks'] = PhdCourseWorks::with('get_application_details')->where('status', 14)->get();
    
        // dd($data['application_remarks']->toArray());
        return view('admin.examcell.coursework.coursework_list')->with($data);
    }
    public function courseworkApplicationView(Request $request, $id = null)
    {
        $data['page_title'] = 'Application for Coursework Allotment in Ph.D Programme';
        $data['details']    = PhdCourseWorks::where('id', $id)->with([
            'get_application_details.get_supervisor_details',
            'get_application_details.get_nodal_center_details:id,college_name',
            'get_application_details.get_department_details',
        ])->first();

        $coursework_subjects = CourseWorkSubjects::where('appl_id', $data['details']->appl_id)->get();
        if ($coursework_subjects->isNotEmpty()) {
            $data['coursework_subjects'] = $coursework_subjects->map(function ($r) {
                return [
                    "id"           => $r->id,
                    "appl_id"      => $r->appl_id,
                    "subject_code" => $r->subject_code,
                    "course_title" => $r->course_title,
                    "credits"      => $r->credits,
                    "remarks"      => $r->remarks,
                    "status"       => $r->status,
                ];
            });
        } else {
            $data['coursework_subjects'] = [
                "id"           => '',
                "appl_id"      => '',
                "subject_code" => '',
                "course_title" => '',
                "credits"      => '',
                "remarks"      => '',
                "status"       => '',
            ];
        }
        $data['submitted'] = $coursework_subjects->isNotEmpty() ? 1 : 0;
        return view('admin.examcell.coursework.coursework_details')->with($data);
    }
}
