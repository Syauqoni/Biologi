<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('soal_pilgan', function (Blueprint $table) {
            $table->id();
            $table->string('slug'); // contoh: biologi, fisika, dsb
            $table->text('pertanyaan');
            $table->string('opsi_a');
            $table->string('opsi_b');
            $table->string('opsi_c');
            $table->string('opsi_d');
            $table->string('jawaban'); // misalnya "A", "B", dsb
            $table->integer('poin')->default(1); // Langsung ditambah
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('soal_pilgan');
    }
};

