@extends('admin.layouts.app')
@section('content')
@php
    $stats = [
        ['label'=>'Siswa','count'=>$siswaCount,'icon'=>'fa-users','color'=>'#4e73df'],
        ['label'=>'Guru','count'=>$guruCount,'icon'=>'fa-user-tie','color'=>'#1cc88a'],
        ['label'=>'Berita','count'=>$beritaCount,'icon'=>'fa-newspaper','color'=>'#f6c23e'],
        ['label'=>'Galeri','count'=>$galeriCount,'icon'=>'fa-images','color'=>'#e74a3b'],
        ['label'=>'Ekskul','count'=>$ekskulCount,'icon'=>'fa-futbol','color'=>'#36b9cc'],
    ];
@endphp
<div class="container-md">
    <h2 class="mb-5 text-primary fw-bold ">Dashboard</h2>

    {{-- Statistik tetap di atas --}}
    <div class="row  justify-content-between mb-4">
        @foreach($stats as $stat)
        <div class="col-xl-2 col-lg-3 col-md-4 col-6 d-flex">
            <div class="card shadow-sm border-0" style="width: 200px;">
                <div class="card-body d-flex flex-column align-items-center gap-2 p-3">
                    <div class="icon bg-light rounded-circle d-flex align-items-center justify-content-center"
                         style="width:60px; height:60px; color: {{ $stat['color'] }};">
                        <i class="fa-solid {{ $stat['icon'] }} fa-lg"></i>
                    </div>
                    <h6 class="text-secondary mb-1 text-center">{{ $stat['label'] }}</h6>
                    <p class="h5 fw-bold mb-0 text-center">{{ $stat['count'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>


 {{-- Berita Terbaru --}}
    <div class="card shadow-sm border-0 mt-4">
        <div class="card-header bg-primary text-white">
            Berita Terbaru
        </div>
        <div class="card-body">
            @forelse($latestNews as $news)
                <div class="d-flex mb-3 border-bottom pb-2">
                    @if ($news->gambar)
                        <img src="{{ asset('uploads/berita/'.$news->gambar) }}"
                             class="rounded me-3"
                             style="width: 100px; height: 70px; object-fit: cover;">
                    @endif
                    <div>
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

    {{-- Galeri Terbaru --}}
    <div class="card shadow-sm border-0 mt-4">
        <div class="card-header bg-success text-white">
            Galeri Terbaru
        </div>
        <div class="card-body d-flex flex-wrap">
            @forelse($latestGaleri as $galeri)
                <div class="me-3 mb-3 text-center">
                    @if ($galeri->kategori == 'foto')
                        <img src="{{ asset('uploads/file/'.$galeri->file) }}"
                             class="rounded shadow-sm"
                             style="width:120px; height:80px; object-fit:cover;">
                    @else
                        <video width="120" height="80" controls>
                            <source src="{{ asset('uploads/file/'.$galeri->file) }}" type="video/mp4">
                        </video>
                    @endif
                    <p class="mt-1 small">{{ $galeri->judul }}</p>
                </div>
            @empty
                <p class="text-muted">Belum ada galeri.</p>
            @endforelse
        </div>
    </div>

</div>

<style>
    .card-body .icon i {
        font-size: 1.6rem;
    }

    .card-header {
        border-radius: 0.35rem 0.35rem 0 0;
    }

    .text-truncate {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

@endsection
