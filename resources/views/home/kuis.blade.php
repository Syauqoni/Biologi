<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Topik Kuis</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #F9F9C5;
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
        }
        .kuis-box:hover {
            background-color: #6f8d79;
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

    <div class="container text-center mt-5">
        <div class="mb-4">
            <h3 class="fw-bold px-4 py-2 d-inline-block" style="background-color: #89A98F; color: #22645D; border-radius: 12px;">
                PILIH TOPIK KUIS
            </h3>
        </div>

        <div class="row justify-content-center">
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="kuis-box">
                    <img src="{{ asset('images/backgroudn2.jpeg') }}" alt="Pencernaan" class="img-fluid mb-2" style="max-height: 150px;">
                    <div class="topik-text">KUIS SISTEM PENCERNAAN</div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="kuis-box">
                    <img src="{{ asset('images/backgroudn2.jpeg') }}" alt="Pencernaan" class="img-fluid mb-2" style="max-height: 150px;">
                    <div class="topik-text">KUIS SISTEM PERNAPASAN</div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="kuis-box">
                    <img src="{{ asset('images/backgroudn2.jpeg') }}" alt="Pencernaan" class="img-fluid mb-2" style="max-height: 150px;">
                    <div class="topik-text">KUIS SISTEM RANGKA</div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="kuis-box">
                    <img src="{{ asset('images/backgroudn2.jpeg') }}" alt="Pencernaan" class="img-fluid mb-2" style="max-height: 150px;">
                    <div class="topik-text">KUIS SISTEM REPRODUKSI</div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="kuis-box">
                    <img src="{{ asset('images/backgroudn2.jpeg') }}" alt="Pencernaan" class="img-fluid mb-2" style="max-height: 150px;">
                    <div class="topik-text">KUIS SISTEM OTOT</div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="kuis-box">
                    <img src="{{ asset('images/backgroudn2.jpeg') }}" alt="Pencernaan" class="img-fluid mb-2" style="max-height: 150px;">
                    <div class="topik-text">KUIS SISTEM SARAF</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
