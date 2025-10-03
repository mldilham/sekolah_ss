<footer class="py-5" style="background-color: #1e2140; color: #fff;">
    <div class="container">
        <div class="row gy-4">
            <!-- Logo / Nama Sekolah -->
            <div class="col-md-4">
                <h4 class="fw-bold">{{ $profile->nama_sekolah ?? 'Nama Sekolah' }}</h4>
                <p class="text-white-50 small">
                    {{ Str::limit($profile->deskripsi ?? 'Deskripsi singkat sekolah.', 200) }}
                </p>
            </div>

            <!-- Navigasi -->
            <div class="col-md-4">
                <h5 class="fw-semibold">Navigasi</h5>
                <ul class="list-unstyled small">
                    <li><a href="{{ url('/') }}" class="text-white-50 text-decoration-none">Beranda</a></li>
                    <li><a href="#seputar sekolah" class="text-white-50 text-decoration-none">Seputar Sekolah</a></li>
                    <li><a href="{{ route('public.berita') }}" class="text-white-50 text-decoration-none">Berita</a></li>
                    <li><a href="{{ route('public.layanan.guru') }}" class="text-white-50 text-decoration-none">Guru</a></li>
                    <li><a href="{{ route('public.layanan.siswa') }}" class="text-white-50 text-decoration-none">Siswa</a></li>
                    <li><a href="{{ route('public.galeri.foto') }}" class="text-white-50 text-decoration-none">Galeri</a></li>
                    <li><a href="{{ route('public.ekskul') }}" class="text-white-50 text-decoration-none">Ekstrakurikuler</a></li>
                </ul>
            </div>

            <!-- Kontak + Sosial Media -->
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
                <p class="mb-3 small">
                    <i class="fa fa-envelope me-2 text-primary"></i>
                    {{ $profile->email ?? 'Email belum diisi' }}
                </p>

                <!-- Sosial Media -->
                <div class="d-flex gap-3">
                    <a href="https://www.instagram.com/smanic_tasik/" class="text-white fs-5"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.tiktok.com/@osissmanictas" class="text-white fs-5"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="https://www.youtube.com/@broadcastsmanic3316" class="text-white fs-5"><i class="fa-brands fa-youtube"></i></a>
                </div>
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
