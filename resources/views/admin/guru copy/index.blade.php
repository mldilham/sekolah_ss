@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <h3>Data Galeri</h3>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary mb-3">Tambah Galeri</a>
        <table class="table table-striped table-hover table-bordered align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Keterangan</th>
                    <th>Kategori</th>
                    <th>File</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection
