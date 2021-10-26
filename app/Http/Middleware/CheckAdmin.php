<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // $user = Auth::user()->role;
        // dd($user);
        $role = Auth::user()->role; 

        if ($role != 10){
            // return redirect('/logout');
            return back()->with('status', 'You have no access.');
        }
        return $next($request);
    }
}
