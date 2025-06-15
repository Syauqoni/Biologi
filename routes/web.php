<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\KuisController;



Route::get('/', function () {
    return view('home.beranda');
});

Route::get('/leaderboard', function () {
    return view('home.leaderboard');
});


// Rute Kuis
Route::get('/kuis', [KuisController::class, 'index'])->name('kuis.index'); // <-- INI YANG DIPERBAIKI
Route::get('/kuis/{slug}', [KuisController::class, 'mulai'])->name('kuis.mulai'); // Mengganti nama route agar lebih jelas
Route::get('/kuis/{slug}/soal/{index}', [KuisController::class, 'soal'])->name('kuis.soal');
// Anda mungkin perlu route untuk 'kuis.hasil' di sini
Route::get('/kuis/hasil/{slug}', [KuisController::class, 'hasil'])->name('kuis.hasil');

Route::post('/kuis/{slug}/soal/{index}/jawab-pilgan', [KuisController::class, 'jawabPilgan'])->name('kuis.jawab.pilgan');
Route::post('/kuis/{slug}/soal/{index}/jawab-drag', [KuisController::class, 'jawabDrag'])->name('kuis.jawab.drag');
Route::post('/kuis/{slug}/soal/{index}/benarsalah', [KuisController::class, 'jawabBenarSalah'])->name('kuis.jawab.benarsalah');

// Route::get('/kuis/{slug}/hasil', function ($slug) {
//     return redirect()->route('leaderboard');
// })->name('kuis.hasil.redirect');


Route::get('/materi', function () {
    return view('home.materi');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/leaderboard', [UserController::class, 'leaderboard'])->name('leaderboard');

//materi
Route::get('/materi', [MateriController::class, 'index'])->name('materi.index'); // <-- INI YANG DIPERBAIKI
Route::get('/materi/{slug}', [MateriController::class, 'show'])->name('materi.show');


Route::get('/dashboard', function () {
    // Baris ini akan menampilkan file view yang akan kita buat selanjutnya
    return view('home.beranda'); 
})->name('dashboard')->middleware('auth');

Route::get('/reset-skor', function () {
    if (auth()->check()) {
        $user = auth()->user();
        $user->skor = 0;
        $user->save();
        return 'Skor pengguna berhasil direset';
    }
    return 'Anda belum login';
});

