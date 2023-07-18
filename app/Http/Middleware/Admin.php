<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class Admin extends Middleware
{
  
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('admin')->check()) {
            return Redirect('/admin/login');
        }
        return $next($request);
    }
}
