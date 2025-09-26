<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekstrakulikuler;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Profile;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    // ---------------- BERITA ----------------
    public function berita()
    {
        $beritas = Berita::all();
        $profile = Profile::first();
        return view('public.berita.index', compact('beritas', 'profile'));
    }

    public function detailView(int $id)
    {
        $berita = Berita::with('user')->where('id_berita', $id)->firstOrFail();
        $profile = Profile::first();
        return view('public.berita.detail',compact('berita', 'profile'));
    }

    // ---------------- GALERI ----------------
    public function galeri()
    {
        $galeris = Galeri::all();
        return view('public.galeri.index', compact('galeris'));
    }

    // ---------------- GURU ----------------
    public function guru()
    {
        $gurus = Guru::all();
        return view('public.guru.index', compact('gurus'));
    }

    // ---------------- SISWA ----------------
    public function siswa()
    {
        $siswas = Siswa::all();
        return view('public.siswa.index', compact('siswas'));
    }

    // ---------------- EKSKUL ----------------
    public function ekskul()
    {
        $ekskuls = Ekstrakulikuler::all();
        return view('public.ekskul.index', compact('ekskuls'));
    }

    // ---------------- PROFILE SEKOLAH ----------------
    public function profile()
    {
        $profile = Profile::first();
        return view('public.profile.index', compact('profile'));
    }
}
