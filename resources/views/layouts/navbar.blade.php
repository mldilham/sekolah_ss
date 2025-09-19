<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">KitaSchool</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item mx-3"><a class="nav-link" href="/profil">Profil</a></li>
        <li class="nav-item mx-3"><a class="nav-link" href="/guru">Guru</a></li>
        <li class="nav-item mx-3"><a class="nav-link" href="/siswa">Siswa</a></li>
        <li class="nav-item mx-3"><a class="nav-link" href="/ekskul">Ekstrakurikuler</a></li>
        <li class="nav-item mx-3"><a class="nav-link" href="/galeri">Galeri</a></li>
        <li class="nav-item mx-3"><a class="nav-link" href="/berita">Berita</a></li>
        <li class="nav-item mx-3"><a class="nav-link" href="/kontak">Kontak</a></li>
        @auth
          <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
        @endauth
    </ul>
    <div class="d-flex">
        {{-- <a href="" class="btn btn-outline-danger rounded-pill">Sig In</a> --}}
        <a href="{{ route('auth.login') }}" class="btn btn-outline-secondary rounded-pill">Log In</a>
    </div>
    </div>
  </div>
</nav>

