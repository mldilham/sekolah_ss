@extends('operator.layouts.app')
@section('title', 'Dashboard')
@section('content')

<style>
    .dashboard-container {
        padding: 30px 15px;
    }

    .dashboard-header h2 {
        font-weight: 700;
        color: #2c3e50;
    }

    .dashboard-header p {
        color: #6c757d;
        font-size: 15px;
    }

    .dashboard-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.12);
    }

    .dashboard-card .card-body {
        padding: 25px;
        text-align: center;
    }

    .dashboard-card .card-title {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 12px;
        color: #34495e;
    }

    .dashboard-card .card-text {
        font-size: 14px;
        color: #6c757d;
        margin-bottom: 20px;
    }

    .dashboard-card .btn-primary {
        background: linear-gradient(135deg, #4e73df, #224abe);
        border: none;
        border-radius: 50px;
        padding: 8px 20px;
        transition: background 0.3s, transform 0.3s;
    }

    .dashboard-card .btn-primary:hover {
        background: linear-gradient(135deg, #224abe, #4e73df);
        transform: scale(1.05);
    }

    @media (max-width: 767px) {
        .dashboard-card .card-body {
            padding: 20px;
        }

        .dashboard-card .card-title {
            font-size: 18px;
        }

        .dashboard-card .card-text {
            font-size: 13px;
        }
    }
</style>

<div class="dashboard-container">
    <div class="dashboard-header mb-4">
        <h2>Dashboard Operator</h2>
        <p>Selamat datang di dashboard operator. Di sini Anda dapat mengelola data sekolah seperti berita, galeri, ekstrakurikuler, dan siswa.</p>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <h5 class="card-title">Kelola Berita</h5>
                    <p class="card-text">Tambah, edit, atau hapus berita sekolah.</p>
                    <a href="{{ route('operator.berita') }}" class="btn btn-primary">Lihat Berita</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <h5 class="card-title">Kelola Galeri</h5>
                    <p class="card-text">Kelola foto dan video galeri sekolah.</p>
                    <a href="{{ route('operator.galeri') }}" class="btn btn-primary">Lihat Galeri</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card dashboard-card">
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
