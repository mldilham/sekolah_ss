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
            (object) ['title' => 'Galeri', 'path' => 'operator.galeri', 'icon' => 'fa-regular fa-images'],
            (object) ['title' => 'Berita', 'path' => 'operator.berita', 'icon' => 'fa-regular fa-newspaper'],
            (object) ['title' => 'Ekstrakulikuler', 'path' => 'operator.ekskul', 'icon' => 'fa-solid fa-laptop-code'],
            (object) ['title' => 'Profile Sekolah', 'path' => 'operator.profile', 'icon' => 'fa-solid fa-id-card'],
        ],
    ];

    $role = auth()->user()->role ?? 'guest';
    $menuList = $menus[$role] ?? [];
    $dashboardRoute = $role === 'operator' ? 'operator.dashboard' : 'admin.dashboard';

@endphp

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

<input type="checkbox" id="toggleSidebar" hidden>
<label for="toggleSidebar" class="sidebar-toggle-btn d-lg-none">
    <i class="fa-solid fa-bars"></i>
</label>

<ul class="navbar-nav sidebar sidebar-dark accordion">
    <a class="sidebar-brand d-flex align-items-center justify-content-center py-3 text-decoration-none" href="{{ route('operator.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('asset/LOG.png') }}" alt="" width="40px" height="40px">
        </div>
        <div class="sidebar-brand-text mx-2 ">BINA ALEXA</div>
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

        <li class="nav-item">
            <a href="#"
            class="nav-link d-flex align-items-center px-3 py-2"
            onclick="event.preventDefault(); if(confirm('Yakin ingin logout?')) { document.getElementById('logout-form').submit(); }">
                <i class="fa-solid fa-right-from-bracket me-2" style="width:20px;text-align:center;"></i>
                <span class="sidebar-text">Logout</span>
            </a>
        </li>

        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth
</ul>

<style>
/* Styling nama sekolah di sidebar */
.sidebar-brand-text {
    font-size: 1.2rem;
    font-weight: 700;
    color: #ffffff;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    text-align: center;
    display: block;
}

.sidebar-brand-icon i {
    font-size: 1.8rem;
    color: #ffffff;
}

/* ✅ Tombol Toggle hanya di mobile */
.sidebar-toggle-btn {
    position: fixed;
    top: 12px;
    left: 12px;
    z-index: 1051;
    background: #2c2f54;
    padding: 8px 10px;
    border-radius: 5px;
    color: white;
    cursor: pointer;
    font-size: 20px;
    display: none;
}

/* ✅ Sidebar default (desktop) tetap muncul */
.sidebar {
    transition: transform 0.3s ease-in-out;
}

/* ✅ Mobile: sidebar disembunyikan */
@media (max-width: 991.98px) {
    .sidebar-toggle-btn {
        display: block;
    }

    .sidebar {
        transform: translateX(-100%);
        width: 220px;
        position: fixed;
        z-index: 1050;
    }

    /* ✅ Jika checkbox dicentang → sidebar muncul */
    #toggleSidebar:checked ~ .sidebar {
        transform: translateX(0);
    }

    /* ✅ Konten bisa disesuaikan jika ingin ikut terdorong */
    #toggleSidebar:checked ~ main,
    #toggleSidebar:checked ~ .content-wrapper {
        margin-left: 220px;
    }
}

</style>
