<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    public function index()
    {
        $siswas = Siswa::all();

        return view('siswa.dashboard', compact('siswas'));
    }
}
