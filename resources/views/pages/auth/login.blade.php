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
      background: linear-gradient(135deg, #1e2140, #2c2f54);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    .login-wrapper {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2rem 1rem;
    }
    .card-login {
      max-width: 420px;
      width: 100%;
      border: none;
      border-radius: 1rem;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    }
    .card-header-login {
      background: linear-gradient(135deg, #1e2140, #2c2f54);
      color: #fff;
      text-align: center;
      padding: 2rem 1.5rem;
    }
    .card-header-login h3 {
      font-weight: 700;
      margin-bottom: .5rem;
    }
    .btn-login {
      background: linear-gradient(135deg, #1e2140, #2c2f54);
      color: #fff;
      font-weight: 600;
      border-radius: 50px;
      padding: 0.6rem;
      transition: 0.3s;
    }
    .btn-login:hover {
      background: linear-gradient(135deg, #2c2f54, #1e2140);
    }
    .btn-back {
      position: absolute;
      top: 20px;
      left: 20px;
      background: rgba(255,255,255,0.9);
      border: none;
      border-radius: 30px;
      padding: 0.4rem 1rem;
      font-weight: 600;
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
      text-decoration: none;
      color: #1e2140;
      transition: 0.3s;
    }
    .btn-back:hover {
      background: #fff;
    }
    footer {
      background: #1e2140;
      color: #fff;
      text-align: center;
      padding: 1rem;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

  <!-- Tombol Kembali -->
  <a href="{{ url('/') }}" class="btn-back">
    <i class="fas fa-arrow-left"></i> Kembali
  </a>

  <!-- Login Form -->
  <div class="login-wrapper">
    <div class="card card-login">
      <div class="card-header-login">
        <h3>Login</h3>
        <p class="mb-0">Masuk ke akun Anda</p>
      </div>
      <div class="card-body p-4">
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
    &copy; {{ date('Y') }} KitaSchool. All Rights Reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
