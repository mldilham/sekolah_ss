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
    padding-top: 10px;
    padding-bottom: 10px;
}

/* Brand: Logo + Nama Sekolah */
.navbar-brand {
    display: flex;
    align-items: center;
    gap: 10px;
}

.navbar-brand img {
    border-radius: 50%;
    width: 42px;
    height: 42px;
    object-fit: cover;
}

.navbar-brand span {
    font-weight: 700;
    color: white;
    font-size: 23px;
}

/* Link Navbar */
.nav-link {
    color: white !important;
    font-weight: 500;
    padding: 8px 15px;
}

.nav-link:hover {
    color: #dcdcdc !important;
}

/* Dropdown item */
.dropdown-menu {
    border-radius: 8px;
    overflow: hidden;
}

.dropdown-item {
    padding-top: 8px;
    padding-bottom: 8px;
}

/* Tombol Toggle (mobile) */
.navbar-toggler {
    border: none;
}
.navbar-toggler:focus {
    box-shadow: none;
}

/* Spasi antar menu (desktop) */
.navbar-nav {
    gap: 5px;
}

/* --- PERBAIKAN TAMPILAN MOBILE --- */
@media (max-width: 991.98px) {
    .navbar-collapse {
        padding-top: 15px;
    }

    .navbar-nav {
        align-items: flex-start !important; /* rata kiri */
        gap: 0; /* hilangkan jarak antar item */
    }

    .nav-link {
        padding: 10px 0;     /* tidak terlalu renggang */
        width: 100%;         /* agar rata kiri */
        text-align: left;
    }

    .dropdown-menu {
        width: 100%;
    }

    .dropdown-item {
        padding: 8px 15px;
    }
}
</style>

<nav class="navbar navbar-expand-lg shadow fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('asset/foto.png') }}" alt="Logo" />
      <span>{{ $profile->nama_sekolah ?? 'Nama Sekolah' }}</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <!-- ✅ Perubahan di sini: hilangkan align-items-center -->
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
