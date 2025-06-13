<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    {{-- Menggunakan Bootstrap 5 dan Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-image: linear-gradient(#14792680, #14792680), url('https://images.unsplash.com/photo-1587888793368-f5835c65f97b?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            color: #ffffff;
        }
        .leaderboard-card {
            background-color: rgba(45, 95, 93, 0.85); /* #2d5f5d dengan transparansi */
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            max-width: 800px;
            margin: auto;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .leaderboard-title {
            font-weight: bold;
            font-size: 2.5rem;
            color: #b8d8ba;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        /* Styling untuk tabel */
        .table {
            --bs-table-bg: transparent;
            --bs-table-border-color: rgba(184, 216, 186, 0.3); /* #b8d8ba dengan transparansi */
            --bs-table-color: #ffffff;
            font-size: 1.1rem;
        }
        .table thead th {
            color: #b8d8ba;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .table tbody td {
            vertical-align: middle;
        }
        /* Sorotan untuk Top 3 */
        .rank-1, .rank-2, .rank-3 {
            font-weight: bold;
        }
        .rank-1 td {
            background-color: rgba(255, 215, 0, 0.15); /* Emas */
        }
        .rank-2 td {
            background-color: rgba(192, 192, 192, 0.15); /* Perak */
        }
        .rank-3 td {
            background-color: rgba(205, 127, 50, 0.15); /* Perunggu */
        }
        .rank-icon {
            font-size: 1.5rem;
            margin-right: 10px;
        }
        .bi-trophy-fill { color: #ffd700; } /* Emas */
        .bi-trophy { color: #c0c0c0; } /* Perak */
        .bi-award { color: #cd7f32; } /* Perunggu */

        .btn-custom-back {
            background-color: #b8d8ba;
            color: #2d5f5d;
            font-weight: bold;
            border: none;
            border-radius: 50px;
            padding: 12px 30px;
            transition: all 0.3s ease;
        }
        .btn-custom-back:hover {
            background-color: #ffffff;
            color: #2d5f5d;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="text-center mb-4">
            <h1 class="leaderboard-title">LEADERBOARD</h1>
        </div>

        <div class="leaderboard-card">
            <table class="table table-borderless text-white">
                <thead>
                    <tr class="text-center">
                        <th scope="col" style="width: 10%;">Peringkat</th>
                        <th scope="col" class="text-start">Nama</th>
                        <th scope="col" style="width: 20%;">Skor</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        {{-- Menambahkan class khusus untuk rank 1, 2, dan 3 --}}
                        <tr class="text-center rank-{{ $loop->iteration }}">
                            <th scope="row">
                                {{-- Menambahkan ikon untuk top 3 --}}
                                @if($loop->iteration == 1)
                                    <i class="bi bi-trophy-fill rank-icon"></i>
                                @elseif($loop->iteration == 2)
                                    <i class="bi bi-trophy rank-icon"></i>
                                @elseif($loop->iteration == 3)
                                    <i class="bi bi-award rank-icon"></i>
                                @endif
                                {{ $loop->iteration }}
                            </th>
                            <td class="text-start">{{ $user->name }}</td>
                            <td>{{ $user->skor }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center fst-italic py-4">
                                Belum ada data untuk ditampilkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="text-center mt-5">
            <a href="/" class="btn btn-custom-back">Kembali Ke Halaman Utama</a>
        </div>
    </div>
</body>
</html>