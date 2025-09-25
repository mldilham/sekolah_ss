<footer class="py-5" style="background: linear-gradient(135deg, #1e2140, #2c2f54); color: #fff;">
    <div class="container">
        <div class="row gy-4">
            <!-- Logo / Nama Sekolah -->
            <div class="col-md-4">
                <h4 class="fw-bold">{{ $profile->nama_sekolah ?? 'Nama Sekolah' }}</h4>
                <p class="text-white-50 small">
                    {{ Str::limit($profile->deskripsi ?? 'Deskripsi singkat sekolah.', 120) }}
                </p>
            </div>

            <!-- Navigasi -->
            <div class="col-md-4">
                <h5 class="fw-semibold">Navigasi</h5>
                <ul class="list-unstyled small">
                    <li><a href="{{ url('/') }}" class="text-white-50 text-decoration-none">Beranda</a></li>
                    <li><a href="#tentang-kami" class="text-white-50 text-decoration-none">Tentang Kami</a></li>
                    <li><a href="#berita" class="text-white-50 text-decoration-none">Berita</a></li>
                    <li><a href="#galeri" class="text-white-50 text-decoration-none">Galeri</a></li>
                    <li><a href="#ekskul" class="text-white-50 text-decoration-none">Ekstrakurikuler</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="col-md-4">
                <h5 class="fw-semibold">Kontak</h5>
                <p class="mb-1 small">
                    <i class="fa fa-map-marker-alt me-2 text-primary"></i>
                    {{ $profile->alamat ?? 'Alamat belum diisi' }}
                </p>
                <p class="mb-1 small">
                    <i class="fa fa-phone me-2 text-primary"></i>
                    {{ $profile->kontak ?? 'Kontak belum diisi' }}
                </p>
                <p class="mb-0 small">
                    <i class="fa fa-envelope me-2 text-primary"></i>
                    {{ $profile->email ?? 'Email belum diisi' }}
                </p>
            </div>
        </div>

        <hr class="border-light my-4">

        <!-- Copyright -->
        <div class="text-center small text-white-50">
            &copy; {{ date('Y') }} {{ $profile->nama_sekolah ?? 'Nama Sekolah' }}.
            All Rights Reserved.
        </div>
    </div>
</footer>
