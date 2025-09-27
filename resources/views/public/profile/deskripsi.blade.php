@extends('public.layouts.app')

@section('title', 'Deskripsi - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')
<div class="container py-5">
    @if($profile)
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-5">
                <div class="card-header bg-info text-white text-center py-4 position-relative overflow-hidden">
                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-gradient" style="background: linear-gradient(135deg, rgba(13,202,240,0.1) 0%, rgba(13,202,240,0.05) 100%);"></div>
                    <h2 class="mb-0 fw-bold position-relative">{{ $profile->nama_sekolah }}</h2>
                    <p class="mb-0 opacity-75 position-relative">Deskripsi & Sejarah Sekolah</p>
                    <div class="position-absolute bottom-0 end-0 p-3">
                        <i class="fas fa-book fa-2x opacity-50"></i>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="row g-0">
                        <!-- Sidebar dengan Logo dan Foto -->
                        <div class="col-md-4 bg-gradient bg-info-subtle d-flex flex-column align-items-center justify-content-center p-4">
                            <div class="text-center mb-4">
                                <h5 class="text-info fw-bold mb-3">Logo Sekolah</h5>
                                @if($profile->logo)
                                    <img src="{{ asset('uploads/profile/'.$profile->logo) }}" alt="Logo Sekolah" class="img-fluid rounded-circle mb-3 shadow-sm" style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #0dcaf0;">
                                @else
                                    <div class="bg-white rounded-circle d-flex align-items-center justify-content-center mb-3 border border-info" style="width: 120px; height: 120px;">
                                        <i class="fas fa-school fa-3x text-info"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="text-center">
                                <h5 class="text-info fw-bold mb-3">Foto Sekolah</h5>
                                @if($profile->foto)
                                    <img src="{{ asset('uploads/profile/'.$profile->foto) }}" alt="Foto Sekolah" class="img-fluid rounded shadow-sm border border-info" style="max-height: 200px; width: 100%; object-fit: cover;">
                                @else
                                    <div class="bg-white rounded d-flex align-items-center justify-content-center border border-info" style="height: 200px; width: 100%;">
                                        <i class="fas fa-building fa-4x text-info"></i>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Bagian Deskripsi dengan Quote Style -->
                        <div class="col-md-8 p-5">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="text-info fw-bold mb-4"><i class="fas fa-align-left me-2"></i>Deskripsi Sekolah</h4>
                                    <div class="quote-container mb-4">
                                        <blockquote class="blockquote text-center p-4 bg-light rounded-4 border-start border-5 border-info">
                                            <p class="mb-3 fs-5" style="line-height: 1.8; font-style: italic;">{{ $profile->deskripsi ?? 'Belum diisi' }}</p>
                                            <footer class="blockquote-footer text-info fw-bold">{{ $profile->nama_sekolah }}</footer>
                                        </blockquote>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{ route('public.profile') }}" class="btn btn-outline-info btn-lg">
                                            <i class="fas fa-arrow-left me-2"></i>Kembali ke Profil Utama
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="text-center py-5">
            <i class="fas fa-exclamation-triangle fa-3x text-muted mb-3"></i>
            <p class="text-muted">Deskripsi sekolah belum diisi.</p>
        </div>
    @endif
</div>
@endsection
