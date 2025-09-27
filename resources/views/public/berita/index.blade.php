@extends('public.layouts.app')
@section('title', 'Berita - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')

<div class="container py-5" style="max-width:900px">
    <div class="text-center mb-5 gradient">
        <h2 class="fw-bold text-primary">Berita Terbaru</h2>
        <p class="text-muted">Update informasi terkini dari sekolah kami</p>
    </div>

    @forelse($beritas as $berita)
    <div class="card mb-5 border-0 shadow-sm overflow-hidden">
        <div class="position-relative">
            @if($berita->gambar)
            <img src="{{ asset('uploads/berita/'.$berita->gambar) }}"
                 alt="{{ $berita->judul }}"
                 class="w-100"
                 style="object-fit: cover; height: 400px;">
            @endif

            <div class="position-absolute bottom-0 start-0 text-white p-3"
                 style="width: 80px; text-align: center;">
                <h4 class="mb-0" style="font-size: 1.5rem;">
                    {{ date('d', strtotime($berita->tanggal)) }}
                </h4>
                <small>{{ date('M, Y', strtotime($berita->tanggal)) }}</small>
            </div>
        </div>

        <div class="p-4">
            <h3 class="fw-bold text-dark mb-3">
                {{ $berita->judul }}
            </h3>
            <p class="text-muted" style="text-align: justify;">
                {{ Str::limit(strip_tags($berita->isi), 200) }}
            </p>
            <a href="{{ route('public.berita.detail', $berita->id_berita) }}"
               class="gradient fw-semibold text-decoration-none">
                READ MORE >>
            </a>
        </div>
    </div>
    @empty
        <p class="text-center text-muted">Belum ada berita.</p>
    @endforelse
    <div class="d-flex justify-content-center mt-4">
        {{ $beritas->links('pagination::bootstrap-4') }}
    </div>
</div>

@endsection
