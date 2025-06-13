<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoalPilgan extends Model
{
    protected $table = 'soal_pilgan';
    protected $fillable = [
        'slug', 'pertanyaan', 'opsi_a', 'opsi_b', 'opsi_c', 'opsi_d', 'jawaban',
    ];
}

