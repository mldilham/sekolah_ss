@extends('operator.layouts.app')
@section('title', 'SISWA - ' . ($profile->nama_sekolah ?? 'SMAN 1 CIAWI'))
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
                <i class="fa-solid fa-user-graduate me-2"></i> Data Siswa
            </h5>
            <a href="{{ route('operator.siswa.create') }}" class="btn btn-light btn-sm">
                <i class="fa-solid fa-plus"></i> Tambah Siswa
            </a>
        </div>

        <div class="content-section">
            <div class="search-section">
                <form method="GET" action="{{ route('operator.siswa') }}" class="d-flex">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama siswa atau NISN..." value="{{ request('search') }}">
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
                            <th class="d-none d-md-table-cell">NISN</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th class="d-none d-md-table-cell">Tahun Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswa as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->nisn }}</td>
                                <td class="fw-semibold">{{ $item->nama_siswa }}</td>
                                <td>
                                    <span class="badge {{ $item->jenis_kelamin == 'Laki-laki' ? 'bg-primary text-white' : 'bg-danger text-white' }}">
                                        {{ $item->jenis_kelamin }}
                                    </span>
                                </td>
                                <td class="d-none d-md-table-cell">{{ $item->tahun_masuk }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('operator.siswa.edit', Crypt::encrypt($item->id_siswa)) }}"
                                           class="btn btn-sm btn-warning text-white btn-action"
                                           data-bs-toggle="tooltip" title="Edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('operator.siswa.destroy', Crypt::encrypt($item->id_siswa)) }}" method="post"
                                              onsubmit="return confirm('Yakin ingin menghapus?')" class="d-inline">
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
                                <td colspan="6" class="text-center text-muted py-3">
                                    <i class="fa-solid fa-circle-info"></i> Belum ada data siswa
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="footer-section">
            <small class="text-muted">Total Siswa: {{ count($siswa) }}</small>
        </div>
    </div>
</div>
@endsection
