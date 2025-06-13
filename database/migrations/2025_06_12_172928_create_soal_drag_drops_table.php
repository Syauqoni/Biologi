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
        Schema::create('soal_drag_drops', function (Blueprint $table) {
            $table->id();
            $table->string('slug'); // topik kuis
            $table->text('pertanyaan');
            $table->string('gambar')->nullable();
            $table->json('opsi'); // ["A", "B", "C", "D"]
            $table->json('urutan'); // ["Langkah 1", "Langkah 2", "Langkah 3", "Langkah 4"]
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soal_drag_drops');
    }
};
