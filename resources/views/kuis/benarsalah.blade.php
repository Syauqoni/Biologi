<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis Benar atau Salah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8fbc3;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card-text {
            background-color: #b8d3a3;
            padding: 30px;
            border-radius: 10px;
            color: #3f5853;
            font-weight: 600;
            font-size: 22px;
        }

        .btn-option {
            width: 160px;
            height: 100px;
            font-size: 22px;
            font-weight: bold;
            background-color: #bfd9b3;
            color: #3f5853;
            border: none;
            border-radius: 12px;
            transition: 0.2s ease-in-out;
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-option:hover {
            background-color: #a4c199;
            transform: scale(1.05);
        }

        .btn-option:focus {
            outline: none;
            box-shadow: 0 0 0 4px rgba(100, 150, 100, 0.4);
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

    <div class="container text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-text mb-5">
                    {{ $soal->pertanyaan }}
                </div>

                <form method="POST" action="{{ route('kuis.jawab.benarsalah', ['slug' => $slug, 'index' => $index]) }}">
                    @csrf
                    <div class="d-flex justify-content-center gap-5 flex-wrap">
                        <button type="submit" name="jawaban" value="1" class="btn-option">BENAR</button>
                        <button type="submit" name="jawaban" value="0" class="btn-option">SALAH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="karakter-container">
        <img src="{{ asset('images/karakter/KarakterBingung.png') }}" alt="Karakter Bingung">
    </div>

</body>

</html>