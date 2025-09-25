<footer class="bg-dark text-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5><i class="fa fa-school me-2"></i>{{ $profile->nama_sekolah ?? 'Nama Sekolah' }}</h5>
                <p>{{ $profile->deskripsi ?? 'Deskripsi sekolah' }}</p>
                <p><i class="fa fa-calendar me-2"></i>Berdiri sejak {{ $profile->tahun_berdiri ?? 'Tahun' }}</p>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Kontak Kami</h5>
                <p><i class="fa fa-map-marker-alt me-2"></i>{{ $profile->alamat ?? 'Alamat belum diisi' }}</p>
                <p><i class="fa fa-phone me-2"></i>{{ $profile->kontak ?? 'Kontak belum diisi' }}</p>
                <p><i class="fa fa-envelope me-2"></i>{{ $profile->email ?? 'Email belum diisi' }}</p>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Link Cepat</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}#berita" class="text-light text-decoration-none">Berita</a></li>
                    <li><a href="{{ route('home') }}#guru" class="text-light text-decoration-none">Guru</a></li>
                    <li><a href="{{ route('home') }}#siswa" class="text-light text-decoration-none">Siswa</a></li>
                    <li><a href="{{ route('home') }}#galeri" class="text-light text-decoration-none">Galeri</a></li>
                    <li><a href="{{ route('home') }}#ekskul" class="text-light text-decoration-none">Ekstrakurikuler</a></li>
                    <li><a href="{{ route('profile') }}" class="text-light text-decoration-none">Profil Lengkap</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom bg-secondary text-center py-3">
        <div class="container">
            © {{ date('Y') }} {{ $profile->nama_sekolah ?? 'Sekolah' }}. All Rights Reserved.
            <br>
            <small>Dikembangkan dengan Laravel</small>
        </div>
    </div>
</footer>
