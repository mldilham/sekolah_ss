@extends('public.layouts.app')
@section('title', 'Galeri Video - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')
<section id="galeri" class="py-5 bg-light">
    <div class="container">
        <!-- Header -->
        <h2 class="text-center fw-bold text-primary mb-3 gradient"
            data-aos="fade-down"
            data-aos-duration="1000">
            Video Kegiatan
        </h2>

        <p class="text-center mb-5 gradient"
           data-aos="fade-up"
           data-aos-duration="1000">
            Dokumentasi kegiatan & momen terbaik dalam bentuk video
        </p>

        <!-- VIDEO SAJA -->
        <div class="row mb-4">
            {{-- <h4 class="mb-4 fw-bold gradient"
                data-aos="fade-right"
                data-aos-duration="800">
                Video Kegiatan
            </h4> --}}
            <div class="col-12">
                <div class="row g-3 justify-content-center">
                    @php
                        $videos = $galeris->filter(function($galeri){
                            $ext = strtolower(pathinfo($galeri->file, PATHINFO_EXTENSION));
                            return in_array($ext, ['mp4', 'webm', 'ogg']);
                        });
                    @endphp

                    @forelse($videos->take(4) as $key => $video)
                        <div class="col-lg-3 col-md-4 mb-4"
                            data-aos="flip-left"
                            data-aos-easing="ease-out-cubic"
                            data-aos-duration="2000"
                            data-aos-delay="{{ $key * 100 }}">
                            <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                                <video controls
                                    class="w-100"
                                    style="object-fit: cover; height: 250px;">
                                    <source src="{{ asset('storage/'.$video->file) }}"
                                            type="video/{{ pathinfo($video->file, PATHINFO_EXTENSION) }}">
                                    Browser Anda tidak mendukung video.
                                </video>
                                <div class="p-2 text-white small"
                                    style="background: linear-gradient(135deg, #33A1E0, #2c2f54);">
                                    {{ Str::limit($video->judul, 30) }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-muted">Belum ada video.</p>
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
