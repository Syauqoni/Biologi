<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis: {{ ucfirst(str_replace('-', ' ', $slug)) }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F0F3D1;
            font-family: Arial, sans-serif;
        }
        .soal-box {
            background-color: #A8C49C;
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 30px;
            color: #4D6464;
            font-weight: bold;
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
            font-weight: bold;
            color: #4D6464;
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
        .judul-kuis {
            background-color: #89A98F;
            color: #22645D;
            border-radius: 12px;
            padding: 10px 25px;
            display: inline-block;
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
                    @php
                        $opsi = 'opsi_' . strtolower($huruf);
                    @endphp
                    <div class="opsi" data-jawaban="{{ $huruf }}" onclick="pilihOpsi(this)">
                        <div class="lingkaran"></div>
                        {{ $soal->$opsi }}
                    </div>
                @endforeach
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary">Selanjutnya</button>
            </div>
        </form>
    @else
        <div class="alert alert-danger text-center">
            Soal tidak ditemukan. Silakan kembali ke halaman kuis.
        </div>
    @endif
</div>

<script>
    function pilihOpsi(el) {
        document.querySelectorAll('.opsi').forEach(item => item.classList.remove('aktif'));
        el.classList.add('aktif');

        const jawaban = el.getAttribute('data-jawaban');
        document.getElementById('inputJawaban').value = jawaban;
    }
</script>
</body>
</html>
