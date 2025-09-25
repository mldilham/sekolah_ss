@extends('public.layouts.app')
@section('title', 'Galeri - ' . ($profile->nama_sekolah ?? 'Sekolah'))

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

<div class="container-fluid py-3">
    <div class="row">
        <div class="col-12">
            <div class="card card-custom">
                <!-- Header -->
                <div class="card-header card-header-custom">
                    <h5 class="mb-0 fw-bold">
                        <i class="fa-solid fa-images me-2"></i> Galeri Sekolah
                    </h5>
                </div>

                <!-- Body -->
                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Keterangan</th>
                                    <th>Kategori</th>
                                    <th>File</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($galeris as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="fw-semibold">{{ $item->judul }}</td>
                                        <td>{{ $item->keterangan ?? '-' }}</td>
                                        <td>
                                            <span class="badge {{ $item->kategori == 'foto' ? 'bg-success' : 'bg-info' }}">
                                                {{ ucfirst($item->kategori) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($item->kategori == 'foto')
                                                <img src="{{ asset('uploads/file/'. $item->file) }}"
                                                     alt="foto {{ $item->judul }}"
                                                     width="80" height="60"
                                                     class="img-thumbnail shadow-sm">
                                            @else
                                                <video width="120" height="80" class="rounded shadow-sm" controls>
                                                    <source src="{{ asset('uploads/file/'. $item->file) }}" type="video/mp4">
                                                </video>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-3">
                                            <i class="fa-solid fa-circle-info"></i> Belum ada data galeri
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Footer -->
                <div class="card-footer text-center bg-light">
                    <small class="text-muted">Total Galeri: {{ count($galeris) }}</small>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
