@extends('public.layouts.app')
@section('title', 'Profil Sekolah - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')
<div class="container py-5">
    @if($profile)
    <div class="card shadow-sm border-0 rounded-4">
        <div class="row g-0">
            <!-- Bagian Foto Sekolah & Logo -->
            <div class="col-md-4 bg-light text-center p-4">
                <h6 class="text-primary fw-bold mb-3">Logo Sekolah</h6>
                @if($profile->logo)
                    <img src="{{ asset('uploads/profile/'.$profile->logo) }}"
                         alt="Logo Sekolah"
                         class="img-fluid mb-4 rounded"
                         style="max-height:150px;">
                @else
                    <div class="text-muted mb-4">Belum ada logo</div>
                @endif

                <h6 class="text-primary fw-bold mb-3">Foto Sekolah</h6>
                @if($profile->foto)
                    <img src="{{ asset('uploads/profile/'.$profile->foto) }}"
                         alt="Foto Sekolah"
                         class="img-fluid rounded"
                         style="max-height:150px;">
                @else
                    <div class="text-muted">Belum ada foto</div>
                @endif
            </div>

            <!-- Bagian Detail Profil -->
            <div class="col-md-8 p-4" id="informasi">
                <h3 class="fw-bold text-primary mb-4">{{ $profile->nama_sekolah }}</h3>
                <div class="row mb-2">
                    <div class="col-sm-5 text-muted fw-semibold">Kepala Sekolah</div>
                    <div class="col-sm-7">{{ $profile->kepala_sekolah }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-5 text-muted fw-semibold">NPSN</div>
                    <div class="col-sm-7">{{ $profile->npsn }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-5 text-muted fw-semibold">Tahun Berdiri</div>
                    <div class="col-sm-7">{{ $profile->tahun_berdiri }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-5 text-muted fw-semibold">Kontak</div>
                    <div class="col-sm-7">{{ $profile->kontak }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-5 text-muted fw-semibold">Alamat</div>
                    <div class="col-sm-7">{{ $profile->alamat }}</div>
                </div>
                <div class="row mb-2" id="visi-misi">
                    <div class="col-sm-5 text-muted fw-semibold">Visi & Misi</div>
                    <div class="col-sm-7" style="text-align: justify;">{{ $profile->visi_misi }}</div>
                </div>
                <div class="row" id="deskripsi">
                    <div class="col-sm-5 text-muted fw-semibold">Deskripsi</div>
                    <div class="col-sm-7" style="text-align: justify;">{{ $profile->deskripsi }}</div>
                </div>
            </div>
        </div>
    </div>
    @else
        <p class="text-center text-muted">Profil sekolah belum diisi.</p>
    @endif
</div>
@endsection
