<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class areYouSuperMan
{
    public function handle($request, Closure $next)
    {
        if(Auth::user()->role->role_name!='superuser'){
            \App\Http\Controllers\HomeController::index();
        }
        return $next($request);
    }
}