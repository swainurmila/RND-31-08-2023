<?php

namespace App\Http\Controllers;

use Captcha;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use \App\Mail\SendMail;

// use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:nodalcentre')->except('logout');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     // 'email' => 'required|email|unique:users|unique:students',
        //     'phone' => 'required|unique:users|unique:students',
        //     'password' => 'required|confirmed|min:6',
        //     // 'captcha' => 'required|captcha',
        // ]);
        $fname = $request->fname;
        $lname = $request->lname;
        $name  = $fname . " " . $lname;
        if ($request->apply_for == 'student') {
            $this->validate($request, [
                'email'    => 'required|unique:students',
                'phone'    => 'required|unique:users|unique:students',
                'password' => 'required|confirmed|min:6',
                // 'captcha' => 'required|captcha',
            ]);
            DB::table('students')->insert([
                'role'              => 'student',
                'first_name'        => $request->fname,
                'last_name'         => $request->lname,
                'email'             => $request->email,
                'phone'             => $request->phone,
                'gender'            => $request->gender,
                'password'          => Hash::make($request->password),
                'father_husband'    => $request->father_husband_name,
                'registration_date' => date('m-d-Y'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
        }
        // else if($request->apply_for == 'student') {
        //     $this->validate($request, [
        //         'email' => 'required|email|unique:users',
        //         'phone' => 'required|unique:users|unique:students',
        //         'password' => 'required|confirmed|min:6',
        //         // 'captcha' => 'required|captcha',
        //     ]);
        //     DB::table('users')->insert([
        //         'role' => $request->apply_for,
        //         'name' => $name,
        //         'email' => $request->email,
        //         'phone' => $request->phone,
        //         'password' => Hash::make($request->password),
        //         'father_husband_name' => $request->father_husband_name,
        //     ]);
        // }
        else if ($request->apply_for == 'supervisor') {
            //return $request;
            $this->validate($request, [
                'email'    => 'required|email|unique:supervisors',
                'phone'    => 'required|unique:supervisors',
                'password' => 'required|confirmed|min:6',
                // 'captcha' => 'required|captcha',
            ]);
            DB::table('supervisors')->insert([
                'role'              => 'supervisor',
                'first_name'        => $request->fname,
                'last_name'         => $request->lname,
                'email'             => $request->email,
                'phone'             => $request->phone,
                'password'          => Hash::make($request->password),
                'father_husband'    => $request->father_husband_name,
                'registration_date' => date('m-d-Y'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
        } else if ($request->apply_for == 'co-supervisor') {
            //return $request;
            $this->validate($request, [
                'email'    => 'required|email|unique:co_supervisors',
                'phone'    => 'required|unique:co_supervisors',
                'password' => 'required|confirmed|min:6',
                // 'captcha' => 'required|captcha',
            ]);
            DB::table('co_supervisors')->insert([
                'role'              => 'co-supervisor',
                'first_name'        => $request->fname,
                'last_name'         => $request->lname,
                'email'             => $request->email,
                'phone'             => $request->phone,
                'password'          => Hash::make($request->password),
                'father_husband'    => $request->father_husband_name,
                'registration_date' => date('m-d-Y'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
        } else {
            $this->validate($request, [
                'email'    => 'required|email|unique:users',
                'phone'    => 'required|unique:users|unique:students',
                'password' => 'required|confirmed|min:6',
                // 'captcha' => 'required|captcha',
            ]);
            DB::table('users')->insert([
                'role'                => $request->apply_for,
                'name'                => $name,
                'email'               => $request->email,
                'phone'               => $request->phone,
                'password'            => Hash::make($request->password),
                'father_husband_name' => $request->father_husband_name,
            ]);
        }

        // $details = [
        //     'title' => 'Title: Mail from BPUT',
        //     'body' => 'Body: This is for testing email using smtp'
        // ];

        $details = [
            "username" => $request->email,
            "password" => $request->password,
        ];

        Mail::to($request->email)->send(new SendMail($details));

        // Mail::send('auth.register', compact('data'), function ($message) use ($data) {
        //     $message->to($data['username'], $data['password'])
        //         ->subject('Welcome to bput')
        //         ->from('bput.com', 'Imprtant Info');
        // });
        return redirect()->route('login')->with('message2', 'You have registered successfully. Login to apply your form');
    }

    public function refreshCaptcha()
    {
        return response()->json([
            'captcha' => Captcha::img(),
        ]);
    }
}
