@extends('operator.layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container my-4">
    <h2 class="mb-4">Dashboard Operator</h2>
    <p>Selamat datang di dashboard operator. Di sini Anda dapat mengelola data sekolah seperti berita, galeri, ekstrakurikuler, dan siswa.</p>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Kelola Berita</h5>
                    <p class="card-text">Tambah, edit, atau hapus berita sekolah.</p>
                    <a href="{{ route('operator.berita') }}" class="btn btn-primary">Lihat Berita</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Kelola Galeri</h5>
                    <p class="card-text">Kelola foto dan video galeri sekolah.</p>
                    <a href="{{ route('operator.galeri') }}" class="btn btn-primary">Lihat Galeri</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Kelola Ekstrakurikuler</h5>
                    <p class="card-text">Kelola data ekstrakurikuler sekolah.</p>
                    <a href="{{ route('operator.ekskul') }}" class="btn btn-primary">Lihat Ekskul</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
