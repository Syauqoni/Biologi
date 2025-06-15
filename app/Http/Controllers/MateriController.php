<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Menampilkan halaman daftar semua topik materi.
     */
    public function index()
    {
        $dataMateri = $this->getAllMateriData();
        return view('home.materi', ['materi' => $dataMateri]);
    }

    /**
     * Menampilkan halaman detail untuk satu materi berdasarkan slug.
     */
    public function show($slug)
    {
        $allMateri = $this->getAllMateriData();
        $materiDetail = null;
        foreach ($allMateri as $materi) {
            if ($materi['slug'] === $slug) {
                $materiDetail = $materi;
                break;
            }
        }

        if (!$materiDetail) {
            return redirect()->route('materi.index')->with('error', 'Materi tidak ditemukan.');
        }

        return view('home.materi_detail', ['materi' => $materiDetail]);
    }

    /**
     * Helper method yang berisi semua konten materi yang detail.
     * Kontennya dibuat berdasarkan soal-soal kuis yang Anda berikan.
     */
    private function getAllMateriData()
    {
        return [
            [
                'gambar' => 'OrganPencernaan.png', 
                'judul' => 'SISTEM PENCERNAAN', 
                'slug' => 'sistem-pencernaan',
                'konten' => "
                    Sistem pencernaan adalah serangkaian organ kompleks yang berfungsi memecah molekul makanan besar menjadi molekul kecil yang dapat diserap tubuh untuk energi, pertumbuhan, dan perbaikan.
                    <h4>Tahapan Proses Pencernaan:</h4>
                    <ol>
                        <li><b>Mulut:</b> Titik awal pencernaan. Di sini terjadi dua proses:
                            <ul>
                                <li><b>Pencernaan Mekanis:</b> Gigi mengunyah dan menghancurkan makanan.</li>
                                <li><b>Pencernaan Kimiawi:</b> <strong>Enzim amilase</strong> yang terdapat dalam air liur mulai memecah karbohidrat (amilum) menjadi gula yang lebih sederhana.</li>
                            </ul>
                        </li>
                        <li><b>Kerongkongan (Esofagus):</b> Makanan yang telah ditelan didorong ke lambung melalui gerakan otot ritmis yang disebut <strong>gerakan peristaltik</strong>.</li>
                        <li><b>Lambung:</b> Makanan dicerna lebih lanjut. Lambung menghasilkan asam klorida (HCl) untuk membunuh bakteri dan enzim pepsin untuk memecah protein. <strong>Lambung tidak berfungsi menyerap sari makanan</strong>, melainkan sebagai tempat pencernaan utama.</li>
                        <li><b>Usus Halus:</b> Ini adalah organ tempat terjadinya sebagian besar pencernaan kimiawi dan <strong>penyerapan nutrisi utama</strong>. Hati menghasilkan <strong>empedu</strong> untuk mengemulsi lemak, sementara pankreas melepaskan enzim-enzim penting. Nutrisi yang sudah dipecah diserap melalui dinding usus halus.</li>
                        <li><b>Usus Besar:</b> Fungsi utamanya adalah menyerap kembali air dan elektrolit dari sisa makanan yang tidak tercerna, lalu memadatkannya menjadi feses.</li>
                        <li><b>Anus:</b> Jalur terakhir untuk mengeluarkan sisa makanan dari tubuh.</li>
                    </ol>
                    <h4>Proses Penyerapan Nutrisi:</h4>
                    <p>Setelah sari-sari makanan diserap oleh usus halus, nutrisi tersebut masuk ke dalam aliran darah dan dialirkan ke seluruh tubuh untuk digunakan oleh sel-sel.</p>
                ",
                'gambar_detail' => 'MateriSistemPencernaan.jpg'
            ],
            [
                'gambar' => 'SistemPernapasan.png', 
                'judul' => 'SISTEM PERNAPASAN', 
                'slug' => 'sistem-pernapasan',
                'konten' => "
                    Sistem pernapasan memungkinkan tubuh untuk mengambil oksigen (O2), gas vital yang dibutuhkan oleh semua sel, dan membuang produk limbah berupa karbon dioksida (CO2).
                    <h4>Urutan Jalur Pernapasan:</h4>
                    <ol>
                        <li>Udara masuk melalui <strong>hidung</strong> atau mulut, di mana ia disaring dan dihangatkan.</li>
                        <li>Melewati <strong>faring</strong> (tenggorokan) dan <strong>laring</strong> (kotak suara).</li>
                        <li>Masuk ke <strong>trakea</strong> (batang tenggorokan).</li>
                        <li>Trakea bercabang menjadi dua <strong>bronkus</strong>, satu menuju paru-paru kanan dan satu menuju paru-paru kiri.</li>
                        <li>Di dalam paru-paru, bronkus bercabang lagi menjadi saluran yang lebih kecil hingga berakhir di <strong>alveolus</strong>. Paru-paru kanan memiliki <strong>tiga lobus</strong>, sementara yang kiri dua lobus.</li>
                    </ol>
                    <h4>Mekanisme Pertukaran Gas dan Bernapas:</h4>
                    <ul>
                        <li><b>Alveolus:</b> Di kantung-kantung udara kecil inilah fungsi inti pernapasan terjadi. Oksigen dari udara yang kita hirup berdifusi masuk ke dalam pembuluh darah kapiler, sementara karbon dioksida dari darah berdifusi ke alveolus untuk dikeluarkan.</li>
                        <li><b>Inspirasi (Menghirup):</b> Saat kita menarik napas, otot <strong>diafragma berkontraksi</strong> dan bergerak ke bawah, memperluas rongga dada dan memungkinkan paru-paru terisi udara.</li>
                        <li><b>Ekspirasi (Menghembuskan):</b> Saat kita menghembuskan napas, diafragma rileks, rongga dada menyusut, dan udara yang kaya <strong>karbon dioksida</strong> (bukan oksigen) didorong keluar.</li>
                    </ul>
                ",
                'gambar_detail' => 'MateriSistemPernapasan.jpg'
            ],
            [
                'gambar' => 'SistemRangka.png', 
                'judul' => 'SISTEM RANGKA', 
                'slug' => 'sistem-rangka',
                'konten' => "
                    Sistem rangka adalah fondasi tubuh kita, memberikan struktur, perlindungan, dan memungkinkan pergerakan.
                    <h4>Fungsi Utama:</h4>
                    <ul>
                        <li><b>Dukungan dan Bentuk:</b> Memberikan kerangka yang kokoh bagi tubuh.</li>
                        <li><b>Perlindungan:</b> Melindungi organ-organ dalam yang rapuh. Contoh paling jelas adalah <strong>tulang tengkorak</strong> yang melindungi otak, bukan jantung. Jantung dilindungi oleh tulang rusuk.</li>
                        <li><b>Pergerakan:</b> Tulang berfungsi sebagai pengungkit yang digerakkan oleh otot.</li>
                    </ul>
                    <h4>Struktur dan Jenis Tulang:</h4>
                    <ul>
                        <li><b>Jenis Tulang:</b> Berdasarkan bentuknya, ada <strong>tulang pipa</strong> (panjang) seperti pada lengan dan kaki, tulang pipih (tengkorak), dan tulang pendek (pergelangan tangan).</li>
                        <li><b>Komposisi:</b> Tulang keras merupakan jaringan yang padat dan kuat, sedangkan <strong>tulang rawan</strong> lebih fleksibel dan ditemukan di ujung sendi, hidung, dan telinga. Tulang rawan tidak lebih keras dari tulang keras.</li>
                        <li><b>Sendi:</b> Merupakan titik pertemuan antar tulang yang memungkinkan terjadinya gerakan.</li>
                        <li><b>Tulang Belakang:</b> Terdiri dari ruas-ruas tulang yang disebut <strong>vertebra</strong>.</li>
                    </ul>
                ",
                'gambar_detail' => 'MateriSistemRangka.jpg'
            ],
            [
                'gambar' => 'SistemReproduksi.png', 
                'judul' => 'SISTEM REPRODUKSI', 
                'slug' => 'sistem-reproduksi',
                'konten' => "
                    Sistem reproduksi memungkinkan manusia untuk berkembang biak dan melanjutkan keturunan.
                    <h4>Proses Reproduksi:</h4>
                    <ol>
                        <li><b>Produksi Sel Kelamin:</b> Pria menghasilkan <strong>sel sperma</strong> di dalam <strong>testis</strong>. Wanita menghasilkan <strong>sel telur (ovum)</strong> di dalam ovarium.</li>
                        <li><b>Ovulasi:</b> Pelepasan sel telur matang dari ovarium.</li>
                        <li><b>Fertilisasi (Pembuahan):</b> Proses bertemunya dan menyatunya sel sperma dengan sel telur. Proses ini umumnya terjadi di dalam <strong>tuba falopi</strong>.</li>
                        <li><b>Pembentukan Zigot:</b> Hasil dari fertilisasi adalah sel tunggal yang disebut <strong>zigot</strong>.</li>
                        <li><b>Implantasi dan Kehamilan:</b> Zigot akan membelah diri menjadi embrio dan bergerak menuju <strong>uterus (rahim)</strong>, lalu menempel pada dindingnya untuk berkembang menjadi janin.</li>
                    </ol>
                    <p>Hormon memegang peranan krusial dalam sistem ini. Pada wanita, <strong>estrogen</strong> sangat penting untuk mengatur siklus menstruasi dan perkembangan ciri-ciri seksual sekunder. Pada pria, testosteron berperan dalam produksi sperma.</p>
                ",
                'gambar_detail' => 'MateriSistemReproduksi.jpg'
            ],
            [
                'gambar' => 'SistemOtot.png', 
                'judul' => 'SISTEM OTOT', 
                'slug' => 'sistem-otot',
                'konten' => "
                    Sistem otot adalah jaringan yang memungkinkan tubuh untuk bergerak, menjaga postur, dan mengedarkan darah.
                    <h4>Tiga Tipe Otot:</h4>
                    <ul>
                        <li><b>Otot Rangka (Otot Lurik):</b> Ini adalah otot yang menempel pada tulang dan bekerja <strong>di bawah kesadaran kita (volunter)</strong> untuk melakukan gerakan seperti berjalan, mengangkat, dan berbicara.</li>
                        <li><b>Otot Polos:</b> Ditemukan di dinding organ dalam seperti lambung, usus, dan pembuluh darah. Otot ini bekerja <strong>di luar kesadaran kita (involunter)</strong> untuk mengatur fungsi organ.</li>
                        <li><b>Otot Jantung:</b> Hanya ditemukan di jantung. Otot ini juga bekerja <strong>di luar kesadaran</strong> dan memiliki daya tahan luar biasa untuk terus memompa darah.</li>
                    </ul>
                    <h4>Cara Kerja Otot:</h4>
                    <p>Otot bekerja secara berpasangan untuk menghasilkan gerakan. Gerakan ini seringkali bersifat <strong>antagonis</strong>, artinya ketika satu otot berkontraksi (memendek), otot pasangannya rileks (memanjang). Contohnya adalah kerja otot bisep dan trisep pada lengan.</p>
                ",
                'gambar_detail' => 'MateriSistemOtot.jpg'
            ],
            [
                'gambar' => 'SistemSaraf.png', 
                'judul' => 'SISTEM SARAF', 
                'slug' => 'sistem-saraf',
                'konten' => "
                    Sistem saraf adalah jaringan komunikasi dan kendali tubuh yang sangat kompleks.
                    <h4>Struktur dan Fungsi:</h4>
                    <ul>
                        <li><b>Neuron (Sel Saraf):</b> Unit fungsional dasar sistem saraf. Terdiri dari dendrit (menerima sinyal), badan sel, dan <strong>akson</strong> (mengirim sinyal ke neuron lain).</li>
                        <li><b>Saraf Sensorik:</b> Membawa impuls (informasi) dari organ indra (misalnya kulit, mata) ke sistem saraf pusat.</li>
                        <li><b>Saraf Motorik:</b> Membawa perintah dari sistem saraf pusat ke otot atau kelenjar (efektor) untuk menghasilkan respons.</li>
                    </ul>
                    <h4>Sistem Saraf Pusat:</h4>
                    <ul>
                        <li><b>Otak:</b> Pusat pengolahan informasi. <strong>Otak besar (serebrum)</strong> bertanggung jawab untuk fungsi kognitif tinggi seperti berpikir logis dan memori. Sementara itu, <strong>otak kecil (serebelum)</strong> berperan penting dalam mengatur keseimbangan dan koordinasi gerakan.</li>
                        <li><b>Sumsum Tulang Belakang:</b> Menjadi jalur utama untuk sinyal antara otak dan bagian tubuh lainnya, serta menjadi pusat untuk <strong>gerak refleks</strong>. Gerak refleks adalah respons otomatis dan sangat cepat terhadap rangsangan yang terjadi tanpa diproses terlebih dahulu oleh otak, memberikan perlindungan instan.</li>
                    </ul>
                ",
                'gambar_detail' => 'MateriSistemSaraf.jpg'
            ],
        ];
    }
}
