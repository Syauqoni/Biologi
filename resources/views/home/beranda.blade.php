<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Menu Utama</title>
  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      background-image: linear-gradient(#14792680, #14792680), url('images/background.png');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      margin: 0;
    }

    .menu-button {
      background-color: rgb(172, 231, 176);
      color: #5a7d7c;
      font-weight: bold;
      border: none;
      border-radius: 10px;
      padding: 15px 30px;
      width: 220px;
      transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .menu-button:hover {
      background-color: #a3c7a4;
      transform: scale(1.05);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .logo {
      max-width: 65%;
      height: auto;
      margin-bottom: 5px; /* dikurangi agar lebih dekat ke tombol */
    }
  </style>
</head>
<body>
  <div class="d-flex justify-content-center align-items-center vh-100">
    <div class="d-flex flex-column align-items-center" style="gap: 0.5rem;"> <!-- jarak antar elemen lebih kecil -->
      <!-- Logo -->
      <img src="images/logo.png" alt="Logo Aplikasi" class="logo"/>

      <!-- Tombol-tombol -->
      <a href="{{ url('/materi') }}" class="menu-button text-center text-decoration-none">MULAI BELAJAR</a>
      <a href="{{ url('/kuis') }}" class="menu-button text-center text-decoration-none">MULAI KUIS</a>
      <a href="{{ url('/leaderboard') }}" class="menu-button text-center text-decoration-none">LEADERBOARD</a>
    </div>
  </div>
</body>
</html>
