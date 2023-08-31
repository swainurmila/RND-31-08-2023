<?php

namespace App\Http\Controllers;

use App\Mail\EntranceMail;
use App\Mail\EntranceRefMail;
use App\Models\CourseWorkSubjects;
use App\Models\EntranceExamCenter;
use App\Models\EntranceExamDate;
use App\Models\Menu;
use App\Models\PhdCourseWorks;
use App\Models\PhdEntrance;
use App\Models\PhdEntranceCertificate;
use App\Models\PhdEntranceQualification;
use App\Models\MailLog;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use PDF;
use Session;
use Yajra\DataTables\DataTables;
use ZipArchive;
use App\Mail\CompleteApplyMail;
use App\Exports\EntranceAttendance;
use Maatwebsite\Excel\Facades\Excel;

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
        $current_time = Carbon::now()->format('Y-m-d H:i:s');
        $desiredTime  = Carbon::now()->setTime(23, 59, 0);
        //$end_time = $desiredTime->format('H:i:s Y-m-d');
        $end_time = '2023-08-16 23:59:59';
        return view('frontend.front_entrance.entrance_form', compact('menus', 'allMenus', 'current_time', 'end_time'));
    }
    public function entrance_form_two($id)
    {
        $menus        = Menu::where('parent_id', '=', 0)->get();
        $allMenus     = Menu::pluck('title', 'id')->all();
        $phd_entrance = PhdEntrance::where('id', $id)->first(['dd_no', 'dd_date', 'dd_bank', 'name', 'email', 'category', 'registration_no', 'status']);
        $programmes   = \DB::table('programs')->select('id', 'program')->get();
        $ref_id       = $phd_entrance->registration_no;

        if ($phd_entrance->status == 1) {
            return view('frontend.front_entrance.entrance_submitted', compact('ref_id'));
        } else {
            return view('frontend.front_entrance.entrance_form2', compact('menus', 'allMenus', 'id', 'phd_entrance', 'programmes', 'ref_id'));
        }
    }

    public function get_branch(Request $request)
    {
        //return $request->programmes_id;
        $branch = DB::table('departments')->select('departments_title', 'id')->where("prg_id", $request->programmes_id)->get();

        return response()->json($branch);
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

        $reg_id   = PhdEntrance::latest('id')->first();
        $cur_year = date('y');
        $latestId = PhdEntrance::max('id') + 1;
        $sl_no    = str_pad($latestId, 3, '0', STR_PAD_LEFT);
        $ref_no   = "ref-$cur_year/BPUT-ETR/$sl_no";

        $data = [
            'selection_ncr'   => $arr,
            'draft_status'    => 1,
            'photo'           => $avatarName,
            'registration_no' => $ref_no,
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
        $details = [
            "name"   => $request->name,
            'ref_no' => $ref_no,
            'id'     => $last_id->id,
        ];
        Mail::to($request->email)->send(new EntranceRefMail($details));

        return redirect()->route('entrance_form_two', $last_id->id);
    }

    public function phd_entran_draft($id)
    {
        {
            $menus    = Menu::where('parent_id', '=', 0)->get();
            $allMenus = Menu::pluck('title', 'id')->all();

            $phd_data = PhdEntrance::where('id', $id)->first();

            // if ($phd_data === null) {

            //     return view('frontend.front_entrance.no_data_found');
            // }

            $phd_data_quali = PhdEntranceQualification::where('stud_id', $id)->get();

            $phdEntrance = optional(PhdEntrance::find($id));
            $createdDate = $phdEntrance->created_at ?? null;
            $status      = $phdEntrance->status ?? null;
            $ref_id      = $phdEntrance->registration_no ?? null;

            if ($createdDate && $ref_id) {
                $currentDate     = Carbon::now();
                $hoursDifference = $currentDate->diffInHours($createdDate);

                // if ($hoursDifference > 72) {
                //     return view('frontend.front_entrance.entrance_disabled');
                // } else {
                if ($status == 1) {
                    return view('frontend.front_entrance.entrance_submitted', compact('ref_id'));
                } else {
                    return view('frontend.front_entrance.entrance_form_draft', compact('menus', 'allMenus', 'phd_data', 'phd_data_quali', 'id'));
                }
                // }
            } else {
                return response('No data found.', 404);
            }
        }
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

        //return 11;
        return redirect()->route('entrance_form_two', ['id' => $id]);

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

        if ($request->file('mphil_cerficate')) {
            $files['mphil_cerficate'] = $request->file('mphil_cerficate');
        }

        if ($request->file('mphil_marksheet')) {
            $files['mphil_marksheet'] = $request->file('mphil_marksheet');
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
                'exam_center'    => $request->exam_center,
                // 'dd_date'        => $request->dd_date,
                // 'dd_bank'        => $request->dd_bank,
                'signature'      => $avatarName,
                'enclosures'     => $check_info,
                'draft_status'   => 3,
                //'status'         => 1,
            ]);
        return redirect()->route('phd_entran_preview', [$id]);
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
        $prog           = DB::table("phd_entrances as e")->select('p.program', 'd.departments_title')->leftJoin('programs as p', 'p.id', '=', 'e.department')
            ->leftJoin('departments as d', 'd.id', '=', 'e.branch')->where('e.id', $id)->first();

        return view('frontend.front_entrance.entrance_form_preview', compact('phd_data', 'phd_data_quali', 'selection_ncr', 'enclosures', 'menus', 'allMenus', 'phdCerti', 'id', 'prog'));
    }
    public function phd_entran_preview_submit($id, Request $request)
    {
        //return $request;
        $data['menus']          = Menu::where('parent_id', '=', 0)->get();
        $data['allMenus']       = Menu::pluck('title', 'id')->all();
        $data['phd_data']       = PhdEntrance::where('id', $id)->first();
        $data['phd_data_quali'] = PhdEntranceQualification::where('stud_id', $id)->get();
        $data['phdCerti']       = PhdEntranceCertificate::where('stud_id', $id)->first();
        $data['enclosures']     = explode(',', $data['phd_data']->enclosures);
        $data['prog']           = DB::table("phd_entrances as e")->select('p.program', 'd.departments_title')->leftJoin('programs as p', 'p.id', '=', 'e.department')
            ->leftJoin('departments as d', 'd.id', '=', 'e.branch')->where('e.id', $id)->first();
        $details = [
            "name"   => $request->name,
            "ref_id" => $request->ref_id,
        ];

        PhdEntrance::where("id", $id)
            ->update(['status' => 1]);

        $pdf        = PDF::loadView('emails.entance_mail_attachment', $data)->setPaper('letter', 'portrait');
        $avatarName = time() . '.pdf';
        $file_path  = public_path('upload/entrance_pdf/' . $avatarName);
        file_put_contents($file_path, $pdf->output());
        Mail::to($request->email)->send(new EntranceMail($details, $pdf));
        return redirect()->route('entrance-form-final-view', [$id])
            ->with('success', ' Your application form has been successfully submitted, and the same has been sent to your registered email id.');

    }

    public function official_document_view()
    {
        return view('admin.examcell.official_form');
    }
    //course work form
    public function appliedCoursework()
    {
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
    public function download($uuid)
    {
        $pathofFile = storage_path('/upload/phd_entrance/');
        return response()->download($pathofFile);
    }
    public function phd_entran_final($id, Request $request)
    {
        $menus          = Menu::where('parent_id', '=', 0)->get();
        $allMenus       = Menu::pluck('title', 'id')->all();
        $phd_data       = PhdEntrance::where('id', $id)->first();
        $phd_data_quali = PhdEntranceQualification::where('stud_id', $id)->get();
        $phdCerti       = PhdEntranceCertificate::where('stud_id', $id)->first();
        $selection_ncr  = explode(',', $phd_data->selection_ncr);
        $enclosures     = explode(',', $phd_data->enclosures);
        $successMessage = $request->session()->get('success');
        $prog           = DB::table("phd_entrances as e")->select('p.program', 'd.departments_title')->leftJoin('programs as p', 'p.id', '=', 'e.department')
            ->leftJoin('departments as d', 'd.id', '=', 'e.branch')->where('e.id', $id)->first();
        return view('frontend.front_entrance.entrance_form_view', compact('phd_data', 'phd_data_quali', 'selection_ncr', 'enclosures', 'menus', 'allMenus', 'phdCerti', 'id', 'prog'))->with('successMessage', $successMessage);
    }
    public function checkEmail(Request $request)
    {
        $id              = PhdEntrance::where('email', $request->input('email'))->first('id');
        $emailExists     = PhdEntrance::where('email', $request->input('email'))->exists();
        $data['data']    = $emailExists ? 1 : 0;
        $data['message'] = $emailExists ? 'Your e-mail is already exist! ' : 'N/A';
        $data['id']      = $id->id;

        return response()->json($data);
    }
    public function downloadAdmitCard()
    {
        return view("frontend.front_entrance.download_admit_card");
    }
    public function downloadAdmitCardPage(Request $request)
    {
        //$request->ref_no;
        $phd_data = DB::table("phd_entrances")->select('name', 'registration_no', 'id')->where('registration_no', $request->ref_no)->whereIn('is_selected', [1,2])->first();
        return view("frontend.front_entrance.download_admit_card_page", compact('phd_data'));
    }
    //PHD entrance application
    public function entranceApplicationList(Request $request)
    {
        if ($request->ajax()) {
            $phd_data = PhdEntrance::select('phd_entrances.*', 'phd_entrances.id as eid', 'p.program', 'd.departments_title')->leftJoin('programs as p', 'p.id', '=', 'phd_entrances.department')
                ->leftJoin('departments as d', 'd.id', '=', 'phd_entrances.branch')->where('phd_entrances.status', 1)->get();
            return DataTables::of($phd_data)
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('stu.entrance-application-view', [$row->id]) . '" class="edit btn btn-success btn-sm">View</a>';
                    return $btn;
                })
                ->addColumn('status', function ($row) {
                    $badgeClass = '';
                    if ($row->is_selected == 2) {
                        $badgeClass = 'bg-success';
                        $statusText = 'Selected';
                    } elseif ($row->is_selected == 3) {
                        $badgeClass = 'bg-warning';
                        $statusText = 'Not eligible';
                    } elseif ($row->is_selected == 1) {
                        $badgeClass = 'bg-info';
                        $statusText = 'Exempted';
                    } else {
                        $badgeClass = 'bg-danger';
                        $statusText = 'Pending';
                    }
                    $statusBadge = '<span class="badge ' . $badgeClass . '">' . $statusText . '</span>';
                    return $statusBadge;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view("admin.applications.entrance-application");
    }
    //entrance application submit at exam-cell login
    public function entranceApplicationSubmit(Request $request)
    {
        //return $request;
        $data = PhdEntrance::where("id", $request->id)->update([
            'dd_no'       => $request->dd_no,
            'dd_date'     => $request->dd_date,
            'dd_bank'     => $request->dd_bank,
            'is_document' => $request->entrance_is_document,
        ]);
        return response()->json($data);
    }
    public function entranceApplicationView($id)
    {
        $phd_data       = PhdEntrance::where('id', $id)->first();
        $phd_data_quali = PhdEntranceQualification::where('stud_id', $id)->get();
        $phdCerti       = PhdEntranceCertificate::where('stud_id', $id)->first();
        $selection_ncr  = explode(',', $phd_data->selection_ncr);
        $enclosures     = explode(',', $phd_data->enclosures);
        $prog           = DB::table("phd_entrances as e")->select('p.program', 'd.departments_title')->leftJoin('programs as p', 'p.id', '=', 'e.department')
            ->leftJoin('departments as d', 'd.id', '=', 'e.branch')->where('e.id', $id)->first();
        return view('admin.applications.entrance-application-view', compact('phd_data', 'phd_data_quali', 'selection_ncr', 'enclosures', 'phdCerti', 'id', 'prog'));
    }
    public function entranceApplicationRemark($id, Request $request)
    {
        //return $request;
        $updateStatus = PhdEntrance::where('id', $id)->update([
            'is_selected'  => $request->is_selected,
            'admin_remark' => $request->admin_remark,
        ]);
        return redirect()->route('stu.entrance-application')->with('success', 'Remark updated successfully');
    }
    public function entranceAdmitCard($id)
    {
        $phd_data = PhdEntrance::select('phd_entrances.*', 'phd_entrances.id as eid', 'p.program', 'd.departments_title')->leftJoin('programs as p', 'p.id', '=', 'phd_entrances.department')
        ->leftJoin('departments as d', 'd.id', '=', 'phd_entrances.branch')->where('phd_entrances.id', $id)->first();
    //return $phd_data->id;
    //return view('frontend.front_entrance.phdentrance_admit_card', compact('phd_data'));

        $data = ['photo' => $phd_data->photo,
         'name' => $phd_data->name,
         'entrance_roll_no'=>$phd_data->entrance_roll_no,
         'program'=>$phd_data->program,
         'departments_title'=>$phd_data->departments_title,
         'exam_center_code'=>$phd_data->exam_center_code,
        ];
		
		/*$data['photo'] = $phd_data->photo;
        $data['name'] = $phd_data->name; 
        $data['entrance_roll_no'] = $phd_data->entrance_roll_no;
        $data['program'] = $phd_data->program;
        $data['departments_title'] = $phd_data->departments_title;
        $data['exam_center_code'] = $phd_data->exam_center_code;*/
        
         $pdf = PDF::loadView('frontend.front_entrance.phdentrance_admit_card', $data)->setPaper('letter', 'portrait');

        return $pdf->download("admit_card.$phd_data->registration_no.pdf");
        // $phd_data = PhdEntrance::select('phd_entrances.*', 'phd_entrances.id as eid', 'p.program', 'd.departments_title')->leftJoin('programs as p', 'p.id', '=', 'phd_entrances.department')
        //     ->leftJoin('departments as d', 'd.id', '=', 'phd_entrances.branch')->where('phd_entrances.id', $id)->first();
        // return view('frontend.front_entrance.phdentrance_admit_card', compact('phd_data'));
    }
    //PHD Entrance exam location and date
    public function entranceExamDate()
    {
        $exam_date = EntranceExamDate::get();
        return view("admin.applications.entrance_date", compact('exam_date'));
    }
    public function entranceExamDateSubmit(Request $request)
    {
        //return $request;
        if ($request->subject_name) {
            foreach ($request->subject_name as $key => $item) {
                $exam_time                        = $request->from_time[$key] . '-' . $request->to_time[$key];
                $entrance_exam_date               = new EntranceExamDate();
                $entrance_exam_date->subject_name = $request->subject_name[$key];
                $entrance_exam_date->exam_date    = $request->exam_date[$key];
                $entrance_exam_date->sitting      = $request->sitting[$key];
                $entrance_exam_date->exam_time    = $exam_time;
                $entrance_exam_date->save();
            }
        }
        return redirect()->route('stu.entrance-exam-date')->with('success', 'Exam Date and Time submitted successfully');
    }
    public function entranceExamDateEdit(Request $request)
    {
        $result            = EntranceExamDate::where('id', $request->id)->first();
        $time              = explode('-', $result->exam_time);
        $result->from_time = $time[0];
        $result->to_time   = $time[1];
        return response($result);
    }
    public function entranceExamDateUpdate(Request $request)
    {
        $exam_time    = $request->edit_from_time . '-' . $request->edit_to_time;
        $updateStatus = EntranceExamDate::where('id', $request->exam_id)->update([
            'subject_name' => $request->edit_subject_name,
            'exam_date'    => $request->edit_exam_date,
            'sitting'      => $request->edit_exam_sitting,
            'exam_time'    => $exam_time,
        ]);
        return redirect()->back()->with('success', 'Exam date updated successfully.');
    }
    public function entranceExamCenter()
    {
        $programmes  = \DB::table('programs')->select('id', 'program')->get();
        $exam_center = DB::table("entrance_exam_centers as e")->select('e.*', 'p.program', 'd.departments_title')->leftJoin('programs as p', 'p.id', '=', 'e.program_id')
            ->leftJoin('departments as d', 'd.id', '=', 'e.department_id')->get();
        return view('admin.applications.entrance_center', compact('programmes', 'exam_center'));
    }
    public function entranceExamCenterSubmit(Request $request)
    {
        // return $request;
        if ($request->branch) {
            foreach ($request->branch as $key => $item) {
                $entrance_exam                = new EntranceExamCenter();
                $entrance_exam->program_id    = $request->department;
                $entrance_exam->department_id = $request->branch[$key];
                $entrance_exam->exam_location = $request->exam_location;
                $entrance_exam->exam_center   = $request->exam_center;
                $entrance_exam->save();
            }
        }
        return redirect()->back()->with('success', 'Exam Center submitted successfully');
    }
    public function entranceExamCenterEdit(Request $request)
    {
        return $exam_center = DB::table("entrance_exam_centers as e")
            ->select('p.program', 'd.departments_title', 'e.*')
            ->leftJoin('programs as p', 'p.id', '=', 'e.program_id')
            ->leftJoin('departments as d', 'd.id', '=', 'e.department_id')->where('e.id', $request->id)
            ->first();
        return response($exam_center);
    }
    public function entranceExamCenterUpdate(Request $request)
    {
        return 1;
        $updateStatus = EntranceExamCenter::where('id', $request->center_id)->update([
            'program_id'    => $request->dept_id,
            'department_id' => $request->branch_id,
            'exam_location' => $request->edit_exam_location,
            'exam_center'   => $request->edit_exam_center,
        ]);
        return redirect()->back()->with('success', 'Exam Center updated successfully.');
    }
    //Download all documents in Zip
    public function generateZip($id)
    {
        $phdCerti = PhdEntranceCertificate::where('stud_id', $id)->first();

        if ($phdCerti) {

            $filePaths = [
                $phdCerti->high_school_certificate,
                $phdCerti->memo_high_school,
                $phdCerti->intermidiate_certificate,
                $phdCerti->memo_intermediate,
                $phdCerti->ug_certificate,
                $phdCerti->memo_ug,
                $phdCerti->pg_mphil_cerficat,
                $phdCerti->memo_pg_mphil,
                $phdCerti->mphil_cerficate,
                $phdCerti->mphil_marksheet,
                $phdCerti->sc_st_certficate,
                $phdCerti->proof_national_eligibility,
                $phdCerti->adhaar_card,
            ];
        }
        //dd($filePaths);
        /*if (!empty($filePaths)) {
        $zip = new \ZipArchive();
        $zipFileName = 'test.zip';
        $zipFilePath = public_path($zipFileName);
        $res = $zip->open($zipFilePath, \ZipArchive::CREATE);

        if ($res === true) {
        foreach ($filePaths as $filePath) {
        $fileName = basename($filePath);
        $zip->addFile($filePath, $fileName);
        }

        $zip->close();

        }
        return response()->download($zipFilePath);
        }*/
        $filePaths = array_filter($filePaths);

        $zip = new ZipArchive;

        $fileName = 'Zipfile_example1.zip';

        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === true) {
            //$files = \File::files(public_path('ZipArchive_Example'));
            //return 1;
            foreach ($filePaths as $key => $value) {
                $file  = basename($value);
                $value = public_path($value);
                $zip->addFile($value, $file);
            }

            $zip->close();
        }

        return response()->download(public_path($fileName));

    }
    //Entrance exam Selection
    public function entranceExamSelection()
    {
        //$center = DB::table('phd_entrance_center_master')->get();
         $entrance_data   = DB::table("phd_entrances as e")->select('e.registration_no', 'e.name', 'p.program', 'd.departments_title', 'e.id', 'e.is_selected', 'e.exam_center', 'e.is_selected', 'e.exam_center_code', 'e.admin_remark', 'e.email', 'm.center_name', 'entrance_roll_no')->leftJoin('programs as p', 'p.id', '=', 'e.department')
        ->leftJoin('phd_entrance_center_master as m', 'e.exam_center', '=', 'm.place')
        ->leftJoin('departments as d', 'd.id', '=', 'e.branch')->where('e.is_document', 'yes')->get();
        $programmes = \DB::table('programs')->select('id', 'program')->get();
        return view('admin.applications.phd_entrance_select', compact('entrance_data', 'programmes'));
    }
    public function entranceSelectionFilter(Request $request)
    {
        $entrance_center = DB::table('entrance_exam_centers')->get();
        $entrance_data   = DB::table("phd_entrances as e")->select('e.registration_no', 'e.name', 'p.program', 'd.departments_title', 'e.id', 'e.is_selected', 'e.exam_center', 'e.is_selected', 'e.exam_center_code', 'e.admin_remark', 'e.email', 'm.center_name', 'entrance_roll_no')
            ->leftJoin('programs as p', 'p.id', '=', 'e.department')
            ->leftJoin('phd_entrance_center_master as m', 'e.exam_center', '=', 'm.place')
            ->leftJoin('departments as d', 'd.id', '=', 'e.branch')
            ->where('e.branch', $request->branch)
            ->where('e.is_document', 'yes')
            ->get();
        $programmes = \DB::table('programs')->select('id', 'program')->get();
        return view('admin.applications.phd_entrance_select', compact('entrance_data', 'entrance_center', 'programmes'));
    }
    public function entranceExamSelectionSubmit(Request $request)
    {
        //return $request->entrance_select;
        $entrance_data   = DB::table("phd_entrances as e")->select('e.registration_no','p.program', 'p.prgcode')->leftJoin('programs as p', 'p.id', '=', 'e.department')
        ->leftJoin('phd_entrance_center_master as m', 'e.exam_center', '=', 'm.place')
        ->where("e.id", $request->id)->first();
        $cur_year = date('y');
        $prog = $entrance_data->prgcode;
        $ref_no= substr($entrance_data->registration_no, -3);
        $roll_no = $cur_year."PHD".$prog.$ref_no;
        if ($request->entrance_select == 2) {
            //return 1;
            $data = PhdEntrance::where("id", $request->id)->update([
                'is_selected'      => $request->entrance_select,
                'exam_center_code' => $request->center,
                'entrance_roll_no' => $roll_no,
            ]);

        } elseif ($request->entrance_select == 1) {
            //return 2;
            $data = PhdEntrance::where("id", $request->id)->update([
                'is_selected'  => $request->entrance_select,
                'exam_center_code' => $request->center,
                'entrance_roll_no' => $roll_no,
            ]);
        } else {
            //return 3;
            $data = PhdEntrance::where("id", $request->id)->update([
                'is_selected'  => $request->entrance_select,
                'admin_remark' => $request->not_eligible_remark,
            ]);
        }
        return response()->json($data);
    }
    //PHD Entrance Admit card mail
    public function entranceRemainder()
    {
        $recipient = DB::table("phd_entrances")->whereIn('is_selected', [1,2])->get();
        foreach ($recipient as $key => $val) {

            // $encrypted = Crypt::encryptString($val->id);
            $details = [
                "name"   => $val->name,
                'ref_no' => $val->registration_no,
                'id'     => $val->id,
            ];

            // Mail::to($val->email)->send(new CompleteApplyMail($details));
			
            try {
                Mail::to($val->email)->send(new CompleteApplyMail($details));
                MailLog::insert([
                        "to_mail_id" => $val->email,
                        "mail_status"=> 'successful',
                        "created_at" => Carbon::now()
                    ]);
				Mail::to('urmila.swain@oasystspl.com')->send(new CompleteApplyMail($details));
            } catch (\Exception $e) { // Maybe use a more specific mail-related exception.
                MailLog::insert([
                    "to_mail_id" => $val->email,
                    "mail_status"=> 'unsuccessful',
                    "created_at" => Carbon::now()
                ]);
            }
			
        }
        return redirect()->back();
    }
    public function sendMail()
    {
        return view('frontend.front_entrance.remainder_mail');
    }
    //Attendance sheet for entrance exam
    public function entranceAttendanceSheet(Request $request){
        if ($request->ajax()) {
            // $phd_data = PhdEntrance::select('phd_entrances.*', 'phd_entrances.id as eid', 'p.program', 'd.departments_title')->leftJoin('programs as p', 'p.id', '=', 'phd_entrances.department')
            //     ->leftJoin('departments as d', 'd.id', '=', 'phd_entrances.branch')->whereIn('is_select', [1,2])->get();
            // return DataTables::of($phd_data)
            //     ->make(true);
        }
        return view('admin.applications.entrance_attendance_sheet');
    }
    public function exportImages()
    {
        $data = PhdEntrance::select('phd_entrances.*', 'phd_entrances.id as eid', 'p.program', 'd.departments_title')->leftJoin('programs as p', 'p.id', '=', 'phd_entrances.department')
                ->leftJoin('departments as d', 'd.id', '=', 'phd_entrances.branch')->get();

        return Excel::download(new EntranceAttendance($data), 'images.xlsx');
    }
}
