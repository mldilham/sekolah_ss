@extends('public.layouts.app')
@section('title', 'Berita - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')

<style>
    .news-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #fff;
    }
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }
    .news-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .news-body {
        padding: 20px;
    }
    .news-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: #224abe;
        margin-bottom: 10px;
        transition: color 0.3s;
    }
    .news-title:hover {
        color: #4e73df;
    }
    .news-meta {
        font-size: 0.85rem;
        color: #6c757d;
        margin-bottom: 12px;
    }
    .news-meta i {
        margin-right: 5px;
        color: #224abe;
    }
    .news-text {
        font-size: 0.95rem;
        color: #333;
        line-height: 1.6;
        text-align: justify;
    }
    .btn-read {
        display: inline-block;
        margin-top: 15px;
        background: linear-gradient(135deg, #4e73df, #224abe);
        color: #fff;
        border-radius: 25px;
        padding: 6px 16px;
        font-size: 0.85rem;
        transition: 0.3s;
        text-decoration: none;
    }
    .btn-read:hover {
        background: linear-gradient(135deg, #224abe, #4e73df);
        color: #fff;
    }
</style>

<div class="container py-5">
    <!-- Judul Halaman -->
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Berita Sekolah</h2>
        <p class="text-muted">Kumpulan informasi terbaru dari {{ $profile->nama_sekolah ?? 'Sekolah' }}</p>
    </div>

    <div class="row g-4">
        @forelse($beritas as $berita)
            <div class="col-md-6 col-lg-4">
                <div class="news-card">
                    @if($berita->gambar)
                        <img src="{{ asset('uploads/berita/'.$berita->gambar) }}"
                             alt="{{ $berita->judul }}"
                             class="news-image">
                    @endif
                    <div class="news-body">
                        <a href="{{ route('public.berita.detail', $berita->id_berita) }}" class="news-title">
                            {{ $berita->judul }}
                        </a>
                        <div class="news-meta">
                            <i class="fa-solid fa-calendar"></i> {{ $berita->created_at->format('d M Y') }}
                        </div>
                        <p class="news-text">
                            {!! nl2br(e(Str::limit($berita->isi, 120))) !!}
                        </p>
                        <a href="{{ route('public.berita.detail', $berita->id_berita) }}" class="btn-read">
                            <i class="fa-solid fa-book-open"></i> Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">Belum ada berita.</p>
        @endforelse
    </div>
</div>

@endsection
