<nav class="navbar d-flex justify-content-between align-items-center px-3" style="position: fixed; top: 0; left: 220px; right: 0; height: 56px; background-color: #fff; border-bottom: 1px solid #dee2e6; z-index: 1040;">

    <button class="btn btn-outline-secondary d-flex align-items-center justify-content-center p-2" style="border-radius: 50%;">
        <i class="fa-solid fa-magnifying-glass"></i>
    </button>

    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ auth()->user()->avatar ?? 'https://i.pravatar.cc/40' }}" alt="Profile" class="rounded-circle me-2" width="40" height="40">
            <span class="fw-medium text-dark">{{ auth()->user()->name }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
            <li><a class="dropdown-item" href="">Profile</a></li>
            <li>
                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
