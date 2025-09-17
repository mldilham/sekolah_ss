@php
    $menus = [
        1 => [
            (object) [
                'title' => 'Dashboard',
                'path' => 'dashboard',
            ]
        ]
    ];
@endphp

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">
    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-text mx-3">KitaSchool</div>
    </a>

    <hr class="sidebar-divider my-0">

    @auth
        @foreach($menus[auth()->user()->id] ?? [] as $menu)
            <li class="nav-item {{ request()->is($menu->path . '*') ? 'active' : '' }}">
                <a href="/{{ $menu->path }}" class="nav-link">
                    <span>{{ $menu->title }}</span>
                </a>
            </li>
        @endforeach

        <hr class="sidebar-divider mt-3">

        <!-- Logout -->
        <li class="nav-item">
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger w-100">
                    Logout
                </button>
            </form>
        </li>
    @endauth
</ul>
