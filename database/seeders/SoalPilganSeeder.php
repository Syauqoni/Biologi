<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoalPilgan;

class SoalPilganSeeder extends Seeder
{
    public function run(): void
    {
        $soals = [
            [
                'slug' => 'sistem-pernapasan',
                'nomor' => 1,
                'pertanyaan' => 'Apa fungsi utama alveolus dalam paru-paru?',
                'opsi_a' => 'Menangkap virus',
                'opsi_b' => 'Mengangkut udara ke otak',
                'opsi_c' => 'Pertukaran gas antara O2 dan CO2',
                'opsi_d' => 'Menjaga kelembaban kulit',
                'jawaban' => 'C',
            ],
            [
                'slug' => 'sistem-pernapasan',
                'nomor' => 2,
                'pertanyaan' => 'Bagian sistem pernapasan yang menghubungkan trakea dengan paru-paru adalah...',
                'opsi_a' => 'Bronkus',
                'opsi_b' => 'Laring',
                'opsi_c' => 'Alveolus',
                'opsi_d' => 'Hidung',
                'jawaban' => 'A',
            ],
            [
                'slug' => 'sistem-pernapasan',
                'nomor' => 3,
                'pertanyaan' => 'Organ yang berperan sebagai tempat keluar masuknya udara adalah...',
                'opsi_a' => 'Hati',
                'opsi_b' => 'Paru-paru',
                'opsi_c' => 'Jantung',
                'opsi_d' => 'Ginjal',
                'jawaban' => 'B',
            ],
            [
                'slug' => 'sistem-pernapasan',
                'nomor' => 4,
                'pertanyaan' => 'Apa yang terjadi saat kita menghembuskan napas?',
                'opsi_a' => 'Otot diafragma menegang',
                'opsi_b' => 'Otot dada mengembang',
                'opsi_c' => 'Paru-paru menyusut dan udara keluar',
                'opsi_d' => 'Trakea membesar',
                'jawaban' => 'C',
            ],
            [
                'slug' => 'sistem-pernapasan',
                'nomor' => 5,
                'pertanyaan' => 'Gas apa yang paling banyak dihirup manusia saat bernapas?',
                'opsi_a' => 'Karbon dioksida',
                'opsi_b' => 'Hidrogen',
                'opsi_c' => 'Oksigen',
                'opsi_d' => 'Nitrogen',
                'jawaban' => 'C',
            ],
        ];

        foreach ($soals as $soal) {
            SoalPilgan::create($soal);
        }
    }
}
