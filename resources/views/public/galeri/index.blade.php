@extends('public.layouts.app')
@section('title', 'Galeri - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')

<section id="galeri" class="py-5 bg-light">
    <div class="container">
        <!-- Header -->
        <h2 class="text-center fw-bold text-primary mb-3 gradient" data-aos="fade-down" data-aos-duration="1000">
            Galeri
        </h2>
        <p class="text-center mb-5 gradient" data-aos="fade-up" data-aos-duration="1000">
            Dokumentasi kegiatan & momen terbaik
        </p>

        <!-- Galeri -->
        <div class="row g-3 justify-content-center">
            @forelse($galeris as $key => $galeri)
            <div class="col-sm-6 col-md-4 col-lg-3"
                 data-aos="zoom-in"
                 data-aos-duration="800"
                 data-aos-delay="{{ $key * 100 }}">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <a href="{{ asset('uploads/file/'.$galeri->file) }}"
                       data-lightbox="galeri"
                       data-title="{{ $galeri->judul }}">
                        <img src="{{ asset('uploads/file/'.$galeri->file) }}"
                             alt="{{ $galeri->judul }}"
                             class="w-100"
                             style="object-fit: cover; height: 250px;">
                    </a>
                    <div class="p-2 bg-dark text-white small">
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

@endsection

@section('scripts')
<!-- AOS CSS & JS -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        once: true, // animasi hanya sekali
        duration: 800,
        easing: 'ease-in-out',
    });
</script>
@endsection
