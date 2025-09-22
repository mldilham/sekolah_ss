@extends('admin.layouts.app')

@section('content')

<style>
    .card-custom {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .card-header-custom {
        background: linear-gradient(135deg, #4e73df, #224abe);
        color: white;
        padding: 15px 20px;
    }

    .form-label {
        font-weight: 600;
    }

    .form-control:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.2rem rgba(78,115,223,0.25);
    }

    .btn-action {
        border-radius: 8px;
        transition: 0.3s;
    }

    .btn-action:hover {
        transform: scale(1.05);
    }
</style>

<div class="container-fluid py-3">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card card-custom">

                <!-- Card Header -->
                <div class="card-header card-header-custom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">
                        <i class="fa-solid fa-user-pen me-2"></i> Edit Profil Sekolah
                    </h5>
                    <a href="{{ route('admin.profile') }}" class="btn btn-light btn-sm fw-semibold shadow-sm">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <!-- Card Body -->
                <div class="card-body">

                    <form action="{{ route('admin.profile.update', $profile->id_profile) }}"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nama Sekolah -->
                        <div class="mb-3">
                            <label class="form-label">Nama Sekolah</label>
                            <input type="text" name="nama_sekolah" class="form-control"
                                   value="{{ old('nama_sekolah', $profile->nama_sekolah) }}" required>
                        </div>

                        <!-- Kepala Sekolah -->
                        <div class="mb-3">
                            <label class="form-label">Kepala Sekolah</label>
                            <input type="text" name="kepala_sekolah" class="form-control"
                                   value="{{ old('kepala_sekolah', $profile->kepala_sekolah) }}" required>
                        </div>


                        <div class="mb-3">
                            @if ($profile->logo)
                                <label for="form-label">Logo sebelumnya</label><br>
                                <img src="{{ asset('uploads/profile/'. $profile->logo) }}"
                                     alt="Logo {{ $profile->nama_sekolah }}"
                                     class="img-thumbnail shadow-sm" width="120">
                            @else
                                <p class="text-muted">Belum ada logo</p>
                            @endif
                        </div>
                        <!-- Logo -->
                        <div class="mb-3">
                            <label class="form-label">Logo Sekolah</label>
                            <input type="file" name="logo" class="form-control">
                            <small class="text-muted">Kosongkan jika tidak ingin mengganti</small>
                        </div>


                        <div class="mb-3">
                            @if ($profile->foto)
                                <label for="form-label">Foto sebelumnya</label><br>
                                <img src="{{ asset('uploads/profile/'.$profile->foto) }}"
                                     alt="Foto {{ $profile->nama_sekolah }}"
                                     class="img-thumbnail shadow-sm" width="120">
                            @else
                                <p class="text-muted">Belum ada foto</p>
                            @endif
                        </div>
                        <!-- Foto Kepala Sekolah -->
                        <div class="mb-3">
                            <label class="form-label">Foto Kepala Sekolah</label>
                            <input type="file" name="foto" class="form-control">
                            <small class="text-muted">Kosongkan jika tidak ingin mengganti</small>
                        </div>

                        <!-- NPSN -->
                        <div class="mb-3">
                            <label class="form-label">NPSN</label>
                            <input type="text" name="npsn" class="form-control"
                                   value="{{ old('npsn', $profile->npsn) }}">
                        </div>

                        <!-- Alamat -->
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="2">{{ old('alamat', $profile->alamat) }}</textarea>
                        </div>

                        <!-- Kontak -->
                        <div class="mb-3">
                            <label class="form-label">Kontak</label>
                            <input type="text" name="kontak" class="form-control"
                                   value="{{ old('kontak', $profile->kontak) }}">
                        </div>

                        <!-- Visi & Misi -->
                        <div class="mb-3">
                            <label class="form-label">Visi & Misi</label>
                            <textarea name="visi_misi" class="form-control" rows="3">{{ old('visi_misi', $profile->visi_misi) }}</textarea>
                        </div>

                        <!-- Tahun Berdiri -->
                        <div class="mb-3">
                            <label class="form-label">Tahun Berdiri</label>
                            <input type="number" name="tahun_berdiri" class="form-control"
                                   value="{{ old('tahun_berdiri', $profile->tahun_berdiri) }}">
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $profile->deskripsi) }}</textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary btn-action">
                                <i class="fa-solid fa-save"></i> Simpan
                            </button>
                            <a href="{{ route('admin.profile') }}" class="btn btn-danger btn-action">
                                <i class="fa-solid fa-xmark"></i> Batal
                            </a>
                        </div>
                    </form>

                </div>
                <!-- End Card Body -->

            </div>
        </div>
    </div>
</div>

@endsection
