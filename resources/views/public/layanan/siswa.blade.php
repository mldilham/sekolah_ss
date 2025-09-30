@extends('public.layouts.app')
@section('title', 'Layanan Siswa - Sekolah')

@section('content')

<div class="container py-5" style="max-width: 1200px">
    <!-- Header dengan background foto sekolah -->
    <div class="text-center mb-5 position-relative"
         style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset('uploads/profile/' . $profile->foto) }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                padding: 180px 20px;
                border-radius: 15px;
                color: white;"
         data-aos="fade-down" data-aos-duration="1000">
        <h2 class="fw-bold text-white">Daftar Siswa Sekolah Kami</h2>
    </div>

    <!-- Tabel siswa -->
    <div class="card shadow-sm border-0" data-aos="fade-up" data-aos-duration="1000">
        <div class="card-body">
            <div class="table-responsive">
                <table id="" class="table table-hover align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Tahun Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($siswas as $key => $siswa)
                        <tr data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ $key * 50 }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $siswa->nisn }}</td>
                            <td class="fw-semibold">{{ $siswa->nama_siswa }}</td>
                            <td>
                                <span class="badge {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'bg-primary' : 'bg-danger' }}">
                                    {{ $siswa->jenis_kelamin }}
                                </span>
                            </td>
                            <td>{{ $siswa->tahun_masuk }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3" data-aos="fade-up">
                                Belum ada data siswa.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer -->
        <div class="card-footer text-center bg-light" data-aos="fade-up" data-aos-duration="1000">
            <small class="text-muted">Total Siswa: {{ $siswas->count() }}</small>
        </div>
    </div>
</div>

@endsection
