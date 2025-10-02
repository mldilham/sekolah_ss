@extends('operator.layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid py-3" style="min-height:100vh; display:flex; flex-direction:column; justify-content:space-between;">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 fw-bold text-gradient">📊 Dashboard Admin</h1>
        <div class="text-muted small">
            Selamat datang, <span class="fw-semibold text-dark">{{ auth()->user()->name }}</span> 👋
        </div>
    </div>

    <!-- Isi Utama -->
    <div class="flex-grow-1 d-flex flex-column">

        <!-- Summary Cards -->
        <div class="row g-4 justify-content-start mb-5">
            @php
                $cards = [
                    ['title' => 'Siswa', 'count' => $siswaCount, 'icon' => 'fa-user-graduate', 'color' => 'primary'],
                    // ['title' => 'Guru', 'count' => $guruCount, 'icon' => 'fa-chalkboard-user', 'color' => 'success'],
                    ['title' => 'Berita', 'count' => $beritaCount, 'icon' => 'fa-newspaper', 'color' => 'info'],
                    ['title' => 'Galeri', 'count' => $galeriCount, 'icon' => 'fa-images', 'color' => 'warning'],
                    ['title' => 'Ekskul', 'count' => $ekskulCount, 'icon' => 'fa-laptop-code', 'color' => 'danger'],
                ];
            @endphp

            @foreach($cards as $card)
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="stat-card text-center shadow-sm rounded-4 p-3">
                    <div class="icon-box soft-{{ $card['color'] }} text-{{ $card['color'] }} mx-auto mb-2">
                        <i class="fas {{ $card['icon'] }}"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-0">{{ $card['count'] }}</h4>
                    <small class="text-muted">{{ $card['title'] }}</small>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Aksi Cepat -->
        <div class="mb-3">
            <h6 class="fw-bold text-secondary border-start border-4 border-warning ps-2">
                ⚡ Aksi Cepat
            </h6>
        </div>
        <div class="row g-4 justify-content-start">
            @php
                $quickActions = [
                    ['title'=>'Siswa','icon'=>'fa-user-graduate','color'=>'primary','route'=>'operator.siswa'],
                    // ['title'=>'Guru','icon'=>'fa-chalkboard-user','color'=>'success','route'=>'operator.guru'],
                    ['title'=>'Berita','icon'=>'fa-newspaper','color'=>'info','route'=>'operator.berita'],
                    ['title'=>'Galeri','icon'=>'fa-images','color'=>'warning','route'=>'operator.galeri'],
                    ['title'=>'Ekskul','icon'=>'fa-laptop-code','color'=>'danger','route'=>'operator.ekskul'],
                ];
            @endphp

            @foreach($quickActions as $act)
            <div class="col-lg-2 col-md-4 col-sm-6">
                <a href="{{ route($act['route']) }}" class="quick-card shadow-sm">
                    <div class="quick-icon soft-{{ $act['color'] }} text-{{ $act['color'] }}">
                        <i class="fas {{ $act['icon'] }}"></i>
                    </div>
                    <span>{{ $act['title'] }}</span>
                </a>
            </div>
            @endforeach
        </div>
    </div>

</div>

<style>
/* Gradient Text */
.text-gradient {
    background: linear-gradient(45deg, #4e73df, #1cc88a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Statistik Card */
.stat-card {
    background: #fff;
    border-radius: 1rem;
    transition: all 0.3s ease;
}
.stat-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.12);
}
.icon-box {
    width: 55px;
    height: 55px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    font-weight: bold;
}

/* Soft Color Backgrounds */
.soft-primary { background: rgba(78,115,223,0.15); }
.soft-success { background: rgba(28,200,138,0.15); }
.soft-info    { background: rgba(54,185,204,0.15); }
.soft-warning { background: rgba(246,194,62,0.15); }
.soft-danger  { background: rgba(231,74,59,0.15); }

/* Quick Actions */
.quick-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border-radius: 1rem;
    background: #fff;
    padding: 1rem;
    text-decoration: none;
    color: #333;
    font-weight: 600;
    transition: all 0.3s ease;
    height: 100%;
}
.quick-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 22px rgba(0,0,0,0.1);
}
.quick-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    margin-bottom: 0.4rem;
}
</style>
@endsection
