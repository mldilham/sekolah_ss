@extends('public.layouts.app')

@section('title', 'Informasi Sekolah - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')
<div class="container py-5">
    @if($profile)
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-5">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h2 class="mb-0 fw-bold">{{ $profile->nama_sekolah }}</h2>
                    <p class="mb-0 opacity-75">Informasi Umum Sekolah</p>
                </div>
                <div class="card-body p-0">
                    <div class="row g-0">
                        <!-- Sidebar dengan Logo dan Foto -->
                        <div class="col-md-4 bg-gradient bg-primary-subtle d-flex flex-column align-items-center justify-content-center p-4">
                            <div class="text-center mb-4">
                                <h5 class="text-primary fw-bold mb-3">Logo Sekolah</h5>
                                @if($profile->logo)
                                    <img src="{{ asset('uploads/profile/'.$profile->logo) }}" alt="Logo Sekolah" class="img-fluid rounded-circle mb-3 shadow-sm" style="width: 120px; height: 120px; object-fit: cover;">
                                @else
                                    <div class="bg-white rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 120px; height: 120px;">
                                        <i class="fas fa-school fa-3x text-muted"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="text-center">
                                <h5 class="text-primary fw-bold mb-3">Foto Sekolah</h5>
                                @if($profile->foto)
                                    <img src="{{ asset('uploads/profile/'.$profile->foto) }}" alt="Foto Sekolah" class="img-fluid rounded shadow-sm" style="max-height: 200px; width: 100%; object-fit: cover;">
                                @else
                                    <div class="bg-white rounded d-flex align-items-center justify-content-center" style="height: 200px; width: 100%;">
                                        <i class="fas fa-building fa-4x text-muted"></i>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Detail Informasi dalam List -->
                        <div class="col-md-8 p-5">
                            <div class="row g-3">
                                <div class="col-12">
                                    <h4 class="text-primary fw-bold mb-4"><i class="fas fa-info-circle me-2"></i>Informasi Sekolah</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <h6 class="text-primary mb-2"><i class="fas fa-user-tie me-2"></i>Kepala Sekolah</h6>
                                            <p class="mb-0 fw-semibold">{{ $profile->kepala_sekolah ?? 'Belum diisi' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <h6 class="text-primary mb-2"><i class="fas fa-id-card me-2"></i>NPSN</h6>
                                            <p class="mb-0 fw-semibold">{{ $profile->npsn ?? 'Belum diisi' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <h6 class="text-primary mb-2"><i class="fas fa-calendar-alt me-2"></i>Tahun Berdiri</h6>
                                            <p class="mb-0 fw-semibold">{{ $profile->tahun_berdiri ?? 'Belum diisi' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <h6 class="text-primary mb-2"><i class="fas fa-phone me-2"></i>Kontak</h6>
                                            <p class="mb-0 fw-semibold">{{ $profile->kontak ?? 'Belum diisi' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body">
                                            <h6 class="text-primary mb-2"><i class="fas fa-map-marker-alt me-2"></i>Alamat</h6>
                                            <p class="mb-0 fw-semibold">{{ $profile->alamat ?? 'Belum diisi' }}</p>
                                        </div>
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
            <p class="text-muted">Informasi sekolah belum diisi.</p>
        </div>
    @endif
</div>
@endsection
