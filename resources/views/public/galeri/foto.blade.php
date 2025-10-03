@extends('public.layouts.app')
@section('title', 'Galeri - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')
<section id="galeri" class="py-5 bg-light">
    <div class="container">
        <!-- Header -->
        <h2 class="text-center fw-bold text-primary mb-3 gradient"
            data-aos="fade-down"
            data-aos-duration="1000">
            Galeri
        </h2>

        <p class="text-center mb-5 gradient"
           data-aos="fade-up"
           data-aos-duration="1000">
            Dokumentasi kegiatan & momen terbaik
        </p>

        <!-- FOTO SAJA -->
        <div class="row mb-4">
            <h4 class="mb-4 fw-bold gradient"
                data-aos="fade-right"
                data-aos-duration="800">
                Foto Kegiatan
            </h4>
            <div class="col-12">
                <div class="row g-3">
                    @forelse($galeris->take(4) as $key => $media)
                        @php
                            $extension = pathinfo($media->file, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array(strtolower($extension), ['jpg','jpeg','png','webp']))
                            <div class="col-lg-3 col-md-4 mb-4"
                                data-aos="zoom-in"
                                data-aos-duration="800"
                                data-aos-delay="{{ $key * 100 }}">

                                <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                                    <a href="{{ asset('storage/'.$media->file) }}"
                                    data-lightbox="galeri"
                                    data-title="{{ $media->judul }}">
                                        <img src="{{ asset('storage/'.$media->file) }}"
                                            alt="{{ $media->judul }}"
                                            class="w-100"
                                            style="object-fit: cover; height: 250px;">
                                    </a>
                                    <div class="p-2 text-white small"
                                        style="background: linear-gradient(135deg, #33A1E0, #2c2f54);">
                                        {{ Str::limit($media->judul, 30) }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <p class="text-center text-muted">Belum ada foto.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- PAGINATION -->
        {{-- <div class="d-flex justify-content-center mt-4" data-aos="fade-up">
            {{ $galeris->links('pagination::bootstrap-4') }}
        </div> --}}
    </div>
</section>
@endsection

@section('scripts')
    <!-- AOS CSS & JS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 800,
            easing: 'ease-in-out',
        });
    </script>
@endsection
