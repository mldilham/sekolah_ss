@extends('public.layouts.app')
@section('title', $berita->judul . ' - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Gambar Berita -->
            @if($berita->gambar)
                <img src="{{ asset('uploads/berita/'.$berita->gambar) }}"
                     alt="{{ $berita->judul }}"
                     class="img-fluid rounded mb-4 shadow">
            @endif

            <!-- Judul -->
            <h1 class="fw-bold text-primary mb-3">{{ $berita->judul }}</h1>

            <!-- Meta -->
            <p class="text-muted mb-4">
                <i class="fa-solid fa-calendar"></i> {{ $berita->created_at->format('d M Y') }}
                @if($berita->user)
                    &nbsp; | &nbsp; <i class="fa-solid fa-user"></i> {{ $berita->user->name }}
                @endif
            </p>

            <!-- Isi -->
            <div class="news-content">
                {!! nl2br(e($berita->isi)) !!}
            </div>

            <!-- Tombol Kembali -->
            <div class="mt-5">
                <a href="{{ route('public.berita') }}" class="btn btn-outline-primary">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Berita
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
