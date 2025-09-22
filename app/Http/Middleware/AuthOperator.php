<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthOperator
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/auth/login'); // user belum login
        }

        if (Auth::user()->role === 'operator') {
            return $next($request); // user operator, boleh lanjut
        }

        // user login tapi bukan operator
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard'); // arahkan sesuai role
        }

        Auth::logout();
        return redirect('/auth/login')->with('error','Role tidak valid');
    }
}
