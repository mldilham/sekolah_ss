@extends('public.layouts.app')
@section('title', 'Layanan Guru - Sekolah')

@section('content')
<style>
    /* Card Guru */
    .guru-card {
        border-radius: 12px;
        overflow: hidden;
        position: relative;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    /* Wrapper gambar */
    .img-wrapper {
        position: relative;
        overflow: hidden;
    }

    .guru-img {
        object-fit: contain;
        height: 250px;
        width: 100%;
        display: block;
        transition: transform 0.3s ease;
    }

    /* Overlay transparan */
    .img-wrapper::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0);
        transition: background 0.3s ease;
        z-index: 1;
    }

    /* Efek hover gambar dan overlay */
    .guru-card:hover .guru-img {
        transform: scale(1.05);
    }

    .guru-card:hover .img-wrapper::after {
        background: rgba(0, 0, 0, 0.4);
    }

    /* Tombol detail di tengah gambar */
    .detail-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: rgba(0, 123, 255, 0.9);
        color: #fff;
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 0.9rem;
        text-decoration: none;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
        z-index: 2;
    }

    .guru-card:hover .detail-btn {
        opacity: 1;
        pointer-events: auto;
    }

    /* Tinggi nama agar rata dan tidak membuat card beda */
    .guru-name-wrapper {
        flex-grow: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 16px 8px;
        text-align: center;
    }
</style>

<div class="container py-5">
    <!-- Header -->
    <div class="text-center mb-5 gradient" data-aos="fade-down" data-aos-duration="1000">
        <h2 class="fw-bold text-primary">Layanan Guru</h2>
        <p class="text-muted">Daftar Guru Sekolah Kami</p>
    </div>

    <!-- Daftar Guru -->
    <div class="row g-4 justify-content-center">
        @forelse($gurus as $key => $guru)
        <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ $key * 150 }}">
            <div class="card guru-card shadow-sm border-0">
                <div class="img-wrapper">
                    @if($guru->foto)
                        <img src="{{ asset('uploads/guru/'.$guru->foto) }}"
                             alt="{{ $guru->nama_guru }}"
                             class="w-100 guru-img">
                    @else
                        <img src="{{ asset('asset/foto.png') }}"
                             alt="{{ $guru->nama_guru }}"
                             class="w-100 guru-img">
                    @endif

                    <a href="{{ route('public.layanan.guru.detail', $guru->id_guru) }}" class="detail-btn">
                        Lihat Detail >>
                    </a>
                </div>

                <div class="guru-name-wrapper">
                    <h5 class="fw-semibold gradient mb-0">{{ $guru->nama_guru }}</h5>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center text-muted" data-aos="fade-up">Belum ada data guru.</p>
        @endforelse
    </div>
    <div class="d-flex justify-content-center mt-4" data-aos="fade-up">
        {{ $gurus->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection

@section('scripts')
<!-- AOS Animation -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            once: true,
            duration: 1000
        });
    });
</script>
@endsection
