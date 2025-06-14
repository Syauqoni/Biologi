<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pilih Topik Kuis</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        /* CSS ASLI ANDA UNTUK LAYOUT UTAMA */
        body {
            background-image: linear-gradient(#14792680, #14792680), url('images/background.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            margin: 0;
        }

        .kuis-box {
            background-color: #89A98F;
            color: #4D6464;
            font-weight: bold;
            padding: 50px;
            border-radius: 12px;
            text-align: center;
            transition: 0.3s;
            cursor: pointer;
            box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .topik-text {
            background-color: #BFD8B8;
            border-radius: 10px;
            padding: 25px;
            font-size: 16px;
            margin-top: 10px;
        }

        .home-btn {
            background-color: #BFD8B8;
            border: none;
            width: 40px;
            height: 40px;
            transition: 0.3s;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .kuis-box:hover,
        .home-btn:hover {
            transform: scale(1.05);
        }

        /* CSS TAMBAHAN UNTUK STATUS LOGIN */
        .auth-container {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: rgba(0, 0, 0, 0.2);
            padding: 10px 15px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 15px;
            z-index: 10;
            color: white;
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

        .auth-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .welcome-text {
            font-weight: 500;
        }

        .logout-button {
            background: none;
            border: none;
            color: white;
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }

        .logout-button:hover {
            opacity: 1;
        }
    </style>
</head>

<body>

    <!-- Tombol Home -->
    <a href="{{ url('/') }}" class="position-absolute top-0 start-0 m-3">
        <button class="home-btn rounded-circle">
            <i class="bi bi-house-fill fs-5"></i>
        </button>
    </a>

    <!-- [BARU] Status Login/User di Pojok Kanan Atas -->
    <div class="auth-container">
        @guest
            <a href="#" class="auth-link" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
            <a href="#" class="auth-link fw-bold" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a>
        @endguest
        @auth
            <span class="welcome-text d-none d-md-block"><i class="bi bi-person-circle"></i> Halo,
                {{ Auth::user()->name }}</span>
            <a href="{{ url('/dashboard') }}" class="auth-link" title="Dashboard"><i class="bi bi-speedometer2"></i></a>
            <form action="{{ route('logout') }}" method="POST" class="d-flex"> @csrf <button type="submit"
                    class="logout-button" title="Logout"><i class="bi bi-box-arrow-right fs-5"></i></button> </form>
        @endauth
    </div>

    <div class="container text-center mt-5">
        <div class="mb-4">
            <h3 class="fw-bold px-4 py-2 d-inline-block"
                style="background-color: #89A98F; color: #22645D; border-radius: 12px;">
                PILIH TOPIK KUIS
            </h3>
        </div>
        <div class="row justify-content-center">
            <!-- Menghapus blok @php, sekarang data kuis dimuat dari controller -->
            @forelse ($kuis as $item)
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    {{-- Menggunakan route 'kuis.mulai' yang baru --}}
                    <a href="{{ route('kuis.mulai', ['slug' => $item['slug']]) }}" class="text-decoration-none">
                        <div class="kuis-box">
                            <img src="{{ asset('images/kuis/' . $item['gambar']) }}" alt="{{ $item['judul'] }}"
                                class="img-fluid mb-2" style="max-height: 150px;">
                            <div class="topik-text">{{ $item['judul'] }}</div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center mt-4">
                    <div class="alert alert-light" style="background-color: rgba(255, 255, 255, 0.85);">
                        <h4 class="alert-heading">Kuis Belum Tersedia</h4>
                        <p>Saat ini belum ada topik kuis yang bisa ditampilkan.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Panggil pop-up modals (Jika sudah dibuat di file partials) -->
    {{-- @include('partials.modals') --}}

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Panggil script AJAX (Jika sudah dibuat di file terpisah) -->
    {{--
    <script src="{{ asset('js/auth-modal.js') }}"></script> --}}

</body>

</html>