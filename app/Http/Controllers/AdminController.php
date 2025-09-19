<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AuthAdmin;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function galeriView()
    {
        $galeri = Galeri::all();
        return view('admin.galeri.index', compact('galeri'));
    }

    public function beritaView()
    {
        $berita = Berita::all();
        return view('admin.berita.index', compact('berita'));
    }






    //GURU

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
        $request->validate([
            'nama_guru' => 'required|max:40',
            'nip'       => 'required|max:15',
            'mapel'     => 'required|max:40',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $guru = Guru::findOrFail($id);
        $fotoname = $guru->foto; // default pakai foto lama

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




    //SISWA
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




    //USER
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

    public function destroyView(string $id)
    {
        $users = User::FindOrFail($id);
        $users->delete();

         return redirect()->route('admin.user')->with('success', 'Data berhasil dihapus.');
    }


    //GALERI
    public function createGaleri()
    {
        return view('admin.galeri.create');
    }

    public function storeGaleri(Request $request)
    {
        $validations = $request->validate([
            'judul' => 'required|max:50',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:20480',
            'kategori' => 'required|in:foto,video',
            'tanggal' => 'required|date',
        ]);

        $filename = time().'.'.$request->file->getClientOriginalName();
        $request->file->move(public_path('uploads/file/'),$filename);

        Galeri::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'file' => $filename,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ]);
        return redirect()->route('admin.galeri')->with('success', 'Galeri berhasil ditambahkan!');
    }


    public function editGaleri(string $id)
    {
        $galeri = Galeri::findorfail($id);
        return view('admin.galeri.edit',compact('galeri'));
    }

    public function updateGaleri(Request $request, string $id)
    {
        $validations = $request->validate([
            'judul' => 'required|max:50',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:20480',
            'kategori' => 'required|in:foto,video',
            'tanggal' => 'required|date',
        ]);

        $galeri = Galeri::findorfail($id);
        $filename = $galeri->file;
        // hapus file/video lama kalo ada
        if ($request->hasFile('file')) {
            if ($filename && file_exists(public_path('uploads/file/'.$filename))) {
                unlink(public_path('uploads/file/'.$filename));
            }

            // simpan file/video baru baru
            $filename = time().'.'.$request->file->extension();
            $request->file->move(public_path('uploads/file'), $filename);
        }

        $galeri->update([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'file' => $filename,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin.galeri')->with('success','Berhasil Mengupdate data.');
    }

    public function destroyGaleri(string $id)
    {
        $galeri = Galeri::findorfail($id);
        $galeri->delete();

        return redirect()->route('admin.galeri')->with('success','Berhasil menghapus data');
    }


    //BERITA
    public function createBerita()
    {
        return view('admin.berita.create');
    }

    public function storeBerita(Request $request)
    {
        $validations = $request->validate([
            'judul' => 'required|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:5120',
        ]);

        $filename = null;
        if ($request->hasFile('gambar')) {
            $filename = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('uploads/berita/'), $filename);
        }
        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'gambar' => $filename,
            'id_user' => Auth::user()->id_user,
        ]);

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function editBerita(string $id)
    {
        $berita = Berita::findorfail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function updateBerita(Request $request, string $id)
    {
        $validations = $request->validate([
            'judul' => 'required|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:5120',
        ]);

        $berita = Berita::findorfail($id);
        $fotoname = $berita->gambar;
        if ($request->hasFile('gambar')) {
            if ($fotoname->gambar && file_exists(public_path('uploads/berita/'.$fotoname))) {
                unlink(public_path('uploads/berita/').$fotoname);
            }

            $fotoname = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('uploads/berita/'), $fotoname);
        }
    }

    public function destroyBerita(string $id)
    {

    }
}
