<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ManagerAuthentication
{

    public function handle($request, Closure $next)
    {

        if ( (auth()->user()->type == "manager" ||  auth()->user()->type == "owner") && Auth::check()  ) {
            return $next($request);
        } else {
            return redirect()->route('home')->with('error',"You are not allowed to access this route") ;
        }


    }
}
