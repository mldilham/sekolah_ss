@extends('operator.layouts.app')

@section('title', 'Profil Sekolah')

@section('content')

<style>
    .page-wrapper {
        padding: 25px;
    }

    .page-content {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        border: none;
    }

    .header-section {
        background: linear-gradient(135deg, #4e73df, #224abe);
        padding: 18px 25px;
        color: white;
        border: none;
    }

    .header-section h5 {
        font-size: 18px;
        margin: 0;
        font-weight: 600;
    }

    .content-section {
        padding: 20px 25px;
    }

    .footer-section {
        padding: 15px 25px;
        background: #f8f9fa;
        border-top: 1px solid #e9ecef;
        text-align: center;
    }

    .profile-images {
        text-align: center;
        margin-bottom: 20px;
    }

    .profile-images img {
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        margin-bottom: 10px;
    }

    .profile-table {
        background: #f8f9fc;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .profile-table th {
        background-color: #e9ecef;
        font-weight: 600;
        width: 200px;
        padding: 12px 15px;
        border: none;
    }

    .profile-table td {
        padding: 12px 15px;
        border: none;
        vertical-align: middle;
    }

    .btn-action {
        border-radius: 6px;
        transition: 0.3s;
    }

    .btn-action:hover {
        transform: scale(1.05);
    }

    @media (max-width: 768px) {
        .page-wrapper {
            padding: 15px;
        }

        .header-section {
            padding: 15px 20px;
        }

        .header-section h5 {
            font-size: 16px;
        }

        .content-section {
            padding: 15px 20px;
        }

        .footer-section {
            padding: 12px 20px;
        }

        .profile-table th, .profile-table td {
            padding: 8px 10px;
            font-size: 14px;
        }

        .profile-table th {
            width: 150px;
        }
    }

    @media (max-width: 576px) {
        .page-wrapper {
            padding: 10px;
        }

        .header-section {
            padding: 12px 15px;
        }

        .content-section {
            padding: 12px 15px;
        }

        .footer-section {
            padding: 10px 15px;
        }

        .profile-table th, .profile-table td {
            padding: 6px 8px;
            font-size: 12px;
        }

        .profile-table th {
            width: 120px;
        }
    }
</style>

<div class="page-wrapper">
    <div class="page-content">
        <div class="header-section d-flex justify-content-between align-items-center">
            <h5>
                <i class="fa-solid fa-school me-2"></i> Profil Sekolah
            </h5>
            @if($profile)
                <a href="{{ route('operator.profile.edit') }}" class="btn btn-light btn-sm btn-action">
                    <i class="fa-solid fa-edit"></i> Edit Profil
                </a>
            @endif
        </div>

        <div class="content-section">
            @if($profile)
                <div class="row">
                    <div class="col-lg-4 col-md-5 profile-images">
                        <h6 class="text-primary mb-3">Logo Sekolah</h6>
                        @if($profile->logo)
                            <img src="{{ asset('uploads/profile/'.$profile->logo) }}"
                                 alt="Logo" class="img-fluid"
                                 style="max-height:120px;">
                        @else
                            <div class="text-muted p-3 border rounded">
                                <i class="fa-solid fa-image fa-2x"></i>
                                <p class="mb-0 mt-2">Belum ada logo</p>
                            </div>
                        @endif

                        <h6 class="text-primary mb-3 mt-4">Foto Sekolah</h6>
                        @if($profile->foto)
                            <img src="{{ asset('uploads/profile/'.$profile->foto) }}"
                                 alt="Foto Sekolah" class="img-fluid"
                                 style="max-height:120px;">
                        @else
                            <div class="text-muted p-3 border rounded">
                                <i class="fa-solid fa-image fa-2x"></i>
                                <p class="mb-0 mt-2">Belum ada foto</p>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <table class="table table-borderless profile-table">
                            <tr>
                                <th>Nama Sekolah</th>
                                <td>{{ $profile->nama_sekolah }}</td>
                            </tr>
                            <tr>
                                <th>Kepala Sekolah</th>
                                <td>{{ $profile->kepala_sekolah }}</td>
                            </tr>
                            <tr>
                                <th>NPSN</th>
                                <td>{{ $profile->npsn }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Berdiri</th>
                                <td>{{ $profile->tahun_berdiri }}</td>
                            </tr>
                            <tr>
                                <th>Kontak</th>
                                <td>{{ $profile->kontak }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $profile->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Visi & Misi</th>
                                <td>
                                    @if($profile->visi_misi)
                                        <div style="max-height: 100px; overflow-y: auto;">{{ $profile->visi_misi }}</div>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>
                                    @if($profile->deskripsi)
                                        <div style="max-height: 100px; overflow-y: auto;">{{ $profile->deskripsi }}</div>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fa-solid fa-school fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Profil sekolah belum diisi</h5>
                    <p class="text-muted mb-4">Silakan tambahkan informasi profil sekolah untuk melengkapi data.</p>
                    <a href="{{ route('operator.profile.edit') }}" class="btn btn-primary btn-action">
                        <i class="fa-solid fa-plus"></i> Tambah Profil
                    </a>
                </div>
            @endif
        </div>

        <div class="footer-section">
            <small class="text-muted">
                <i class="fa-solid fa-info-circle me-1"></i>
                Informasi profil sekolah terakhir diperbarui pada {{ $profile ? $profile->updated_at->format('d M Y H:i') : 'belum pernah' }}
            </small>
        </div>
    </div>
</div>
@endsection
