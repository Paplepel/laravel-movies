<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Admincheck
{

    // Check if user is admin

    public function handle(Request $request, Closure $next)
    {
        $userRole = auth()->user()->user_role;
        if($userRole == 'admin'){
            return $next($request);
        }
        else
        {
            return redirect('/');
        }
    }
}
