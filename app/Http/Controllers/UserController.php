<?php

namespace App\Http\Controllers;
use App\Models\{User,Role};
use Illuminate\Http\Request;
use \App\Mail\SendMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //
    

    public function index(){   
        //return session('sesdata')['email'];     
       
        
        $roles = Role::all();
        $users = User::all();
        $user_count = User::all()->count();

        //$user_role_data =  User::select()

        //   $user_role_data = User::join('roles', function($join) {
        //     $join->on('users.role_id', '=', 'roles.id');
        //   })
        //   //->whereNull('orders.customer_id')
        //   ->get();

        //   $user_role_data = DB::table('roles')
        //  ->select('users.*','roles.id as rid','roles.role')
        // ->leftJoin('users', 'users.rolerole', '=', 'roles.id')
        // //->groupBy('users.id')
        // ->get();
        return view('admin.master.users.index',compact('users','user_count','roles'));

    }

    public function add_user(Request $request){

        $role_name = DB::table('roles')->where('id',$request->user_role)->first();
        $role_name = $role_name->role;
        $user = new User();
        $user->role = $role_name;
        $user->role_id = $request->user_role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->user_status;
        $user->save();

        $details = [
            "username" => $request->email,
            "password" => $request->password
        ];
    
        Mail::to($request->email)->send(new SendMail($details));
        return redirect()->route('users');
        
    }

    public function edit_user(Request $request){
        $user = User::find($request->id);
        return response()->json($user);
    }

    public function update_user(Request $request)
    {

        $user_id = $request->hid_id;
        $user = User::find($user_id);
        $user->role_id = $request->user_role;
        $user->name = $request->name;
        $user->status = $request->user_status;
        $user->update();
        return redirect()->route('users')->with('status','Student Updated Successfully');
    }

    public function delete_user(Request $request)
    {

     $user = User::find($request->id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'role not found',
            ], 400);
        }

        if ($user->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'user deleted successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'user can not be deleted',
            ], 500);
        }
        
    }


    
}
