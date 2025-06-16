<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Hasil Kuis</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8fbc3;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h1,
    h4,
    h5 {
      color: #3f5853;
    }

    .btn-leaderboard {
      background-color: #bfd9b3;
      color: #3f5853;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      padding: 10px 20px;
      transition: 0.3s ease;
    }

    .btn-leaderboard:hover {
      background-color: #a4c199;
      color: #fff;
    }

    .section {
      background-color: #ffffffdd;
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.05);
    }

    strong {
      color: #2d403a;
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

<body class="p-4">

  <div class="container">
    <div class="text-center mb-5">
      <h1 class="display-5">Hasil Kuis</h1>
      <p class="lead">Total Poin Anda: <strong>{{ $totalPoin }}</strong></p>
      <a href="{{ route('leaderboard') }}" class="btn btn-leaderboard mt-3">Lihat Leaderboard</a>
    </div>

    <h4 class="mb-3">Penjelasan Jawaban Anda</h4>

    {{-- Pilihan Ganda --}}
    @if(count($pilgan))
    <div class="section">
      <h5>Pilihan Ganda</h5>
      <ol>
      @foreach ($pilgan as $soal)
      <li class="mb-3">
      <p><strong>Pertanyaan:</strong> {{ $soal->pertanyaan }}</p>
      <p><strong>Jawaban Anda:</strong> {{ $soal->jawaban_user ?? 'Tidak dijawab' }}</p>
      <p><strong>Jawaban Benar:</strong> {{ $soal->jawaban }}</p>
      <p><strong>Penjelasan:</strong> {{ $soal->penjelasan }}</p>
      <hr>
      </li>
    @endforeach
      </ol>
    </div>
  @endif

    {{-- Drag and Drop --}}
    @if(count($drag))
    <div class="section">
      <h5>Drag and Drop</h5>
      <ol>
      @foreach ($drag as $soal)
      <li class="mb-3">
      <p><strong>Pertanyaan:</strong> {{ $soal->pertanyaan }}</p>
      <p><strong>Urutan Anda:</strong> {{ implode(', ', $soal->urutan_user ?? []) ?: 'Tidak dijawab' }}</p>
      <p><strong>Urutan Benar:</strong> {{ implode(', ', $soal->urutan) }}</p>
      <p><strong>Penjelasan:</strong> {{ $soal->penjelasan }}</p>
      <hr>
      </li>
    @endforeach
      </ol>
    </div>
  @endif

    {{-- Benar / Salah --}}
    @if(count($benarSalah))
    <div class="section">
      <h5>Benar / Salah</h5>
      <ol>
      @foreach ($benarSalah as $soal)
      <li class="mb-3">
      <p><strong>Pernyataan:</strong> {{ $soal->pertanyaan }}</p>
      <p><strong>Jawaban Anda:</strong>
      {{ $soal->jawaban_user == '1' ? 'Benar' : ($soal->jawaban_user == '0' ? 'Salah' : 'Tidak dijawab') }}
      </p>
      <p><strong>Jawaban Benar:</strong> {{ $soal->jawaban == '1' ? 'Benar' : 'Salah' }}</p>
      <p><strong>Penjelasan:</strong> {{ $soal->penjelasan }}</p>
      <hr>
      </li>
    @endforeach
      </ol>
    </div>
  @endif

  </div>
  <div class="karakter-container">
    <img src="{{ asset('images/karakter/KarakterTau.png') }}" alt="Karakter Bingung">
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>