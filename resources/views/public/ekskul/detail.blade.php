@extends('public.layouts.app')
@section('title', $ekskul->nama_ekskul . ' - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')

<div class="container py-5">
    <!-- Judul -->
    <h1 class="fw-bold mb-3 gradient" data-aos="fade-right" data-aos-duration="800">
        {{ $ekskul->nama_ekskul }}
    </h1>

    <!-- Meta -->
    <p class="text-muted mb-4" data-aos="fade-left" data-aos-duration="800">
        <i class="fa-solid fa-user-tie"></i> Pembina: {{ $ekskul->pembina }}
        &nbsp; | &nbsp;
        <i class="fa-solid fa-calendar-days"></i> Jadwal: {{ $ekskul->jadwal_latihan }}
    </p>

    <!-- Deskripsi -->
    <div class="news-content mb-4" data-aos="fade-up" data-aos-duration="800">
        {!! nl2br(e($ekskul->deskripsi ?? 'Tidak ada deskripsi.')) !!}
    </div>

    <div class="position: relative;">
        @if($ekskul->gambar)
        <img src="{{ asset('uploads/ekskul/'.$ekskul->gambar) }}"
            alt="{{ $ekskul->nama_ekskul }}"
            class="img-fluid w-100 mb-4 shadow"
            style="display:block;"
            data-aos="fade-up" data-aos-duration="800">
        @endif
    </div>
    <!-- Tombol Kembali -->
    <div class="mt-3" data-aos="fade-up" data-aos-duration="800">
        <a href="{{ route('public.ekskul') }}" class="btn btn-outline-primary">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Ekstrakurikuler
        </a>
    </div>
</div>
@endsection
