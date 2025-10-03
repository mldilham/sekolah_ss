@extends('admin.layouts.app')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0 rounded-3">
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
            <!-- Header -->
            <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                <h5 class="mb-0 fw-bold">
                    <i class="fa-solid fa-user-plus me-2"></i> Tambah Data Guru
                </h5>
                <a href="{{ route('admin.guru') }}" class="btn btn-light btn-sm fw-semibold">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </div>

            <!-- Body -->
            <div class="card-body">
                <form action="{{ route('admin.guru.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" name="name" id="name"
                               class="form-control" placeholder="Masukkan nama guru" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" id="email"
                               class="form-control" placeholder="contoh@email.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" name="password" id="password"
                               class="form-control" placeholder="Masukkan password" required>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-primary fw-semibold">
                            <i class="fa-solid fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('admin.guru') }}" class="btn btn-danger fw-semibold">
                            <i class="fa-solid fa-xmark"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
