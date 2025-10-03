@extends('public.layouts.app')
@section('title', 'Layanan Siswa - Sekolah')

@section('content')

<div class="container py-5" style="max-width: 1200px">
    <!-- Header dengan background foto sekolah -->
    <div class="text-center mb-5 position-relative"
         style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset('storage/' . $profile->foto) }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                padding: 180px 20px;
                border-radius: 15px;
                color: white;"
         data-aos="fade-down" data-aos-duration="1000">
        <h2 class="fw-bold text-white">Jumlah Siswa Sekolah Kami</h2>
    </div>

    <!-- Hanya jumlah siswa -->
    <div class="card shadow-sm border-0 text-center" data-aos="fade-up" data-aos-duration="1000">
        <div class="card-body py-5">
            <h3 class="fw-bold mb-2">{{ $siswas->count() }}</h3>
            <p class="text-muted">Total Siswa Terdaftar</p>
        </div>
    </div>
</div>

@endsection
