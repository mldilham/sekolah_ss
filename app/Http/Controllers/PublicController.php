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
        $beritas = Berita::orderBy('tanggal', 'desc')->paginate(3);
        $profile = Profile::first();
        return view('public.berita.index', compact('beritas', 'profile'));
    }

    public function detailBerita(string $id)
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

    // ---------------- EKSKUL ----------------
    public function ekskul()
    {
        $ekskuls = Ekstrakulikuler::all();
        return view('public.ekskul.index', compact('ekskuls'));
    }

    public function detailEkskul(string $id)
    {
        $ekskul = Ekstrakulikuler::findorfail($id);
        $profile = Profile::first();
        return view('public.ekskul.detail',compact('ekskul', 'profile'));
    }

    // ---------------- PROFILE SEKOLAH ----------------
    // public function profile()
    // {
    //     $profile = Profile::first();
    //     return view('public.profile.index', compact('profile'));
    // }

    public function informasi()
    {
        $profile = Profile::first();
        return view('public.profile.informasi', compact('profile'));
    }

    public function visiMisi()
    {
        $profile = Profile::first();
        return view('public.profile.visi-misi', compact('profile'));
    }

    public function deskripsi()
    {
        $profile = Profile::first();
        return view('public.profile.deskripsi', compact('profile'));
    }

    // ---------------- GURU ----------------
    public function guru()
    {
        $gurus = Guru::all();
        return view('public.layanan.guru', compact('gurus'));
    }

    public function detailGuru(string $id)
    {
        $guru = Guru::findOrFail($id);
        $profile = Profile::first();
        return view('public.layanan.detail', compact('guru', 'profile'));
    }

    // ---------------- SISWA ----------------
    public function siswa()
    {
        $siswas = Siswa::all();
        $profile = Profile::first();
        return view('public.layanan.siswa', compact('profile','siswas'));
    }
}
