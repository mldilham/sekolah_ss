@extends('public.layouts.app')
@section('title', 'Detail Guru - ' . $guru->nama_guru)

@section('content')
<style>
    .guru-detail-card {
        max-width: 900px;
        margin: 40px auto;
        border-radius: 15px;
        overflow: hidden;
    }
    .guru-photo {
        width: 100%;
        height: 350px;
        object-fit: cover;
    }
    .info-label {
        font-weight: 600;
        color: #555;
        width: 140px;
        display: inline-block;
    }
    .info-item {
        margin-bottom: 12px;
    }
    .guru-desc {
        margin-top: 15px;
        color: #333;
    }
    .btn-group-custom {
        margin-top: 20px;
        display: flex;
        gap: 10px;
    }
</style>

<div class="container py-5">
    <div class="card shadow guru-detail-card border-0">
        <div class="row g-0">
            <div class="col-md-5">
                @if($guru->foto)
                <img src="{{ asset('storage/'.$guru->foto) }}" class="guru-photo" alt="{{ $guru->nama_guru }}">
                @else
                <img src="{{ asset('asset/foto.png') }}" class="guru-photo" alt="{{ $guru->nama_guru }}">
                @endif
            </div>
            <div class="col-md-7">
                <div class="p-4 d-flex flex-column h-100">
                    <h2 class="fw-bold gradient mb-3">{{ $guru->nama_guru }}</h2>

                    {{-- Mata Pelajaran --}}
                    <div class="info-item d-flex">
                        <span class="info-label">Mata Pelajaran :</span>
                        <span>{{ $guru->mapel ?? '-' }}</span>
                    </div>

                    {{-- Email --}}
                    <div class="info-item d-flex">
                        <span class="info-label">Email :</span>
                        <span>{{ $guru->nip ?? '-' }}</span>
                    </div>

                    {{-- Kontak / HP --}}
                    <div class="info-item d-flex">
                        <span class="info-label">Kontak :</span>
                        <span>{{ $guru->no_hp ?? '-' }}</span>
                    </div>

                    {{-- Deskripsi --}}
                    @if($guru->deskripsi)
                    <div class="guru-desc">
                        <p>{{ $guru->deskripsi }}</p>
                    </div>
                    @endif

                    {{-- Tombol --}}
                    <div class="mt-auto btn-group-custom">
                        <a href="{{ route('public.layanan.guru') }}" class="btn btn-outline-primary">
                            &laquo; Kembali ke daftar
                        </a>
                        {{-- <a href="#" class="btn btn-primary">Lihat Jadwal</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
