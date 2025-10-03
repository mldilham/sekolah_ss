@extends('public.layouts.app')
@section('title', 'Ekstrakurikuler - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')

<div class="container py-5">
    <!-- Header -->
    <div class="text-center mb-5 gradient" data-aos="fade-down" data-aos-duration="1000">
        <h2 class="fw-bold text-primary">Ekstrakurikuler</h2>
        <p class="text-muted">Berbagai kegiatan untuk mengembangkan bakat siswa</p>
    </div>

    <!-- Card Ekstrakurikuler -->
    <div class="row g-4 justify-content-center">
        @forelse($ekskuls as $key => $ekskul)
        <div class="col-lg-4 col-md-6 col-sm-12"
             data-aos="fade-up"
             data-aos-duration="800"
             data-aos-delay="{{ $key * 150 }}">
            <div class="card mb-4 shadow-sm border-0 h-100 d-flex flex-column">
                <div class="position-relative">
                    @if($ekskul->gambar)
                    <img src="{{ asset('storage/'.$ekskul->gambar) }}"
                         alt="{{ $ekskul->nama_ekskul }}"
                         class="w-100"
                         style="object-fit: cover; height: 250px;">
                    @endif
                </div>

                <div class="p-3 d-flex flex-column flex-grow-1"
                     style="background: rgba(255,255,255,0.95); border-radius: 0 0 12px 12px;">
                    <h5 class="fw-bold mb-2 text-primary gradient" data-aos="fade-right" data-aos-duration="800">
                        {{ Str::limit($ekskul->nama_ekskul, 60) }}
                    </h5>
                    <p class="text-muted flex-grow-1" style="font-size: 0.9rem; text-align: justify;"
                       data-aos="fade-left" data-aos-duration="800">
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
        <p class="text-center text-muted" data-aos="fade-up">Belum ada ekstrakurikuler.</p>
        @endforelse
    </div>
    <div class="d-flex justify-content-center mt-4" data-aos="fade-up">
        {{ $ekskuls->links('pagination::bootstrap-4') }}
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
