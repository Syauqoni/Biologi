<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Menu Utama</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    body {
      background-image: linear-gradient(#14792680, #14792680), url('images/background.png');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      margin: 0;
      color: white;
    }
    .menu-button {
      background-color: rgb(172, 231, 176);
      color: #3f5d5b;
      font-weight: bold;
      border: none;
      border-radius: 10px;
      padding: 15px 30px;
      width: 220px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .menu-button:hover {
      background-color: #a3c7a4;
      transform: scale(1.05);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }
    .logo { max-width: 65%; height: auto; margin-bottom: 5px; }
    .auth-container {
      position: absolute;
      top: 20px;
      right: 20px;
      background-color: rgba(0,0,0,0.2);
      padding: 10px 15px;
      border-radius: 50px;
      display: flex;
      align-items: center;
      gap: 15px;
    }
    .auth-link {
      color: white;
      text-decoration: none;
      font-weight: 500;
      padding: 5px 10px;
      border: 1px solid transparent;
      border-radius: 20px;
      transition: all 0.3s ease;
    }
    .auth-link:hover { background-color: rgba(255,255,255,0.2); border-color: rgba(255,255,255,0.3); }
    .welcome-text { font-weight: 500; }
    .logout-button { background: none; border: none; color: white; font-weight: 500; opacity: 0.8; transition: opacity 0.3s ease; }
    .logout-button:hover { opacity: 1; }
    .modal-content { background-color: #f0f5f0; color: #333; }
    .modal-header { border-bottom: 1px solid #d9e0d9; }
  </style>
</head>
<body>

  <div class="auth-container">
    @guest
      {{-- Tombol-tombol ini sekarang membuka pop-up --}}
      <a href="#" class="auth-link" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
      <a href="#" class="auth-link fw-bold" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a>
    @endguest
    @auth
      <span class="welcome-text d-none d-md-block"><i class="bi bi-person-circle"></i> Halo, {{ Auth::user()->name }}</span>
      <a href="{{ url('/dashboard') }}" class="auth-link" title="Dashboard"><i class="bi bi-speedometer2"></i></a>
      <form action="{{ route('logout') }}" method="POST"> @csrf <button type="submit" class="logout-button" title="Logout"><i class="bi bi-box-arrow-right fs-5"></i></button> </form>
    @endauth
  </div>

  <div class="d-flex justify-content-center align-items-center vh-100">
    <div class="d-flex flex-column align-items-center" style="gap: 0.5rem;">
      <img src="images/logo.png" alt="Logo Aplikasi" class="logo"/>
      <a href="{{ url('/materi') }}" class="menu-button text-center text-decoration-none">MULAI BELAJAR</a>
      <a href="{{ url('/kuis') }}" class="menu-button text-center text-decoration-none">MULAI KUIS</a>
      <a href="{{ url('/leaderboard') }}" class="menu-button text-center text-decoration-none">LEADERBOARD</a>
    </div>
  </div>

  <!-- ================================================== -->
  <!-- MODAL UNTUK LOGIN                                  -->
  <!-- ================================================== -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="loginForm">
            @csrf
            <div id="login-error-container" class="alert alert-danger d-none"></div>
            <div class="mb-3">
              <label for="login_email" class="form-label">Email</label>
              <input type="email" class="form-control" id="login_email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="login_password" class="form-label">Password</label>
              <input type="password" class="form-control" id="login_password" name="password" required>
            </div>
            <button type="submit" class="btn menu-button w-100" id="loginSubmitButton">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- ================================================== -->
  <!-- MODAL BARU UNTUK REGISTER                          -->
  <!-- ================================================== -->
  <div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Daftar Akun Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="registerForm">
            @csrf
            <div id="register-error-container" class="alert alert-danger d-none"></div>
            <div class="mb-3">
              <label for="register_name" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="register_name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="register_username" class="form-label">Username</label>
              <input type="text" class="form-control" id="register_username" name="username" required>
            </div>
            <div class="mb-3">
              <label for="register_email" class="form-label">Email</label>
              <input type="email" class="form-control" id="register_email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="register_password" class="form-label">Password</label>
              <input type="password" class="form-control" id="register_password" name="password" required>
            </div>
            <div class="mb-3">
              <label for="register_password_confirmation" class="form-label">Konfirmasi Password</label>
              <input type="password" class="form-control" id="register_password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn menu-button w-100" id="registerSubmitButton">Daftar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      
      // Fungsi generik untuk menampilkan error
      function displayErrors(container, errors) {
        let errorMessages = '';
        for (const key in errors) {
          errorMessages += `<li>${errors[key][0]}</li>`;
        }
        container.innerHTML = `<ul>${errorMessages}</ul>`;
        container.classList.remove('d-none');
      }

      // Fungsi generik untuk menangani submit form
      function handleFormSubmit(form, url, button, errorContainer) {
        form.addEventListener('submit', function(event) {
          event.preventDefault();
          
          button.disabled = true;
          button.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Loading...';
          errorContainer.classList.add('d-none');

          const formData = new FormData(form);
          const data = Object.fromEntries(formData.entries());

          fetch(url, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Accept': 'application/json',
              'X-CSRF-TOKEN': data._token,
              'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify(data)
          })
          .then(response => response.json())
          .then(result => {
            if (result.success) {
              window.location.href = result.redirect;
            } else {
              button.disabled = false;
              button.innerHTML = form.id === 'loginForm' ? 'Login' : 'Daftar';
              displayErrors(errorContainer, result.errors);
            }
          })
          .catch(error => {
            button.disabled = false;
            button.innerHTML = form.id === 'loginForm' ? 'Login' : 'Daftar';
            errorContainer.innerHTML = 'Terjadi kesalahan jaringan. Silakan coba lagi.';
            errorContainer.classList.remove('d-none');
          });
        });
      }

      // --- Inisialisasi untuk Form Login ---
      const loginForm = document.getElementById('loginForm');
      if(loginForm) {
        handleFormSubmit(
          loginForm,
          '{{ route("login") }}',
          document.getElementById('loginSubmitButton'),
          document.getElementById('login-error-container')
        );
      }
      
      // --- Inisialisasi untuk Form Register ---
      const registerForm = document.getElementById('registerForm');
      if(registerForm) {
        handleFormSubmit(
          registerForm,
          '{{ route("register") }}',
          document.getElementById('registerSubmitButton'),
          document.getElementById('register-error-container')
        );
      }
    });
  </script>
</body>
</html>
