<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KitaSchool - Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card shadow">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Registrasi!</h3>
                </div>
                <div class="card-body">
                    <!-- Alert Error -->
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('auth.register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="name" name="name" class="form-control" id="inputEmail"
                                   placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" id="inputEmail"
                                   placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" id="inputPassword"
                                   placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </form>

                    <hr>
                    <div class="text-center">
                        <a href="{{ route('auth.login') }}">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
