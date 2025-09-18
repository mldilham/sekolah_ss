<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AuthAdmin;
use App\Models\Siswa;
use App\Models\User;
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

    public function create()
    {

        return view('admin.siswa.create');
    }

    public function store(Request $request)
    {
        $validations = $request->validate([
            'nisn' => 'required|max:10',
            'nama_siswa' => 'required|max:40',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_masuk' => 'required|numeric',
        ]);

        $users = Siswa::create([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect()->route('admin.siswa')->with('success','Berhasil Menambah Data.');

    }

    public function edit(Request $request, string $id)
    {
        // try {
        //     $id = decrypt($id);
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error','ID tidak valid');
        // }

        $siswa = Siswa::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nisn' => 'required|max:10',
            'nama_siswa' => 'required|max:40',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_masuk' => 'required|numeric',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect()->route('admin.siswa')->with('success','Berhasil Mengubah data.');

    }

    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

         return redirect()->route('admin.siswa')->with('success', 'Data berhasil dihapus.');
    }
}
