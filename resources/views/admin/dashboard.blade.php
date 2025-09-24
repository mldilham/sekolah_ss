@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container my-4">
    <h2 class="mb-4">Dashboard</h2>
    {{-- Statistik --}}
    <div class="row g-4">
        <div class="col-md-2">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <i class="fa-solid fa-users fa-2x text-primary mb-2"></i>
                    <h6>Siswa</h6>
                    <p class="h4">{{ $siswaCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <i class="fa-solid fa-user-tie fa-2x text-success mb-2"></i>
                    <h6>Guru</h6>
                    <p class="h4">{{ $guruCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <i class="fa-solid fa-newspaper fa-2x text-warning mb-2"></i>
                    <h6>Berita</h6>
                    <p class="h4">{{ $beritaCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <i class="fa-solid fa-images fa-2x text-danger mb-2"></i>
                    <h6>Galeri</h6>
                    <p class="h4">{{ $galeriCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <i class="fa-solid fa-futbol fa-2x text-info mb-2"></i>
                    <h6>Ekskul</h6>
                    <p class="h4">{{ $ekskulCount }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        {{-- Berita Terbaru --}}
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">Berita Terbaru</div>
                <div class="card-body">
                    @forelse($latestNews as $news)
                        <div class="mb-3 border-bottom pb-2 d-flex">
                            @if($news->gambar)
                                <div class="me-3">
                                    <img src="{{ asset('uploads/berita/'. $news->gambar) }}"
                                         alt="Foto {{ $news->judul }}" width="80" height="80"
                                         class="img-thumbnail shadow-sm">
                                </div>
                            @endif
                            <div class="flex-grow-1">
                                <h6 class="mb-1">{{ $news->judul }}</h6>
                                <small class="text-muted">{{ $news->tanggal }}</small>
                                <p class="mb-0">{{ Str::limit($news->isi, 80) }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Belum ada berita.</p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Galeri Terbaru --}}
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">Galeri Terbaru</div>
                <div class="card-body">
                    <div class="row g-2">
                        @forelse($latestGaleri as $galeri)
                            <div class="col-4">
                                <img src="{{ asset('uploads/file/'.$galeri->file) }}"
                                     alt="{{ $galeri->judul }}" class="img-fluid rounded shadow-sm">
                            </div>
                        @empty
                            <p class="text-muted">Belum ada galeri.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
