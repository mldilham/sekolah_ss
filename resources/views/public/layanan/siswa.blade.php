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
        <h2 class="fw-bold text-white">Daftar Siswa Sekolah Kami</h2>
    </div>

    <!-- Hanya jumlah siswa -->
    {{-- <div class="card shadow-sm border-0 text-center" data-aos="fade-up" data-aos-duration="1000">
        <div class="card-body py-5">
            <h3 class="fw-bold mb-2">{{ $siswas->count() }}</h3>
            <p class="text-muted">Total Siswa Terdaftar</p>
        </div>
    </div> --}}
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th class="d-none d-md-table-cell">NISN</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th class="d-none d-md-table-cell">Tahun Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswas as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->nisn }}</td>
                                <td class="fw-semibold">{{ $item->nama_siswa }}</td>
                                <td>
                                    <span class="badge {{ $item->jenis_kelamin == 'Laki-laki' ? 'bg-primary text-white' : 'bg-danger text-white' }}">
                                        {{ $item->jenis_kelamin }}
                                    </span>
                                </td>
                                <td class="d-none d-md-table-cell">{{ $item->tahun_masuk }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-3">
                                    <i class="fa-solid fa-circle-info"></i> Belum ada data siswa
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-4" data-aos="fade-up">
                    {{ $siswas->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

@endsection
