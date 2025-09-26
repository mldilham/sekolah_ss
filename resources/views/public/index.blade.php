@extends('public.layouts.app')

@section('title', 'Halaman Publik - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('hero')
<section class="hero">
    <div class="container text-center">
        <h1 class="display-3 fw-bold mb-3">{{ $profile->nama_sekolah ?? 'Nama Sekolah' }}</h1>
        <p class="lead mb-4">{{ Str::limit($profile->deskripsi, 150) ?? 'Selamat datang di website resmi sekolah kami' }}</p>
        @if($profile && $profile->foto)
            <img src="{{ asset('uploads/profile/'.$profile->foto) }}" class="img-fluid rounded shadow mb-4" alt="Foto Sekolah" style="max-width: 300px;">
        @endif
        <a href="#berita" class="btn btn-light btn-lg px-4 py-2">Lihat Berita</a>
    </div>
</section>
@endsection

@section('content')
<style>
    .section {
        padding: 80px 0;
    }
    .section:nth-child(even) {
        background: #f8f9fa;
    }
    .section-content {
        display: flex;
        align-items: center;
        gap: 40px;
    }
    .section-text {
        flex: 1;
    }
    .section-image {
        flex: 1;
        text-align: center;
    }
    .section-reverse .section-content {
        flex-direction: row-reverse;
    }
    .grid-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
    }
    .card-custom {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card-custom:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.2);
    }
    .card-img-custom {
        height: 200px;
        object-fit: cover;
    }
    .card-body-custom {
        padding: 20px;
    }
    @media (max-width: 768px) {
        .section-content {
            flex-direction: column;
            gap: 20px;
        }
        .section-reverse .section-content {
            flex-direction: column;
        }
    }
</style>

{{-- Berita Section --}}
<section id="berita" class="section">
    <div class="container">
        <div class="row justify-content-center  ">
            <div class="col-12">
                <h2 class="text-center mb-5">Berita Terbaru</h2>
                <div class="grid-cards">
                    @forelse($beritas as $berita)
                    <div class="card-custom">
                        @if($berita->gambar)
                            <img src="{{ asset('uploads/berita/'.$berita->gambar) }}" class="card-img-custom" alt="{{ $berita->judul }}">
                        @endif
                        <div class="card-body-custom">
                            <h5 class="card-title">{{ Str::limit($berita->judul, 50) }}</h5>
                            <p class="card-text">{{ Str::limit($berita->isi, 100) }}</p>
                            <small class="text-muted">{{ $berita->tanggal ? date('d M Y', strtotime($berita->tanggal)) : '' }}</small>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p class="text-center text-muted">Belum ada berita</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Guru Section --}}
<section id="guru" class="section section-reverse">
    <div class="container">
        <div class="section-content">
            <div class="section-text">
                <h2>Tenaga Pendidik</h2>
                <p>Guru-guru kami yang berdedikasi untuk mendidik generasi muda.</p>
            </div>
            <div class="section-image">
                <div class="card-custom text-center" style="padding: 40px;">
                    <i class="fa fa-users fa-3x text-primary mb-3"></i>
                    <h3 class="display-4 fw-bold text-primary">{{ $jumlah_guru }}</h3>
                    <h5>Jumlah Guru</h5>
                    <p class="text-muted">Tenaga pendidik yang berkompeten</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Siswa Section --}}
<section id="siswa" class="section">
    <div class="container">
        <div class="section-content">
            <div class="section-text">
                <h2>Data Siswa</h2>
                <p>Pelajar kami yang aktif dan berprestasi.</p>
            </div>
            <div class="section-image">
                <div class="card-custom text-center" style="padding: 40px;">
                    <i class="fa fa-graduation-cap fa-3x text-success mb-3"></i>
                    <h3 class="display-4 fw-bold text-success">{{ $jumlah_siswa }}</h3>
                    <h5>Jumlah Siswa</h5>
                    <p class="text-muted">Pelajar yang aktif dan berprestasi</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Galeri Section --}}
<section id="galeri" class="section section-reverse">
    <div class="container">
        <div class="section-content">
            <div class="section-text">
                <h2>Galeri</h2>
                <p>Momen-momen indah di sekolah kami.</p>
            </div>
            <div class="section-image">
                <div class="grid-cards">
                    @forelse($galeris->take(6) as $galeri)
                    <div class="card-custom">
                        @if($galeri->file)
                            <img src="{{ asset('uploads/file/'.$galeri->file) }}" class="card-img-custom" alt="{{ $galeri->judul }}">
                        @endif
                        <div class="card-body-custom">
                            <h6>{{ Str::limit($galeri->judul, 30) }}</h6>
                            <p class="text-muted">{{ Str::limit($galeri->keterangan, 50) }}</p>
                            <small>{{ $galeri->tanggal ? date('d M Y', strtotime($galeri->tanggal)) : '' }}</small>
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-muted">Belum ada galeri</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Ekstrakurikuler Section --}}
<section id="ekskul" class="section">
    <div class="container">
        <div class="section-content">
            <div class="section-text">
                <h2>Ekstrakurikuler</h2>
                <p>Kegiatan ekstrakurikuler untuk mengembangkan bakat siswa.</p>
            </div>
            <div class="section-image">
                <div class="grid-cards">
                    @forelse($ekstrakulis as $ekskul)
                    <div class="card-custom">
                        @if($ekskul->gambar)
                            <img src="{{ asset('uploads/ekskul/'.$ekskul->gambar) }}" class="card-img-custom" alt="{{ $ekskul->nama_ekskul }}">
                        @endif
                        <div class="card-body-custom">
                            <h5>{{ $ekskul->nama_ekskul }}</h5>
                            <p>{{ Str::limit($ekskul->deskripsi, 100) }}</p>
                            <p><strong>Pembina:</strong> {{ $ekskul->pembina }}</p>
                            <small>{{ $ekskul->jadwal_latihan }}</small>
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-muted">Belum ada ekstrakurikuler</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Profil Singkat --}}
@if($profile)
<section class="section section-reverse">
    <div class="container">
        <div class="section-content">
            <div class="section-text">
                <h2>Tentang Kami</h2>
                <p>{{ Str::limit($profile->deskripsi, 300) }}</p>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <i class="fa fa-map-marker-alt fa-2x text-primary mb-2"></i>
                        <p>{{ $profile->alamat ?? 'Alamat belum diisi' }}</p>
                    </div>
                    <div class="col-md-4">
                        <i class="fa fa-phone fa-2x text-primary mb-2"></i>
                        <p>{{ $profile->kontak ?? 'Kontak belum diisi' }}</p>
                    </div>
                    <div class="col-md-4">
                        <i class="fa fa-calendar fa-2x text-primary mb-2"></i>
                        <p>Berdiri: {{ $profile->tahun_berdiri ?? 'Tahun belum diisi' }}</p>
                    </div>
                </div>
            </div>
            <div class="section-image">
                @if($profile->logo)
                    <img src="{{ asset('uploads/profile/'.$profile->logo) }}" class="img-fluid rounded" alt="Logo Sekolah">
                @endif
            </div>
        </div>
    </div>
</section>
@endif
@endsection
