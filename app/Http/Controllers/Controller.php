<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Berita;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Galeri;
use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller
{
    //
    public function home()
    {
        // Ambil semua data untuk halaman publik
        $profile = Profile::first();
        $beritas = Berita::latest()->take(6)->get(); // Ambil 6 berita terbaru
        $gurus = Guru::take(8)->get(); // Ambil 8 guru
        $siswas = Siswa::take(12)->get(); // Ambil 12 siswa
        $galeris = Galeri::latest()->take(8)->get(); // Ambil 8 galeri terbaru
        $ekstrakulis = Ekstrakulikuler::take(6)->get(); // Ambil 6 ekstrakurikuler

        return view('public.layouts.home', compact('profile', 'beritas', 'gurus', 'siswas', 'galeris', 'ekstrakulis'));
    }

    public function public()
    {
        // Ambil semua data untuk halaman publik
        $profile = Profile::first();
        $beritas = Berita::latest()->take(6)->get(); // Ambil 6 berita terbaru
        $jumlah_guru = Guru::count(); // Hitung jumlah guru
        $jumlah_siswa = Siswa::count(); // Hitung jumlah siswa
        $galeris = Galeri::latest()->take(8)->get(); // Ambil 8 galeri terbaru
        $ekstrakulis = Ekstrakulikuler::take(6)->get(); // Ambil 6 ekstrakurikuler

        return view('public.index', compact('profile', 'beritas', 'jumlah_guru', 'jumlah_siswa', 'galeris', 'ekstrakulis'));
    }

    public function profile()
    {
        $profile = Profile::first(); // ambil data profil sekolah
        return view('layouts.profile', compact('profile'));
    }
}
