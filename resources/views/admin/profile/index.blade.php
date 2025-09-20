@extends('admin.layouts.app')

@section('title', 'Profil Sekolah')

@section('content')

<style>
    .card-custom {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .card-header-custom {
        background: linear-gradient(135deg, #4e73df, #224abe);
        color: white;
        padding: 15px 20px;
    }

    .img-thumbnail {
        border-radius: 8px;
        object-fit: cover;
    }
</style>

<div class="container-fluid py-3">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card card-custom">
                <!-- Header -->
                <div class="card-header card-header-custom text-center">
                    <h5 class="mb-0 fw-bold">
                        <i class="fa-solid fa-school me-2"></i> Profil Sekolah
                    </h5>
                </div>

                <!-- Body -->
                <div class="card-body bg-white p-5">
                    <div class="row g-5 align-items-center">

                        <!-- Kolom Kiri: Logo & Info Sekolah -->
                        <div class="col-md-6 border-end">
                            <!-- Logo Sekolah -->
                            <div class="text-center mb-4">
                                @if($profile && $profile->logo)
                                    <img src="{{ asset('storage/'.$profile->logo) }}"
                                         alt="Logo Sekolah"
                                         class="img-thumbnail shadow-sm"
                                         style="max-height:130px; background:#fff; padding:10px;">
                                @else
                                    <div class="d-flex justify-content-center align-items-center bg-light rounded-circle border shadow-sm"
                                         style="width:130px; height:130px; margin:0 auto;">
                                        <i class="fa-solid fa-image text-muted fa-2x"></i>
                                    </div>
                                    <p class="text-muted mt-2">Belum ada logo</p>
                                @endif
                            </div>

                            <h3 class="text-center fw-bold text-primary mb-4">
                                {{ $profile->nama_sekolah ?? 'Belum ada nama sekolah' }}
                            </h3>

                            <p>
                                <i class="fa-solid fa-id-card me-2 text-secondary"></i>
                                <strong>NPSN:</strong> {{ $profile->npsn ?? '-' }}
                            </p>
                            <p>
                                <i class="fa-solid fa-location-dot me-2 text-secondary"></i>
                                <strong>Alamat:</strong> {{ $profile->alamat ?? '-' }}
                            </p>
                            <p>
                                <i class="fa-solid fa-phone me-2 text-secondary"></i>
                                <strong>Kontak:</strong> {{ $profile->kontak ?? '-' }}
                            </p>
                            <p>
                                <i class="fa-solid fa-calendar me-2 text-secondary"></i>
                                <strong>Tahun Berdiri:</strong> {{ $profile->tahun_berdiri ?? '-' }}
                            </p>
                        </div>

                        <!-- Kolom Kanan: Kepala Sekolah -->
                        <div class="col-md-6 text-center">
                            @if($profile && $profile->foto)
                                <img src="{{ asset('storage/'.$profile->foto) }}"
                                     alt="Kepala Sekolah"
                                     class="img-thumbnail shadow-sm mb-3"
                                     style="max-height:250px;">
                            @else
                                <div class="d-flex justify-content-center align-items-center bg-light rounded-3 border shadow-sm mb-3"
                                     style="width:180px; height:250px; margin:0 auto;">
                                    <i class="fa-solid fa-user text-muted fa-2x"></i>
                                </div>
                                <p class="text-muted">Belum ada foto kepala sekolah</p>
                            @endif

                            <h5 class="fw-bold mt-3">
                                <i class="fa-solid fa-user-tie me-2"></i>
                                {{ $profile->kepala_sekolah ?? 'Kepala Sekolah' }}
                            </h5>
                        </div>
                    </div>

                    <!-- Visi Misi -->
                    <div class="mt-5">
                        <h5 class="fw-bold text-primary">
                            <i class="fa-solid fa-bullseye me-2"></i> Visi & Misi
                        </h5>
                        <p class="text-muted">{{ $profile->visi_misi ?? 'Belum ada visi misi' }}</p>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mt-4">
                        <h5 class="fw-bold text-primary">
                            <i class="fa-solid fa-align-left me-2"></i> Deskripsi
                        </h5>
                        <p class="text-muted">{{ $profile->deskripsi ?? 'Belum ada deskripsi' }}</p>
                    </div>
                </div>

                <!-- Footer -->
                <div class="card-footer text-center bg-light">
                    <a href="{{ route('admin.profile.edit', $profile->id_profile ?? 1) }}"
                       class="btn btn-warning px-4 rounded-pill shadow-sm">
                        <i class="fa-solid fa-pen-to-square me-1"></i> Edit Profil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
