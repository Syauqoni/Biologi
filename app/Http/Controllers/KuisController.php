<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoalPilgan;
use App\Models\SoalDragDrop;

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
            return view('kuis.benarsalah', compact('slug', 'index'));
        }

        // Setelah soal terakhir, redirect ke hasil
        else {
            return redirect()->route('kuis.hasil', ['slug' => $slug]);
        }
    }

    public function hasil($slug)
    {
        // Sementara tampilkan halaman hasil statis
        return view('kuis.hasil', compact('slug'));
    }
}
