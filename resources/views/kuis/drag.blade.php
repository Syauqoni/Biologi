<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
    }

    .image-section img {
      max-width: 300px;
      height: auto;
    }

    .question {
      margin-top: 20px;
      font-weight: bold;
      text-align: center;
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
    }

    .circle.hovered {
      background-color: #4caf50;
    }

    .arrow {
      font-size: 24px;
      margin: 0 10px;
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
      box-shadow: 2px 2px 6px rgba(0,0,0,0.2);
    }

    .btn-next:hover {
      background-color: #3e8e41;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="image-section">
      <img src="{{ asset('storage/' . $soal->gambar) }}" alt="Gambar Drag">
    </div>

    <div class="question">
      {{ $soal->pertanyaan }}
      <ol type="a">
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

    <div class="drop-zone">
      @for ($i = 1; $i <= 4; $i++)
        <div class="circle" data-index="{{ $i }}" ondragover="event.preventDefault()" ondrop="drop(event)"></div>
        @if ($i < 4)
          <div class="arrow">&#8594;</div>
        @endif
      @endfor
    </div>
  </div>

  <button class="btn-next" onclick="goToNext()">Selanjutnya</button>

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

    document.querySelectorAll('.circle').forEach(circle => {
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

    function goToNext() {
    const nextNumber = currentNumber + 1;

    if (nextNumber <= lastDragNumber) {
        window.location.href = `/kuis/${currentSlug}/soal/${nextNumber}`;
    } else {
        window.location.href = `/kuis/${currentSlug}/soal/8`;
    }
    }
  </script>
</body>
</html>
