<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoalPilgan;
use App\Models\SoalDragDrop;
use App\Models\SoalBenarSalah;


class KuisController extends Controller
{
    public function mulai($slug)
    {
        // Redirect ke soal pertama
        return redirect()->route('kuis.soal', ['slug' => $slug, 'index' => 1]);
    }

    public function soal($slug, $index)
    {
        // 1-5 = pilihan ganda
        if ($index >= 1 && $index <= 5) {
            // Ambil soal pilihan ganda berdasarkan slug dan index
            $soal = SoalPilgan::where('slug', $slug)
                ->where('nomor', $index)
                ->first();

            if (!$soal) {
                return redirect('/kuis')->with('error', 'Soal tidak ditemukan.');
            }

            return view('kuis.pilgan', compact('slug', 'index', 'soal'));
        }

        // 6-7 = drag & drop
        elseif ($index >= 6 && $index <= 7) {
            $soal = SoalDragDrop::where('slug', $slug)
                ->where('nomor', $index)
                ->first();

            if (!$soal) {
                return redirect('/kuis')->with('error', 'Soal tidak ditemukan.');
            }

            return view('kuis.drag', compact('slug', 'index', 'soal'));
        }

        // 8-10 = benar / salah
        elseif ($index >= 8 && $index <= 10) {
            $soal = SoalBenarSalah::where('slug', $slug)
                ->where('nomor', $index)
                ->first();

            if (!$soal) {
                return redirect('/kuis')->with('error', 'Soal tidak ditemukan.');
            }

            return view('kuis.benarsalah', compact('slug', 'index', 'soal'));
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
    }
}
