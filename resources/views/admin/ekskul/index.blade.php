@extends('admin.layouts.app')
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<style>
    .page-wrapper {
        padding: 25px;
    }

    .page-content {
        border: none;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }

    .header-section {
        background: linear-gradient(135deg, #4e73df, #224abe);
        padding: 18px 25px;
        border: none;
        color: white;
    }

    .content-section {
        padding: 15px 20px;
        background: white;
    }

    table thead th {
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

    .footer-section {
        padding: 12px 15px;
        background: #f8f9fa;
    }
</style>

<div class="page-wrapper">
    <div class="page-content">
        <div class="header-section d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
            <h5 class="mb-3 mb-md-0 fw-bold">
                <i class="fa-solid fa-images me-2"></i> Data Ekstrakulikuler
            </h5>
            <a href="{{ route('admin.ekskul.create') }}" class="btn btn-light btn-sm fw-semibold shadow-sm">
                <i class="fa-solid fa-plus"></i> Tambah Ekskul
            </a>
        </div>

        <div class="content-section">
            <div class="table-responsive">
                <table id="ekskulTable" class="table table-hover align-middle">
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
                                <td>{{ Str::limit(strip_tags($item->deskripsi), 50) }}</td>
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
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.ekskul.edit', Crypt::encrypt($item->id_ekskul)) }}"
                                                   class="btn btn-sm btn-warning btn-action text-white"
                                                   data-bs-toggle="tooltip" title="Edit">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <form action="{{ route('admin.ekskul.destroy', Crypt::encrypt($item->id_ekskul)) }}" method="post"
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

        <div class="footer-section text-center">
            <small class="text-muted">Total Ekstrakulikuler: {{ count($ekskul) }}</small>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#ekskulTable').DataTable({
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
