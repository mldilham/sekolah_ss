<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>KitaSchool - Login</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQY635sKX7yh-xH2UXnrjRum9IPej0zMqStA&s') center/cover no-repeat;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 0;
        }
        .login-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
            margin: 1rem;
        }
        .card-login {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            background: rgba(255,255,255,0.95);
        }
        .card-header-login {
            background: linear-gradient(135deg, #4e73df, #224abe);
            color: #fff;
            text-align: center;
            padding: 1.5rem;
        }
        .btn-login {
            background: linear-gradient(135deg, #4e73df, #224abe);
            color: #fff;
            font-weight: 600;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #224abe, #4e73df);
        }
        .btn-back {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 2;
            background: rgba(255,255,255,0.8);
            border: none;
            border-radius: 50px;
            padding: 0.5rem 1rem;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: 0.3s;
        }
        .btn-back:hover {
            background: rgba(255,255,255,1);
        }
        footer {
            margin-top: 2rem;
        }
    </style>
    </head>
    <body>
    <div class="overlay"></div>

    <!-- Tombol Kembali -->
    <a href="{{ asset('/') }}" class="btn btn-back">
        <i class="fas fa-arrow-left"></i>
    </a>
    <!-- Login Card -->
    <div class="login-container">
    <div class="card card-login">
        <div class="card-header card-header-login">
        <h3>Login</h3>
        <p class="mb-0">Silakan masuk ke akun Anda</p>
        </div>
        <div class="card-body">
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('auth') }}" method="POST">
            @csrf
            <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-login w-100">Login</button>
        </form>
        </div>
    </div>
    </div>

<!-- Footer -->
    <footer class="bg-dark text-white text-center p-3">
        <p class="mb-0">&copy; 2025 KitaSchool. All rights reserved.</p>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
