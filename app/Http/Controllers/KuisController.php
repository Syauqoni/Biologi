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

        session()->put("jawaban_user.pilgan.{$soal->id}", $jawabanUser);
        \Log::info("Jawaban user disimpan: {$jawabanUser} untuk soal ID {$soal->id}");

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

    session()->put("jawaban_user.drag.{$soal->id}", $jawabanUserAsli);
    \Log::info("Jawaban user disimpan (drag) untuk ID {$soal->id}: " . json_encode($jawabanUserAsli));


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
        // ✅ Simpan jawaban user ke session
        session()->put("jawaban_user.benarsalah.{$soal->id}", $jawabanUser);

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
        \Log::info("TOTAL POIN : $poin");
        return redirect()->route('kuis.hasil', ['slug' => $slug]);
    }

    return redirect()->route('kuis.soal', ['slug' => $slug, 'index' => $index + 1]);
}




public function hasil($slug)
{
    \Log::info("=== Masuk ke method hasil ===");

    $totalPoin = session()->get('poin', 0);
    $jawabanUser = session()->get('jawaban_user', []);

    // Log jawaban user secara keseluruhan
    \Log::info("Jawaban user lengkap dari session:", $jawabanUser);

    if (auth()->check()) {
        $user = auth()->user();

        $mapSlugToKolom = [
            'sistem-pernapasan' => 'skor_pernapasan',
            'sistem-pencernaan' => 'skor_pencernaan',
            'sistem-rangka' => 'skor_rangka',
            'sistem-reproduksi' => 'skor_reproduksi',
            'sistem-otot' => 'skor_otot',
            'sistem-saraf' => 'skor_saraf',
        ];

        $kolom = $mapSlugToKolom[$slug] ?? null;

        if ($kolom) {
            $skorLama = $user->$kolom;
            $skorBaru = min(max($skorLama, $totalPoin), 100);
            $user->$kolom = $skorBaru;

            $user->skor = $user->skor_pernapasan + $user->skor_pencernaan +
                          $user->skor_rangka + $user->skor_reproduksi +
                          $user->skor_otot + $user->skor_saraf;

            $user->save();

            \Log::info("Skor per topik [$kolom] diupdate jadi: $skorBaru");
            \Log::info("Skor total baru: " . $user->skor);
        } else {
            \Log::warning("Slug tidak dikenali: $slug");
        }
    }

    $pilgan = SoalPilgan::where('slug', $slug)->get()->unique('nomor');
    $drag = SoalDragDrop::where('slug', $slug)->get();
    $benarSalah = SoalBenarSalah::where('slug', $slug)->get();

    foreach ($pilgan as $soal) {
        $jawaban = session("jawaban_user.pilgan.{$soal->id}");
        $soal->jawaban_user = $jawaban;
        \Log::info("Jawaban user untuk Pilgan ID {$soal->id}: " . ($jawaban ?? 'Tidak ada'));
    }

    foreach ($drag as $soal) {
        $urutan = session("jawaban_user.drag.{$soal->id}", []);
        $soal->urutan_user = $urutan;
        \Log::info("Urutan user untuk Drag ID {$soal->id}: " . json_encode($urutan));
    }

    foreach ($benarSalah as $soal) {
        $jawaban = session("jawaban_user.benarsalah.{$soal->id}");
        $soal->jawaban_user = $jawaban;
        \Log::info("Jawaban user untuk Benar/Salah ID {$soal->id}: " . ($jawaban ?? 'Tidak ada'));
    }

    session()->forget('poin');
    session()->forget('jawaban_user');

    return view('kuis.hasil', [
        'slug' => $slug,
        'totalPoin' => $totalPoin,
        'pilgan' => $pilgan,
        'drag' => $drag,
        'benarSalah' => $benarSalah
    ]);
}



}
