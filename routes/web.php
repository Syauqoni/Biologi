<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('home.beranda');
});

Route::get('/leaderboard', function () {
    return view('home.leaderboard');
});

Route::get('/kuis', function () {
    return view('home.kuis');
});

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
