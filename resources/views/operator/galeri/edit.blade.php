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
                        <i class="fa-solid fa-photo-film me-2"></i> Edit Data Galeri
                    </h5>
                    <a href="{{ route('operator.galeri') }}" class="btn btn-light btn-sm fw-semibold shadow-sm">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <!-- Body -->
                <div class="card-body">
                    <form action="{{ route('operator.galeri.update', Crypt::encrypt($galeri->id_galeri)) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Judul -->
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="judul" id="judul"
                                   value="{{ old('judul', $galeri->judul) }}"
                                   class="form-control" required>
                        </div>

                        <!-- Keterangan -->
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="3"
                                      class="form-control">{{ old('keterangan', $galeri->keterangan) }}</textarea>
                        </div>

                        <!-- Kategori -->
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control" required>
                                <option value="foto" {{ $galeri->kategori == 'foto' ? 'selected' : '' }}>Foto</option>
                                <option value="video" {{ $galeri->kategori == 'video' ? 'selected' : '' }}>Video</option>
                            </select>
                        </div>

                        <!-- Preview File Lama -->
                        <div class="mb-3">
                            <label class="form-label">File Sebelumnya</label><br>
                            @if ($galeri->kategori == 'foto')
                                <img src="{{ asset('uploads/file/'.$galeri->file) }}"
                                     alt="{{ $galeri->judul }}"
                                     class="img-thumbnail mb-2" width="150">
                            @elseif ($galeri->kategori == 'video')
                                <video width="200" controls>
                                    <source src="{{ asset('uploads/file/'.$galeri->file) }}" type="video/mp4">
                                    Browser Anda tidak mendukung video.
                                </video>
                            @else
                                <p class="text-muted">Belum ada file</p>
                            @endif
                        </div>

                        <!-- Upload File Baru -->
                        <div class="mb-3">
                            <label for="file" class="form-label">Ganti File (Opsional)</label>
                            <input type="file" name="file" id="file" class="form-control">
                            <div class="d-flex justify-content-between mt-2">
                                <small class="text-muted">Kosongkan jika tidak ingin mengganti file</small>
                                <small class="text-muted">
                                    Format diperbolehkan:
                                    <span class="text-danger">JPG, JPEG, PNG, MP4</span> (maks. 20MB)
                                </small>
                            </div>
                        </div>

                        <!-- Tanggal -->
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal"
                                   value="{{ old('tanggal', $galeri->tanggal) }}"
                                   class="form-control" required>
                        </div>

                        <!-- Tombol -->
                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-success btn-action">
                                <i class="fa-solid fa-save"></i> Update
                            </button>
                            <a href="{{ route('operator.galeri') }}" class="btn btn-danger btn-action">
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
