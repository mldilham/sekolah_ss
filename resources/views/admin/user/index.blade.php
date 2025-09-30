@extends('admin.layouts.app')
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<style>
    .page-wrapper {
        padding: 25px;
    }

    .page-content {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .header-section {
        background: linear-gradient(135deg, #4e73df, #224abe);
        border: none;
        color: white;
        padding: 15px 20px;
    }

    .content-section {
        padding: 15px 20px;
        background: white;
    }

    .footer-section {
        padding: 12px 15px;
        background: #f8f9fa;
    }

    .dataTables_wrapper .dataTables_filter input {
        border-radius: 8px;
        padding: 6px 12px;
        border: 1px solid #d1d3e2;
    }

    .dataTables_wrapper .dataTables_length select {
        border-radius: 6px;
        padding: 4px 8px;
        border: 1px solid #d1d3e2;
    }

    th {
        font-size: 14px;
        text-transform: uppercase;
    }

    td {
        font-size: 14px;
    }

    .btn-action {
        transition: 0.2s;
    }

    .btn-action:hover {
        transform: scale(1.1);
    }
</style>

<div class="page-wrapper">
    <div class="page-content">
        <div class="header-section d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
            <h5 class="mb-3 mb-md-0">
                <i class="fa-solid fa-users me-2"></i> Manajemen User
            </h5>
            {{-- <a href="{{ route('admin.user.create') }}" class="btn btn-light btn-sm fw-semibold">
                <i class="fa-solid fa-plus"></i> Tambah User
            </a> --}}
        </div>

        <div class="content-section">
            <div class="table-responsive">
                <table id="userTable" class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr class="">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th width="120px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-semibold">{{ $item->name }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <span class="badge {{ $item->role == 'admin' ? 'bg-primary' : 'bg-success' }}">
                                        {{ ucfirst($item->role) }}
                                    </span>
                                </td>
                                <td class="">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.user.edit',  Crypt::encrypt($item->id_user)) }}"
                                           class="btn btn-sm btn-warning text-white btn-action">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('admin.user.destroy',  Crypt::encrypt($item->id_user)) }}"
                                              method="POST" onsubmit="return confirm('Hapus user ini?')">
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

        <div class="footer-section text-center">
            <small class="text-muted">Total User: {{ count($users) }}</small>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#userTable').DataTable({
            pageLength: 5,
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                zeroRecords: "Tidak ada data yang cocok",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Tidak ada data",
                infoFiltered: "(disaring dari _MAX_ total data)",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "›",
                    previous: "‹"
                }
            }
        });
    });
</script>

@endsection
