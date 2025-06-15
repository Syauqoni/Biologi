<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Hasil Kuis</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

  <div class="container">
    <div class="text-center mb-5">
      <h1 class="display-5">Hasil Kuis</h1>
      <p class="lead">Total Poin Anda: <strong>{{ $totalPoin }}</strong></p>
      <a href="{{ route('leaderboard') }}" class="btn btn-primary mt-3">Lihat Leaderboard</a>
    </div>

    <h4 class="mb-3">Penjelasan Jawaban Anda</h4>

    {{-- Pilihan Ganda --}}
    @if(count($pilgan))
      <h5>Pilihan Ganda</h5>
      <ol>
        @foreach ($pilgan as $soal)
          <li class="mb-2">
            <p><strong>Pertanyaan:</strong> {{ $soal->pertanyaan }}</p>
            <p><strong>Jawaban Anda:</strong> {{ $soal->jawaban_user ?? 'Tidak dijawab' }}</p>
            <p><strong>Jawaban Benar:</strong> {{ $soal->jawaban }}</p>
            <p><strong>Penjelasan:</strong> {{ $soal->penjelasan }}</p>
            <hr>
          </li>
        @endforeach
      </ol>
    @endif

    {{-- Drag and Drop --}}
    @if(count($drag))
      <h5>Drag and Drop</h5>
      <ol>
        @foreach ($drag as $soal)
          <li class="mb-2">
            <p><strong>Pertanyaan:</strong> {{ $soal->pertanyaan }}</p>
            <p><strong>Urutan Anda:</strong> {{ implode(', ', $soal->urutan_user ?? []) ?: 'Tidak dijawab' }}</p>
            <p><strong>Urutan Benar:</strong> {{ implode(', ', $soal->urutan) }}</p>
            <p><strong>Penjelasan:</strong> {{ $soal->penjelasan }}</p>
            <hr>
          </li>
        @endforeach
      </ol>
    @endif

    {{-- Benar / Salah --}}
    @if(count($benarSalah))
      <h5>Benar / Salah</h5>
      <ol>
        @foreach ($benarSalah as $soal)
          <li class="mb-2">
            <p><strong>Pernyataan:</strong> {{ $soal->pertanyaan }}</p>
            <p><strong>Jawaban Anda:</strong> {{ $soal->jawaban_user == '1' ? 'Benar' : ($soal->jawaban_user == '0' ? 'Salah' : 'Tidak dijawab') }}</p>
            <p><strong>Jawaban Benar:</strong> {{ $soal->jawaban == '1' ? 'Benar' : 'Salah' }}</p>
            <p><strong>Penjelasan:</strong> {{ $soal->penjelasan }}</p>
            <hr>
          </li>
        @endforeach
      </ol>
    @endif

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
