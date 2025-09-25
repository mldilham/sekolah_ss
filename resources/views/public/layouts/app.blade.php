<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Sekolah')</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    .card {
        transition: transform 0.2s;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .card .card-detail a{
        text-decoration: none;
    }
    footer {
        background: #212529;
        color: white;
        padding: 40px 0 20px;
    }
    .footer-bottom {
        text-align: center;
        padding: 10px 0;
        margin-top: 20px;
        border-top: 1px solid #495057;
    }

    /* Navbar Styles */
    .navbar-custom {
        background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        box-shadow: 0 2px 10px rgba(0,0,0,0.3);
        transition: all 0.3s ease;
        z-index: 1030;
    }
    .navbar-custom .navbar-brand {
        color: white !important;
        font-weight: bold;
    }
    .navbar-custom .navbar-brand:hover {
        color: #e0e7ff !important;
    }
    .navbar-custom .nav-link {
        color: #e0e7ff !important;
        margin: 0 10px;
        transition: color 0.3s ease;
    }
    .navbar-custom .nav-link:hover {
        color: white !important;
    }
    .navbar-custom .btn-outline-light {
        border-color: white;
        color: white;
    }
    .navbar-custom .btn-outline-light:hover {
        background-color: white;
        color: #1e3a8a;
    }

    /* Hamburger Menu */
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
        background: white;
        margin: 3px 0;
        transition: 0.3s;
    }

    /* Mobile Menu */
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

    
    /* Responsive */
    @media (max-width: 991px) {
        .hamburger {
            display: flex;
        }
        .navbar-menu {
            position: fixed;
            top: 60px; /* Adjust based on navbar height */
            right: -100%;
            width: 250px;
            height: calc(100vh - 60px);
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            padding: 20px;
            transition: right 0.3s ease;
            box-shadow: -2px 0 10px rgba(0,0,0,0.3);
            z-index: 1029;
        }
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
  </style>
</head>
<body>
    {{-- Navbar --}}
    @include('public.layouts.navbar')

    {{-- Hero Section --}}
    @yield('hero')

    {{-- Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('public.layouts.footer')

    {{-- <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4/dist/masonry.pkgd.min.js"></script> --}}
</body>
</html>
