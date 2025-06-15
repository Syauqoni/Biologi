<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoalPilgan;
use App\Models\SoalDragDrop;
use App\Models\SoalBenarSalah;


class KuisController extends Controller
{
    /**
     * Method BARU untuk menampilkan halaman daftar semua topik kuis.
     */
    public function index()
    {
        // Definisikan data kuis di sini.
        // Nantinya, data ini bisa Anda ambil dari database.
        $dataKuis = [
            ['gambar' => 'OrganPencernaan.png', 'judul' => 'KUIS SISTEM PENCERNAAN', 'slug' => 'sistem-pencernaan'],
            ['gambar' => 'SistemPernapasan.png', 'judul' => 'KUIS SISTEM PERNAPASAN', 'slug' => 'sistem-pernapasan'],
            ['gambar' => 'SistemRangka.png', 'judul' => 'KUIS SISTEM RANGKA', 'slug' => 'sistem-rangka'],
            ['gambar' => 'SistemReproduksi.png', 'judul' => 'KUIS SISTEM REPRODUKSI', 'slug' => 'sistem-reproduksi'],
            ['gambar' => 'SistemOtot.png', 'judul' => 'KUIS SISTEM OTOT', 'slug' => 'sistem-otot'],
            ['gambar' => 'SistemSaraf.png', 'judul' => 'KUIS SISTEM SARAF', 'slug' => 'sistem-saraf'],
        ];

        // Kirim array di atas ke view 'home.kuis' dengan nama variabel 'kuis'
        return view('home.kuis', ['kuis' => $dataKuis]);
    }

    /**
     * Method-method di bawah ini sudah ada sebelumnya dan tidak diubah.
     */
    public function mulai($slug)
    {
        // Redirect ke soal pertama
        return redirect()->route('kuis.soal', ['slug' => $slug, 'index' => 1]);
    }

    public function soal($slug, $index)
    {
        if ($index >= 1 && $index <= 5) {
            $soal = SoalPilgan::where('slug', $slug)->where('nomor', $index)->first();
            if (!$soal) { return redirect('/kuis')->with('error', 'Soal tidak ditemukan.'); }
            return view('kuis.pilgan', compact('slug', 'index', 'soal'));
        }
        elseif ($index >= 6 && $index <= 7) {
            $soal = SoalDragDrop::where('slug', $slug)->where('nomor', $index)->first();
            if (!$soal) { return redirect('/kuis')->with('error', 'Soal tidak ditemukan.'); }
            return view('kuis.drag', compact('slug', 'index', 'soal'));
        }
        elseif ($index >= 8 && $index <= 10) {
            $soal = SoalBenarSalah::where('slug', $slug)
                ->where('nomor', $index)
                ->first();

            if (!$soal) {
                return redirect('/kuis')->with('error', 'Soal tidak ditemukan.');
            }

            return view('kuis.benarsalah', compact('slug', 'index', 'soal'));
        }
        else {
            return redirect()->route('kuis.hasil', ['slug' => $slug]);
        }
    }

    public function jawabBenarSalah(Request $request, $slug, $index)
    {
        $jawabanUser = $request->input('jawaban'); // 1 = benar, 0 = salah
        $soal = \App\Models\SoalBenarSalah::where('slug', $slug)->where('nomor', $index)->first();

        // Ambil poin dari session (jika belum ada, set ke 0)
        $poin = session()->get('poin', 0);

        // Tambah poin jika benar
        if ($soal && $soal->jawaban == $jawabanUser) {
            $poin += $soal->poin;
            session()->put('poin', $poin);
        }

        // Cek apakah sudah soal ke-10 (terakhir)
        if ($index >= 10) {
            return redirect()->route('kuis.hasil', ['slug' => $slug]);
        }

        return redirect()->route('kuis.soal', ['slug' => $slug, 'index' => $index + 1]);
    }


    public function hasil($slug)
    {
        $totalPoin = session()->get('poin', 0);

            dd($totalPoin);

        // Simpan ke database jika ingin (contoh: User dan skor)
        if (auth()->check()) {
            $user = auth()->user();
            $user->skor += $totalPoin;
            $user->save();
        }

        // Kosongkan session poin
        session()->forget('poin');

        return redirect()->route('leaderboard')->with('success', 'Kuis selesai! Skor Anda: ' . $totalPoin);
        return view('kuis.hasil', compact('slug'));
    }
}
