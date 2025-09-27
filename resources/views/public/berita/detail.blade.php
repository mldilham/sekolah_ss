@extends('public.layouts.app')
@section('title', $berita->judul . ' - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Gambar Berita -->

            <!-- Judul -->
            <h1 class="fw-bold mb-3 gradient">{{ $berita->judul }}</h1>

            <!-- Meta -->
            <p class="text-muted mb-4">
                <i class="fa-solid fa-calendar"></i> {{ $berita->created_at->format('d M Y') }}
                @if($berita->user)
                &nbsp; | &nbsp; <i class="fa-solid fa-user"></i> By : {{ $berita->user->name }}
                @endif
            </p>

            <!-- Isi -->
            <div class="news-content mb-4">
                {!! nl2br(e($berita->isi)) !!}
            </div>
            @if($berita->gambar)
                <img src="{{ asset('uploads/berita/'.$berita->gambar) }}"
                     alt="{{ $berita->judul }}"
                     class="img-fluid rounded mb-4 shadow">
            @endif

            <!-- Tombol Kembali -->
            <div class="mt-2">
                <a href="{{ route('public.berita') }}" class="">
                    <i class="fa-solid fa-arrow-left gradient"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
