@extends('public.layouts.app')
@section('title', $berita->judul . ' - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Gambar Berita -->
            @if($berita->gambar)
            <img src="{{ asset('uploads/berita/'.$berita->gambar) }}"
                 alt="{{ $berita->judul }}"
                 class="img-fluid rounded mb-4 shadow"
                 data-aos="fade-up" data-aos-duration="800">
            @endif

            <!-- Judul -->
            <h1 class="fw-bold mb-3 gradient" data-aos="fade-right" data-aos-duration="800">
                {{ $berita->judul }}
            </h1>

            <!-- Meta -->
            <p class="text-muted mb-4" data-aos="fade-left" data-aos-duration="800">
                <i class="fa-solid fa-calendar"></i> {{ $berita->created_at->format('d M Y') }}
                @if($berita->user)
                &nbsp; | &nbsp; <i class="fa-solid fa-user"></i> By : {{ $berita->user->name }}
                @endif
            </p>

            <!-- Isi Berita -->
            <div class="news-content mb-4" data-aos="fade-up" data-aos-duration="800">
                {!! nl2br(e($berita->isi)) !!}
            </div>

            <!-- Tombol Kembali -->
            <div class="mt-3" data-aos="fade-up" data-aos-duration="800">
                <a href="{{ route('public.berita') }}" class="btn btn-outline-primary">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Berita
                </a>
            </div>

        </div>
    </div>
</div>
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
