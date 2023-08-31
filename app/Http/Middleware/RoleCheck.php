<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, String $role)
    {

        // dd($role);
        // dd(Auth::guard($role));

        // if (Auth::guard('nodalcentre')->check()) {
        //     dd(1);
        // } else {
        //     dd(2);
        // }

        if (Auth::guard('nodalcentre')->check()) {
            $user = Auth::guard('nodalcentre')->user();
            // dd([$user, Auth::guard('nodalcentre')->check(), $role]);
            $role = 'nodal_centre';
            return $next($request);
        } else if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();
            $role = 'student';
            return $next($request);
        } else if (Auth::guard('supervisor')->check()) {
            $user = Auth::guard('supervisor')->user();
            $role = 'supervisor';
            return $next($request);
        } else if (Auth::guard('co-supervisor')->check()) {
            $user = Auth::guard('co-supervisor')->user();
            $role = 'co-supervisor';
            return $next($request);
        } else if (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
            // dd([$user, Auth::guard('web')->check(), $role]);
            if ($user->role == $role) {
                return $next($request);
            } else if ($user->role == 'Jr. Executive') {
                return $next($request);
            } else {
                return redirect('/login');
            }
        }
        // else if (Auth::guard('je')->check()) {
        //     dd('assa');
        //     $user = Auth::guard('je')->user();
        //     if ($user->role == $role) {
        //         return $next($request);
        //     }
        //     return redirect('/login');
        // }
        else {
            return redirect('/login');
        }
        return redirect('/login');
    }
}
