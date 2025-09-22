<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container">
    <!-- Logo / Brand -->
    <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">
      <i class="fa-solid fa-school-flag me-2"></i>KitaSchool
    </a>

    <!-- Toggler (Mobile Menu) -->
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Links -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto text-center">
        <li class="nav-item"><a class="nav-link px-3 fw-medium" href="/profil">Profil</a></li>
        <li class="nav-item"><a class="nav-link px-3 fw-medium" href="/guru">Guru</a></li>
        <li class="nav-item"><a class="nav-link px-3 fw-medium" href="/siswa">Siswa</a></li>
        <li class="nav-item"><a class="nav-link px-3 fw-medium" href="/ekskul">Ekstrakurikuler</a></li>
        <li class="nav-item"><a class="nav-link px-3 fw-medium" href="/galeri">Galeri</a></li>
        <li class="nav-item"><a class="nav-link px-3 fw-medium" href="/berita">Berita</a></li>
        <li class="nav-item"><a class="nav-link px-3 fw-medium" href="/kontak">Kontak</a></li>
        @auth
          <li class="nav-item"><a class="nav-link px-3 fw-medium" href="/dashboard"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
        @endauth
      </ul>

      <!-- Auth Buttons -->
      <div class="d-flex justify-content-center mt-3 mt-lg-0">
        @guest
          <a href="{{ route('auth.login') }}" class="btn btn-outline-primary rounded-pill px-4">
            <i class="fa-solid fa-right-to-bracket me-1"></i> Log In
          </a>
        @else
          <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-danger rounded-pill px-4">
              <i class="fa-solid fa-right-from-bracket me-1"></i> Log Out
            </button>
          </form>
        @endguest
      </div>
    </div>
  </div>
</nav>

<style>
  .navbar-nav .nav-link {
    color: #333 !important;
    transition: all 0.3s ease;
  }
  .navbar-nav .nav-link:hover {
    color: #0d6efd !important;
    transform: translateY(-2px);
  }
  .navbar-brand {
    font-size: 1.3rem;
    transition: all 0.3s ease;
  }
  .navbar-brand:hover {
    color: #0a58ca !important;
  }
</style>
