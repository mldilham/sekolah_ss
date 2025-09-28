<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Sekolah')</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <style>
    html {
      scroll-behavior: smooth;
    }
    .hero {
        position: relative;
        min-height: 100vh;
        background-image: url('asset/foto.png');
        background-repeat: no-repeat;   /* Supaya tidak diulang */
        background-size: cover;         /* Biar menutupi seluruh layar */
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        color: white;
        text-shadow: 0 2px 6px rgba(0,0,0,0.6);
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(30, 33, 64, 0.3), rgba(44, 47, 84, 0.3));
        z-index: 1;
    }

    .hero > * {
        position: relative;
        z-index: 2;
    }
    .card {
        transition: transform 0.2s;
        /* background: transparent !important; */
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .card .card-detail a{
        text-decoration: none;
    }

    footer {
        background: linear-gradient(135deg, #1C6EA4, #2c2f54);
        color: white;
        padding: 40px 0 20px;
    }
    .footer-bottom {
        text-align: center;
        padding: 10px 0;
        margin-top: 20px;
        border-top: 1px solid #2c2f54;
    }

    /* Navbar Styles */
    .navbar-custom {
        background: linear-gradient(135deg, #33A1E0 0%, #2c2f54 100%);
        box-shadow: 0 2px 10px rgba(0,0,0,0.3);
        transition: all 0.3s ease;
        z-index: 1030;
    }
    .navbar-custom .navbar-brand {
        color: white !important;
        font-weight: bold;
    }
    .navbar-custom .navbar-brand:hover {
        color: #e0e0e0 !important;
    }
    .navbar-custom .nav-link {
        color: white !important;
        margin: 0 10px;
        transition: color 0.3s ease;
    }
    .navbar-custom .nav-link:hover {
        color: #ccc !important;
    }
    .navbar-custom .btn-outline-light {
        border-color: white;
        color: white;
    }
    .navbar-custom .btn-outline-light:hover {
        background-color: white;
        color: #1e2140;
    }

    .nav-toggle-checkbox {
        display: none;
    }
    .hamburger {
        display: none;
        flex-direction: column;
        cursor: pointer;
        padding: 5px;
    }
    .hamburger span {
        width: 25px;
        height: 3px;
        background: #2c2f54;
        margin: 3px 0;
        transition: 0.3s;
    }

    .navbar-menu {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }
    .navbar-nav {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .navbar-nav .nav-item {
        margin: 0;
    }

    #galeri .card img {
    transition: transform 0.4s ease;
    }

    #galeri .card:hover img {
        transform: scale(1.1);
    }

    #galeri .overlay {
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.6);
        opacity: 0;
        transition: 0.4s;
    }

    #galeri .card:hover .overlay {
        opacity: 1;
    }

    .berita-card {
        overflow: hidden;
        border-radius: 5px;
        background:  rgba(255, 255, 255, 0.2);
    }

    .berita-img {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }

    .ekskul-card {
        overflow: hidden;
        border-radius: 5px;
        background: rgba(255, 255, 255, 0.2) !important; /* Transparan */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .ekskul-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 10px 20px rgba(0,0,0,0.3);
    }

    .custom-tampilan {
        display: inline-block;
        padding: 10px 20px;
        color: #C2A68C;
        text-decoration: none;
        border-radius: 2px;
        border: 2px solid #E6D8C3;
        transition: all 0.3s ease;
    }

    .custom-tampilan:hover {
        color: white;
        background-color: #C2A68C;
        border: 2px solid #E6D8C3;
    }

    /* Overlay tanggal */
    .tanggal-overlay {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: rgba(0,0,0,0.7);
        color: white;
        padding: 0.4rem 0.6rem;
        border-radius: 8px;
        min-width: 50px;
    }

    .tanggal-overlay h5 {
        font-size: 1rem;
        line-height: 1rem;
        margin: 0;
    }

    .tanggal-overlay small {
        font-size: 0.7rem;
        display: block;
    }


    .gradient {
        background: linear-gradient(135deg, #33A1E0  , #2c2f54);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hov {
        background: linear-gradient(135deg, #1e2140, #2c2f54);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hov:hover {
        background: linear-gradient(135deg, #2c2f54, #1e2140);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    /* Responsive */
    @media (max-width: 991px)
    {
        .hamburger {
            display: flex;
        }
        .navbar-menu {
            position: fixed;
            top: 60px; /* Adjust based on navbar height */
            right: -100%;
            width: 250px;
            height: calc(100vh - 60px);
            background: linear-gradient(135deg, #33A1E0 0%, #2c2f54 100%);
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            padding: 20px;
            transition: right 0.3s ease;
            box-shadow: -2px 0 10px rgba(0,0,0,0.3);
            z-index: 1029;
            .nav-toggle-checkbox:checked ~ .navbar-menu {
                right: 0;
            }
            .navbar-nav {
                flex-direction: column;
                width: 100%;
            }
            .navbar-nav .nav-item {
                width: 100%;
                margin: 10px 0;
            }
            .navbar-nav .nav-link {
                display: block;
                padding: 10px 0;
                border-bottom: 1px solid rgba(255,255,255,0.1);
            }
            .navbar-menu .btn {
                margin-top: 20px;
                width: 100%;
            }
            /* Hamburger animation */
            .nav-toggle-checkbox:checked ~ .hamburger span:nth-child(1) {
                transform: rotate(-45deg) translate(-5px, 6px);
            }
            .nav-toggle-checkbox:checked ~ .hamburger span:nth-child(2) {
                opacity: 0;
            }
            .nav-toggle-checkbox:checked ~ .hamburger span:nth-child(3) {
                transform: rotate(45deg) translate(-5px, -6px);
            }
        }
    }

  </style>
  <style>
    #ekskul .card {
        background: rgba(255, 255, 255, 0.15) !important;
        border-radius: 10px !important;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15) !important;
        overflow: hidden !important;
        transition: transform 0.3s ease, box-shadow 0.3s ease !important;
    }

    #ekskul .card:hover {
        transform: translateY(-6px) scale(1.02) !important;
        box-shadow: 0 10px 20px rgba(0,0,0,0.3) !important;
        background: rgba(255, 255, 255, 0.25) !important;
    }

    #ekskul .card .p-3 {
        background: transparent !important;
    }
</style>
</head>
<body>
    {{-- Navbar --}}
    @include('public.layouts.navbar')

    {{-- Hero Section --}}
    @yield('hero')

    {{-- Content --}}
    <main style="padding-top: 80px;">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('public.layouts.footer')

    {{-- <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4/dist/masonry.pkgd.min.js"></script> --}}
    <!-- jQuery for Lightbox -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
