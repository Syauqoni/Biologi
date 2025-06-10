<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f6f6c2;
        }
        .leaderboard-container {
            background-color: #7da388;
            border-radius: 15px;
            padding: 20px;
            max-width: 700px;
            margin: auto;
        }
        .leaderboard-title {
            background-color: #7da388;
            color: #2d5f5d;
            font-weight: bold;
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 20px;
            border-radius: 10px;
        }
        .header-cell {
            background-color: #b8d8ba;
            font-weight: bold;
            text-align: center;
            border-radius: 15px;
            color: #2d5f5d;
        }
        .score-row {
            background-color: #b8d8ba;
            border-radius: 10px;
            margin: 5px 0;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            box-shadow: 1px 2px 5px rgba(0,0,0,0.1);
        }
        .back-button {
            background-color: #b8d8ba;
            color: #2d5f5d;
            font-weight: bold;
            border: none;
            border-radius: 20px;
            padding: 10px 25px;
            margin-top: 30px;
        }
        .back-button:hover {
            background-color: #a3c7a4;
        }
    </style>
</head>
<body>
    <div class="container py-5 text-center">
        <div class="leaderboard-title py-2">LEADERBOARD</div>

        <div class="leaderboard-container">
            <div class="row mb-2">
                <div class="col-6 header-cell py-2">NAMA</div>
                <div class="col-6 header-cell py-2">SKOR</div>
            </div>

            <div class="score-row">
                <div>Player 1</div>
                <div>1500</div>
            </div>
            <div class="score-row">
                <div>Player 2</div>
                <div>1200</div>
            </div>
            <div class="score-row">
                <div>Player 3</div>
                <div>1000</div>
            </div>
            <div class="score-row">
                <div>Player 4</div>
                <div>500</div>
            </div>
        </div>

        <a href="/" class="btn back-button mt-4">Kembali Ke Halaman Utama</a>
    </div>
</body>
</html>
