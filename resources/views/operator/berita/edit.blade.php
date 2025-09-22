@extends('operator.layouts.app')
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
                    <a href="{{ route('operator.berita') }}" class="btn btn-light btn-sm fw-semibold shadow-sm">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <!-- Body -->
                <div class="card-body">
                    <form action="{{ route('operator.berita.update', $berita->id_berita) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="judul" id="judul"
                                   value="{{ old('judul',$berita->judul) }}"
                                   class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="isi" class="form-label">Isi</label>
                            <input type="text" name="isi" id="isi"
                                   value="{{ old('isi',$berita->isi) }}"
                                   class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="text" name="tanggal" id="tanggal"
                                   value="{{ old('tanggal',$berita->tanggal) }}"
                                   class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gambar Sebelumnya</label><br>
                            @if ($berita->gambar)
                                <img src="{{ asset('uploads/berita/'.$berita->gambar) }}"
                                     alt="Foto {{ $berita->judul }}"
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
                            <a href="{{ route('operator.berita') }}" class="btn btn-danger btn-action">
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
