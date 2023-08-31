<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = Auth::guard($guard)->user()->role;
                switch ($role) {
                    case 'nodal_center':
                        return redirect()->route('nodalcentre.dashboard');
                        break;

                    case 'student':
                        return redirect()->route('student.dashboard');
                        break;

                    case 'vc':
                        return redirect()->route('dashboard');
                        break;

                    default:
                        return redirect()->route('dashboard');
                        break;
                }
            }
        }
        return $next($request);
    }

    // public function handle($request, Closure $next, $guard = null) {
    //     if (Auth::guard($guard)->check()) {
    //       $role = Auth::user()->role;
    //       switch ($role) {
    //         default:
    //            //return redirect('/admin/dashboard');
    //            return "HELLO ADMIN";
    //            break;
    //       }
    //     }
    //     return $next($request);
    //   }
}
