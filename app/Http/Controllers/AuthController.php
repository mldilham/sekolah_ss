<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        // Jika sudah login, redirect sesuai role
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'operator') {
                return redirect()->route('operator.dashboard');
            }
        }

        return view('pages.auth.login');
    }

    // Proses login
    public function auth(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        // Attempt login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Redirect sesuai role
            if ($user->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            } elseif ($user->role === 'operator') {
                return redirect()->intended(route('operator.dashboard'));
            }else{
                return redirect()->intended(route('siswa.dashboard'));
            }
        }

        // Jika gagal login
        return back()->with('error', 'Login gagal, cek email atau password anda!');
    }

    // public function registerView()
    // {
    //     return view('pages.auth.register');
    // }

    // public function register(Request $request)
    // {
    //     $validation = $request->validate([
    //         'name' => 'required',
    //         'username' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required|min:6',
    //     ]);

    //     $user = new User();
    //     $user->name = $request->input('name');
    //     $user->username = $request->input('username');
    //     $user->email = $request->input('email');
    //     $user->password = $request->input('password');
    //     $user->role = 'siswa';
    //     $user->saveOrFail();
    //     return redirect('/')->with('success', 'Berhasil mendaftar akun.');
    // }
    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');
    }
}
