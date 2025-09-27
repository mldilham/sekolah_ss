@extends('public.layouts.app')

@section('title', 'Visi Misi - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')
<div class="container py-5">
    @if($profile)
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="bg-success text-white text-center py-4" style="background: linear-gradient(135deg, #1e2140, #2c2f54); color: #fff;">
                    <h2 class="mb-2 fw-bold">Visi & Misi {{ $profile->nama_sekolah }}</h2>
                    <p class="mb-0 opacity-75 fs-5">Informasi Visi dan Misi Sekolah</p>
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

                        <!-- Visi -->
                        <div class="col-md-12">
                            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                                <div class="d-flex justify-content-center mb-4">
                                    <i class="fas fa-eye text-success me-2 gradient" style="font-size:30px"></i>
                                    <h4 class="mb-0 fw-bold">Visi Dan Misi</h4>
                                </div>
                                <p class="mb-0 text-muted">{{ $profile->visi_misi ?? 'Belum diisi' }}</p>
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
        <p class="text-muted fs-5">Informasi visi dan misi sekolah belum diisi.</p>
    </div>
    @endif
</div>
@endsection
