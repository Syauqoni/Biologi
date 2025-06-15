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
        Schema::table('soal_drag', function (Blueprint $table) {
            $table->text('penjelasan')->nullable();
        });

        Schema::table('soal_benar_salah', function (Blueprint $table) {
            $table->text('penjelasan')->nullable();
        });
    }

    public function down()
    {

        Schema::table('soal_drag', function (Blueprint $table) {
            $table->dropColumn('penjelasan');
        });

        Schema::table('soal_benar_salah', function (Blueprint $table) {
            $table->dropColumn('penjelasan');
        });
    }

};
