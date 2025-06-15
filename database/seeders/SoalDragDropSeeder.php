<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoalDragDrop;

class SoalDragDropSeeder extends Seeder
{
    public function run()
    {
        // sistem pencernaan
        SoalDragDrop::create([
            'slug' => 'sistem-pencernaan',
            'nomor' => 6,
            'pertanyaan' => 'Urutkan proses sistem pencernaan makanan:',
            'gambar' => 'SistemPencernaan.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Makanan dikunyah di mulut",
                "Makanan dicerna di lambung",
                "Makanan masuk ke usus halus",
                "Sisa makanan dibuang melalui anus"
            ],
            'poin' => 15,
            'penjelasan' => 'Proses pencernaan dimulai dari mulut, kemudian makanan dicerna secara kimiawi dan mekanis di lambung, dilanjutkan ke usus halus untuk penyerapan nutrisi, dan akhirnya sisa makanan dibuang melalui anus.',
        ]);

        SoalDragDrop::create([
            'slug' => 'sistem-pencernaan',
            'nomor' => 7,
            'pertanyaan' => 'Urutkan proses penyerapan sari makanan:',
            'gambar' => 'UsusHalus.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Sari-sari makanan diserap usus halus",
                "Dialirkan melalui darah",
                "Menuju seluruh tubuh",
                "Sisa tidak terserap dibuang"
            ],
            'poin' => 15,
            'penjelasan' => 'Usus halus menyerap nutrisi dari makanan, yang kemudian dialirkan oleh darah ke seluruh tubuh. Sisa yang tidak diserap akan dibuang melalui usus besar dan anus.',
        ]);

        // sistem-pernapasan
        SoalDragDrop::create([
            'slug' => 'sistem-pernapasan',
            'nomor' => 6,
            'pertanyaan' => 'Urutkan jalur udara saat proses inspirasi:',
            'gambar' => 'Pernapasan.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Udara masuk melalui hidung",
                "Melewati faring dan laring",
                "Masuk ke trakea dan bronkus",
                "Berakhir di alveolus"
            ],
            'poin' => 15,
            'penjelasan' =>  'Saat bernapas, udara masuk melalui hidung, kemudian melewati faring dan laring, diteruskan ke trakea dan bronkus, dan akhirnya sampai ke alveolus di paru-paru tempat pertukaran gas terjadi.',
        ]);

        SoalDragDrop::create([
            'slug' => 'sistem-pernapasan',
            'nomor' => 7,
            'pertanyaan' => 'Urutan proses pertukaran gas di paru-paru:',
            'gambar' => 'Pernapasan1.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Oksigen berdifusi ke darah",
                "Karbon dioksida berdifusi ke alveolus",
                "Oksigen diedarkan ke seluruh tubuh",
                "Karbon dioksida dikeluarkan saat ekspirasi"
            ],
            'poin' => 15,
            'penjelasan' => 'Oksigen yang masuk ke alveolus akan berdifusi ke kapiler darah, sedangkan karbon dioksida dari darah akan berpindah ke alveolus. Oksigen kemudian diedarkan ke seluruh tubuh dan karbon dioksida dikeluarkan saat ekspirasi.',
        ]);

        // sistem rangka
        SoalDragDrop::create([
             'slug' => 'sistem-rangka',
            'nomor' => 6,
            'pertanyaan' => 'Urutan proses penyembuhan tulang patah:',
            'gambar' => 'TulangPatah.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Terjadi pembengkakan di area patah",
                "Pembentukan jaringan fibrosa",
                "Pembentukan tulang baru (callus)",
                "Penyambungan tulang secara sempurna"
            ],
            'poin' => 15,
            'penjelasan' => 'Setelah tulang patah, tubuh merespons dengan pembengkakan dan inflamasi. Kemudian jaringan fibrosa terbentuk untuk menstabilkan area patah. Proses dilanjutkan dengan pembentukan callus (tulang baru) dan akhirnya tulang menyatu secara permanen.',
        ]);

        SoalDragDrop::create([
            'slug' => 'sistem-rangka',
            'nomor' => 7,
            'pertanyaan' => 'Urutkan susunan bagian sistem rangka tubuh:',
            'gambar' => 'SistemRangkaManusia.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Tengkorak",
                "Tulang belakang",
                "Tulang rusuk",
                "Tulang anggota gerak"
            ],
            'poin' => 15,
            'penjelasan' => 'Susunan sistem rangka dimulai dari tengkorak (melindungi otak), lalu ke tulang belakang sebagai penyangga tubuh, dilanjutkan tulang rusuk yang melindungi organ vital, dan terakhir anggota gerak seperti lengan dan kaki.',
        ]);

        // sistem reproduksi
        SoalDragDrop::create([
            'slug' => 'sistem-reproduksi',
            'nomor' => 6,
            'pertanyaan' => 'Urutan proses terjadinya kehamilan:',
            'gambar' => 'Uterus.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Ovulasi terjadi dan sel telur dilepaskan",
                "Sperma membuahi sel telur",
                "Zigot terbentuk",
                "Zigot menempel di dinding rahim"
            ],
            'poin' => 15,
            'penjelasan' => 'Proses kehamilan dimulai dari ovulasi, saat sel telur dilepaskan. Jika bertemu sperma, pembuahan terjadi dan membentuk zigot. Zigot kemudian bergerak ke rahim dan menempel di dinding rahim untuk berkembang.',
        ]);

        SoalDragDrop::create([
            'slug' => 'sistem-reproduksi',
            'nomor' => 7,
            'pertanyaan' => 'Urutkan perjalanan sperma saat pembuahan:',
            'gambar' => 'ReproduksiPria.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Diproduksi di testis",
                "Masuk ke vas deferens",
                "Keluar melalui uretra",
                "Masuk ke vagina dan menuju tuba falopi"
            ],
            'poin' => 15,
            'penjelasan' => 'Sperma diproduksi di testis, lalu disalurkan melalui vas deferens. Saat ejakulasi, sperma keluar lewat uretra dan masuk ke vagina. Dari situ, sperma bergerak menuju tuba falopi untuk membuahi sel telur.',
        ]);

        // sistem otot
        SoalDragDrop::create([
            'slug' => 'sistem-otot',
            'nomor' => 6,
            'pertanyaan' => 'Urutan kontraksi otot rangka:',
            'gambar' => 'OtotLenganLurus.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Impuls saraf diterima otot",
                "Ion kalsium dilepaskan",
                "Aktin dan miosin berikatan",
                "Otot berkontraksi"
            ],
            'poin' => 15,
            'penjelasan' => 'Saat otot rangka menerima impuls saraf, ion kalsium dilepaskan dari retikulum sarkoplasma. Ion ini memungkinkan aktin dan miosin membentuk ikatan, menghasilkan kontraksi otot.',
        ]);

        SoalDragDrop::create([
            'slug' => 'sistem-otot',
            'nomor' => 7,
            'pertanyaan' => 'Urutan proses relaksasi otot:',
            'gambar' => 'OtotLengan.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Impuls berhenti",
                "Ion kalsium kembali ke retikulum",
                "Ikatan aktin-miosin lepas",
                "Otot kembali rileks"
            ],
            'poin' => 15,
            'penjelasan' => 'Ketika impuls saraf berhenti, ion kalsium dipompa kembali ke retikulum sarkoplasma. Hal ini menyebabkan ikatan aktin dan miosin lepas, sehingga otot berhenti berkontraksi dan kembali rileks.',
        ]);
        
        // sistem saraf
        SoalDragDrop::create([
            'slug' => 'sistem-saraf',
            'nomor' => 6,
            'pertanyaan' => 'Urutan jalur impuls refleks lutut:',
            'gambar' => 'SarafLutut.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Rangsangan diterima reseptor",
                "Impuls menuju sumsum tulang belakang",
                "Impuls dikirim ke otot melalui saraf motorik",
                "Kaki bergerak secara refleks"
            ],
            'poin' => 15,
            'penjelasan' => 'Pada refleks lutut, rangsangan dari ketukan diterima oleh reseptor dan impuls langsung dikirim ke sumsum tulang belakang tanpa melalui otak. Dari sana, impuls diteruskan ke otot via saraf motorik, menyebabkan gerakan refleks.',
        ]);

        SoalDragDrop::create([
            'slug' => 'sistem-saraf',
            'nomor' => 7,
            'pertanyaan' => 'Urutan pengolahan informasi oleh otak:',
            'gambar' => 'Otak.png',
            'opsi' => ["A", "B", "C", "D"],
            'urutan' => [
                "Indra menerima rangsangan",
                "Impuls menuju otak",
                "Otak memproses informasi",
                "Tanggapan dikirim ke efektor"
            ],
            'poin' => 15,
            'penjelasan' => 'Indra seperti mata atau kulit menerima rangsangan dan mengubahnya menjadi impuls listrik. Impuls ini dikirim ke otak, diproses, dan kemudian tanggapan dikirim ke efektor (seperti otot) untuk menghasilkan respons.',
        ]);

    }
}
