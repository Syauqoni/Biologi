<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kuis Drag and Drop</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7a1;
      margin: 0;
      padding: 20px;
      position: relative;
      min-height: 100vh;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      max-width: 800px;
      margin: auto;
    }

    .image-section img {
      max-width: 100%;
      height: auto;
      border-radius: 12px;
      box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
    }

    .question {
      margin-top: 20px;
      font-weight: bold;
      text-align: center;
      background: #fff9c4;
      padding: 15px;
      border-radius: 10px;
      width: 100%;
    }

    .options {
      display: flex;
      gap: 15px;
      margin-top: 20px;
      flex-wrap: wrap;
      justify-content: center;
    }

    .option {
      background-color: #a0c3b2;
      padding: 15px;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      text-align: center;
      font-weight: bold;
      cursor: grab;
      display: flex;
      justify-content: center;
      align-items: center;
      transition: transform 0.2s;
      box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.1);
    }

    .option:active {
      cursor: grabbing;
      transform: scale(1.1);
    }

    .drop-zone {
      display: flex;
      gap: 30px;
      margin-top: 30px;
      align-items: center;
      flex-wrap: wrap;
      justify-content: center;
    }

    .circle {
      width: 60px;
      height: 60px;
      background-color: #3d5f60;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      font-weight: bold;
      font-size: 18px;
      border: 2px dashed #fff;
      transition: background-color 0.3s;
    }

    .circle.hovered {
      background-color: #4caf50;
    }

    .arrow {
      font-size: 24px;
      margin: 0 10px;
      color: #555;
    }

    .btn-next {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #4caf50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
      box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2);
    }

    .btn-next:hover {
      background-color: #3e8e41;
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

  <div class="container">
    <div class="image-section">
      <img src="{{ asset('images/assetKuis/' . $soal->gambar) }}" alt="Gambar Drag">
    </div>

    <div class="question">
      {{ $soal->pertanyaan }}
      <ol type="a" style="text-align: left; margin-top: 10px;">
        @foreach ($soal->urutan as $item)
      <li>{{ $item }}</li>
    @endforeach
      </ol>
    </div>

    <div class="options" id="options">
      @foreach ($soal->opsi as $opsi)
      <div class="option" draggable="true" data-value="{{ $opsi }}">{{ $opsi }}</div>
    @endforeach
    </div>

    <form id="dragForm" method="POST" action="{{ route('kuis.jawab.drag', [$slug, $index]) }}">
      @csrf
      <div class="drop-zone">
        @for ($i = 1; $i <= 4; $i++)
        <div class="circle" data-index="{{ $i }}" ondragover="event.preventDefault()" ondrop="drop(event)"></div>
        <input type="hidden" name="jawaban[]" id="input-{{ $i }}">
        @if ($i < 4)
        <div class="arrow">&#8594;</div>
      @endif
    @endfor
      </div>
    </form>
  </div>
  <div class="karakter-container">
    <img src="{{ asset('images/karakter/KarakterBingung.png') }}" alt="Karakter Bingung">
  </div>

  <button class="btn-next" onclick="submitForm()">Selanjutnya</button>

  <script>
    const currentSlug = "{{ $slug }}";
    const currentNumber = {{ $index }};
    const lastDragNumber = 7; // Ganti sesuai jumlah soal drag kamu
    let dragged;

    document.querySelectorAll('.option').forEach(opt => {
      opt.addEventListener('dragstart', (e) => {
        dragged = e.target;
      });
    });

    document.querySelectorAll('.circle').forEach((circle, idx) => {
      circle.addEventListener('dragover', e => e.preventDefault());

      circle.addEventListener('drop', e => {
        e.preventDefault();
        if (dragged) {
          const value = dragged.getAttribute('data-value');
          if (circle.textContent.trim() !== "") {
            const previousValue = circle.textContent;
            restoreOption(previousValue);
          }
          circle.textContent = value;
          dragged.remove();
        }
      });

      circle.addEventListener('click', () => {
        const value = circle.textContent.trim();
        if (value !== "") {
          restoreOption(value);
          circle.textContent = "";
        }
      });
    });

    function restoreOption(value) {
      const container = document.getElementById("options");
      const newOption = document.createElement("div");
      newOption.className = "option";
      newOption.setAttribute("draggable", "true");
      newOption.setAttribute("data-value", value);
      newOption.textContent = value;
      newOption.addEventListener('dragstart', (e) => {
        dragged = e.target;
      });
      container.appendChild(newOption);
    }

    function submitForm() {
      document.querySelectorAll('.circle').forEach((circle, i) => {
        const value = circle.textContent.trim();
        document.getElementById('input-' + (i + 1)).value = value;
      });

      document.getElementById('dragForm').submit();
    }
  </script>

</body>

</html>