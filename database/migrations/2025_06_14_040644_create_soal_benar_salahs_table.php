<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('soal_benar_salah', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->integer('nomor');
            $table->text('pertanyaan');
            $table->boolean('jawaban'); // true = benar, false = salah
            $table->integer('poin')->default(1); // Langsung ditambah
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soal_benar_salah');
    }
};
