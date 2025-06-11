<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pilih Topik Materi</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <style>
  body {
    background-image: linear-gradient(#14792680, #14792680), url('images/background.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    margin: 0;
  }

  .materi-box {
    background-color: #89A98F;
    color: #4D6464;
    font-weight: bold;
    padding: 50px;
    border-radius: 12px;
    text-align: center;
    transition: 0.3s;
    cursor: pointer;
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
  }

  /* Efek hover animasi saat disentuh */
  .materi-box:hover,
  .home-btn:hover {
    animation: hoverAnimasi 0.3s ease;
    transform: scale(1.05);
  }

  @keyframes hoverAnimasi {
    0% {
      transform: scale(1);
    }
    100% {
      transform: scale(1.05);
    }
  }

  /* Animasi klik */
  .animate-click {
    animation: klikAnimasi 0.3s ease;
  }

  @keyframes klikAnimasi {
    0% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.1);
    }
    100% {
      transform: scale(1);
    }
  }
</style>

</head>
<body>

  <!-- Tombol Home -->
  <a href="{{ url('/') }}" class="position-absolute top-0 start-0 m-3" onclick="animateClick(event)">
    <button class="home-btn rounded-circle">
      <i class="bi bi-house-fill fs-5"></i>
    </button>
  </a>

  <div class="container text-center mt-5">
    <div class="mb-4">
      <h3 class="fw-bold px-4 py-2 d-inline-block" style="background-color: #89A98F; color: #22645D; border-radius: 12px;">
        PILIH TOPIK MATERI
      </h3>
    </div>

    <div class="row justify-content-center">
      <!-- Materi Card -->
      @php
        $materi = [
          ['gambar' => 'OrganPencernaan.png', 'judul' => 'MATERI SISTEM PENCERNAAN'],
          ['gambar' => 'SistemPernapasan.png', 'judul' => 'MATERI SISTEM PERNAPASAN'],
          ['gambar' => 'SistemRangka.png', 'judul' => 'MATERI SISTEM RANGKA'],
          ['gambar' => 'SistemReproduksi.png', 'judul' => 'MATERI SISTEM REPRODUKSI'],
          ['gambar' => 'SistemOtot.png', 'judul' => 'MATERI SISTEM OTOT'],
          ['gambar' => 'SistemSaraf.png', 'judul' => 'MATERI SISTEM SARAF'],
        ];
      @endphp

      @foreach ($materi as $item)
        <div class="col-6 col-md-4 col-lg-3 mb-4">
          <div class="materi-box" onclick="animateClick(event)">
            <img src="{{ asset('images/materi/' . $item['gambar']) }}" alt="{{ $item['judul'] }}" class="img-fluid mb-2" style="max-height: 150px;">
            <div class="topik-text">{{ $item['judul'] }}</div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS untuk animasi klik -->
  <script>
    function animateClick(event) {
      event.preventDefault(); // Hindari langsung redirect
      const el = event.currentTarget;
      el.classList.add('animate-click');

      // Setelah animasi selesai, baru redirect jika <a href="">
      setTimeout(() => {
        el.classList.remove('animate-click');
        const link = el.getAttribute('href');
        if (link) {
          window.location.href = link;
        }
      }, 300);
    }
  </script>
</body>
</html>
