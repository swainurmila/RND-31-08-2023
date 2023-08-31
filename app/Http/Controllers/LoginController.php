<?php

namespace App\Http\Controllers;

use App\Models\NodalCentre;
use App\Models\Student;
use App\Models\Supervisor;
use App\Models\User;
use Captcha;
use Carbon\Carbon;
// use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Str;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:nodalcentre')->except('logout');
        $this->middleware('guest:student')->except('logout');
    }

    /**
     * Method index
     * @return view
     */
    public function index()
    {
        $data['ncr'] = NodalCentre::get()->pluck('college_name', 'id');
        return view('auth.login')->with($data);
    }

    /**
     * Method postLogin
     * @param Request $request [explicite description]
     * @return void
     */
    public function postLogin(Request $request)
    {
        // dd($request->all());
        $this->validate(
            $request,
            [
                'logintype' => 'required',
                'captcha'   => 'required|captcha',
            ],
            [
                'captcha.captcha' => 'Invalid captcha.',
            ]
        );
        if ($request->logintype == 'nodalcentre') {
            $credentials = ['email' => $request->email, 'password' => $request->password];
            // if (Auth::guard('nodalcentre')->attempt($credentials, $request->get('remember'))) {
            if (Auth::guard('nodalcentre')->attempt($credentials)) {
                $user               = NodalCentre::where('email', $request->email)->first();
                $success['name']    = $user->college_name;
                $success['email']   = $user->email;
                $success['role']    = 'Nodal Centre';
                $success['role_id'] = 13;
                $success['userID']  = $user->id;
                $request->session()->put('userdata', $success);
                $session_role  = session('userdata')['role'];
                $session_hosid = session('userdata')['email'];
                if ($session_role != "" && $session_hosid != "") {
                    return redirect()->route('nodalcentre.dashboard');
                }
            } else {
                return Redirect('login')->with('message', 'Sorry! You have entered invalid credentials');
            }
        } elseif ($request->logintype == 'student') {

            $credentials = ['email' => $request->email, 'password' => $request->password];
            // if (Auth::guard('nodalcentre')->attempt($credentials, $request->get('remember'))) {

            if (Auth::guard('student')->attempt($credentials)) {
                //return 14;
                $user               = Student::where('email', $request->email)->first();
                $success['name']    = $user->first_name . ' ' . $user->last_name;
                $success['email']   = $user->email;
                $success['role']    = $user->role;
                $success['role_id'] = 11;
                $success['userID']  = $user->id;
                $request->session()->put('userdata', $success);
                $session_role  = session('userdata')['role'];
                $session_email = session('userdata')['email'];
                if ($session_role != "" && $session_email != "") {
                    return redirect()->route('student.dashboard');
                }
            } else {
                return Redirect('login')->with('message', 'Sorry! You have entered invalid credentials');
            }
        } elseif ($request->logintype == 'supervisor') {
            //return 14;
            $credentials = ['email' => $request->email, 'password' => $request->password];
            // if (Auth::guard('nodalcentre')->attempt($credentials, $request->get('remember'))) {

            if (Auth::guard('supervisor')->attempt($credentials)) {
                //return 14;
                $user                = Supervisor::where('email', $request->email)->first();
                $success['name']     = $user->first_name . ' ' . $user->last_name;
                $success['email']    = $user->email;
                $success['role']     = $user->role;
                $success['role_id']  = 2;
                $success['userID']   = $user->id;
                $success['dsc_user'] = 5;
                $request->session()->put('userdata', $success);
                $session_role  = session('userdata')['role'];
                $session_email = session('userdata')['email'];
                if ($session_role != "" && $session_email != "") {
                    return redirect()->route('supervisor.dashboard');
                }
            } else {
                return Redirect('login')->with('message', 'Sorry! You have entered invalid credentials');
            }
        } elseif ($request->logintype == 'co-supervisor') {
            $credentials = ['email' => $request->email, 'password' => $request->password];
            if (Auth::guard('co-supervisor')->attempt($credentials)) {
                //return 14;
                $user               = DB::table('co_supervisors')->where('email', $request->email)->first();
                $success['name']    = $user->first_name . ' ' . $user->last_name;
                $success['email']   = $user->email;
                $success['role']    = $user->role;
                $success['role_id'] = 16;
                $success['userID']  = $user->id;
                $request->session()->put('userdata', $success);
                $session_role  = session('userdata')['role'];
                $session_email = session('userdata')['email'];
                if ($session_role != "" && $session_email != "") {
                    return redirect()->route('cosupervisor.dashboard');
                }
            } else {
                return Redirect('login')->with('message', 'Sorry! You have entered invalid credentials');
            }
        } elseif ($request->logintype == 'dsc-experts') {
            $table_name = 'nodal_user_' . $request->ncr;
            $user       = DB::table($table_name)->where('email_id', $request->email)->first();
            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    // $user               = CoSupervisor::where('email', $request->email)->first();
                    $success['name']    = $user->name;
                    $success['email']   = $user->email_id;
                    $success['role']    = $user->role;
                    $success['role_id'] = $user->role_id;
                    $success['nodal_id'] = $request->ncr;
                    $success['userID']  = $user->id;

                    $route_name = '';
                    switch ($user->role_id) {
                        case 14:
                            # code...
                            $success['dsc_user'] = 1;
                            $route_name          = 'chairperson.dashboard';
                            break;

                        case 5:
                            $success['dsc_user'] = 2;
                            $route_name          = 'co-chairperson.dashboard';
                            # code...
                            break;

                        case 3:
                            $success['dsc_user'] = 3;
                            $route_name          = 'professors.dashboard';
                            # code...
                            break;

                        default:
                            # code...
                            break;
                    }
                    $request->session()->put('userdata', $success);
                    $session_role  = session('userdata')['role'];
                    $session_email = session('userdata')['email'];
                    if ($session_role != "" && $session_email != "") {
                        return redirect()->route($route_name);
                    }
                } else {
                    return Redirect('login')->with('message', 'Sorry! You have entered invalid credentials');
                }
            } else {
                return Redirect('login')->with('message', 'Sorry! You have entered invalid credentials');
            }
        } else {

            $user = User::where('email', $request->email)->first();
            //    ->leftjoin('roles as r', 'users.role','=','r.id')
            //    ->first(['users.*', 'r.role as role_name']);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $success['name']    = $user->name;
                $success['email']   = $user->email;
                $success['role']    = $user->role;
                $success['role_id'] = $user->role_id;
                $success['userID']  = $user->id;
                $request->session()->put('userdata', $success);

                
                $session_role  = session('userdata')['role'];
                $session_hosid = session('userdata')['email'];
                if ($session_role != "" && $session_hosid != "") {
                    return redirect()->route('dashboard');
                }
            } else {
                return Redirect('login')->with('message', 'Sorry! You have entered invalid credentials');
            }
        }
    }

    /**
     * Method logout
     * @return void
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();
        //return $ses = session()->all();
        return redirect()->route('login');
    }

    /**
     * Method refreshCaptcha
     * @return json
     */
    public function refreshCaptcha()
    {
        return response()->json([
            'captcha' => Captcha::img(),
        ]);
    }

    /**
     * Method view_forget
     * @return view
     */
    public function view_forget()
    {
        return view('auth.passwords.email');
    }

    /**
     * Method submitForgetPasswordForm
     * @param Request $request [explicite description]
     * @return void
     */
    public function submitForgetPasswordForm(Request $request)
    {
        if ($request->logintype == 'official') {
            $request->validate([
                'logintype' => 'required',
                'email'     => 'required|email|exists:users',
            ]);
        } elseif ($request->logintype == 'nodalcentre') {
            //return "nodalcentre";
            $request->validate([
                'logintype' => 'required',
                'email'     => 'required|email|exists:nodal_centres',
            ]);
        } elseif ($request->logintype == 'student') {
            $request->validate([
                'logintype' => 'required',
                'email'     => 'required|email|exists:students',
            ]);
        } elseif ($request->logintype == 'supervisor') {
            $request->validate([
                'logintype' => 'required',
                'email'     => 'required|email|exists:supervisors',
            ]);
        } elseif ($request->logintype == 'co-supervisor') {
            $request->validate([
                'logintype' => 'required',
                'email'     => 'required|email|exists:co_supervisors',
            ]);
        }

        //   $request->validate([
        //     'logintype' => 'required',
        //       'email' => 'required|email|exists:students',
        //   ]);

        $log_type = $request->logintype;

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email'      => $request->email,
            'token'      => $token,
            'created_at' => Carbon::now(),
        ]);

        Mail::send('emails.forgetPassword', ['token' => $token, 'logtype' => $log_type], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('status', 'We have e-mailed your password reset link!');
    }

    /**
     * Method showResetPasswordForm
     * @param $token $token [explicite description]
     * @param $logtype $logtype [explicite description]
     * @return void
     */
    public function showResetPasswordForm($token, $logtype)
    {
        return view('auth.forgetPasswordLink', ['token' => $token, 'logtype' => $logtype]);
    }

    /**
     * Method submitResetPasswordForm
     * @param Request $request [explicite description]
     * @return void
     */
    public function submitResetPasswordForm(Request $request)
    {
        $logtype = $request->logtype;
        if ($logtype == "official") {
            $tabel = 'users';
        } elseif ($logtype == "nodalcentre") {
            $tabel = 'nodal_centres';
        } elseif ($logtype == "student") {
            $tabel = 'students';
        } elseif ($logtype == "supervisor") {
            $tabel = 'supervisors';
        } elseif ($logtype == "co-supervisor") {
            $tabel = 'co_supervisors';
        }

        $request->validate([
            'email'                 => "required|email|exists:$tabel",
            'password'              => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token,
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        //   $user = Student::where('email', $request->email)
        //               ->update(['password' => Hash::make($request->password)]);

        $user = DB::table($tabel)
            ->where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect('/login')->with('message2', 'Your password has been changed!');
    }
}
