<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Profil Sekolah')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; }
    .hero {
      background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                  url('/images/hero-bg.jpg') center/cover no-repeat;
      color: white;
      padding: 100px 0;
      text-align: center;
    }
    .section-title {
      font-weight: 600;
      margin-bottom: 30px;
    }
    .card-custom {
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }
  </style>
</head>
<body>

  {{-- Navbar --}}
  @include('layouts.navbar')

  {{-- Konten Dinamis --}}
  <main>
    @yield('content')
  </main>

  {{-- Footer --}}
  @include('layouts.footer')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
