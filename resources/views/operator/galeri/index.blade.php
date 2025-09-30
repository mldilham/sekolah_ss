@extends('operator.layouts.app')
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

    .header-section h5 {
        font-size: 18px;
        margin: 0;
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
        <div class="header-section d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">
                <i class="fa-solid fa-images me-2"></i> Data Galeri
            </h5>
            <a href="{{ route('operator.galeri.create') }}" class="btn btn-light btn-sm fw-semibold shadow-sm">
                <i class="fa-solid fa-plus"></i> Tambah Galeri
            </a>
        </div>

        <div class="content-section">
            <div class="table-responsive">
                <table id="galeriTable" class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Keterangan</th>
                            <th>Kategori</th>
                            <th>File</th>
                            <th>Tanggal</th>
                            <th width="120px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($galeri as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $item->judul }}</td>
                                <td>{{ Str::limit(strip_tags($item->keterangan), 120) }}</td>
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
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('operator.galeri.edit', Crypt::encrypt($item->id_galeri)) }}"
                                           class="btn btn-sm btn-warning btn-action text-white"
                                           data-bs-toggle="tooltip" title="Edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('operator.galeri.destroy', Crypt::encrypt($item->id_galeri)) }}" method="post"
                                              onsubmit="return confirm('Yakin ingin menghapus data galeri ini?')">
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
                                    <i class="fa-solid fa-circle-info"></i> Belum ada data galeri
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="footer-section text-center">
            <small class="text-muted">Total Galeri: {{ count($galeri) }}</small>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#galeriTable').DataTable({
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
