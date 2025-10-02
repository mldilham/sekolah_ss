@extends('admin.layouts.app')
@section('content')

<style>
    .page-wrapper {
        padding: 25px;
    }

    .page-content {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        border: none;
    }

    .header-section {
        background: linear-gradient(135deg, #4e73df, #224abe);
        padding: 18px 25px;
        color: white;
        border: none;
    }

    .header-section h5 {
        font-size: 18px;
        margin: 0;
        font-weight: 600;
    }

    .content-section {
        padding: 20px 25px;
    }

    .search-section {
        margin-bottom: 20px;
    }

    .search-section .form-control {
        border-radius: 8px 0 0 8px;
        border-right: none;
    }

    .search-section .btn {
        border-radius: 0 8px 8px 0;
        border-left: none;
    }

    .table-responsive {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .table thead th {
        background-color: #f8f9fc;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 13px;
        border: none;
        padding: 12px 15px;
    }

    .table tbody td {
        padding: 12px 15px;
        border: none;
        vertical-align: middle;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f5ff;
        transition: 0.2s ease-in-out;
    }

    .btn-action {
        border-radius: 6px;
        transition: 0.3s;
    }

    .btn-action:hover {
        transform: scale(1.05);
    }

    .footer-section {
        padding: 15px 25px;
        background: #f8f9fa;
        border-top: 1px solid #e9ecef;
        text-align: center;
    }

    .badge {
        font-size: 11px;
        padding: 5px 10px;
        border-radius: 20px;
    }

    .img-thumbnail {
        border-radius: 8px;
        object-fit: cover;
    }

    .rounded {
        border-radius: 8px !important;
    }

    @media (max-width: 768px) {
        .page-wrapper {
            padding: 15px;
        }

        .header-section {
            padding: 15px 20px;
        }

        .header-section h5 {
            font-size: 16px;
        }

        .content-section {
            padding: 15px 20px;
        }

        .footer-section {
            padding: 12px 20px;
        }

        .table-responsive {
            font-size: 0.9em;
        }

        .btn-action {
            padding: 6px 10px;
            font-size: 12px;
        }
    }

    @media (max-width: 576px) {
        .page-wrapper {
            padding: 10px;
        }

        .header-section {
            padding: 12px 15px;
        }

        .content-section {
            padding: 12px 15px;
        }

        .footer-section {
            padding: 10px 15px;
        }

        .table thead th, .table tbody td {
            padding: 8px 10px;
            font-size: 12px;
        }

        .btn-action {
            padding: 4px 8px;
            font-size: 11px;
        }
    }
</style>

<div class="page-wrapper">
    <div class="page-content">
        <div class="header-section d-flex justify-content-between align-items-center">
            <h5>
                <i class="fa-solid fa-images me-2"></i> Data Galeri
            </h5>
            <a href="{{ route('admin.galeri.create') }}" class="btn btn-light btn-sm">
                <i class="fa-solid fa-plus"></i> Tambah Galeri
            </a>
        </div>

        <div class="content-section">
            <div class="search-section">
                <form method="GET" action="{{ route('admin.galeri') }}" class="d-flex">
                    <input type="text" name="search" class="form-control" placeholder="Cari judul galeri..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-outline-secondary">
                        <i class="fa-solid fa-search"></i>
                    </button>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th class="d-none d-md-table-cell">Keterangan</th>
                            <th>Kategori</th>
                            <th class="d-none d-md-table-cell">File</th>
                            <th class="d-none d-md-table-cell">Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($galeri as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $item->judul }}</td>
                                <td class="d-none d-md-table-cell">{{ Str::limit(strip_tags($item->keterangan), 80) }}</td>
                                <td>
                                    <span class="badge {{ $item->kategori == 'foto' ? 'bg-success text-white' : 'bg-info text-white' }}">
                                        {{ ucfirst($item->kategori) }}
                                    </span>
                                </td>
                                <td class="d-none d-md-table-cell">
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
                                <td class="d-none d-md-table-cell">{{ $item->tanggal }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.galeri.edit', Crypt::encrypt($item->id_galeri)) }}" class="btn btn-warning btn-sm text-white btn-action">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <form action="{{ route('admin.galeri.destroy', Crypt::encrypt($item->id_galeri)) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-action" onclick="return confirm('Hapus data ini?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-3">
                                    <i class="fa-solid fa-circle-info"></i> Belum ada data galeri
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="footer-section">
            <small class="text-muted">Total Galeri: {{ count($galeri) }}</small>
        </div>
    </div>
</div>
@endsection
