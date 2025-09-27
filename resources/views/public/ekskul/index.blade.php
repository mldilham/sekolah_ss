@extends('public.layouts.app')
@section('title', 'Ekstrakurikuler - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')

<style>
    .card-custom {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .card-header-custom {
        background: linear-gradient(135deg, #4e73df, #224abe);
        color: white;
        padding: 15px 20px;
    }

    .table thead th {
        background-color: #f8f9fc;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 13px;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f5ff;
        transition: 0.2s ease-in-out;
    }

    .img-thumbnail {
        border-radius: 8px;
        object-fit: cover;
    }
</style>

<section id="ekskul" class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold text-primary mb-4 gradient">Ekstrakurikuler</h2>
            <p class="text-center text-muted mb-5 gradient">Berbagai kegiatan untuk mengembangkan bakat siswa</p>

            <div class="row g-4 justify-content-center">
                @forelse($ekskuls as $ekskul)
                <div class="col-md-4 ">
                    <div class="card h-100 border-0 shadow-lg rounded-4 overflow-hidden">
                        <img src="{{ asset('uploads/ekskul/'.$ekskul->gambar) }}"
                             alt="{{ $ekskul->nama_ekskul }}"
                             class="card-img-top"
                             style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-bold text-primary gradient">{{ $ekskul->nama_ekskul }}</h5>
                            <p class="text-muted flex-grow-1">
                                {{ Str::limit($ekskul->deskripsi, 100) }}
                            </p>
                            <a href="{{ route('public.ekskul.detail', $ekskul->id_ekskul) }}" class=" gradient" style="font-size: 0.9rem;">
                                    read more
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center text-muted">Belum ada ekstrakurikuler.</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection
