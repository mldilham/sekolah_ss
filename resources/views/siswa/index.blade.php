@extends('admin.layouts.app')
@section('content')
    <div class="">
        <h1>Data Siswa</h1>
        <a href="">Tambah Data</a>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table>
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
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
