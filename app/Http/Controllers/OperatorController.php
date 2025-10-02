<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekstrakulikuler;
use App\Models\Galeri;
use App\Models\Profile;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class OperatorController extends Controller
{
    public function dashboard()
    {
        return view('operator.dashboard', [
            'siswaCount'   => Siswa::count(),
            'beritaCount'  => Berita::count(),
            'galeriCount'  => Galeri::count(),
            'ekskulCount'  => Ekstrakulikuler::count(),
            'profile'      => Profile::first(),
            'latestNews'   => Berita::latest()->take(3)->get(),
            'latestGaleri' => Galeri::latest()->take(3)->get(),
            'latestEkskul' => Ekstrakulikuler::latest()->take(3)->get(),
        ]);
    }

    // BERITA
    public function beritaView()
    {
        $search = request('search');
        $berita = Berita::with('user')
            ->when($search, function($query) use ($search) {
                $query->where('judul', 'like', '%' . $search . '%')
                      ->orWhere('isi', 'like', '%' . $search . '%');
            })
            ->get();
        return view('operator.berita.index', compact('berita'));
    }

    public function createBerita()
    {
        return view('operator.berita.create');
    }

    public function storeBerita(Request $request)
    {
        $request->validate([
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
            'id_user' => Auth::id(),
        ]);

        return redirect()->route('operator.berita')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function editBerita($id)
    {
        $id = Crypt::decrypt($id);
        $berita = Berita::where('id_user', Auth::id())->findOrFail($id);
        return view('operator.berita.edit', compact('berita'));
    }

    public function updateBerita(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $request->validate([
            'judul' => 'required|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:5120',
        ]);

        $berita = Berita::where('id_user', Auth::id())->findOrFail($id);
        $oldFile = $berita->gambar;

        if ($request->hasFile('gambar')) {
            if ($oldFile && file_exists(public_path('uploads/berita/' . $oldFile))) {
                unlink(public_path('uploads/berita/' . $oldFile));
            }
            $newFileName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('uploads/berita/'), $newFileName);
            $berita->gambar = $newFileName;
        }

        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->tanggal = $request->tanggal;
        $berita->save();

        return redirect()->route('operator.berita')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroyBerita($id)
    {
        $id = Crypt::decrypt($id);
        $berita = Berita::findOrFail($id);
        $berita->delete();
        return redirect()->route('operator.berita')->with('success', 'Berita berhasil dihapus!');
    }

    // GALERI
    public function galeriView()
    {
        $search = request('search');
        $galeri = Galeri::when($search, function($query) use ($search) {
                $query->where('judul', 'like', '%' . $search . '%')
                      ->orWhere('keterangan', 'like', '%' . $search . '%');
            })
            ->get();
        return view('operator.galeri.index', compact('galeri'));
    }

    public function createGaleri()
    {
        return view('operator.galeri.create');
    }

    public function storeGaleri(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:20480',
            'kategori' => 'required|in:foto,video',
            'tanggal' => 'required|date',
        ]);

        $filename = null;
        if ($request->hasFile('file')) {
            $filename = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file->move(public_path('uploads/file/'), $filename);
        }

        Galeri::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'file' => $filename,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('operator.galeri')->with('success', 'Galeri berhasil ditambahkan!');
    }

    public function editGaleri($id)
    {
        $id = Crypt::decrypt($id);
        $galeri = Galeri::findOrFail($id);
        return view('operator.galeri.edit', compact('galeri'));
    }

    public function updateGaleri(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $request->validate([
            'judul' => 'required|max:50',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:20480',
            'kategori' => 'required|in:foto,video',
            'tanggal' => 'required|date',
        ]);

        $galeri = Galeri::findOrFail($id);
        $oldFile = $galeri->file;

        if ($request->hasFile('file')) {
            if ($oldFile && file_exists(public_path('uploads/file/' . $oldFile))) {
                unlink(public_path('uploads/file/' . $oldFile));
            }
            $newFileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file->move(public_path('uploads/file/'), $newFileName);
            $galeri->file = $newFileName;
        }

        $galeri->judul = $request->judul;
        $galeri->keterangan = $request->keterangan;
        $galeri->kategori = $request->kategori;
        $galeri->tanggal = $request->tanggal;
        $galeri->save();

        return redirect()->route('operator.galeri')->with('success', 'Galeri berhasil diperbarui!');
    }

    public function destroyGaleri($id)
    {
        $id = Crypt::decrypt($id);
        $galeri = Galeri::findOrFail($id);
        $galeri->delete();
        return redirect()->route('operator.galeri')->with('success', 'Galeri berhasil dihapus!');
    }

    // EKSKUL
    public function ekskulView()
    {
        $search = request('search');
        $ekskul = Ekstrakulikuler::when($search, function($query) use ($search) {
                $query->where('nama_ekskul', 'like', '%' . $search . '%')
                      ->orWhere('pembina', 'like', '%' . $search . '%');
            })
            ->get();
        return view('operator.ekskul.index', compact('ekskul'));
    }

    public function createEkskul()
    {
        return view('operator.ekskul.create');
    }

    public function storeEkskul(Request $request)
    {
        $request->validate([
            'nama_ekskul' => 'required|max:40',
            'pembina' => 'required|max:40',
            'jadwal_latihan' => 'required|max:40',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|file|mimes:jpg,jpeg,png|max:5480',
        ]);

        $filename = null;
        if ($request->hasFile('gambar')) {
            $filename = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('uploads/ekskul/'), $filename);
        }

        Ekstrakulikuler::create([
            'nama_ekskul' => $request->nama_ekskul,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filename,
        ]);

        return redirect()->route('operator.ekskul')->with('success', 'Ekskul berhasil ditambahkan!');
    }

    public function editEkskul($id)
    {
        $id = Crypt::decrypt($id);
        $ekskul = Ekstrakulikuler::findOrFail($id);
        return view('operator.ekskul.edit', compact('ekskul'));
    }

    public function updateEkskul(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $request->validate([
            'nama_ekskul' => 'required|max:40',
            'pembina' => 'required|max:40',
            'jadwal_latihan' => 'required|max:40',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|file|mimes:jpg,jpeg,png|max:5480',
        ]);

        $ekskul = Ekstrakulikuler::findOrFail($id);
        $oldFile = $ekskul->gambar;

        if ($request->hasFile('gambar')) {
            if ($oldFile && file_exists(public_path('uploads/ekskul/' . $oldFile))) {
                unlink(public_path('uploads/ekskul/' . $oldFile));
            }
            $newFileName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file->move(public_path('uploads/ekskul/'), $newFileName);
            $ekskul->gambar = $newFileName;
        }

        $ekskul->nama_ekskul = $request->nama_ekskul;
        $ekskul->pembina = $request->pembina;
        $ekskul->jadwal_latihan = $request->jadwal_latihan;
        $ekskul->deskripsi = $request->deskripsi;
        $ekskul->save();

        return redirect()->route('operator.ekskul')->with('success', 'Ekskul berhasil diperbarui!');
    }

    public function destroyEkskul($id)
    {
        $ekskul = Ekstrakulikuler::findOrFail($id);
        $ekskul->delete();
        return redirect()->route('operator.ekskul')->with('success', 'Ekskul berhasil dihapus!');
    }

    // SISWA (opsional, jika operator boleh kelola)
    public function siswaView()
    {
        $search = request('search');
        $siswa = Siswa::when($search, function($query) use ($search) {
                $query->where('nama_siswa', 'like', '%' . $search . '%')
                      ->orWhere('nisn', 'like', '%' . $search . '%');
            })
            ->get();
        return view('operator.siswa.index', compact('siswa'));
    }

    public function createSiswa()
    {
        return view('operator.siswa.create');
    }

    public function storeSiswa(Request $request)
    {
        $request->validate([
            'nisn' => 'required|max:10',
            'nama_siswa' => 'required|max:40',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_masuk' => 'required|numeric',
        ]);

        Siswa::create($request->only('nisn','nama_siswa','jenis_kelamin','tahun_masuk'));

        return redirect()->route('operator.siswa')->with('success','Berhasil Menambah Data.');
    }

    public function editSiswa(string $id)
    {
        $id = Crypt::decrypt($id);
        $siswa = Siswa::findOrFail($id);
        return view('operator.siswa.edit', compact('siswa'));
    }

    public function updateSiswa(Request $request, string $id)
    {
        $id = Crypt::decrypt($id);
        $request->validate([
            'nisn' => 'required|max:10',
            'nama_siswa' => 'required|max:40',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_masuk' => 'required|numeric',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->only('nisn','nama_siswa','jenis_kelamin','tahun_masuk'));

        return redirect()->route('operator.siswa')->with('success','Berhasil Mengubah data.');
    }

    public function destroySiswa(string $id)
    {
        $id = Crypt::decrypt($id);
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('operator.siswa')->with('success','Data berhasil dihapus.');
    }

    // ---------------- PROFILE SEKOLAH ----------------
    public function profileView()
    {
        $profile = Profile::first();
        return view('operator.profile.index', compact('profile'));
    }

    public function editProfile()
    {
        $profile = Profile::first();
        return view('operator.profile.edit', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama_sekolah'   => 'required|string|max:255',
            'kepala_sekolah' => 'required|string|max:255',
            'npsn'           => 'required|string|max:20',
            'alamat'         => 'required|string',
            'kontak'         => 'required|string|max:20',
            'tahun_berdiri'  => 'nullable|numeric',
            'visi_misi'      => 'nullable|string',
            'deskripsi'      => 'nullable|string',
            'logo'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profile = Profile::first() ?? new Profile();

        $profile->nama_sekolah   = $request->nama_sekolah;
        $profile->kepala_sekolah = $request->kepala_sekolah;
        $profile->npsn           = $request->npsn;
        $profile->alamat         = $request->alamat;
        $profile->kontak         = $request->kontak;
        $profile->tahun_berdiri  = $request->tahun_berdiri;
        $profile->visi_misi      = $request->visi_misi;
        $profile->deskripsi      = $request->deskripsi;

        if ($request->hasFile('logo')) {
            $logo = time().'_logo_'.$request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('uploads/profile/'), $logo);
            $profile->logo = $logo;
        }

        if ($request->hasFile('foto')) {
            $foto = time().'_foto_'.$request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('uploads/profile/'), $foto);
            $profile->foto = $foto;
        }

        $profile->save();

        return redirect()->route('operator.profile')->with('success','Berhasil mengupdate profile sekolah.');
    }

}
