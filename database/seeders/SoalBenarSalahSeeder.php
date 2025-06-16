<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoalBenarSalah;

class SoalBenarSalahSeeder extends Seeder
{
    public function run()
    {
        $soals = [
            // SISTEM PENCERNAAN
        [
            'slug' => 'sistem-pencernaan',
            'nomor' => 8,
            'pertanyaan' => 'Lambung berfungsi untuk menyerap sari makanan.',
            'jawaban' => false,
            'poin' => 6,
            'penjelasan' => 'Fungsi utama lambung adalah mencerna makanan secara kimia dan mekanik, bukan menyerap sari makanan. Penyerapan nutrisi terjadi di usus halus.',
        ],
        [
            'slug' => 'sistem-pencernaan',
            'nomor' => 9,
            'pertanyaan' => 'Usus halus merupakan tempat utama penyerapan nutrisi.',
            'jawaban' => true,
            'poin' => 6,
            'penjelasan' => 'Usus halus merupakan tempat utama terjadinya penyerapan nutrisi seperti glukosa, asam amino, dan asam lemak ke dalam aliran darah.',
        ],
        [
            'slug' => 'sistem-pencernaan',
            'nomor' => 10,
            'pertanyaan' => 'Enzim amilase terdapat dalam air liur.',
            'jawaban' => true,
            'poin' => 8,
            'penjelasan' => 'Air liur mengandung enzim amilase yang berfungsi memecah karbohidrat menjadi gula sederhana di dalam rongga mulut.',
        ],

        // SISTEM PERNAPASAN
        [
            'slug' => 'sistem-pernapasan',
            'nomor' => 8,
            'pertanyaan' => 'Paru-paru kanan terdiri dari tiga lobus.',
            'jawaban' => true,
            'poin' => 6,
            'penjelasan' => 'Paru-paru kanan memiliki tiga lobus yaitu lobus superior, lobus tengah, dan lobus inferior, sedangkan paru-paru kiri hanya memiliki dua lobus.',
        ],
        [
            'slug' => 'sistem-pernapasan',
            'nomor' => 9,
            'pertanyaan' => 'Oksigen dikeluarkan dari tubuh saat kita menghembuskan napas.',
            'jawaban' => false,
            'poin' => 6,
            'penjelasan' =>  'Saat menghembuskan napas, tubuh terutama mengeluarkan karbon dioksida (CO₂), bukan oksigen. Oksigen justru diserap ke dalam darah saat proses inspirasi.',
        ],
        [
            'slug' => 'sistem-pernapasan',
            'nomor' => 10,
            'pertanyaan' => 'Diafragma berkontraksi saat inspirasi.',
            'jawaban' => true,
            'poin' => 8,
            'penjelasan' => 'Saat inspirasi (menarik napas), otot diafragma berkontraksi dan mendatar, sehingga volume rongga dada meningkat dan udara masuk ke paru-paru.',
        ],

        // SISTEM RANGKA
        [
            'slug' => 'sistem-rangka',
            'nomor' => 8,
            'pertanyaan' => 'Tulang tengkorak melindungi organ jantung.',
            'jawaban' => false,
            'poin' => 6,
            'penjelasan' => 'Tulang tengkorak berfungsi melindungi otak, bukan jantung. Organ jantung dilindungi oleh tulang dada dan tulang rusuk.',
        ],
        [
            'slug' => 'sistem-rangka',
            'nomor' => 9,
            'pertanyaan' => 'Tulang pipa terdapat pada lengan dan kaki.',
            'jawaban' => true,
            'poin' => 6,
            'penjelasan' => 'Tulang pipa adalah tulang yang berbentuk panjang, seperti tulang paha (femur) dan lengan atas (humerus), dan berfungsi sebagai tuas dalam pergerakan.',
        ],
        [
            'slug' => 'sistem-rangka',
            'nomor' => 10,
            'pertanyaan' => 'Tulang rawan lebih keras daripada tulang keras.',
            'jawaban' => false,
            'poin' => 8,
            'penjelasan' => 'Tulang rawan (kartilago) lebih lentur dan tidak sekeras tulang keras. Fungsinya adalah sebagai bantalan dan penyokong yang fleksibel.',
        ],
        [
            'slug' => 'sistem-reproduksi',
            'nomor' => 8,
            'pertanyaan' => 'Sel telur diproduksi oleh testis.',
            'jawaban' => false,
            'poin' => 6,
            'penjelasan' => 'Sel telur diproduksi oleh ovarium (indung telur) pada wanita, sedangkan testis menghasilkan sperma pada pria.',
        ],
        [
            'slug' => 'sistem-reproduksi',
            'nomor' => 9,
            'pertanyaan' => 'Proses pembuahan biasanya terjadi di tuba falopi.',
            'jawaban' => true,
            'poin' => 6,
            'penjelasan' => 'Pembuahan umumnya terjadi di tuba falopi, yaitu saluran yang menghubungkan ovarium dengan uterus.',
        ],
        [
            'slug' => 'sistem-reproduksi',
            'nomor' => 10,
            'pertanyaan' => 'Zigot terbentuk setelah sperma membuahi sel telur.',
            'jawaban' => true,
            'poin' => 8,
            'penjelasan' => 'Zigot adalah sel pertama hasil dari pembuahan antara sel sperma dan sel telur. Zigot akan berkembang menjadi embrio.',
        ],

        // SISTEM OTOT
        [
            'slug' => 'sistem-otot',
            'nomor' => 8,
            'pertanyaan' => 'Otot jantung bekerja di bawah kesadaran kita.',
            'jawaban' => false,
            'poin' => 6,
            'penjelasan' => 'Otot jantung bekerja secara otomatis (tidak sadar) dan terus-menerus tanpa dikendalikan oleh kehendak kita.',
        ],
        [
            'slug' => 'sistem-otot',
            'nomor' => 9,
            'pertanyaan' => 'Otot polos terdapat pada saluran pencernaan.',
            'jawaban' => true,
            'poin' => 6,
            'penjelasan' => 'Otot polos ditemukan di organ dalam seperti saluran pencernaan dan bekerja secara tidak sadar untuk menggerakkan makanan.',
        ],
        [
            'slug' => 'sistem-otot',
            'nomor' => 10,
            'pertanyaan' => 'Otot rangka menempel pada tulang dan menggerakkan tubuh.',
            'jawaban' => true,
            'poin' => 8,
            'penjelasan' => 'Otot rangka menempel pada tulang dan berfungsi untuk menggerakkan bagian tubuh sesuai kehendak kita.',
        ],

        // SISTEM SARAF
        [
            'slug' => 'sistem-saraf',
            'nomor' => 8,
            'pertanyaan' => 'Otak kecil berfungsi untuk berpikir logis.',
            'jawaban' => false,
            'poin' => 6,
            'penjelasan' => 'Otak kecil (serebelum) berfungsi untuk mengatur keseimbangan dan koordinasi gerakan, bukan untuk berpikir logis. Fungsi berpikir logis dilakukan oleh otak besar (serebrum).',
        ],
        [
            'slug' => 'sistem-saraf',
            'nomor' => 9,
            'pertanyaan' => 'Refleks terjadi tanpa perlu diproses oleh otak.',
            'jawaban' => true,
            'poin' => 6,
            'penjelasan' => 'Refleks adalah respon cepat terhadap rangsangan yang diproses langsung oleh sumsum tulang belakang tanpa melibatkan otak.',
        ],
        [
            'slug' => 'sistem-saraf',
            'nomor' => 10,
            'pertanyaan' => 'Neuron motorik membawa impuls dari otak ke otot.',
            'jawaban' => true,
            'poin' => 8,
            'penjelasan' => 'Neuron motorik bertugas mengirimkan impuls dari sistem saraf pusat (otak atau sumsum tulang belakang) ke otot atau kelenjar untuk menghasilkan respon.',
        ],

        // SISTEM PEREDARAN DARAH
        [
            'slug' => 'sistem-peredaran-darah',
            'nomor' => 8,
            'pertanyaan' => 'Hemoglobin berguna untuk mengangkut oksigen.',
            'jawaban' => true,
            'poin' => 6,
            'penjelasan' => '',
        ],
        [
            'slug' => 'sistem-peredaran-darah',
            'nomor' => 9,
            'pertanyaan' => 'Peredaran darah manusia merupakan peredaran terbuka.',
            'jawaban' => false,
            'poin' => 6,
            'penjelasan' => '',
        ],
        [
            'slug' => 'sistem-peredaran-darah',
            'nomor' => 10,
            'pertanyaan' => 'Darah yang keluar dari jantung sebelah kiri miskin oksigen.',
            'jawaban' => false,
            'poin' => 8,
            'penjelasan' => '',
        ],

        // SISTEM EKSRESI
        [
            'slug' => 'sistem-eksresi',
            'nomor' => 8,
            'pertanyaan' => 'Hati juga merupakan organ ekskresi.',
            'jawaban' => true,
            'poin' => 6,
            'penjelasan' => '',
        ],
        [
            'slug' => 'sistem-eksresi',
            'nomor' => 9,
            'pertanyaan' => 'Paru-paru mengeluarkan CO₂ dan H₂O.',
            'jawaban' => true,
            'poin' => 6,
            'penjelasan' => '',
        ],
        [
            'slug' => 'sistem-eksresi',
            'nomor' => 10,
            'pertanyaan' => 'Ginjal menyaring darah dan menyimpan urine.',
            'jawaban' => false,
            'poin' => 8,
            'penjelasan' => '',
        ],

        // SISTEM ENDOKRIN
        [
            'slug' => 'sistem-endokrin',
            'nomor' => 8,
            'pertanyaan' => 'Hormon glukagon berguna untuk menurunkan gula darah.',
            'jawaban' => false,
            'poin' => 6,
            'penjelasan' => '',
        ],
        [
            'slug' => 'sistem-endokrin',
            'nomor' => 9,
            'pertanyaan' => 'Pituitari dapat melepaskan lebih dari satu jenis hormon.',
            'jawaban' => true,
            'poin' => 6,
            'penjelasan' => '',
        ],
        [
            'slug' => 'sistem-endokrin',
            'nomor' => 10,
            'pertanyaan' => 'Melatonin diproduksi kelenjar tiroid.',
            'jawaban' => false,
            'poin' => 8,
            'penjelasan' => '',
        ]
    
    ];
        foreach ($soals as $soal) {
            SoalBenarSalah::create($soal);
        }
    }
}
