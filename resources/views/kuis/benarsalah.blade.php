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
        }
        .card-text {
            background-color: #b8d3a3;
            padding: 30px;
            border-radius: 10px;
            color: #3f5853;
            font-weight: 600;
            font-size: 20px;
        }
        .btn-option {
            width: 150px;
            height: 100px;
            font-size: 24px;
            font-weight: bold;
            background-color: #bfd9b3;
            color: #3f5853;
            border: none;
            border-radius: 10px;
            transition: 0.2s;
        }
        .btn-option:hover {
            background-color: #a4c199;
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
                <div class="d-flex justify-content-center gap-5">
                    <button type="submit" name="jawaban" value="1" class="btn-option">BENAR</button>
                    <button type="submit" name="jawaban" value="0" class="btn-option">SALAH</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
