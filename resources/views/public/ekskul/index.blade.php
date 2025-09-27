@extends('public.layouts.app')
@section('title', 'Ekstrakurikuler - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')

<div class="container py-5" style="max-width: 900px">
    <div class="text-center mb-5 gradient">
        <h2 class="fw-bold text-primary">Ekstrakurikuler</h2>
        <p class="text-muted">Berbagai kegiatan untuk mengembangkan bakat siswa</p>
    </div>

    <div class="row g-4 justify-content-center">
        @forelse($ekskuls->take(3) as $ekskul)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mb-4 shadow-sm border-0 h-100 d-flex flex-column">
                <div class="position-relative">
                    @if($ekskul->gambar)
                    <img src="{{ asset('uploads/ekskul/'.$ekskul->gambar) }}"
                         alt="{{ $ekskul->nama_ekskul }}"
                         class="w-100"
                         style="object-fit: cover; height: 250px;">
                    @endif

                    {{-- Optional: label kecil di sudut --}}
                    {{-- <div class="position-absolute bottom-0 start-0 text-white p-2"
                         style="background: rgba(0,0,0,0.5); width: 60px; text-align: center; border-top-right-radius: 8px;">
                        <small>Label</small>
                    </div> --}}
                </div>

                <div class="p-3 d-flex flex-column flex-grow-1" style="background: rgba(255,255,255,0.95); border-radius: 0 0 12px 12px;">
                    <h5 class="fw-bold mb-2 text-primary gradient">
                        {{ Str::limit($ekskul->nama_ekskul, 60) }}
                    </h5>
                    <p class="text-muted flex-grow-1" style="font-size: 0.9rem; text-align: justify;">
                        {{ Str::limit(strip_tags($ekskul->deskripsi), 120) }}
                    </p>
                    <a href="{{ route('public.ekskul.detail', $ekskul->id_ekskul) }}"
                       class="mt-auto gradient fw-semibold" style="font-size: 0.9rem;">
                        READ MORE >>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center text-muted">Belum ada ekstrakurikuler.</p>
        @endforelse
    </div>
</div>

@endsection
