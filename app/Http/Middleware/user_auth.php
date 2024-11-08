<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class user_auth
{

    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role == 'administrator'){
            return back();
        }

        return $next($request);
    }
}
