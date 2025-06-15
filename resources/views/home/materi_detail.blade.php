<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- Judul halaman dinamis sesuai materi --}}
    <title>Materi: {{ $materi['judul'] }}</title>
    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        body {
            background-image: linear-gradient(#14792680, #14792680), url('{{ asset("images/background.png") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            margin: 0;
            color: #2d5f5d;
        }
        .content-card {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem 3rem;
            margin: auto;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        .materi-title {
            font-weight: 800;
            color: #22645D;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
            text-transform: uppercase;
        }
        .materi-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .materi-content {
            font-size: 1.1rem;
            line-height: 1.8;
            text-align: justify;
        }
        .navigation-button {
            background-color: #BFD8B8;
            color: #22645D;
            font-weight: bold;
            border: none;
            border-radius: 50px;
            padding: 12px 30px;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .navigation-button:hover {
            background-color: #a3c7a4;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .navigation-button i {
            margin-right: 8px;
        }
    </style>
</head>
<body>

    <div class="container py-5">
        <div class="content-card">
            <h1 class="materi-title text-center mb-4">{{ $materi['judul'] }}</h1>
            
            <img src="{{ asset('images/materi/' . $materi['gambar_detail']) }}" 
                 alt="{{ $materi['judul'] }}" 
                 class="materi-image"
                 onerror="this.onerror=null;this.src='https://placehold.co/800x400/BFD8B8/22645D?text=Gambar+Tidak+Tersedia';">
            
            <div class="materi-content">
                <p>
                    {{ $materi['konten'] }}
                </p>
            </div>
            
            <hr class="my-4">

            <div class="d-flex justify-content-between align-items-center">
                {{-- Tombol Kembali ke Daftar Materi --}}
                <a href="{{ route('materi.index') }}" class="navigation-button">
                    <i class="bi bi-arrow-left-circle"></i>Kembali ke Daftar
                </a>
                
                {{-- Tombol Kuis (jika user sudah login) --}}
                @auth
                <a href="{{ route('kuis.mulai', ['slug' => $materi['slug']]) }}" class="navigation-button" style="background-color: #89A98F;">
                    <i class="bi bi-controller"></i>Mulai Kuis Topik Ini
                </a>
                @endauth
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
