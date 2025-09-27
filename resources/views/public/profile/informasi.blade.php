@extends('public.layouts.app')

@section('title', 'Informasi Sekolah - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')
<div class="container py-5" >
    @if($profile)
    <div class="row justify-content-center" >
        <div class="col-lg-10">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="bg-primary text-white text-center py-4" style="background: linear-gradient(135deg, #1e2140, #2c2f54); color: #fff;">
                    <h2 class="mb-2 fw-bold">{{ $profile->nama_sekolah }}</h2>
                    <p class="mb-0 opacity-75 fs-5">Informasi Umum Sekolah</p>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <!-- Foto Sekolah -->
                        <div class="col-md-12 text-center mb-4">
                            @if($profile->foto)
                                <img src="{{ asset('uploads/profile/'.$profile->foto) }}" alt="Foto Sekolah" class="img-fluid rounded shadow-sm" style="max-height: 350px; object-fit: cover; width: 100%;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 250px; width: 100%;">
                                    <i class="fas fa-building fa-4x text-muted"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Detail Informasi Sekolah -->
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-user-tie text-primary me-2 fs-5 gradient"></i>
                                    <h6 class="mb-0 fw-semibold">Kepala Sekolah</h6>
                                </div>
                                <p class="mb-0 text-muted">{{ $profile->kepala_sekolah ?? 'Belum diisi' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-id-card text-primary me-2 fs-5 gradient"></i>
                                    <h6 class="mb-0 fw-semibold">NPSN</h6>
                                </div>
                                <p class="mb-0 text-muted">{{ $profile->npsn ?? 'Belum diisi' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-calendar-alt text-primary me-2 fs-5 gradient"></i>
                                    <h6 class="mb-0 fw-semibold">Tahun Berdiri</h6>
                                </div>
                                <p class="mb-0 text-muted">{{ $profile->tahun_berdiri ?? 'Belum diisi' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                                <div class="d-flex align-items-center mb-2 gradient">
                                    <i class="fas fa-phone text-primary me-2 fs-5"></i>
                                    <h6 class="mb-0 fw-semibold">Kontak</h6>
                                </div>
                                <p class="mb-0 text-muted">{{ $profile->kontak ?? 'Belum diisi' }}</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card border-0 shadow-sm rounded-3 p-3">
                                <div class="d-flex align-items-center mb-2 gradient">
                                    <i class="fas fa-map-marker-alt text-primary me-2 fs-5"></i>
                                    <h6 class="mb-0 fw-semibold">Alamat</h6>
                                </div>
                                <p class="mb-0 text-muted">{{ $profile->alamat ?? 'Belum diisi' }}</p>
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
        <p class="text-muted fs-5">Informasi sekolah belum diisi.</p>
    </div>
    @endif
</div>
@endsection
