@extends('public.layouts.app')

@section('title', 'Deskripsi - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')
<div class="container py-5">
    @if($profile)
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <!-- Header -->
                <div class="bg-primary text-white text-center py-4" style="background: linear-gradient(135deg, #1e2140, #2c2f54); color: #fff;">
                    <h2 class="mb-2 fw-bold">{{ $profile->nama_sekolah }}</h2>
                    <p class="mb-0 opacity-75 fs-5">Deskripsi & Sejarah Sekolah</p>
                </div>

                <div class="card-body p-4">
                    <div class="row g-4">
                        <!-- Deskripsi & Sejarah dengan Quote Style -->
                        <div class="col-md-12">
                            <h5 class="fw-semibold mb-3"><i class="fas fa-align-left me-2"></i>Deskripsi Sekolah</h5>
                            <blockquote class="blockquote p-4 bg-light rounded-4 border-start border-5 border-primary shadow-sm">
                                <p class="mb-3 fs-5 text-muted" style="line-height: 1.7; font-style: italic;">
                                    {{ $profile->deskripsi ?? 'Belum diisi' }}
                                </p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @else
    <div class="text-center py-5">
        <i class="fas fa-exclamation-triangle fa-3x text-muted mb-3"></i>
        <p class="text-muted fs-5">Deskripsi sekolah belum diisi.</p>
    </div>
    @endif
</div>
@endsection
