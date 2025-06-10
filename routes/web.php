<?php

use Illuminate\Support\Facades\Route;

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