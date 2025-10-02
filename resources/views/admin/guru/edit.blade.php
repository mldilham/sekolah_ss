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
                <!-- Header -->
                @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>Terjadi kesalahan:</strong>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <div class="card-header card-header-custom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">
                        <i class="fa-solid fa-user-pen me-2"></i> Edit Data Guru
                    </h5>
                    <a href="{{ route('admin.guru') }}" class="btn btn-light btn-sm fw-semibold shadow-sm">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <!-- Body -->
                <div class="card-body">
                    <form action="{{ route('admin.guru.update', Crypt::encrypt($guru->id_guru)) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama_guru" class="form-label">Nama Guru</label>
                            <input type="text" name="nama_guru" id="nama_guru"
                                   value="{{ old('nama_guru',$guru->nama_guru) }}"
                                   class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text" name="nip" id="nip"
                                   value="{{ old('nip',$guru->nip) }}"
                                   class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="mapel" class="form-label">Mata Pelajaran</label>
                            <input type="text" name="mapel" id="mapel"
                                   value="{{ old('mapel',$guru->mapel) }}"
                                   class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto Sebelumnya</label><br>
                            @if ($guru->foto)
                                <img src="{{ asset('storage/'.$guru->foto) }}"
                                     alt="Foto {{ $guru->nama_guru }}"
                                     class="img-thumbnail mb-2" width="120">
                            @else
                                <p class="text-muted">Belum ada foto</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Ganti Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                            <div class="d-flex justify-content-between mt-2">
                                <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                                <small class="text-muted">
                                    Format diperbolehkan: <span class="text-danger">JPG, JPEG, PNG</span> (maks. 2MB)
                                </small>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary btn-action">
                                <i class="fa-solid fa-save"></i> Simpan
                            </button>
                            <a href="{{ route('admin.guru') }}" class="btn btn-danger btn-action">
                                <i class="fa-solid fa-xmark"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
