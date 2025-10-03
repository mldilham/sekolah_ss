<style>
html {
    scroll-behavior: smooth;
}

body {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

main {
    flex: 1;
}

/* Navbar */
.navbar-custom {
    background: linear-gradient(135deg, #33A1E0, #2c2f54);
}

.navbar-brand img {
    width: 42px;
    height: 42px;
    object-fit: cover;
    border-radius: 50%;
}
</style>


<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow fixed-top">
  <div class="container">

    <!-- Brand -->
    <a class="navbar-brand d-flex align-items-center gap-2" href="#">
      <img src="{{ asset('asset/logo_sekolah.png') }}" alt="Logo">
      <span class="fw-bold fs-5">{{ $profile->nama_sekolah ?? 'Nama Sekolah' }}</span>
    </a>

    <!-- Toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav ms-auto gap-lg-1">

        <li class="nav-item">
          <a class="nav-link" href="/">Beranda</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('public.berita') }}">Berita</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
            Layanan
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('public.layanan.guru') }}">Tenaga Pendidik</a></li>
            <li><a class="dropdown-item" href="{{ route('public.layanan.siswa') }}">Tenaga Peserta</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
            Galeri
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('public.galeri.foto') }}">Galeri Foto</a></li>
            <li><a class="dropdown-item" href="{{ route('public.galeri.video') }}">Galeri Video</a></li>
          </ul>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="{{ route('public.galeri') }}">Galeri</a>
        </li> --}}

        <li class="nav-item">
          <a class="nav-link" href="{{ route('public.ekskul') }}">Ekstrakurikuler</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
            Profil Sekolah
          </a>
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


