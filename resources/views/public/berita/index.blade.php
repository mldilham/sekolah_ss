@extends('public.layouts.app')
@section('title', $beritas->judul . ' - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')

<style>
    .card-custom {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    .card-header-custom {
        background: linear-gradient(135deg, #4e73df, #224abe);
        color: white;
        padding: 20px;
        text-align: center;
    }
    .card-header-custom h3 {
        margin: 0;
        font-weight: 700;
    }
    .news-meta {
        font-size: 0.9rem;
        color: #6c757d;
        margin-top: 10px;
    }
    .news-meta i {
        margin-right: 5px;
        color: #224abe;
    }
    .news-image {
        max-height: 420px;
        object-fit: cover;
        width: 100%;
        border-radius: 10px;
    }
    .card-body p {
        text-align: justify;
        line-height: 1.7;
    }
    .btn-back {
        background: linear-gradient(135deg, #4e73df, #224abe);
        color: #fff;
        border-radius: 30px;
        padding: 6px 18px;
        font-size: 0.9rem;
        transition: 0.3s;
        text-decoration: none;
    }
    .btn-back:hover {
        background: linear-gradient(135deg, #224abe, #4e73df);
        color: #fff;
    }
</style>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card card-custom">
                <!-- Header -->
                <div class="card-header-custom">
                    <h3>{{ $beritas->judul }}</h3>
                    <div class="news-meta">
                        <span><i class="fa-solid fa-calendar"></i> {{ $beritas->created_at->format('d M Y') }}</span>
                        &nbsp; | &nbsp;
                        <span><i class="fa-solid fa-user"></i> {{ $beritas->user->name ?? 'Admin' }}</span>
                    </div>
                </div>

                <!-- Body -->
                <div class="card-body p-4">
                    @if($beritas->gambar)
                        <div class="text-center mb-4">
                            <img src="{{ asset('uploads/berita/'.$beritas->gambar) }}"
                                 alt="{{ $beritas->judul }}"
                                 class="news-image shadow-sm">
                        </div>
                    @endif

                    <p>{!! nl2br(e($beritas->isi)) !!}</p>

                    <div class="mt-4">
                        <a href="{{ route('berita.index') }}" class="btn-back">
                            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Berita
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
