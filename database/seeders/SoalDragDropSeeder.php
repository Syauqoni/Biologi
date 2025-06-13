<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoalDragDrop;

class SoalDragDropSeeder extends Seeder
{
    public function run()
    {
        SoalDragDrop::create([
            'slug' => 'sistem-pernapasan',
            'nomor' => 6,
            'pertanyaan' => 'Urutkan proses sistem pencernaan makanan:',
            'gambar' => 'gambar1.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Makanan dikunyah di mulut",
                "Makanan dicerna di lambung",
                "Makanan masuk ke usus halus",
                "Sisa makanan dibuang melalui anus"
            ],
        ]);

        SoalDragDrop::create([
            'slug' => 'sistem-pernapasan',
            'nomor' => 7,
            'pertanyaan' => 'Urutkan proses penyerapan sari makanan:',
            'gambar' => 'gambar2.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Sari-sari makanan diserap usus halus",
                "Dialirkan melalui darah",
                "Menuju seluruh tubuh",
                "Sisa tidak terserap dibuang"
            ],
        ]);
    }
}
