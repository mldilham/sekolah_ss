@extends('public.layouts.app')
@section('title', 'Berita - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')

{{-- <style>
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
</style> --}}

<div class="container py-5">
        <div class="text-center mb-5 gradient">
            <h2 class="fw-bold text-primary">Berita Terbaru</h2>
            <p class="text-muted">Update informasi terkini dari sekolah kami</p>
        </div>

        <div class="row g-4">
            @forelse($beritas as $berita)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card shadow-sm border-0 h-100 berita-card">
                    @if($berita->gambar)
                        <img src="{{ asset('uploads/berita/'.$berita->gambar) }}"
                             alt="{{ $berita->judul }}"
                             class="berita-img">
                    @endif
                    <div class="p-3 d-flex flex-column">
                        <small class="text-muted mb-2">
                            {{ $berita->tanggal ? date('d M Y', strtotime($berita->tanggal)) : '' }}
                        </small>
                        <h5 class="fw-semibold mb-2">
                            {{ Str::limit($berita->judul, 60) }}
                        </h5>
                        <p class="text-muted flex-grow-1" style="font-size: 0.9rem;">
                            {{ Str::limit(strip_tags($berita->isi), 120) }}
                        </p>
                        <a href="{{ route('public.berita.detail', $berita->id_berita) }}" class="gradient mt-auto" style="font-size: 0.9rem;">
                            read more
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
