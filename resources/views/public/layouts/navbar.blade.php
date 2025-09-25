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

  .navbar {
    background-color: #1e2140;
  }

  .navbar-brand img {
    border-radius: 50%;
    width: 40px;
    height: 40px;
    object-fit: cover;
  }

  .navbar-brand {
    color: white;
    font-weight: bold;
    font-size: 1.2rem;
  }

  .navbar-brand:hover {
    color: #ddd;
  }

  .nav-link {
    color: white !important;
    margin-right: 1rem;
    font-weight: 500;
  }

  .nav-link:hover {
    color: #ccc !important;
  }

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

<nav class="navbar navbar-expand-lg px-4 shadow fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="{{ asset('asset/upinipin.jpg') }}" alt="Logo" />
      <span class="ms-2">SDN Banjarsari</span>
    </a>

    <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('public.berita') }}">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('public.guru') }}">Guru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('public.siswa') }}">Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('public.galeri') }}">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('public.ekskul') }}">Ekstrakurikuler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('public.profile') }}">Profil Sekolah</a>
                </li>
            </ul>

      <a href="{{ route('auth.login') }}" class="btn btn-login ms-3 me-2">Masuk</a>
    </div>
  </div>
</nav>
