<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekstrakulikuler;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Profile;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    // DASHBOARD
    public function dashboard()
    {
        return view('admin.dashboard', [
            'siswaCount'   => Siswa::count(),
            'guruCount'    => Guru::count(),
            'beritaCount'  => Berita::count(),
            'galeriCount'  => Galeri::count(),
            'ekskulCount'  => Ekstrakulikuler::count(),
            'profile'      => Profile::first(),
            'latestNews'   => Berita::latest()->take(3)->get(),
            'latestGaleri' => Galeri::latest()->take(3)->get(),
            'latestGuru'   => Guru::latest()->take(3)->get(),
            'latestEkskul' => Ekstrakulikuler::latest()->take(3)->get(),
        ]);
    }

    // ---------------- USER ----------------
    public function userView(Request $request)
    {
        $query = User::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('username', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->get();
        return view('admin.user.index', compact('users'));
    }

    public function editView(string $id)
    {
        $id = Crypt::decrypt($id);
        $users = User::findOrFail($id);
        return view('admin.user.edit', compact('users'));
    }

    public function updateView(Request $request, string $id)
    {
        $id = Crypt::decrypt($id);
        $validations = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email',
            'role' => 'required|in:admin,operator',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $users = User::findOrFail($id);

        if ($request->filled('password')) {
            $validations['password'] = bcrypt($request->password);
        } else {
            unset($validations['password']);
        }

        $users->update($validations);

        return redirect()->route('admin.user')->with('success','Berhasil Mengubah data.');
    }

    public function destroyView(string $id)
    {
        $id = Crypt::decrypt($id);
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('admin.user')->with('success', 'Data berhasil dihapus.');
    }

    // ---------------- GURU ----------------
    public function guruView(Request $request)
    {
        $query = Guru::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_guru', 'like', "%{$search}%")
                  ->orWhere('nip', 'like', "%{$search}%");
            });
        }

        $guru = $query->get();
        return view('admin.guru.index', compact('guru'));
    }

    public function createGuru()
    {
        return view('admin.guru.create');
    }

    public function storeGuru(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|max:40',
            'nip' => 'required|max:15',
            'mapel' => 'required|max:40',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fotoname = null;
        if ($request->hasFile('foto')) {
            $fotoname = time() . '_' . $request->foto->getClientOriginalName();
            $request->foto->move(public_path('uploads/guru/'), $fotoname);
        }

        Guru::create([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'foto' => $fotoname,
        ]);

        return redirect()->route('admin.guru')->with('success','Berhasil Menambah data');
    }

    public function editGuru(string $id)
    {
        $id = Crypt::decrypt($id);
        $guru = Guru::findOrFail($id);
        return view('admin.guru.edit', compact('guru'));
    }

    public function updateGuru(Request $request, string $id)
    {
        $id = Crypt::decrypt($id);
        $request->validate([
            'nama_guru' => 'required|max:40',
            'nip' => 'required|max:15',
            'mapel' => 'required|max:40',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $guru = Guru::findOrFail($id);
        $fotoname = $guru->foto;

        if ($request->hasFile('foto')) {
            if ($fotoname && file_exists(public_path('uploads/guru/'.$fotoname))) {
                unlink(public_path('uploads/guru/'.$fotoname));
            }
            $fotoname = time() . '_' . $request->foto->getClientOriginalName();
            $request->foto->move(public_path('uploads/guru/'), $fotoname);
        }

        $guru->update([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'foto' => $fotoname,
        ]);

        return redirect()->route('admin.guru')->with('success','Data berhasil diperbarui.');
    }

    public function destroyGuru(string $id)
    {
        $id = Crypt::decrypt($id);
        $guru = Guru::findOrFail($id);
        if($guru->foto && file_exists(public_path('uploads/guru/'.$guru->foto))) {
            unlink(public_path('uploads/guru/'.$guru->foto));
        }
        $guru->delete();
        return redirect()->route('admin.guru')->with('success','Berhasil menghapus data.');
    }

    // ---------------- SISWA ----------------
    public function siswaView(Request $request)
    {
        $query = Siswa::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_siswa', 'like', "%{$search}%")
                  ->orWhere('nisn', 'like', "%{$search}%");
            });
        }

        $siswa = $query->get();
        return view('admin.siswa.index', compact('siswa'));
    }

    public function createSiswa()
    {
        return view('admin.siswa.create');
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

        return redirect()->route('admin.siswa')->with('success','Berhasil Menambah Data.');
    }

    public function editSiswa(string $id)
    {
        $id = Crypt::decrypt($id);
        $siswa = Siswa::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
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

        return redirect()->route('admin.siswa')->with('success','Berhasil Mengubah data.');
    }

    public function destroySiswa(string $id)
    {
        $id = Crypt::decrypt($id);
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('admin.siswa')->with('success','Data berhasil dihapus.');
    }

    // ---------------- GALERI ----------------
    public function galeriView(Request $request)
    {
        $query = Galeri::orderBy('tanggal', 'desc');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('judul', 'like', "%{$search}%");
        }

        $galeri = $query->get();
        return view('admin.galeri.index', compact('galeri'));
    }

    public function createGaleri()
    {
        return view('admin.galeri.create');
    }

    public function storeGaleri(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:204800',
            'kategori' => 'required|in:foto,video',
            'tanggal' => 'required|date',
        ]);

        $filename = null;
        if ($request->hasFile('file')) {
            $filename = time().'_'.$request->file->getClientOriginalName();
            $request->file->move(public_path('uploads/file/'), $filename);
        }

        Galeri::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'file' => $filename,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin.galeri')->with('success','Galeri berhasil ditambahkan!');
    }

    public function editGaleri(string $id)
    {
        $id = Crypt::decrypt($id);
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function updateGaleri(Request $request, string $id)
    {
        $id = Crypt::decrypt($id);

        $request->validate([
            'judul' => 'required|max:50',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:204800', // konsisten 200MB
            'kategori' => 'required|in:foto,video',
            'tanggal' => 'required|date',
        ]);

        $galeri = Galeri::findOrFail($id);
        $filename = $galeri->file;

        if ($request->hasFile('file')) {
            if ($filename && file_exists(public_path('uploads/file/'.$filename))) {
                unlink(public_path('uploads/file/'.$filename));
            }
            $filename = time().'_'.$request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('uploads/file/'), $filename);
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
        $id = Crypt::decrypt($id);
        $galeri = Galeri::findOrFail($id);
        if ($galeri->file && file_exists(public_path('uploads/file/'.$galeri->file))) {
            unlink(public_path('uploads/file/'.$galeri->file));
        }
        $galeri->delete();
        return redirect()->route('admin.galeri')->with('success','Berhasil menghapus data');
    }

    // ---------------- BERITA ----------------
    public function beritaView(Request $request)
    {
        $query = Berita::with('user')->orderBy('tanggal', 'desc');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('judul', 'like', "%{$search}%");
        }

        $berita = $query->get();
        return view('admin.berita.index', compact('berita'));
    }

    public function createBerita()
    {
        return view('admin.berita.create');
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
            $filename = time().'_'.$request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('uploads/berita/'), $filename);
        }

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'gambar' => $filename,
            'id_user' => Auth::id(),
        ]);

        return redirect()->route('admin.berita')->with('success','Berita berhasil ditambahkan!');
    }

    public function editBerita(string $id)
    {
        $id = Crypt::decrypt($id);
        $berita = Berita::findOrFail($id);

        // Operator hanya bisa edit berita miliknya sendiri
        if(Auth::user()->role !== 'admin' && $berita->id_user !== Auth::id()){
            return redirect()->route('admin.berita')->with('error','Anda tidak punya akses untuk mengedit berita ini.');
        }

        return view('admin.berita.edit', compact('berita'));
    }

    public function updateBerita(Request $request, string $id)
    {
        $id = Crypt::decrypt($id);
        $request->validate([
            'judul' => 'required|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:5120',
        ]);

        $berita = Berita::findOrFail($id);

        if(Auth::user()->role !== 'admin' && $berita->id_user !== Auth::id()){
            return redirect()->route('admin.berita')->with('error','Anda tidak punya akses untuk mengupdate berita ini.');
        }

        $oldFile = $berita->gambar;

        if ($request->hasFile('gambar')) {
            if ($oldFile && file_exists(public_path('uploads/berita/'.$oldFile))) {
                unlink(public_path('uploads/berita/'.$oldFile));
            }
            $berita->gambar = time().'_'.$request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('uploads/berita/'), $berita->gambar);
        }

        $berita->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin.berita')->with('success','Berita berhasil diperbarui!');
    }

    public function destroyBerita(string $id)
    {
        $id = Crypt::decrypt($id);
        $berita = Berita::findOrFail($id);

        if(Auth::user()->role !== 'admin' && $berita->id_user !== Auth::id()){
            return redirect()->route('admin.berita')->with('error','Anda tidak punya akses untuk menghapus berita ini.');
        }

        if ($berita->gambar && file_exists(public_path('uploads/berita/'.$berita->gambar))) {
            unlink(public_path('uploads/berita/'.$berita->gambar));
        }
        $berita->delete();

        return redirect()->route('admin.berita')->with('success','Berita berhasil dihapus!');
    }

    // ---------------- EKSKUL ----------------
    public function ekskulView(Request $request)
    {
        $query = Ekstrakulikuler::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_ekskul', 'like', "%{$search}%")
                  ->orWhere('pembina', 'like', "%{$search}%");
            });
        }

        $ekskul = $query->get();
        return view('admin.ekskul.index', compact('ekskul'));
    }

    public function createEkskul()
    {
        return view('admin.ekskul.create');
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
            $filename = time().'_'.$request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('uploads/ekskul/'), $filename);
        }

        Ekstrakulikuler::create([
            'nama_ekskul' => $request->nama_ekskul,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filename,
        ]);

        return redirect()->route('admin.ekskul')->with('success','Berhasil menambah data.');
    }

    public function editEkskul(string $id)
    {
        $id = Crypt::decrypt($id);
        $ekskul = Ekstrakulikuler::findOrFail($id);
        return view('admin.ekskul.edit', compact('ekskul'));
    }

    public function updateEkskul(Request $request, string $id)
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
            if ($oldFile && file_exists(public_path('uploads/ekskul/'.$oldFile))) {
                unlink(public_path('uploads/ekskul/'.$oldFile));
            }
            $ekskul->gambar = time().'_'.$request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('uploads/ekskul/'), $ekskul->gambar);
        }

        $ekskul->update([
            'nama_ekskul' => $request->nama_ekskul,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.ekskul')->with('success','Data ekskul berhasil diperbarui!');
    }

    public function destroyEkskul(string $id)
    {
        $id = Crypt::decrypt($id);
        $ekskul = Ekstrakulikuler::findOrFail($id);
        if ($ekskul->gambar && file_exists(public_path('uploads/ekskul/'.$ekskul->gambar))) {
            unlink(public_path('uploads/ekskul/'.$ekskul->gambar));
        }
        $ekskul->delete();
        return redirect()->route('admin.ekskul')->with('success','Data ekskul berhasil dihapus!');
    }

    // ---------------- PROFILE SEKOLAH ----------------
    public function profileView()
    {
        $profile = Profile::first();
        return view('admin.profile.index', compact('profile'));
    }

    public function editProfile()
    {
        $profile = Profile::first();
        return view('admin.profile.edit', compact('profile'));
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

        return redirect()->route('admin.profile')->with('success','Berhasil mengupdate profile sekolah.');
    }
}
