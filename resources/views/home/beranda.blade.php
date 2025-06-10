<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f6f6c2; /* Warna latar belakang mirip gambar */
        }
        .menu-button {
            background-color: #b8d8ba;
            color: #5a7d7c;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            padding: 15px 30px;
            width: 220px;
            transition: background-color 0.3s;
        }
        .menu-button:hover {
            background-color: #a3c7a4;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="d-flex flex-column align-items-center gap-3">
            <a href="{{ url('/materi') }}" class="menu-button text-center text-decoration-none">MULAI BELAJAR</a>
            <a href="{{ url('/kuis') }}" class="menu-button text-center text-decoration-none">MULAI KUIS</a>
            <a href="{{ url('/leaderboard') }}" class="menu-button text-center text-decoration-none">LEADERBOARD</a>
        </div>
    </div>
</body>
</html>
