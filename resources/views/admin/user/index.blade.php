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
        <div class="header-section">
            <h5>
                <i class="fa-solid fa-users me-2"></i> Manajemen User
            </h5>
        </div>

        <div class="content-section">
            <div class="search-section">
                <form method="GET" action="{{ route('admin.user') }}" class="d-flex">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama, username, atau email..." value="{{ request('search') }}">
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
                            <th>Nama</th>
                            <th class="d-none d-md-table-cell">Username</th>
                            <th class="d-none d-md-table-cell">Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-semibold">{{ $item->name }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->username }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->email }}</td>
                                <td>
                                    <span class="badge {{ $item->role == 'admin' ? 'bg-primary text-white' : 'bg-success text-white' }}">
                                        {{ ucfirst($item->role) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.user.edit',  Crypt::encrypt($item->id_user)) }}"
                                           class="btn btn-sm btn-warning text-white btn-action">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('admin.user.destroy',  Crypt::encrypt($item->id_user)) }}"
                                              method="POST" onsubmit="return confirm('Hapus user ini?')" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger btn-action">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="footer-section">
            <small class="text-muted">Total User: {{ count($users) }}</small>
        </div>
    </div>
</div>



@endsection
