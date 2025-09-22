@extends('operator.layouts.app')
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

    .btn-action {
        border-radius: 8px;
        transition: 0.3s;
    }

    .btn-action:hover {
        transform: scale(1.1);
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
                <div class="card-header card-header-custom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">
                        <i class="fa-solid fa-images me-2"></i> Data Ekstrakulikuler
                    </h5>
                    <a href="{{ route('operator.ekskul.create') }}" class="btn btn-light btn-sm fw-semibold shadow-sm">
                        <i class="fa-solid fa-plus"></i> Tambah Ekskul
                    </a>
                </div>

                <!-- Body -->
                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ekskul</th>
                                    <th>Pembina</th>
                                    <th>Jadwal_latihan</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($ekskul as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="fw-semibold">{{ $item->nama_ekskul }}</td>
                                        <td class="">{{ $item->pembina }}</td>
                                        <td class="">{{ $item->jadwal_latihan }}</td>
                                        <td class="">{{ $item->deskripsi }}</td>
                                        <td>
                                            @if ($item->gambar)
                                                <img src="{{ asset('uploads/ekskul/'. $item->gambar) }}"
                                                     alt="foto {{ old($item->nama_ekskul) }}" width="80" height="80"
                                                     class="img-thumbnail shadow-sm">
                                            @else
                                                <span class="text-muted">Tidak ada</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('operator.ekskul.edit', $item->id_ekskul) }}"
                                                   class="btn btn-sm btn-warning btn-action text-white"
                                                   data-bs-toggle="tooltip" title="Edit">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <form action="{{ route('operator.ekskul.destroy', $item->id_ekskul) }}" method="post"
                                                      onsubmit="return confirm('Yakin ingin menghapus data ekskul ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="btn btn-sm btn-danger btn-action"
                                                            data-bs-toggle="tooltip" title="Hapus">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-3">
                                            <i class="fa-solid fa-circle-info"></i> Belum ada data ekskul
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Footer -->
                <div class="card-footer text-center bg-light">
                    <small class="text-muted">Total Esktrakulikuler: {{ count($ekskul) }}</small>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
