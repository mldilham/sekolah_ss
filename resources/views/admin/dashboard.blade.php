@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold text-dark">Dashboard Admin</h1>
        <div class="text-muted fs-6">
            Selamat datang, <span class="fw-semibold">{{ auth()->user()->name }}</span>!
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="row g-4 mb-5">
        @php
            $cards = [
                ['title' => 'Total Siswa', 'count' => $siswaCount, 'icon' => 'fa-user-graduate', 'color' => 'primary'],
                ['title' => 'Total Guru', 'count' => $guruCount, 'icon' => 'fa-chalkboard-user', 'color' => 'success'],
                ['title' => 'Total Berita', 'count' => $beritaCount, 'icon' => 'fa-newspaper', 'color' => 'info'],
                ['title' => 'Total Galeri', 'count' => $galeriCount, 'icon' => 'fa-images', 'color' => 'warning'],
                ['title' => 'Total Ekstrakulikuler', 'count' => $ekskulCount, 'icon' => 'fa-laptop-code', 'color' => 'danger'],
            ];
        @endphp

        @foreach($cards as $card)
        <div class="col-xl-2 col-md-4 col-sm-6">
            <div class="stat-card shadow-sm border-0 rounded-4">
                <div class="stat-body d-flex align-items-center gap-3">
                    <div class="bg-{{ $card['color'] }} bg-opacity-10 text-{{ $card['color'] }} rounded-3 p-3 fs-3">
                        <i class="fas {{ $card['icon'] }}"></i>
                    </div>
                    <div>
                        <h6 class="mb-1 fw-semibold text-secondary">{{ $card['title'] }}</h6>
                        <h4 class="fw-bold text-dark">{{ $card['count'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Latest Content Sections -->
    <div class="row g-4">
        @php
            $latestSections = [
                ['title' => 'Berita Terbaru', 'items' => $latestNews, 'icon' => 'fa-newspaper', 'color' => 'primary', 'type' => 'berita'],
                ['title' => 'Galeri Terbaru', 'items' => $latestGaleri, 'icon' => 'fa-images', 'color' => 'success', 'type' => 'galeri'],
                ['title' => 'Guru Terbaru', 'items' => $latestGuru, 'icon' => 'fa-user', 'color' => 'info', 'type' => 'guru'],
                ['title' => 'Ekstrakulikuler Terbaru', 'items' => $latestEkskul, 'icon' => 'fa-laptop-code', 'color' => 'warning', 'type' => 'ekskul'],
            ];
        @endphp

        @foreach($latestSections as $section)
        <div class="col-lg-6">
            <div class="section-card shadow-sm rounded-4">
                <div class="section-header bg-{{ $section['color'] }} bg-opacity-10 border-0 rounded-top-4 d-flex align-items-center gap-3">
                    <i class="fas {{ $section['icon'] }} fs-4 text-{{ $section['color'] }}"></i>
                    <h5 class="mb-0 fw-semibold text-{{ $section['color'] }}">{{ $section['title'] }}</h5>
                </div>
                <div class="section-body p-3">
                    @if($section['items']->count() > 0)
                        @foreach($section['items'] as $item)
                            <div class="d-flex align-items-center gap-3 mb-3 border-bottom pb-2">
                                @if($section['type'] === 'berita')
                                    @if($item->gambar)
                                        <img src="{{ asset('uploads/berita/' . $item->gambar) }}" alt="{{ $item->judul }}" class="rounded-3" style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="fas fa-newspaper text-muted fs-4"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h6 class="mb-1 fw-semibold text-dark">{{ Str::limit($item->judul, 40) }}</h6>
                                        <small class="text-muted">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</small>
                                    </div>
                                @elseif($section['type'] === 'galeri')
                                    @if($item->file)
                                        @if($item->kategori == 'foto')
                                            <img src="{{ asset('uploads/file/' . $item->file) }}" alt="{{ $item->judul }}" class="rounded-3" style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                                <i class="fas fa-video text-muted fs-4"></i>
                                            </div>
                                        @endif
                                    @else
                                        <div class="bg-light rounded-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="fas fa-images text-muted fs-4"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h6 class="mb-1 fw-semibold text-dark">{{ Str::limit($item->judul, 40) }}</h6>
                                        <small class="text-muted">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</small>
                                    </div>
                                @elseif($section['type'] === 'guru')
                                    @if($item->foto)
                                        <img src="{{ asset('uploads/guru/' . $item->foto) }}" alt="{{ $item->nama_guru }}" class="rounded-3" style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="fas fa-user text-muted fs-4"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h6 class="mb-1 fw-semibold text-dark">{{ $item->nama_guru }}</h6>
                                        <small class="text-muted">{{ $item->mapel }}</small>
                                    </div>
                                @elseif($section['type'] === 'ekskul')
                                    @if($item->gambar)
                                        <img src="{{ asset('uploads/ekskul/' . $item->gambar) }}" alt="{{ $item->nama_ekskul }}" class="rounded-3" style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="fas fa-laptop-code text-muted fs-4"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h6 class="mb-1 fw-semibold text-dark">{{ $item->nama_ekskul }}</h6>
                                        <small class="text-muted">{{ $item->pembina }}</small>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted mb-0">Belum ada data.</p>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Profile Sekolah Info -->
    @if($profile)
        <div class="row mt-5">
            <div class="col-12">
                <div class="section-card shadow-sm rounded-4">
                    <div class="section-header bg-secondary bg-opacity-10 border-0 rounded-top-4">
                        <h5 class="mb-0 fw-semibold text-secondary">Informasi Sekolah</h5>
                    </div>
                    <div class="section-body p-4">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <p class="mb-2"><strong>Nama Sekolah:</strong> <span class="text-dark">{{ $profile->nama_sekolah }}</span></p>
                                <p class="mb-2"><strong>Kepala Sekolah:</strong> <span class="text-dark">{{ $profile->kepala_sekolah }}</span></p>
                                <p class="mb-2"><strong>NPSN:</strong> <span class="text-dark">{{ $profile->npsn }}</span></p>
                                <p class="mb-2"><strong>Kontak:</strong> <span class="text-dark">{{ $profile->kontak }}</span></p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-2"><strong>Alamat:</strong> <span class="text-dark">{{ $profile->alamat }}</span></p>
                                <p class="mb-2"><strong>Tahun Berdiri:</strong> <span class="text-dark">{{ $profile->tahun_berdiri }}</span></p>
                                @if($profile->logo)
                                    <p class="mb-2"><strong>Logo:</strong></p>
                                    <img src="{{ asset('uploads/profile/' . $profile->logo) }}" alt="Logo" class="rounded-3" style="width: 80px; height: 80px; object-fit: cover;">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<style>
.stat-card, .section-card {
    border: none;
    border-radius: 1rem;
    box-shadow: 0 4px 12px rgb(0 0 0 / 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.stat-card:hover, .section-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgb(0 0 0 / 0.15);
}
.stat-body, .section-header, .section-body {
    font-weight: 600;
    font-size: 1.1rem;
}
.bg-opacity-10 {
    background-color: rgba(0, 0, 0, 0.05) !important;
}
.fw-semibold {
    font-weight: 600 !important;
}
.text-secondary {
    color: #6c757d !important;
}
.text-dark {
    color: #212529 !important;
}
</style>
@endsection
