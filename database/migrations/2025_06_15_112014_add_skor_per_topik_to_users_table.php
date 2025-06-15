<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::table('users', function (Blueprint $table) {
            $table->integer('skor_pernapasan')->default(0);
            $table->integer('skor_pencernaan')->default(0);
            $table->integer('skor_rangka')->default(0);
            $table->integer('skor_reproduksi')->default(0);
            $table->integer('skor_otot')->default(0);
            $table->integer('skor_saraf')->default(0);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
