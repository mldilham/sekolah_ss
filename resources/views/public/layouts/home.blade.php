@extends('public.layouts.app')

@section('title', 'Beranda - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('hero')
<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-4 fw-bold">{{ $profile->nama_sekolah ?? 'Nama Sekolah' }}</h1>
                <p class="lead">{{ $profile->deskripsi ?? 'Selamat datang di website resmi sekolah kami' }}</p>
                <a href="#berita" class="btn btn-primary btn-lg">Lihat Berita</a>
            </div>
            <div class="col-md-6">
                @if($profile && $profile->foto)
                    <img src="{{ asset('uploads/profile/'.$profile->foto) }}"
                         class="img-fluid rounded shadow"
                         alt="Foto Sekolah">
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container py-5">
    {{-- Profil Singkat --}}
    @if($profile)
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h2 class="card-title">Tentang Kami</h2>
                    <p class="card-text">{{ Str::limit($profile->deskripsi, 200) }}</p>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <i class="fa fa-map-marker-alt fa-2x text-primary mb-2"></i>
                            <p>{{ $profile->alamat ?? 'Alamat belum diisi' }}</p>
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-phone fa-2x text-primary mb-2"></i>
                            <p>{{ $profile->kontak ?? 'Kontak belum diisi' }}</p>
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-calendar fa-2x text-primary mb-2"></i>
                            <p>Berdiri: {{ $profile->tahun_berdiri ?? 'Tahun belum diisi' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- Berita Section --}}
    <section id="berita" class="mb-5">
        <h2 class="text-center mb-4">Berita Terbaru</h2>
        <div class="row">
            @forelse($beritas as $berita)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($berita->gambar)
                        <img src="{{ asset('uploads/berita/'.$berita->gambar) }}"
                             class="card-img-top" alt="{{ $berita->judul }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ Str::limit($berita->judul, 50) }}</h5>
                        <p class="card-text">{{ Str::limit($berita->isi, 100) }}</p>
                        <small class="text-muted">{{ $berita->tanggal ? date('d M Y', strtotime($berita->tanggal)) : '' }}</small>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-center text-muted">Belum ada berita</p>
            </div>
            @endforelse
        </div>
    </section>

    {{-- Guru Section --}}
    <section id="guru" class="mb-5">
        <h2 class="text-center mb-4">Tenaga Pendidik</h2>
        <div class="row">
            @forelse($gurus as $guru)
            <div class="col-md-3 mb-4">
                <div class="card text-center h-100 shadow-sm">
                    @if($guru->foto)
                        <img src="{{ asset('uploads/guru/'.$guru->foto) }}"
                             class="card-img-top rounded-circle mx-auto mt-3" alt="{{ $guru->nama_guru }}"
                             style="width: 100px; height: 100px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h6 class="card-title">{{ $guru->nama_guru }}</h6>
                        <p class="card-text text-muted">{{ $guru->mapel ?? 'Mata Pelajaran' }}</p>
                        <small class="text-muted">NIP: {{ $guru->nip ?? 'Belum diisi' }}</small>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-center text-muted">Belum ada data guru</p>
            </div>
            @endforelse
        </div>
    </section>

    {{-- Siswa Section --}}
    <section id="siswa" class="mb-5">
        <h2 class="text-center mb-4">Data Siswa</h2>
        <div class="row">
            @forelse($siswas as $siswa)
            <div class="col-md-3 mb-4">
                <div class="card text-center h-100 shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title">{{ $siswa->nama_siswa }}</h6>
                        <p class="card-text text-muted">{{ $siswa->jenis_kelamin ?? 'L/P' }}</p>
                        <small class="text-muted">NISN: {{ $siswa->nisn ?? 'Belum diisi' }}</small><br>
                        <small class="text-muted">Masuk: {{ $siswa->tahun_masuk ?? 'Tahun belum diisi' }}</small>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-center text-muted">Belum ada data siswa</p>
            </div>
            @endforelse
        </div>
    </section>

    {{-- Galeri Section --}}
    <section id="galeri" class="mb-5">
        <h2 class="text-center mb-4">Galeri</h2>
        <div class="row">
            @forelse($galeris as $galeri)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($galeri->file)
                        <img src="{{ asset('uploads/file/'.$galeri->file) }}"
                             class="card-img-top" alt="{{ $galeri->judul }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h6 class="card-title">{{ Str::limit($galeri->judul, 30) }}</h6>
                        <p class="card-text text-muted">{{ Str::limit($galeri->keterangan, 50) }}</p>
                        <small class="text-muted">{{ $galeri->tanggal ? date('d M Y', strtotime($galeri->tanggal)) : '' }}</small>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-center text-muted">Belum ada galeri</p>
            </div>
            @endforelse
        </div>
    </section>

    {{-- Ekstrakurikuler Section --}}
    <section id="ekskul" class="mb-5">
        <h2 class="text-center mb-4">Ekstrakurikuler</h2>
        <div class="row">
            @forelse($ekstrakulis as $ekskul)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($ekskul->gambar)
                        <img src="{{ asset('uploads/ekskul/'.$ekskul->gambar) }}"
                             class="card-img-top" alt="{{ $ekskul->nama_ekskul }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $ekskul->nama_ekskul }}</h5>
                        <p class="card-text">{{ Str::limit($ekskul->deskripsi, 100) }}</p>
                        <p><strong>Pembina:</strong> {{ $ekskul->pembina }}</p>
                        <small class="text-muted">{{ $ekskul->jadwal_latihan }}</small>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-center text-muted">Belum ada ekstrakurikuler</p>
            </div>
            @endforelse
        </div>
    </section>
</div>
@endsection
