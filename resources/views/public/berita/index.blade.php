@extends('public.layouts.app')
@section('title', 'Berita - ' . ($profile->nama_sekolah ?? 'Sekolah'))
@section('hero')
<section class="hero d-flex flex-column justify-content-center align-items-center text-white text-center min-vh-100 position-relative">
    <div class="container position-relative z-2">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h1 class="display-4 fw-bold" data-aos="fade-down" data-aos-duration="1000">
                    Seputar Berita Tentang <br> {{ $profile->nama_sekolah }}
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

<div class="container py-5">
    <!-- Header -->
    <div class="text-center mb-5 gradient" data-aos="fade-down" data-aos-duration="1000">
        <h2 class="fw-bold text-primary">Berita</h2>
        <p class="text-muted">Update informasi  dari sekolah kami</p>
    </div>

    <div class="row justify-content-center">
        @forelse($beritas as $berita)
        <div class="col-lg-3 col-md-5 mb-4" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
            <div class="card border-0 shadow-sm overflow-hidden h-100">
                <div class="position-relative">
                    @if($berita->gambar)
                    <img src="{{ asset('storage/'.$berita->gambar) }}"
                         alt="{{ $berita->judul }}"
                         class="w-100"
                         style="object-fit: cover; height: 200px;">
                    @endif

                    <div class="position-absolute bottom-0 start-0 text-white p-2"
                         style="width: 70px; text-align: center;">
                        <h4 class="mb-0" style="font-size: 1rem;">
                            {{ date('d', strtotime($berita->tanggal)) }}
                        </h4>
                        <small style="font-size: 0.75rem;">
                            {{ date('M, Y', strtotime($berita->tanggal)) }}
                        </small>
                    </div>
                </div>

                <div class="p-3 d-flex flex-column">
                    <h3 class="fw-bold text-dark mb-2" style="font-size: 1rem;">
                        {{ $berita->judul }}
                    </h3>
                    <p class="text-muted flex-grow-1" style="font-size: 0.9rem; text-align: justify;">
                        {{ Str::limit(strip_tags($berita->isi), 120) }}
                    </p>
                    <div class="mt-2">
                        <a href="{{ route('public.berita.detail', Crypt::encrypt($berita->id_berita)) }}" class="border-link-ekskul">
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

    <div class="d-flex justify-content-center mt-4" data-aos="fade-up">
        {{ $beritas->links('pagination::bootstrap-4') }}
    </div>
</div>

@endsection

@section('scripts')
<!-- AOS CSS & JS -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        once: false,
        duration: 800,
        easing: 'ease-in-out',
    });
</script>
@endsection
