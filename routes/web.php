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


Route::get('/kuis', function () {
    return view('home.kuis');
});

// Awal kuis berdasarkan topik slug, akan redirect ke soal pertama (index = 1)
Route::get('/kuis/{slug}', [KuisController::class, 'mulai'])->name('kuis.show');

// Soal kuis: index menentukan jenis soal (1–5 pilgan, 6–7 drag, 8–10 benar/salah)
Route::get('/kuis/{slug}/soal/{index}', [KuisController::class, 'soal'])->name('kuis.soal');

Route::get('/materi', function () {
    return view('home.materi');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/leaderboard', [UserController::class, 'leaderboard'])->name('leaderboard');

// Ini adalah komentar satu baris
Route::get('/materi/{slug}', [MateriController::class, 'show'])->name('materi.show');

Route::get('/dashboard', function () {
    // Baris ini akan menampilkan file view yang akan kita buat selanjutnya
    return view('home.beranda'); 
})->name('dashboard')->middleware('auth');
