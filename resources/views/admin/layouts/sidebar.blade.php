@php
    $menus = [
        'admin' => [
            (object) ['title' => 'Dashboard', 'path' => 'admin.dashboard', 'icon' => 'fa-solid fa-gauge'],
            (object) ['title' => 'Siswa', 'path' => 'admin.siswa', 'icon' => 'fa-solid fa-user-graduate'],
            (object) ['title' => 'Guru', 'path' => 'admin.guru', 'icon' => 'fa-solid fa-user-tie'],
        ],
        'operator' => [
            (object) ['title' => 'Dashboard', 'path' => 'operator.dashboard', 'icon' => 'fa-solid fa-gauge'],
            (object) ['title' => 'Siswa', 'path' => 'operator.siswa', 'icon' => 'fa-solid fa-user-graduate'],
        ],
    ];

    $role = auth()->user()->role ?? 'siswa';
@endphp

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

<ul class="navbar-nav sidebar sidebar-dark accordion">

    <a class="sidebar-brand d-flex align-items-center justify-content-center py-4" href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-solid fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">KitaSchool</div>
    </a>

    <hr class="sidebar-divider my-0 border-light">

    @auth
        @foreach($menus[$role] ?? [] as $menu)
            <li class="nav-item {{ request()->routeIs($menu->path) ? 'active' : '' }}">
                <a href="{{ route($menu->path) }}" class="nav-link d-flex align-items-center px-4 py-3">
                    <i class="{{ $menu->icon }} me-3"></i>
                    <span>{{ $menu->title }}</span>
                </a>
            </li>
        @endforeach

        <hr class="sidebar-divider mt-3 border-light">

        <li class="nav-item px-4">
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger w-100 py-2 rounded">
                    <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                </button>
            </form>
        </li>
    @endauth
</ul>

<style>
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: 220px;
        padding-top: 1rem;
        background: linear-gradient(180deg, #4e73df 0%, #224abe 100%);
        font-family: 'Poppins', sans-serif;
        overflow-y: auto;
        z-index: 1030;
    }

    .sidebar .nav-item .nav-link {
        color: rgba(255, 255, 255, 0.9);
        font-weight: 500;
        transition: all 0.3s;
        border-radius: 0.5rem;
        margin: 0.25rem 0;
    }

    .sidebar .nav-item .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.15);
        color: #fff;
        transform: translateX(5px);
    }

    .sidebar .nav-item.active .nav-link {
        background-color: rgba(255, 255, 255, 0.25);
        color: #fff;
        font-weight: 600;
    }

    .sidebar .sidebar-brand-icon i {
        font-size: 1.8rem;
        color: #fff;
    }

    .sidebar .sidebar-brand-text {
        font-size: 1.2rem;
        font-weight: 700;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
</style>
