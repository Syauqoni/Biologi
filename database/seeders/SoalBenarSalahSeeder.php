<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoalBenarSalah;

class SoalBenarSalahSeeder extends Seeder
{
    public function run()
    {
        // SISTEM PENCERNAAN
        SoalBenarSalah::create([
            'slug' => 'sistem-pencernaan',
            'nomor' => 8,
            'pertanyaan' => 'Lambung berfungsi untuk menyerap sari makanan.',
            'jawaban' => false,
            'poin' => 6,
        ]);
        SoalBenarSalah::create([
            'slug' => 'sistem-pencernaan',
            'nomor' => 9,
            'pertanyaan' => 'Usus halus merupakan tempat utama penyerapan nutrisi.',
            'jawaban' => true,
            'poin' => 6,
        ]);
        SoalBenarSalah::create([
            'slug' => 'sistem-pencernaan',
            'nomor' => 10,
            'pertanyaan' => 'Enzim amilase terdapat dalam air liur.',
            'jawaban' => true,
            'poin' => 8,
        ]);
        // SISTEM PERNAPASAN
        SoalBenarSalah::create([
            'slug' => 'sistem-pernapasan',
            'nomor' => 8,
            'pertanyaan' => 'Paru-paru kanan terdiri dari tiga lobus.',
            'jawaban' => true,
            'poin' => 6,
        ]);
        SoalBenarSalah::create([
            'slug' => 'sistem-pernapasan',
            'nomor' => 9,
            'pertanyaan' => 'Oksigen dikeluarkan dari tubuh saat kita menghembuskan napas.',
            'jawaban' => false,
            'poin' => 6,
        ]);
        SoalBenarSalah::create([
            'slug' => 'sistem-pernapasan',
            'nomor' => 10,
            'pertanyaan' => 'Diafragma berkontraksi saat inspirasi.',
            'jawaban' => true,
            'poin' => 8,
        ]);


        // SISTEM RANGKA
        SoalBenarSalah::create([
            'slug' => 'sistem-rangka',
            'nomor' => 8,
            'pertanyaan' => 'Tulang tengkorak melindungi organ jantung.',
            'jawaban' => false,
            'poin' => 6,
        ]);
        SoalBenarSalah::create([
            'slug' => 'sistem-rangka',
            'nomor' => 9,
            'pertanyaan' => 'Tulang pipa terdapat pada lengan dan kaki.',
            'jawaban' => true,
            'poin' => 6,
        ]);
        SoalBenarSalah::create([
            'slug' => 'sistem-rangka',
            'nomor' => 10,
            'pertanyaan' => 'Tulang rawan lebih keras daripada tulang keras.',
            'jawaban' => false,
            'poin' => 8,
        ]);

        // SISTEM REPRODUKSI
        SoalBenarSalah::create([
            'slug' => 'sistem-reproduksi',
            'nomor' => 8,
            'pertanyaan' => 'Sel telur diproduksi oleh testis.',
            'jawaban' => false,
            'poin' => 6,
        ]);
        SoalBenarSalah::create([
            'slug' => 'sistem-reproduksi',
            'nomor' => 9,
            'pertanyaan' => 'Proses pembuahan biasanya terjadi di tuba falopi.',
            'jawaban' => true,
            'poin' => 6,
        ]);
        SoalBenarSalah::create([
            'slug' => 'sistem-reproduksi',
            'nomor' => 10,
            'pertanyaan' => 'Zigot terbentuk setelah sperma membuahi sel telur.',
            'jawaban' => true,
            'poin' => 8,
        ]);

        // SISTEM OTOT
        SoalBenarSalah::create([
            'slug' => 'sistem-otot',
            'nomor' => 8,
            'pertanyaan' => 'Otot jantung bekerja di bawah kesadaran kita.',
            'jawaban' => false,
            'poin' => 6,
        ]);
        SoalBenarSalah::create([
            'slug' => 'sistem-otot',
            'nomor' => 9,
            'pertanyaan' => 'Otot polos terdapat pada saluran pencernaan.',
            'jawaban' => true,
            'poin' => 6,
        ]);
        SoalBenarSalah::create([
            'slug' => 'sistem-otot',
            'nomor' => 10,
            'pertanyaan' => 'Otot rangka menempel pada tulang dan menggerakkan tubuh.',
            'jawaban' => true,
            'poin' => 8,
        ]);

        // SISTEM SARAF
        SoalBenarSalah::create([
            'slug' => 'sistem-saraf',
            'nomor' => 8,
            'pertanyaan' => 'Otak kecil berfungsi untuk berpikir logis.',
            'jawaban' => false,
            'poin' => 6,
        ]);
        SoalBenarSalah::create([
            'slug' => 'sistem-saraf',
            'nomor' => 9,
            'pertanyaan' => 'Refleks terjadi tanpa perlu diproses oleh otak.',
            'jawaban' => true,
            'poin' => 6,
        ]);
        SoalBenarSalah::create([
            'slug' => 'sistem-saraf',
            'nomor' => 10,
            'pertanyaan' => 'Neuron motorik membawa impuls dari otak ke otot.',
            'jawaban' => true,
            'poin' => 8,
        ]);
    }
}
