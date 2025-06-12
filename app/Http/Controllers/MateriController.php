<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function show($slug)
    {
        // Kamu bisa load materi dari database berdasarkan $slug
        return view('home.materi_detail', ['slug' => $slug]);
    }

}
