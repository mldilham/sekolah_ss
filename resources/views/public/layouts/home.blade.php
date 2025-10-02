@extends('public.layouts.app')

@section('title', 'Beranda - ' . ($profile->nama_sekolah))

@section('hero')
<section class="hero">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 text-center">
                <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-duration="1000">
                    {{ $profile->nama_sekolah }}
                </h1>
                {{-- <p class="lead" data-aos="fade-up" data-aos-duration="1000">
                    {{ $profile->deskripsi ? Str::limit($profile->deskripsi, 350) : 'Belum ada deskripsi tentang sekolah.' }}
                </p> --}}
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container-fluid p-0">

    {{-- Tentang Kami --}}
    @if($profile)
    <section id="tentang-kami" class="py-5">
        <div class="container">
            <h1 class="fw-bold mb-5 text-center gradient" style="font-size: 2rem;" data-aos="fade-down" data-aos-duration="1000">
                <span class="text-primary">Profile Sekolah</span>
            </h1>

            <div class="row align-items-center g-5">
                {{-- FOTO SEKOLAH --}}
                <div class="col-lg-5" data-aos="fade-right" data-aos-duration="1000">
                    <div class="position-relative rounded-2 overflow-hidden shadow-lg">
                        <img src="{{ asset('storage/'.$profile->logo) }}" alt="Logo Sekolah" class="img-fluid w-100" style="object-fit: cover; height: 350px;">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to bottom right, rgba(0,0,0,0.25), rgba(0,0,0,0.05));"></div>
                    </div>
                </div>

                {{-- DESKRIPSI --}}
                <div class="col-lg-7" data-aos="fade-left" data-aos-duration="1000">
                    <p class="text-muted lh-lg" style="text-align: justify;">
                        {{ $profile->deskripsi ? Str::limit($profile->deskripsi, 450) : 'Belum ada deskripsi tentang sekolah.' }}
                    </p>

                    <div class="row mt-4 g-3">
                        <div class="col-12 col-md-4" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                            <div class="rounded-4 p-3 shadow-sm bg-white h-100 text-center">
                                <div class="mb-2 gradient">
                                    <i class="fa-solid fa-location-dot fa-xl text-primary"></i>
                                </div>
                                <p class="fw-semibold mb-0">Alamat</p>
                                <small class="text-muted">{{ $profile->alamat ?? '-' }}</small>
                            </div>
                        </div>
                        <div class="col-12 col-md-4" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                            <div class="rounded-4 p-3 shadow-sm bg-white h-100 text-center">
                                <div class="mb-2 gradient">
                                    <i class="fa-solid fa-phone-volume fa-xl text-primary"></i>
                                </div>
                                <p class="fw-semibold mb-0">Kontak</p>
                                <small class="text-muted">{{ $profile->kontak ?? '-' }}</small>
                            </div>
                        </div>
                        <div class="col-12 col-md-4" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                            <div class="rounded-4 p-3 shadow-sm bg-white h-100 text-center">
                                <div class="mb-2 gradient">
                                    <i class="fa-solid fa-building-columns fa-xl text-primary"></i>
                                </div>
                                <p class="fw-semibold mb-0">Berdiri</p>
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
    <section id="berita" class="py-5" style="background: linear-gradient(135deg, #33A1E0, #2c2f54);">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-white" data-aos="fade-down" data-aos-duration="1000">Berita Terbaru</h2>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse($beritas->take(3) as $key => $berita)
                <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ $key * 150 }}">
                    <div class="card shadow-sm border-0 h-100 berita-card">
                        @if($berita->gambar)
                        <img src="{{ asset('storage/'.$berita->gambar) }}" alt="{{ $berita->judul }}" class="w-100 berita-img" style="object-fit: cover; height: 250px;">
                        @endif
                        <div class="p-3 d-flex flex-column">
                            <h5 class="fw-semibold mb-2 text-white">{{ Str::limit($berita->judul, 60) }}</h5>
                            <p class="text-light flex-grow-1" style="font-size: 0.9rem; color: rgba(255, 255, 255, 0.8);">
                                {{ Str::limit(strip_tags($berita->isi), 120) }}
                            </p>
                            <div class="text-center mt-4" data-aos="fade-up" data-aos-duration="1000">
                                <a href="{{ route('public.berita') }}" class="lihat-selengkapnya">
                                    Lihat Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center text-muted" data-aos="fade-up">Belum ada berita.</p>
                @endforelse
            </div>

            <div class="text-center mt-4" data-aos="fade-up" data-aos-duration="1000">
                <a href="{{ route('public.berita') }}" class="custom-tampilan">
                    Tampilkan semua berita
                </a>
            </div>
        </div>
    </section>

    {{-- Statistik --}}
    <section id="statistik" class="py-5 text-dark">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6 mb-4" data-aos="zoom-in-right" data-aos-duration="1000">
                    <i class="fas fa-user-graduate fa-3x mb-3 gradient"></i>
                    <h2 class="fw-bold gradient">{{ $siswas->count() }}</h2>
                    <p class="gradient">Siswa</p>
                </div>
                <div class="col-md-6" data-aos="zoom-in-left" data-aos-duration="1000">
                    <i class="fas fa-chalkboard-teacher fa-3x mb-3 gradient"></i>
                    <h2 class="fw-bold gradient">{{ $gurus->count() }}</h2>
                    <p class="gradient">Tenaga Pendidik</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Galeri --}}
    <section id="galeri" class="py-5 bg-light" style="background: linear-gradient(135deg, #33A1E0, #2c2f54);">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-white" data-aos="fade-down" data-aos-duration="1000">Galeri</h2>
            </div>

            <div class="row g-3 justify-content-center">
                @forelse($galeris->take(8) as $key => $galeri)
                <div class="col-sm-6 col-md-4 col-lg-3"
                    data-aos="fade-up"
                    data-aos-duration="800"
                    data-aos-delay="{{ $key * 100 }}">

                    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                        @php
                            $extension = pathinfo($galeri->file, PATHINFO_EXTENSION);
                            $isVideo = in_array(strtolower($extension), ['mp4','webm','ogg']);
                        @endphp

                        @if($isVideo)
                            {{-- Jika Video --}}
                            <video controls
                                class="w-100"
                                style="object-fit: cover; height: 250px;">
                                <source src="{{ asset('storage/'.$galeri->file) }}" type="video/{{ $extension }}">
                                Browser Anda tidak mendukung video.
                            </video>
                        @else
                            {{-- Jika Gambar --}}
                            <a href="{{ asset('storage/'.$galeri->file) }}"
                            data-lightbox="galeri"
                            data-title="{{ $galeri->judul }}">
                                <img src="{{ asset('storage/'.$galeri->file) }}"
                                    alt="{{ $galeri->judul }}"
                                    class="w-100"
                                    style="object-fit: cover; height: 250px;">
                            </a>
                        @endif

                        <div class="p-2 bg-dark text-white small"
                            style="background: linear-gradient(135deg, #33A1E0, #2c2f54);">
                            {{ Str::limit($galeri->judul, 30) }}
                        </div>
                    </div>

                </div>
                @empty
                <p class="text-center text-muted" data-aos="fade-up">Belum ada galeri.</p>
                @endforelse
            </div>

        </div>
    </section>

    {{-- Ekstrakurikuler --}}
    <section id="ekskul" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold gradient" data-aos="fade-down" data-aos-duration="1000">Ekstrakurikuler</h2>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse($ekstrakulis->take(6) as $key => $ekskul)
                <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ $key * 150 }}">
                    <div class="card shadow-sm border-0 h-100 berita-card">
                        <div class="position-relative">
                            @if($ekskul->gambar)
                            <img src="{{ asset('storage/'.$ekskul->gambar) }}" alt="{{ $ekskul->nama_ekskul }}" class="w-100 berita-img" style="object-fit: cover; height: 250px;">
                            @endif
                        </div>
                        <div class="p-3 d-flex flex-column">
                            <h5 class="fw-semibold mb-2">{{ Str::limit($ekskul->nama_ekskul, 60) }}</h5>
                            <p class="flex-grow-1" style="font-size: 0.9rem; text-align: justify; color: #6c757d;">
                                {{ Str::limit(strip_tags($ekskul->deskripsi), 120) }}
                            </p>
                            <a href="{{ route('public.ekskul.detail', Crypt::encrypt($ekskul->id_ekskul)) }}"
                                class="mt-auto hov fw-semibold border-link-ekskul">
                                Lihat selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center text-light" data-aos="fade-up">Belum ada ekstrakurikuler.</p>
                @endforelse
            </div>
        </div>
    </section>

</div>
@endsection
