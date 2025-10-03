<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KitaSchool - Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

    body {
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      margin: 0;
      display: flex;
      flex-direction: column;
      background: linear-gradient(135deg, #1e2140, #2c2f54);
      align-items: center;
      justify-content: center;
      overflow-x: hidden;
      position: relative;
    }

    /* Tombol back */
    .back-icon {
      position: absolute;
      top: 20px;
      left: 20px;
      color: #fff;
      font-size: 1.8rem;
      cursor: pointer;
      transition: 0.3s;
      z-index: 10;
    }
    .back-icon:hover {
      color: #ddd;
    }

    .login-wrapper {
      width: 100%;
      max-width: 420px;
      padding: 2rem;
    }

    .card-login {
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(12px);
      border-radius: 1rem;
      border: none;
      overflow: hidden;
      box-shadow: 0 20px 40px rgba(0,0,0,0.5);
      color: #fff;
      transition: transform 0.3s;
    }

    .card-login:hover {
      transform: translateY(-5px);
    }

    .card-header-login {
      text-align: center;
      padding: 2rem 1.5rem;
      background: transparent;
    }

    .card-header-login h3 {
      font-weight: 700;
      margin-bottom: 0.5rem;
      color: #fff;
    }

    .card-header-login p {
      color: rgba(255,255,255,0.75);
      font-size: 0.95rem;
    }

    .form-control {
      border-radius: 50px;
      padding: 0.8rem 1rem;
      border: none;
      background: rgba(255,255,255,0.15);
      color: #fff;
      transition: 0.3s;
    }

    .form-control:focus {
      background: rgba(255,255,255,0.25);
      color: #fff;
      box-shadow: 0 0 0 0.2rem rgba(255,255,255,0.3);
      outline: none;
    }

    .form-label {
      font-weight: 600;
      color: #fff;
    }

    .btn-login {
      background: linear-gradient(135deg, #28a745, #218838);
      color: #fff;
      font-weight: 600;
      border-radius: 50px;
      padding: 0.65rem;
      transition: 0.3s;
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .btn-login:hover {
      background: linear-gradient(135deg, #218838, #28a745);
      box-shadow: 0 8px 20px rgba(0,0,0,0.35);
    }

    footer {
      margin-top: 2rem;
      color: #fff;
      font-size: 0.9rem;
      text-align: center;
    }

    .alert-danger {
      background: rgba(255,0,0,0.2);
      color: #fff;
      border: none;
    }
  </style>
</head>
<body>

  <!-- Tombol Kembali -->
  <a href="{{ url('/') }}">
      <i class="fas fa-arrow-left back-icon" ></i>
  </a>

  <!-- Login Form -->
  <div class="login-wrapper">
    <div class="card card-login p-4">
      <div class="card-header-login">
        <img src="{{ asset('asset/logos.png') }}" alt="" width="80px" height="80px">
        <h3 class="mt-3">Masukan Akun Anda</h3>
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
  <footer>
    &copy; {{ date('Y') }} SMAN1C. All Rights Reserved.
  </footer>

</body>
</html>
