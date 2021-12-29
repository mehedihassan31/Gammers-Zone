<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginCheckMiddleware
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
        if(Auth::check())
        {
            if(Auth::user()->role== '1')
            {
                return $next($request);
            }
            else
            {
                return redirect('/admin/')->with('status','Access Denied! as you are not as admin');
            }
        }
        else
        {
            return redirect('/home')->with('status','Please Login First');
        }
    }
}
