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
                <div class="card-header card-header-custom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">
                        <i class="fa-solid fa-user-pen me-2"></i> Edit Data Guru
                    </h5>
                    <a href="{{ route('admin.ekskul') }}" class="btn btn-light btn-sm fw-semibold shadow-sm">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <!-- Body -->
                <div class="card-body">
                    <form action="{{ route('admin.ekskul.update', $ekskul->id_ekskul) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama_ekskul" class="form-label">Nama Ekskul</label>
                            <input type="text" name="nama_ekskul" id="nama_ekskul"
                                   value="{{ old('nama_ekskul',$ekskul->nama_ekskul) }}"
                                   class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="pembina" class="form-label">Pembina</label>
                            <input type="text" name="pembina" id="pembina"
                                   value="{{ old('pembina',$ekskul->pembina) }}"
                                   class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="jadwal_latihan" class="form-label">Jadwal_latihan</label>
                            <input type="text" name="jadwal_latihan" id="jadwal_latihan"
                                   value="{{ old('jadwal_latihan',$ekskul->jadwal_latihan) }}"
                                   class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea  name="deskripsi" id="deskripsi"
                                   value="{{ old('deskripsi') }}"
                                   class="form-control" required>
                            </textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gambar Sebelumnya</label><br>
                            @if ($ekskul->gambar)
                                <img src="{{ asset('uploads/ekskul/'.$ekskul->gambar) }}"
                                     alt="Foto {{ $ekskul->judul }}"
                                     class="img-thumbnail mb-2" width="120">
                            @else
                                <p class="text-muted">Belum ada gambar</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Ganti Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control">
                            <div class="d-flex justify-content-between mt-2">
                                <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
                                <small class="text-muted">
                                    Format diperbolehkan: <span class="text-danger">JPG, JPEG, PNG</span> (maks. 2MB)
                                </small>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary btn-action">
                                <i class="fa-solid fa-save"></i> Simpan
                            </button>
                            <a href="{{ route('admin.ekskul') }}" class="btn btn-danger btn-action">
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
