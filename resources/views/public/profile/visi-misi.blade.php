@extends('public.layouts.app')

@section('title', 'Visi Misi - ' . ($profile->nama_sekolah ?? 'Sekolah'))

@section('content')
<div class="container py-5">
    @if($profile)
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-5">
                <div class="card-header bg-success text-white text-center py-4 position-relative overflow-hidden">
                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-gradient" style="background: linear-gradient(135deg, rgba(40,167,69,0.1) 0%, rgba(40,167,69,0.05) 100%);"></div>
                    <h2 class="mb-0 fw-bold position-relative">{{ $profile->nama_sekolah }}</h2>
                    <p class="mb-0 opacity-75 position-relative">Visi & Misi Pendidikan</p>
                    <div class="position-absolute bottom-0 end-0 p-3">
                        <i class="fas fa-eye fa-2x opacity-50"></i>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="row g-0">
                        <!-- Sidebar dengan Logo dan Foto -->
                        <div class="col-md-4 bg-gradient bg-success-subtle d-flex flex-column align-items-center justify-content-center p-4">
                            <div class="text-center mb-4">
                                <h5 class="text-success fw-bold mb-3">Logo Sekolah</h5>
                                @if($profile->logo)
                                    <img src="{{ asset('uploads/profile/'.$profile->logo) }}" alt="Logo Sekolah" class="img-fluid rounded-circle mb-3 shadow-sm" style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #28a745;">
                                @else
                                    <div class="bg-white rounded-circle d-flex align-items-center justify-content-center mb-3 border border-success" style="width: 120px; height: 120px;">
                                        <i class="fas fa-school fa-3x text-success"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="text-center">
                                <h5 class="text-success fw-bold mb-3">Foto Sekolah</h5>
                                @if($profile->foto)
                                    <img src="{{ asset('uploads/profile/'.$profile->foto) }}" alt="Foto Sekolah" class="img-fluid rounded shadow-sm border border-success" style="max-height: 200px; width: 100%; object-fit: cover;">
                                @else
                                    <div class="bg-white rounded d-flex align-items-center justify-content-center border border-success" style="height: 200px; width: 100%;">
                                        <i class="fas fa-building fa-4x text-success"></i>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Bagian Visi Misi dengan Timeline Style -->
                        <div class="col-md-8 p-5 bg-light">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="text-success fw-bold mb-4"><i class="fas fa-target me-2"></i>Visi & Misi Sekolah</h4>
                                    <div class="timeline">
                                        <div class="timeline-item">
                                            <div class="timeline-content">
                                                <div class="d-flex align-items-start mb-4">
                                                    <div class="timeline-icon bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                        <i class="fas fa-eye"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fw-bold text-success mb-2">Visi</h5>
                                                        <p class="text-justify mb-0" style="line-height: 1.8;">{{ $profile->visi_misi ?? 'Belum diisi' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-item">
                                            <div class="timeline-content">
                                                <div class="d-flex align-items-start">
                                                    <div class="timeline-icon bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                        <i class="fas fa-bullseye"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fw-bold text-success mb-2">Misi</h5>
                                                        <p class="text-justify mb-0" style="line-height: 1.8;">{{ $profile->visi_misi ?? 'Belum diisi' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="text-center py-5">
            <i class="fas fa-exclamation-triangle fa-3x text-muted mb-3"></i>
            <p class="text-muted">Visi misi sekolah belum diisi.</p>
        </div>
    @endif
</div>

<style>
.timeline {
    position: relative;
    padding-left: 20px;
}
.timeline::before {
    content: '';
    position: absolute;
    left: 10px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(to bottom, #28a745, #198754);
}
.timeline-item {
    position: relative;
    margin-bottom: 20px;
}
.timeline-content {
    padding: 10px 0;
}
</style>
@endsection
