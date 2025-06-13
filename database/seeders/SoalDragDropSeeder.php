<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoalDragDrop;

class SoalDragDropSeeder extends Seeder
{
    public function run()
    {
        // sistem pernapasan
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

        // sistem-pernapasan
        SoalDragDrop::create([
            'slug' => 'sistem-pernapasan',
            'nomor' => 6,
            'pertanyaan' => 'Urutkan jalur udara saat proses inspirasi:',
            'gambar' => 'pernapasan1.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Udara masuk melalui hidung",
                "Melewati faring dan laring",
                "Masuk ke trakea dan bronkus",
                "Berakhir di alveolus"
            ],
        ]);

        SoalDragDrop::create([
            'slug' => 'sistem-pernapasan',
            'nomor' => 7,
            'pertanyaan' => 'Urutan proses pertukaran gas di paru-paru:',
            'gambar' => 'pernapasan2.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Oksigen berdifusi ke darah",
                "Karbon dioksida berdifusi ke alveolus",
                "Oksigen diedarkan ke seluruh tubuh",
                "Karbon dioksida dikeluarkan saat ekspirasi"
            ],
        ]);

        // sistem rangka
        SoalDragDrop::create([
             'slug' => 'sistem-rangka',
            'nomor' => 6,
            'pertanyaan' => 'Urutan proses penyembuhan tulang patah:',
            'gambar' => 'rangka1.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Terjadi pembengkakan di area patah",
                "Pembentukan jaringan fibrosa",
                "Pembentukan tulang baru (callus)",
                "Penyambungan tulang secara sempurna"
            ],
        ]);

        SoalDragDrop::create([
            'slug' => 'sistem-rangka',
            'nomor' => 7,
            'pertanyaan' => 'Urutkan susunan bagian sistem rangka tubuh:',
            'gambar' => 'rangka2.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Tengkorak",
                "Tulang belakang",
                "Tulang rusuk",
                "Tulang anggota gerak"
            ],
        ]);

        // sistem reproduksi
        SoalDragDrop::create([
            'slug' => 'sistem-reproduksi',
            'nomor' => 6,
            'pertanyaan' => 'Urutan proses terjadinya kehamilan:',
            'gambar' => 'reproduksi1.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Ovulasi terjadi dan sel telur dilepaskan",
                "Sperma membuahi sel telur",
                "Zigot terbentuk",
                "Zigot menempel di dinding rahim"
            ],
        ]);

        SoalDragDrop::create([
            'slug' => 'sistem-reproduksi',
            'nomor' => 7,
            'pertanyaan' => 'Urutkan perjalanan sperma saat pembuahan:',
            'gambar' => 'reproduksi2.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Diproduksi di testis",
                "Masuk ke vas deferens",
                "Keluar melalui uretra",
                "Masuk ke vagina dan menuju tuba falopi"
            ],
        ]);

        // sistem otot
        SoalDragDrop::create([
            'slug' => 'sistem-otot',
            'nomor' => 6,
            'pertanyaan' => 'Urutan kontraksi otot rangka:',
            'gambar' => 'otot1.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Impuls saraf diterima otot",
                "Ion kalsium dilepaskan",
                "Aktin dan miosin berikatan",
                "Otot berkontraksi"
            ],
        ]);

        SoalDragDrop::create([
            'slug' => 'sistem-otot',
            'nomor' => 7,
            'pertanyaan' => 'Urutan proses relaksasi otot:',
            'gambar' => 'otot2.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Impuls berhenti",
                "Ion kalsium kembali ke retikulum",
                "Ikatan aktin-miosin lepas",
                "Otot kembali rileks"
            ],
        ]);
        
        // sistem saraf
        SoalDragDrop::create([
            'slug' => 'sistem-saraf',
            'nomor' => 6,
            'pertanyaan' => 'Urutan jalur impuls refleks lutut:',
            'gambar' => 'saraf1.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Rangsangan diterima reseptor",
                "Impuls menuju sumsum tulang belakang",
                "Impuls dikirim ke otot melalui saraf motorik",
                "Kaki bergerak secara refleks"
            ],
        ]);

        SoalDragDrop::create([
            'slug' => 'sistem-saraf',
            'nomor' => 7,
            'pertanyaan' => 'Urutan pengolahan informasi oleh otak:',
            'gambar' => 'saraf2.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Indra menerima rangsangan",
                "Impuls menuju otak",
                "Otak memproses informasi",
                "Tanggapan dikirim ke efektor"
            ],
        ]);

    }
}
