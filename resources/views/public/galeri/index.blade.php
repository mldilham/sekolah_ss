@extends('public.layouts.app')
@section('title', 'Galeri - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')

<section id="galeri" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold text-primary mb-3 gradient">Galeri</h2>
        <p class="text-center mb-5 gradient">Dokumentasi kegiatan & momen terbaik</p>

        <div class="row g-3 justify-content-center">
            @forelse($galeris as $galeri)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <a href="{{ asset('uploads/file/'.$galeri->file) }}" data-lightbox="galeri" data-title="{{ $galeri->judul }}">
                        <img src="{{ asset('uploads/file/'.$galeri->file) }}"
                             alt="{{ $galeri->judul }}"
                             class="w-100"
                             style="object-fit: cover; height: 250px;">
                    </a>
                    <div class="p-2 bg-dark text-white small">
                        {{ Str::limit($galeri->judul, 30) }}
                    </div>
                </div>
            </div>
            @empty
            <p class="text-center text-muted">Belum ada galeri.</p>
            @endforelse
        </div>
    </div>
</section>

@endsection
