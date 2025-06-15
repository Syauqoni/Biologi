<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('soal_pilgan', function (Blueprint $table) {
            $table->text('penjelasan')->nullable();
        });
    }

    public function down()
    {
        Schema::table('soal_pilgan', function (Blueprint $table) {
            $table->dropColumn('penjelasan');
        });
    }
};
