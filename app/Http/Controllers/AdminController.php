<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');
    }
    public function siswaView()
    {
        $siswa = Siswa::all();
        return view('admin.siswa.index', compact('siswa'));
    }
}
