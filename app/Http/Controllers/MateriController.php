<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Menampilkan halaman daftar semua topik materi.
     */
    public function index()
    {
        $dataMateri = $this->getAllMateriData();
        return view('home.materi', ['materi' => $dataMateri]);
    }

    /**
     * Menampilkan halaman detail untuk satu materi berdasarkan slug.
     */
    public function show($slug)
    {
        // Ambil semua data materi dari method helper
        $allMateri = $this->getAllMateriData();
        
        // Cari materi yang cocok berdasarkan slug
        $materiDetail = null;
        foreach ($allMateri as $materi) {
            if ($materi['slug'] === $slug) {
                $materiDetail = $materi;
                break;
            }
        }

        // Jika materi dengan slug tersebut tidak ditemukan, kembali ke halaman daftar
        if (!$materiDetail) {
            return redirect()->route('materi.index')->with('error', 'Materi tidak ditemukan.');
        }

        // Kirim data materi yang ditemukan ke view
        return view('home.materi_detail', ['materi' => $materiDetail]);
    }

    /**
     * Helper method untuk menyimpan semua data materi.
     * Ini berfungsi sebagai "database bohongan".
     */
    private function getAllMateriData()
    {
        return [
            [
                'gambar' => 'OrganPencernaan.png', 
                'judul' => 'SISTEM PENCERNAAN', 
                'slug' => 'sistem-pencernaan',
                'konten' => "Sistem pencernaan adalah serangkaian organ yang bekerja sama untuk memecah makanan yang kita makan menjadi nutrisi yang lebih kecil agar dapat diserap oleh tubuh. Proses ini dimulai dari mulut, di mana makanan dikunyah dan dicampur dengan air liur. Makanan kemudian bergerak ke kerongkongan, lambung, usus halus, dan usus besar. Di setiap organ, terjadi proses pencernaan mekanis (seperti mengunyah dan meremas) dan kimiawi (menggunakan enzim) untuk mengekstrak energi dan nutrisi penting.",
                'gambar_detail' => 'detail_pencernaan.jpg' // Gambar spesifik untuk halaman detail
            ],
            [
                'gambar' => 'SistemPernapasan.png', 
                'judul' => 'SISTEM PERNAPASAN', 
                'slug' => 'sistem-pernapasan',
                'konten' => "Sistem pernapasan bertanggung jawab untuk mengambil oksigen dari udara dan membuang karbon dioksida dari tubuh. Organ utamanya adalah paru-paru. Udara masuk melalui hidung atau mulut, melewati trakea, dan masuk ke bronkus yang bercabang di dalam paru-paru. Di ujung cabang terkecil (alveolus), terjadi pertukaran gas: oksigen masuk ke dalam darah, dan karbon dioksida dari darah dilepaskan untuk dihembuskan keluar.",
                'gambar_detail' => 'detail_pernapasan.jpg'
            ],
            // Anda bisa menambahkan data untuk slug lainnya di sini...
            ['gambar' => 'SistemRangka.png', 'judul' => 'SISTEM RANGKA', 'slug' => 'sistem-rangka', 'konten' => 'Konten untuk sistem rangka belum tersedia.', 'gambar_detail' => 'placeholder.png'],
            ['gambar' => 'SistemReproduksi.png', 'judul' => 'SISTEM REPRODUKSI', 'slug' => 'sistem-reproduksi', 'konten' => 'Konten untuk sistem reproduksi belum tersedia.', 'gambar_detail' => 'placeholder.png'],
            ['gambar' => 'SistemOtot.png', 'judul' => 'SISTEM OTOT', 'slug' => 'sistem-otot', 'konten' => 'Konten untuk sistem otot belum tersedia.', 'gambar_detail' => 'placeholder.png'],
            ['gambar' => 'SistemSaraf.png', 'judul' => 'SISTEM SARAF', 'slug' => 'sistem-saraf', 'konten' => 'Konten untuk sistem saraf belum tersedia.', 'gambar_detail' => 'placeholder.png'],
        ];
    }
}
