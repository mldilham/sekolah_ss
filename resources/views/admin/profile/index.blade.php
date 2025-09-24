@extends('admin.layouts.app')

@section('title', 'Profil Sekolah')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Profil Sekolah</h1>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            @if($profile)
                <div class="row">
                    <div class="col-md-3 text-center">
                        <h6>Logo</h6>
                        @if($profile->logo)
                            <img src="{{ asset('uploads/profile/'.$profile->logo) }}"
                                 alt="Logo" class="img-fluid mb-3"
                                 style="max-height:120px;">
                        @else
                            <p class="text-muted">Belum ada logo</p>
                        @endif

                        <h6>Foto Sekolah</h6>
                        @if($profile->foto)
                            <img src="{{ asset('uploads/profile/'.$profile->foto) }}"
                                 alt="Foto Sekolah" class="img-fluid mb-3"
                                 style="max-height:120px;">
                        @else
                            <p class="text-muted">Belum ada foto</p>
                        @endif
                    </div>
                    <div class="col-md-9">
                        <table class="table table-borderless">
                            <tr>
                                <th>Nama Sekolah</th>
                                <td>{{ $profile->nama_sekolah }}</td>
                            </tr>
                            <tr>
                                <th>Kepala Sekolah</th>
                                <td>{{ $profile->kepala_sekolah }}</td>
                            </tr>
                            <tr>
                                <th>NPSN</th>
                                <td>{{ $profile->npsn }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Berdiri</th>
                                <td>{{ $profile->tahun_berdiri }}</td>
                            </tr>
                            <tr>
                                <th>Kontak</th>
                                <td>{{ $profile->kontak }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $profile->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Visi & Misi</th>
                                <td>{{ $profile->visi_misi }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{{ $profile->deskripsi }}</td>
                            </tr>
                        </table>

                        <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary">Edit Profil</a>
                    </div>
                </div>
            @else
                <p class="text-muted">Profil sekolah belum diisi.</p>
                <a href="{{ route('admin.profile') }}" class="btn btn-success">Tambah Profil</a>
            @endif
        </div>
    </div>
</div>
@endsection
