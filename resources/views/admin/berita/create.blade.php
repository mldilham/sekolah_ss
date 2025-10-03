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

    .form-control:focus, .form-select:focus {
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
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
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
                        <i class="fa-solid fa-image me-2"></i> Tambah Data Berita
                    </h5>
                    <a href="{{ route('admin.berita') }}" class="btn btn-light btn-sm fw-semibold shadow-sm">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <!-- Body -->
                <div class="card-body">
                    {{-- Menampilkan semua error di atas form --}}

                    <form action="{{ route('admin.berita.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="judul" id="judul"
                                   value="{{ old('judul') }}"
                                   class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="isi" class="form-label">Isi</label>
                            <textarea name="isi" id="isi" rows="3"
                                      class="form-control" required>{{ old('isi') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal"
                                   value="{{ old('tanggal') }}"
                                   class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" name="gambar" id="gambar"
                                   class="form-control">
                            <small class="text-muted">
                                Format diperbolehkan: <span class="text-danger">JPG, JPEG, PNG, MP4</span> (maks. 5MB)
                            </small>
                        </div>


                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary btn-action">
                                <i class="fa-solid fa-save"></i> Simpan
                            </button>
                            <a href="{{ route('admin.berita') }}" class="btn btn-danger btn-action">
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
