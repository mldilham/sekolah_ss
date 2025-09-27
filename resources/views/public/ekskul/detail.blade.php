@extends('public.layouts.app')
@section('title', $ekskul->nama_ekskul . ' - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Judul -->
            <h1 class="fw-bold mb-3 gradient">{{ $ekskul->nama_ekskul }}</h1>

            <!-- Meta -->
            <p class="text-muted mb-4">
                <i class="fa-solid fa-user-tie"></i> Pembina: {{ $ekskul->pembina }}
                &nbsp; | &nbsp;
                <i class="fa-solid fa-calendar-days"></i> Jadwal: {{ $ekskul->jadwal_latihan }}
            </p>

            <!-- Deskripsi -->
            <div class="news-content mb-4">
                {!! nl2br(e($ekskul->deskripsi ?? 'Tidak ada deskripsi.')) !!}
            </div>

            <!-- Gambar -->
            @if($ekskul->gambar)
                <img src="{{ asset('uploads/ekskul/'.$ekskul->gambar) }}"
                     alt="{{ $ekskul->nama_ekskul }}"
                     class="img-fluid rounded mb-4 shadow">
            @endif

            <!-- Tombol Kembali -->
            <div class="mt-2">
                <a href="{{ route('public.ekskul') }}" class="">
                    <i class="fa-solid fa-arrow-left gradient"></i>
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
