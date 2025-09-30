@php
    $menus = [
        'admin' => [
            (object) ['title' => 'Dashboard', 'path' => 'admin.dashboard', 'icon' => 'fa-solid fa-gauge'],
            (object) ['title' => 'User', 'path' => 'admin.user', 'icon' => 'fa-solid fa-user'],
            (object) ['title' => 'Siswa', 'path' => 'admin.siswa', 'icon' => 'fa-solid fa-user-graduate'],
            (object) ['title' => 'Guru', 'path' => 'admin.guru', 'icon' => 'fa-solid fa-chalkboard-user'],
            (object) ['title' => 'Galeri', 'path' => 'admin.galeri', 'icon' => 'fa-regular fa-images'],
            (object) ['title' => 'Berita', 'path' => 'admin.berita', 'icon' => 'fa-regular fa-newspaper'],
            (object) ['title' => 'Ekstrakulikuler', 'path' => 'admin.ekskul', 'icon' => 'fa-solid fa-laptop-code'],
            (object) ['title' => 'Profile Sekolah', 'path' => 'admin.profile', 'icon' => 'fa-solid fa-id-card'],
        ],
        'operator' => [
            (object) ['title' => 'Dashboard', 'path' => 'operator.dashboard', 'icon' => 'fa-solid fa-gauge'],
            (object) ['title' => 'Siswa', 'path' => 'operator.siswa', 'icon' => 'fa-solid fa-user-graduate'],
            (object) ['title' => 'Berita', 'path' => 'operator.berita', 'icon' => 'fa-regular fa-newspaper'],
            (object) ['title' => 'Ekstrakulikuler', 'path' => 'operator.ekskul', 'icon' => 'fa-solid fa-laptop-code'],
            (object) ['title' => 'Galeri', 'path' => 'operator.galeri', 'icon' => 'fa-regular fa-images'],
            (object) ['title' => 'Profile Sekolah', 'path' => 'operator.profile', 'icon' => 'fa-solid fa-id-card'],
        ],
    ];

    $role = auth()->user()->role ?? 'guest';
    $menuList = $menus[$role] ?? [];
@endphp

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

<ul class="navbar-nav sidebar sidebar-dark accordion">

    <a class="sidebar-brand d-flex align-items-center justify-content-center py-3" href="{{ route($role . '.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-solid fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-2">KitaSchool</div>
    </a>

    <hr class="sidebar-divider my-1 border-light">

    @auth
        @foreach($menuList as $menu)
            <li class="nav-item {{ request()->routeIs($menu->path . '*') ? 'active' : '' }}">
                <a href="{{ route($menu->path) }}" class="nav-link d-flex align-items-center px-3 py-2">
                    <i class="{{ $menu->icon }} me-2" style="width:20px;text-align:center;"></i>
                    <span class="sidebar-text">{{ $menu->title }}</span>
                </a>
            </li>
        @endforeach

        <hr class="sidebar-divider mt-2 border-light">

        <li class="nav-item px-3 mb-2">
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger w-100 py-1 rounded" onclick="return confirm('Yakin ingin logout?')">
                    <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
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
    background: linear-gradient(180deg, #33A1E0 0%, #2c2f54 100%);
    font-family: 'Poppins', sans-serif;
    overflow-y: auto;
    z-index: 1030;
    transition: width 0.3s;
}

.sidebar.collapsed {
    width: 70px;
}

.sidebar.collapsed .sidebar-brand-text,
.sidebar.collapsed .sidebar-text {
    display: none;
}

.sidebar.collapsed .nav-link i {
    margin-right: 0;
    text-align: center;
    width: 100%;
}

/* Compact menu items */
.sidebar .nav-item .nav-link {
    color: rgba(255, 255, 255, 0.9);
    font-weight: 500;
    font-size: 0.95rem;
    padding: 0.4rem 1rem;
    border-radius: 0.5rem;
    margin: 0.1rem 0;
    transition: all 0.3s;
}

.sidebar .nav-item .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.15);
    color: #fff;
    transform: translateX(3px);
}

.sidebar .nav-item.active .nav-link {
    background-color: rgba(255, 255, 255, 0.25);
    color: #fff;
    font-weight: 600;
}

/* Sidebar brand */
.sidebar .sidebar-brand-icon i {
    font-size: 1.7rem;
    color: #fff;
}

.sidebar .sidebar-brand-text {
    font-size: 1.1rem;
    font-weight: 700;
    color: #fff;
}

/* Scrollbar */
.sidebar::-webkit-scrollbar {
    width: 6px;
}
.sidebar::-webkit-scrollbar-thumb {
    background-color: rgba(255,255,255,0.3);
    border-radius: 3px;
}

/* Logout button */
.btn-danger {
    font-size: 0.9rem;
    padding: 0.35rem 0.5rem;
}
.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
}
</style>
