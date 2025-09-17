<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller
{
    //
    public function home()
    {
        // if (Auth::check()) {
        //     return back();
        // }
        return view('layouts.app');
    }
}
