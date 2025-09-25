@extends('public.layouts.app')

@section('title', 'Beranda - ' . ($profile->nama_sekolah))

@section('hero')
<section class="hero d-flex align-items-center"
         style="background: linear-gradient(135deg, #1e2140, #2c2f54); min-height: 75vh; color: white;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7">
                <h1 class="display-4 fw-bold">{{ $profile->nama_sekolah }}</h1>
                <p class="lead">{{ $profile->deskripsi }}</p>
                <a href="#berita" class="btn btn-light btn-lg rounded-pill fw-semibold">Jelajahi</a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container-fluid p-0">

    {{-- Tentang Kami --}}
    @if($profile)
    <section id="tentang-kami" class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-5">
                    <div class="shadow rounded-4 overflow-hidden">
                        <img src="{{ asset('uploads/profile/'.$profile->foto) }}"
                             alt="Foto Sekolah"
                             class="img-fluid w-100"
                             style="object-fit: cover; height: 320px;">
                    </div>
                </div>
                <div class="col-md-7">
                    <h2 class="fw-bold text-primary mb-3">Tentang Kami</h2>
                    <p class="text-muted" style="text-align: justify;">
                        {{ $profile->deskripsi ?? 'Belum ada deskripsi tentang sekolah.' }}
                    </p>

                    <div class="row mt-4 text-center">
                        <div class="col-md-4">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <i class="fa fa-map-marker-alt fa-2x text-primary mb-2"></i>
                                <p class="fw-semibold mb-1">Alamat</p>
                                <small class="text-muted">{{ $profile->alamat ?? '-' }}</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <i class="fa fa-phone fa-2x text-primary mb-2"></i>
                                <p class="fw-semibold mb-1">Kontak</p>
                                <small class="text-muted">{{ $profile->kontak ?? '-' }}</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-white shadow-sm rounded-3 h-100">
                                <i class="fa fa-calendar fa-2x text-primary mb-2"></i>
                                <p class="fw-semibold mb-1">Berdiri</p>
                                <small class="text-muted">{{ $profile->tahun_berdiri ?? '-' }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- Berita --}}
    <section id="berita" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary"> Berita Terbaru</h2>
                <p class="text-muted">Update informasi terkini dari sekolah kami</p>
            </div>

            <div class="row g-4">
                @forelse($beritas as $berita)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow border-0 rounded-4 overflow-hidden">
                        @if($berita->gambar)
                        <img src="{{ asset('uploads/berita/'.$berita->gambar) }}"
                             alt="{{ $berita->judul }}"
                             class="card-img-top"
                             style="object-fit: cover; height: 220px;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <span class="badge bg-primary mb-2">
                                {{ $berita->tanggal ? date('d M Y', strtotime($berita->tanggal)) : '' }}
                            </span>
                            <h5 class="fw-bold">{{ $berita->judul }}</h5>
                            <p class="text-muted flex-grow-1">
                                {{ Str::limit(strip_tags($berita->isi), 120) }}
                            </p>
                            <a href="" class="btn btn-outline-primary btn-sm rounded-pill mt-auto">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center text-muted">Belum ada berita.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Statistik --}}
    <section id="statistik" class="py-5 text-white"
             style="background: linear-gradient(135deg, #1e2140, #2c2f54);">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6 mb-4">
                    <i class="fas fa-user-graduate fa-3x mb-3"></i>
                    <h2 class="fw-bold">{{ $siswas->count() }}</h2>
                    <p>Siswa</p>
                </div>
                <div class="col-md-6">
                    <i class="fas fa-chalkboard-teacher fa-3x mb-3"></i>
                    <h2 class="fw-bold">{{ $gurus->count() }}</h2>
                    <p>Tenaga Pendidik</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Galeri --}}
    <section id="galeri" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold text-primary mb-4">Galeri</h2>
            <p class="text-center text-muted mb-5">Dokumentasi kegiatan & momen terbaik</p>

            <div class="row g-3">
                @forelse($galeris as $galeri)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="{{ asset('uploads/file/'.$galeri->file) }}"
                             alt="{{ $galeri->judul }}"
                             class="w-100"
                             style="object-fit: cover; height: 250px;">
                        <div class="p-2 bg-dark text-white small">
                            {{ Str::limit($galeri->judul, 30) }}
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center text-muted">Belum ada galeri.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Ekstrakurikuler --}}
    <section id="ekskul" class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold text-primary mb-4">Ekstrakurikuler</h2>
            <p class="text-center text-muted mb-5">Berbagai kegiatan untuk mengembangkan bakat siswa</p>

            <div class="row g-4">
                @forelse($ekstrakulis as $ekskul)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-lg rounded-4 overflow-hidden">
                        <img src="{{ asset('uploads/ekskul/'.$ekskul->gambar) }}"
                             alt="{{ $ekskul->nama_ekskul }}"
                             class="card-img-top"
                             style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-bold text-primary">{{ $ekskul->nama_ekskul }}</h5>
                            <p class="text-muted flex-grow-1">
                                {{ Str::limit($ekskul->deskripsi, 100) }}
                            </p>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center text-muted">Belum ada ekstrakurikuler.</p>
                @endforelse
            </div>
        </div>
    </section>

</div>
@endsection
