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
<div class="container-fluid py-3">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card card-custom">
                
                <div class="card-header card-header-custom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">
                        <i class="fa-solid fa-user-plus me-2"></i> Tambah Data Siswa
                    </h5>
                    <a href="{{ route('admin.siswa') }}" class="btn btn-light btn-sm fw-semibold shadow-sm">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <!-- Body -->
                <div class="card-body">
                    <form action="{{ route('admin.siswa.store') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="nisn" class="form-label">NISN</label>
                            <input type="text" name="nisn" id="nisn"
                                   class="form-control @error('nisn') is-invalid @enderror"
                                   placeholder="Masukkan NISN" required>
                            @error('nisn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama_siswa" class="form-label">Nama Siswa Lengkap</label>
                            <input type="text" name="nama_siswa" id="nama_siswa"
                                   class="form-control @error('nama_siswa') is-invalid @enderror"
                                   placeholder="Masukkan nama lengkap siswa" required>
                            @error('nama_siswa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin"
                                    class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                            <input type="number" name="tahun_masuk" id="tahun_masuk"
                                   class="form-control @error('tahun_masuk') is-invalid @enderror"
                                   placeholder="Masukkan tahun masuk" required>
                            @error('tahun_masuk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary btn-action">
                                <i class="fa-solid fa-save"></i> Simpan
                            </button>
                            <a href="{{ route('admin.siswa') }}" class="btn btn-danger btn-action">
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
