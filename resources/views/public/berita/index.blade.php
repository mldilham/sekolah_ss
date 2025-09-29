@extends('public.layouts.app')
@section('title', 'Berita - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')

<div class="container py-5">
    <!-- Header -->
    <div class="text-center mb-5 gradient" data-aos="fade-down" data-aos-duration="1000">
        <h2 class="fw-bold text-primary">Berita Terbaru</h2>
        <p class="text-muted">Update informasi terkini dari sekolah kami</p>
    </div>

    <div class="row">
        @forelse($beritas->take(2) as $berita)
        <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
            <div class="card border-0 shadow-sm overflow-hidden h-100">
                <div class="position-relative">
                    @if($berita->gambar)
                    <img src="{{ asset('uploads/berita/'.$berita->gambar) }}"
                         alt="{{ $berita->judul }}"
                         class="w-100"
                         style="object-fit: cover; height: 250px;">
                    @endif

                    <div class="position-absolute bottom-0 start-0 text-white p-3"
                         style="width: 80px; text-align: center;">
                        <h4 class="mb-0" style="font-size: 1.2rem;">
                            {{ date('d', strtotime($berita->tanggal)) }}
                        </h4>
                        <small>{{ date('M, Y', strtotime($berita->tanggal)) }}</small>
                    </div>
                </div>

                <div class="p-4 d-flex flex-column">
                    <h3 class="fw-bold text-dark mb-3" style="font-size: 1.2rem;">
                        {{ $berita->judul }}
                    </h3>
                    <p class="text-muted flex-grow-1" style="text-align: justify;">
                        {{ Str::limit(strip_tags($berita->isi), 120) }}
                    </p>
                    <div class="text-center mt-3">
                        <a href="{{ route('public.berita.detail', $berita->id_berita) }}" class="border-link-ekskul">
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
