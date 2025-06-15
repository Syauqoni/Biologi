<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Method BARU untuk menampilkan halaman daftar semua topik materi.
     */
    public function index()
    {
        // Siapkan data materi di sini.
        // Nantinya, data ini bisa diambil dari database.
        $dataMateri = [
            ['gambar' => 'OrganPencernaan.png', 'judul' => 'SISTEM PENCERNAAN', 'slug' => 'sistem-pencernaan'],
            ['gambar' => 'SistemPernapasan.png', 'judul' => 'SISTEM PERNAPASAN', 'slug' => 'sistem-pernapasan'],
            ['gambar' => 'SistemRangka.png', 'judul' => 'SISTEM RANGKA', 'slug' => 'sistem-rangka'],
            ['gambar' => 'SistemReproduksi.png', 'judul' => 'SISTEM REPRODUKSI', 'slug' => 'sistem-reproduksi'],
            ['gambar' => 'SistemOtot.png', 'judul' => 'SISTEM OTOT', 'slug' => 'sistem-otot'],
            ['gambar' => 'SistemSaraf.png', 'judul' => 'SISTEM SARAF', 'slug' => 'sistem-saraf'],
        ];

        // Kirim array di atas ke view 'home.materi' dengan nama variabel 'materi'
        return view('home.materi', ['materi' => $dataMateri]);
    }

    /**
     * Method untuk menampilkan detail satu materi. (Sudah ada sebelumnya)
     */
    public function show($slug)
    {
        // Kamu bisa load materi dari database berdasarkan $slug
        return view('home.materi_detail', ['slug' => $slug]);
    }
}
