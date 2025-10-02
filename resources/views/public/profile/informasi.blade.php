@extends('public.layouts.app')

@section('title', 'Informasi Sekolah - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')
<div class="container py-5">

    @if($profile)
    <!-- Header Sekolah -->
    <div class="text-center mb-5" data-aos="fade-down" data-aos-duration="1000">
        <h1 class="fw-bold" style="font-size: 2.5rem; background: linear-gradient(135deg,#33A1E0,#2c2f54); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
            {{ $profile->nama_sekolah }}
        </h1>
        <p class="text-muted fs-5">Informasi Umum Sekolah</p>
    </div>

    <!-- Foto Sekolah -->
    <div class="text-center mb-5" data-aos="zoom-in" data-aos-duration="1000">
        @if($profile->foto)
            <img src="{{ asset('storage/'.$profile->foto) }}"
                 alt="Foto Sekolah"
                 class="img-fluid rounded shadow-sm"
                 style="max-height: 400px; object-fit: cover; width: 100%;">
        @else
            <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 300px; width: 100%;">
                <i class="fas fa-building fa-5x text-muted"></i>
            </div>
        @endif
    </div>

    <!-- Detail Informasi Sekolah -->
    <div class="row g-4 justify-content-center">

        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
            <div class="p-4 rounded-4 shadow-sm text-center h-100">
                <div class="mb-3">
                    <i class="fas fa-user-tie gradient fa-2x"></i>
                </div>
                <h6 class="fw-bold mb-1">Kepala Sekolah</h6>
                <p class="text-muted mb-0">{{ $profile->kepala_sekolah ?? 'Belum diisi' }}</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
            <div class="p-4 rounded-4 shadow-sm text-center h-100">
                <div class="mb-3">
                    <i class="fas fa-id-card gradient fa-2x"></i>
                </div>
                <h6 class="fw-bold mb-1">NPSN</h6>
                <p class="text-muted mb-0">{{ $profile->npsn ?? 'Belum diisi' }}</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
            <div class="p-4 rounded-4 shadow-sm text-center h-100">
                <div class="mb-3">
                    <i class="fas fa-calendar-alt gradient fa-2x"></i>
                </div>
                <h6 class="fw-bold mb-1">Tahun Berdiri</h6>
                <p class="text-muted mb-0">{{ $profile->tahun_berdiri ?? 'Belum diisi' }}</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
            <div class="p-4 rounded-4 shadow-sm text-center h-100">
                <div class="mb-3">
                    <i class="fas fa-phone gradient fa-2x"></i>
                </div>
                <h6 class="fw-bold mb-1">Kontak</h6>
                <p class="text-muted mb-0">{{ $profile->kontak ?? 'Belum diisi' }}</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
            <div class="p-4 rounded-4 shadow-sm text-center h-100">
                <div class="mb-3">
                    <i class="fas fa-map-marker-alt gradient fa-2x"></i>
                </div>
                <h6 class="fw-bold mb-1">Alamat</h6>
                <p class="text-muted mb-0">{{ $profile->alamat ?? 'Belum diisi' }}</p>
            </div>
        </div>

    </div>

    @else
    <div class="text-center py-5" data-aos="fade-up" data-aos-duration="1000">
        <i class="fas fa-exclamation-triangle fa-3x text-muted mb-3"></i>
        <p class="text-muted fs-5">Informasi sekolah belum diisi.</p>
    </div>
    @endif

</div>
@endsection
