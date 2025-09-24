@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('hero')
<section class="hero">
    <h1>{{ $profile->nama_sekolah }}</h1>
    <p class="lead">Profil Lengkap Sekolah</p>
</section>
@endsection

@section('content')
<div class="container py-5">

    {{-- Tentang Sekolah --}}
    <div class="row align-items-center mb-5">
        <div class="col-md-5">
            <img src="{{ $profile->foto asset('uploads/profile/'.$profile->foto)}}"
                 class="img-fluid rounded shadow"
                 alt="Foto Sekolah">
        </div>
        <div class="col-md-7">
            <h2>Tentang Kami</h2>
            <p class="text-muted">{{ $profile->deskripsi }}</p>
        </div>
    </div>

    {{-- Visi & Misi --}}
    <div class="row mb-5">
        <div class="col-md-6">
            <h3>Visi</h3>
            <blockquote class="blockquote">
                <p>{{ $profile->visi_misi }}</p>
            </blockquote>
        </div>
        {{-- <div class="col-md-6">
            <h3>Misi</h3>
            <ul>
                @foreach(explode("\n", $profile->visi_misi) as $misi)
                    <li>{{ $misi }}</li>
                @endforeach
            </ul>
        </div> --}}
    </div>

    {{-- Info Kontak --}}
    <div class="card shadow-sm border-0 p-4">
        <h4 class="mb-3">Kontak Kami</h4>
        <p><i class="fa fa-map-marker-alt me-2"></i>{{ $profile->alamat }}</p>
        <p><i class="fa fa-phone me-2"></i>{{ $profile->telepon }}</p>
        <p><i class="fa fa-envelope me-2"></i>{{ $profile->email }}</p>
    </div>

</div>
@endsection
