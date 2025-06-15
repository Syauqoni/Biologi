<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SoalPilgan;
use App\Models\SoalDragDrop;
use App\Models\SoalBenarSalah;

class KuisController extends Controller
{
    public function index()
    {
        $dataKuis = [
            ['gambar' => 'OrganPencernaan.png', 'judul' => 'KUIS SISTEM PENCERNAAN', 'slug' => 'sistem-pencernaan'],
            ['gambar' => 'SistemPernapasan.png', 'judul' => 'KUIS SISTEM PERNAPASAN', 'slug' => 'sistem-pernapasan'],
            ['gambar' => 'SistemRangka.png', 'judul' => 'KUIS SISTEM RANGKA', 'slug' => 'sistem-rangka'],
            ['gambar' => 'SistemReproduksi.png', 'judul' => 'KUIS SISTEM REPRODUKSI', 'slug' => 'sistem-reproduksi'],
            ['gambar' => 'SistemOtot.png', 'judul' => 'KUIS SISTEM OTOT', 'slug' => 'sistem-otot'],
            ['gambar' => 'SistemSaraf.png', 'judul' => 'KUIS SISTEM SARAF', 'slug' => 'sistem-saraf'],
        ];

        return view('home.kuis', ['kuis' => $dataKuis]);
    }

    public function mulai($slug)
    {
        return redirect()->route('kuis.soal', ['slug' => $slug, 'index' => 1]);
    }

    public function soal($slug, $index)
    {
        if ($index >= 1 && $index <= 5) {
            $soal = SoalPilgan::where('slug', $slug)->where('nomor', $index)->first();
            if (!$soal) return redirect('/kuis')->with('error', 'Soal tidak ditemukan.');
            return view('kuis.pilgan', compact('slug', 'index', 'soal'));
        } elseif ($index >= 6 && $index <= 7) {
            $soal = SoalDragDrop::where('slug', $slug)->where('nomor', $index)->first();
            if (!$soal) return redirect('/kuis')->with('error', 'Soal tidak ditemukan.');
            return view('kuis.drag', compact('slug', 'index', 'soal'));
        } elseif ($index >= 8 && $index <= 10) {
            $soal = SoalBenarSalah::where('slug', $slug)->where('nomor', $index)->first();
            if (!$soal) return redirect('/kuis')->with('error', 'Soal tidak ditemukan.');
            return view('kuis.benarsalah', compact('slug', 'index', 'soal'));
        } else {
            return redirect()->route('kuis.hasil', ['slug' => $slug]);
        }
    }

public function jawabPilgan(Request $request, $slug, $index)
{
    if ($index == 1) {
        session()->put('poin', 0);
        \Log::info('Inisialisasi poin: 0');
    }

    $jawabanUser = $request->input('jawaban');
    $soal = SoalPilgan::where('slug', $slug)->where('nomor', $index)->first();

    $poin = session()->get('poin', 0);
    \Log::info("Poin sebelum cek jawaban: $poin");

    if ($soal && $soal->jawaban === $jawabanUser) {
        $poin += $soal->poin;
        session()->put('poin', $poin);
        \Log::info("Jawaban benar. Poin ditambah jadi: $poin");
    } else {
        \Log::info("Jawaban salah. Poin tetap: $poin");
    }

    $jumlahSoalPilgan = SoalPilgan::where('slug', $slug)->count();

    if ($index >= $jumlahSoalPilgan) {
        return redirect()->route('kuis.soal', ['slug' => $slug, 'index' => 6]); // mulai drag
    }

    return redirect()->route('kuis.soal', ['slug' => $slug, 'index' => $index + 1]);
}

public function jawabDrag(Request $request, $slug, $index)
{
    $jawabanUser = $request->input('jawaban'); // contoh: ["A", "B", "C", "D"]
    $soal = SoalDragDrop::where('slug', $slug)->where('nomor', $index)->first();

    $poin = session()->get('poin', 0);

    // Cek apakah soal ada
    if (!$soal) {
        \Log::warning("Soal Drag ke-$index tidak ditemukan untuk slug: $slug");
        return redirect()->route('kuis.index')->with('error', 'Soal tidak ditemukan.');
    }

    // Mapping label A-D ke isi urutan sebenarnya
    $map = array_combine(['A', 'B', 'C', 'D'], $soal->urutan);
    $jawabanUserAsli = array_map(function ($item) use ($map) {
        return $map[$item] ?? null;
    }, $jawabanUser);

    // Logging
    \Log::info("Soal $index - Drag:");
    \Log::info("Jawaban user: " . json_encode($jawabanUser));
    \Log::info("Jawaban user mapped: " . json_encode($jawabanUserAsli));
    \Log::info("Jawaban benar: " . json_encode($soal->urutan));

    if ($jawabanUserAsli === $soal->urutan) {
        $poin += $soal->poin;
        session()->put('poin', $poin);
        \Log::info("Jawaban benar. Poin sekarang: $poin");
    } else {
        \Log::info("Jawaban salah. Poin tetap: $poin");
    }

    // Jika drag terakhir, lanjut ke soal benar/salah (8)
    if ($index >= 7) {
        return redirect()->route('kuis.soal', ['slug' => $slug, 'index' => 8]);
    }

    return redirect()->route('kuis.soal', ['slug' => $slug, 'index' => $index + 1]);
}

 public function jawabBenarSalah(Request $request, $slug, $index)
{
    \Log::info("=== Masuk ke method jawabBenarSalah ===");

    $jawabanUser = $request->input('jawaban');
    \Log::info("Jawaban user: $jawabanUser");

    $soal = SoalBenarSalah::where('slug', $slug)->where('nomor', $index)->first();

    $poin = session()->get('poin', 0);
    \Log::info("Poin sebelum cek jawaban: $poin");

    if ($soal) {
        if ((string)$soal->jawaban === (string)$jawabanUser) {
            $poin += $soal->poin;
            session()->put('poin', $poin);
            \Log::info("Jawaban benar. Poin ditambah jadi: $poin");
        } else {
            \Log::info("Jawaban salah. Poin tetap: $poin");
        }
    } else {
        \Log::warning("Soal tidak ditemukan untuk slug: $slug dan nomor: $index");
    }

    if ($index >= 10) {
        \Log::info("TOTAL POIN Benar salah: $poin");
        return redirect()->route('kuis.hasil', ['slug' => $slug]);
    }

    return redirect()->route('kuis.soal', ['slug' => $slug, 'index' => $index + 1]);
}



public function hasil($slug)
{
    \Log::info("=== Masuk ke method hasil ===");
    $totalPoin = session()->get('poin', 0);

    if (auth()->check()) {
        $user = auth()->user();

        \Log::info("TOTAL POIN: $totalPoin");
        \Log::info("SKOR SEBELUM: " . $user->skor);

        $user->skor += $totalPoin;
        $user->save();
    }

    session()->forget('poin');

    return redirect()->route('leaderboard')->with('success', 'Kuis selesai! Skor Anda: ' . $totalPoin);
}


}
