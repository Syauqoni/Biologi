<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('soal_drag', function (Blueprint $table) {
            $table->id();
            $table->string('slug'); // contoh: sistem-pencernaan
            $table->integer('nomor'); // index soal ke 6 atau 7
            $table->text('pertanyaan');
            $table->string('gambar')->nullable();
            $table->json('opsi'); // ["A", "B", "C", "D"]
            $table->json('urutan'); // jawaban yang benar, misal: ["Makanan dikunyah...", ...]
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('soal_drag');
    }
};
