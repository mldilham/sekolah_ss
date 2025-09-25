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
    .navbar { transition: all 0.3s ease; }
    .navbar-transparent { background: transparent !important; }
    .navbar-scrolled {
        background: rgba(255, 255, 255, 0.95) !important;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .hero {
        position: relative;
        min-height: 100vh;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

</body>
</html>
