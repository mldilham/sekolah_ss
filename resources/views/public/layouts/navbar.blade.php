<style>
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}
html {
    scroll-behavior: smooth;
}
body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}
main {
    flex: 1;
}

/* Navbar */
.navbar {
    background: linear-gradient(135deg, #33A1E0, #2c2f54);
}

/* Logo & Nama Sekolah */
.navbar-brand img {
    border-radius: 50%;
    width: 40px;
    height: 40px;
    object-fit: cover;
}

.navbar-brand span {
    font-weight: bold;
    color: white;
}

/* Link Navbar */
.nav-link {
    color: white !important;
    font-weight: 500;
}

.nav-link:hover {
    color: #ccc !important;
}

/* Tombol Login */
.btn-login {
    background-color: white;
    color: #1e2140;
    font-weight: bold;
    border-radius: 20px;
    padding: 6px 20px;
}

.btn-login:hover {
    background-color: #e0e0e0;
    color: #1e2140;
}
</style>

<nav class="navbar navbar-expand-lg shadow fixed-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="{{ asset('asset/foto.png') }}" alt="Logo" />
      <span class="ms-2">{{ $profile->nama_sekolah ?? 'Nama Sekolah' }}</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('public.berita') }}">Berita</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Layanan</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('public.layanan.guru') }}">Tenaga Pendidik</a></li>
            <li><a class="dropdown-item" href="{{ route('public.layanan.siswa') }}">Siswa</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ route('public.galeri') }}">Galeri</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('public.ekskul') }}">Ekstrakurikuler</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Profil Sekolah</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('public.profile.informasi') }}">Informasi Sekolah</a></li>
            <li><a class="dropdown-item" href="{{ route('public.profile.visi-misi') }}">Visi Misi</a></li>
            <li><a class="dropdown-item" href="{{ route('public.profile.deskripsi') }}">Deskripsi</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
