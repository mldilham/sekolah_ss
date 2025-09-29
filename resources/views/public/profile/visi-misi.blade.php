@extends('public.layouts.app')

@section('title', 'Visi Misi - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')
<div class="container py-5">

    @if($profile)
    <!-- Header Visi & Misi -->
    <div class="text-center mb-5" data-aos="fade-down" data-aos-duration="1000">
        <h1 class="fw-bold mb-2" style="font-size: 2.5rem; background: linear-gradient(135deg,#33A1E0,#2c2f54); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
            Visi & Misi {{ $profile->nama_sekolah }}
        </h1>
        <p class="text-muted fs-5">Informasi Visi dan Misi Sekolah</p>
    </div>

    <!-- Foto Sekolah -->
    <div class="text-center mb-5" data-aos="zoom-in" data-aos-duration="1000">
        @if($profile->foto)
            <div class="shadow rounded overflow-hidden" style="max-height: 400px;">
                <img src="{{ asset('uploads/profile/'.$profile->foto) }}"
                     alt="Foto Sekolah"
                     class="img-fluid w-100"
                     style="object-fit: cover; max-height: 400px;">
            </div>
        @else
            <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 300px; width: 100%;">
                <i class="fas fa-building fa-5x text-muted"></i>
            </div>
        @endif
    </div>

    <!-- Konten Visi & Misi -->
    <div class="row justify-content-center">
        <div class="col-md-10" data-aos="fade-up" data-aos-duration="1000">
            <div class="p-4 rounded-4 shadow-sm text-center hover-shadow">
                <div class="mb-4">
                    <i class="fas fa-eye gradient fa-3x"></i>
                </div>
                <h4 class="fw-bold mb-3">Visi & Misi</h4>
                <p class="text-muted mb-0">{{ $profile->visi_misi ?? 'Belum diisi' }}</p>
            </div>
        </div>
    </div>

    @else
    <div class="text-center py-5" data-aos="fade-up" data-aos-duration="1000">
        <i class="fas fa-exclamation-triangle fa-3x text-muted mb-3"></i>
        <p class="text-muted fs-5">Informasi visi dan misi sekolah belum diisi.</p>
    </div>
    @endif

</div>

<style>
.hover-shadow:hover {
    transform: translateY(-5px);
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
}
.gradient {
    background: linear-gradient(135deg,#33A1E0,#2c2f54);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
</style>
@endsection
