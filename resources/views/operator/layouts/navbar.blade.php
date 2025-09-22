<nav class="navbar navbar-expand bg-white border-bottom shadow-sm fixed-top ms-5" style="left:220px; z-index:1040; height:56px;">
  <div class="container-fluid d-flex justify-content-between align-items-center">

    <!-- Search Button -->
    <button class="btn btn-outline-secondary d-flex align-items-center justify-content-center p-2 rounded-circle">
      <i class="fa-solid fa-magnifying-glass"></i>
    </button>

    <!-- Profile Dropdown -->
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ auth()->user()->avatar ?? 'https://i.pravatar.cc/40' }}" alt="Profile" class="rounded-circle me-2" width="40" height="40">
        <span class="fw-medium text-dark">{{ auth()->user()->name }}</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="profileDropdown">
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li>
          <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item">Logout</button>
          </form>
        </li>
      </ul>
    </div>

  </div>
</nav>
