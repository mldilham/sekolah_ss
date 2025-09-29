@extends('public.layouts.app')

@section('title', 'Deskripsi - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')
<div class="container py-5">

    @if($profile)
    <!-- Header Deskripsi -->
    <div class="text-center mb-5" data-aos="fade-down" data-aos-duration="1000">
        <h1 class="fw-bold mb-2" style="font-size: 2.5rem; background: linear-gradient(135deg,#33A1E0,#2c2f54); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
            Deskripsi & Sejarah {{ $profile->nama_sekolah }}
        </h1>
        <p class="text-muted fs-5">Informasi deskripsi dan sejarah sekolah</p>
    </div>

    <!-- Konten Deskripsi -->
    <div class="row justify-content-center">
        <div class="col-md-10" data-aos="fade-up" data-aos-duration="1000">
            <div class="p-4 rounded-4 shadow-sm bg-light">
                <blockquote class="blockquote mb-0" style="font-style: italic; line-height: 1.7;">
                    <p class="fs-5 text-muted mb-0">{{ $profile->deskripsi ?? 'Belum diisi' }}</p>
                </blockquote>
            </div>
        </div>
    </div>

    @else
    <div class="text-center py-5" data-aos="fade-up" data-aos-duration="1000">
        <i class="fas fa-exclamation-triangle fa-3x text-muted mb-3"></i>
        <p class="text-muted fs-5">Deskripsi sekolah belum diisi.</p>
    </div>
    @endif

</div>

<style>
/* Hover shadow ringan */
.shadow-sm:hover {
    transform: translateY(-3px);
    transition: all 0.3s ease;
    box-shadow: 0 6px 20px rgba(0,0,0,0.12) !important;
}
</style>
@endsection
