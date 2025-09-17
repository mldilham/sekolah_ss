@extends('admin.layouts.app')
@section('content')
    <div class="">
        <h1>Data Siswa</h1>
        <a href="{{ route('admin.siswa.create') }}">Tambah Data</a>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id_siswa</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Jenis Kelamin</th>
                                <th>Tahun Masuk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nisn}}</td>
                                    <td>{{ $item->name}}</td>
                                    <td>{{ $item->jenis_kelamin}}</td>
                                    <td>{{ $item->tahun_masuk}}</td>
                                    <td>
                                        <div class="">
                                            <a href="">Ubah</a>
                                        </div>
                                        <div class="">
                                            <a href="">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
