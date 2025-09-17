
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body { font-family: 'Poppins', sans-serif; }
    .hero {
    background: url('/images/hero.jpg') center/cover no-repeat;
    color: white;
    height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    }
</style>
</head>
<body>


<main>
    @yield('content')
</main>
@include('layouts.navbar')

{{-- Footer --}}
<footer class="bg-dark text-white text-center p-3 mt-5">
<p class="mb-0">&copy; {{ date('Y') }} {{ config('app.name', 'Profil Sekolah') }}. All rights reserved.</p>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
