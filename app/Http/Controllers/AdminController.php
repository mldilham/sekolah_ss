<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AuthAdmin;
use App\Models\Guru;
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

    public function userView()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function siswaView()
    {
        $siswa = Siswa::all();
        return view('admin.siswa.index', compact('siswa'));
    }

    public function guruView()
    {
        $guru = Guru::all();
        return view('admin.guru.index', compact('guru'));
    }



    public function createGuru()
    {
        return view('admin.guru.create');
    }

    public function storeGuru(Request $request)
    {
        $validations = $request->validate([
            'nama_guru' => 'required|max:40',
            'nip' => 'required|max:15',
            'mapel' => 'required|max:40',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $fotoname = null;
        if ($request->hasFile('foto')) {
            $fotoname = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('uploads/guru'), $fotoname);
        }
        Guru::create([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'foto' => $fotoname,
        ]);

        return redirect()->route('admin.guru')->with('success', 'Berhasil Menambah data');
    }

    public function destroyGuru(Request $request, string $id)
    {
        $guru = Guru::FindOrFail($id);
        $guru->delete();
        return redirect()->route('admin.guru')->with('success', 'Berhasil menghapus data.');
    }



    public function editGuru(Request $request, string $id)
    {
        $guru = Guru::FindOrFail($id);
        return view('admin.guru.edit', compact('guru'));

    }

    public function updateGuru(Request $request, string $id)
    {
        $validations = $request->validate([
            'nama_guru' => 'required|max:40',
            'nip'       => 'required|max:15',
            'mapel'     => 'required|max:40',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $guru = Guru::findOrFail($id);
        $fotoname = $guru->foto; // default: foto lama

        if ($request->hasFile('foto')) {
            // hapus foto lama kalo ada
            if ($fotoname && file_exists(public_path('uploads/guru/'.$fotoname))) {
                unlink(public_path('uploads/guru/'.$fotoname));
            }

            // simpan foto baru
            $fotoname = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('uploads/guru'), $fotoname);
        }

        // update data guru
        $guru->update([
            'nama_guru' => $request->nama_guru,
            'nip'       => $request->nip,
            'mapel'     => $request->mapel,
            'foto'      => $fotoname,
        ]);

        return redirect()->route('admin.guru')->with('success','Data berhasil diperbarui.');
    }




    public function createSiswa()
    {

        return view('admin.siswa.create');
    }

    public function storeSiswa(Request $request)
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

    public function editSiswa(Request $request, string $id)
    {
        // try {
        //     $id = decrypt($id);
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error','ID tidak valid');
        // }

        $siswa = Siswa::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    public function updateSiswa(Request $request, string $id)
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

    public function destroySiswa(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

         return redirect()->route('admin.siswa')->with('success', 'Data berhasil dihapus.');
    }





    public function createView()
    {
        return view('admin.user.create');
    }

    public function storeView()
    {

    }

    public function editView(string $id)
    {
        $users = User::findOrFail($id);
        return view('admin.user.edit', compact('users'));
    }

    public function updateView(Request $request, string $id)
    {
        $validations = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email',
            'role' => 'required|in:admin,operator',
        ]);

        $users = User::FindOrFail($id);

        $users->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.user')->with('success','Berhasil Mengubah data.');

    }

    public function destroyView()
    {

    }
}
