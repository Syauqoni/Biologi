<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis: {{ ucfirst(str_replace('-', ' ', $slug)) }}</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #F0F3D1;
            font-family: 'Segoe UI', sans-serif;
        }

        .soal-box {
            background-color: #A8C49C;
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 30px;
            color: #4D6464;
            font-weight: bold;
            animation: fadeIn 0.6s ease-in-out;
        }

        .judul-kuis {
            background-color: #89A98F;
            color: #22645D;
            border-radius: 12px;
            padding: 10px 25px;
            display: inline-block;
            font-weight: 600;
        }

        .opsi-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .opsi {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 10px 20px;
            background: #E8F1D4;
            border-radius: 12px;
            transition: transform 0.2s, background 0.3s;
            font-weight: bold;
            color: #4D6464;
            animation: slideUp 0.4s ease forwards;
        }

        .opsi:hover {
            background-color: #D1E7BD;
            transform: scale(1.02);
        }

        .opsi.aktif {
            background-color: #B6D7A8;
        }

        .lingkaran {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #BFD8B8;
            margin-right: 15px;
            transition: background-color 0.3s ease;
        }

        .opsi.aktif .lingkaran {
            background-color: #89A98F;
        }

        .btn-kembali {
            background-color: #BFD8B8;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #22645D;
            font-size: 20px;
        }

        .btn-kembali:hover {
            transform: scale(1.1);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .karakter-container {
            position: fixed;
            bottom: 20px;
            left: 20px;
            /* Diubah ke kiri */
            width: 280px;
            /* Ukuran diperbesar */
            z-index: 1000;
            animation: float-in 1s ease-out forwards;
            pointer-events: none;
        }

        .karakter-container img {
            width: 100%;
            height: auto;
            opacity: 0.9;
        }
    </style>
</head>

<body>

    <div class="container mt-4">
        <a href="{{ url('/kuis') }}" class="btn-kembali mb-4">←</a>

        <div class="text-center mb-4">
            <h3 class="judul-kuis">KUIS: {{ strtoupper(str_replace('-', ' ', $slug)) }}</h3>
        </div>

        @if ($soal)
            <div class="soal-box">
                Soal {{ $index }}: {{ $soal->pertanyaan }}
            </div>

            <form method="POST" action="{{ route('kuis.jawab.pilgan', ['slug' => $slug, 'index' => $index]) }}">
                @csrf
                <input type="hidden" name="jawaban" id="inputJawaban">

                <div class="opsi-container">
                    @foreach (['A', 'B', 'C', 'D'] as $huruf)
                        @php $opsi = 'opsi_' . strtolower($huruf); @endphp
                        <div class="opsi" data-jawaban="{{ $huruf }}" onclick="pilihOpsi(this)">
                            <div class="lingkaran"></div>
                            {{ $soal->$opsi }}
                        </div>
                    @endforeach
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-success px-4 py-2">Selanjutnya</button>
                </div>
            </form>
        @else
            <div class="alert alert-danger text-center">
                Soal tidak ditemukan. Silakan kembali ke halaman kuis.
            </div>
        @endif
    </div>
    <div class="karakter-container">
        <img src="{{ asset('images/karakter/KarakterBingung.png') }}" alt="Karakter Bingung">
    </div>

    <script>
        function pilihOpsi(el) {
            document.querySelectorAll('.opsi').forEach(item => item.classList.remove('aktif'));
            el.classList.add('aktif');
            document.getElementById('inputJawaban').value = el.getAttribute('data-jawaban');
        }
    </script>

</body>

</html>