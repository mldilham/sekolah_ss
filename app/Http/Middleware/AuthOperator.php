<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthOperator
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'operator') {
                return $next($request);
            }
            return redirect('/'); // user bukan operator
        }

        return redirect('/auth/login'); // user belum login
    }
}
