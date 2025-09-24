<nav id="navbar" class="navbar navbar-expand-lg fixed-top navbar-transparent">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            <i class="fa-solid fa-school"></i> {{ $profile->nama_sekolah ?? 'Sekolah' }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#berita">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#guru">Guru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#siswa">Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#galeri">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#ekskul">Ekstrakurikuler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile') }}">Profil Sekolah</a>
                </li>
            </ul>
            <a href="{{ route('auth.login') }}" class="btn btn-outline-light px-3 ms-2">Login</a>
        </div>
    </div>
</nav>
