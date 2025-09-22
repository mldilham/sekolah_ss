@extends('operator.layouts.app')
@section('content')
@php
    $stats = [
        ['label'=>'Siswa','count'=>$siswaCount,'icon'=>'fa-users','color'=>'#4e73df'],
        // ['label'=>'Guru','count'=>$guruCount,'icon'=>'fa-user-tie','color'=>'#1cc88a'],
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

    {{-- Layout dua kolom: kiri (Berita+Galeri), kanan (Profil Sekolah) --}}
    <div class="row g-3">
    {{-- Berita dan Galeri --}}
    <div class="col-lg-6 d-flex flex-column gap-3">
        {{-- Berita Terbaru --}}
        <div class="card shadow-sm border-0 flex-grow-1">
            <div class="card-header bg-primary text-white fw-bold">Berita Terbaru</div>
            <div class="card-body">
                @forelse($latestNews as $news)
                    <div class="d-flex mb-3 pb-3 border-bottom">
                        <!-- Foto Berita -->
                        @if ($news->gambar)
                            <img src="{{ asset('uploads/berita/'.$news->gambar) }}"
                                alt="{{ $news->judul }}"
                                class="rounded shadow-sm me-3"
                                style="width:80px; height:80px; object-fit:cover;">
                        @else
                            <div class="d-flex justify-content-center align-items-center bg-light rounded shadow-sm me-3"
                                style="width:80px; height:80px;">
                                <i class="fa-solid fa-image text-muted"></i>
                            </div>
                        @endif

                        <!-- Isi Berita -->
                        <div class="flex-grow-1">
                            <h6 class="text-primary fw-bold mb-1">{{ $news->judul }}</h6>
                            <small class="text-muted d-block mb-1">
                                <i class="fa-regular fa-calendar me-1"></i> {{ $news->tanggal }}
                            </small>
                            <p class="mb-0 text-truncate">{{ Str::limit($news->isi, 100) }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Belum ada berita.</p>
                @endforelse
            </div>
        </div>


        {{-- Galeri Terbaru --}}
        <div class="card shadow-sm border-0 flex-grow-1">
            <div class="card-header bg-primary text-white fw-bold">Galeri Terbaru</div>
            <div class="card-body">
                <div class="row g-2">
                    @forelse($latestGaleri as $galeri)
                        <div class="col-4">
                            <div class="rounded shadow-sm overflow-hidden" style="height:100px;">
                                <img src="{{ asset('uploads/file/' . $galeri->file) }}"
                                     alt="{{ $galeri->judul }}" class="img-fluid h-100 w-100 object-fit-cover">
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Belum ada galeri</p>
                    @endforelse
                </div>
            </div>
        </div>
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
