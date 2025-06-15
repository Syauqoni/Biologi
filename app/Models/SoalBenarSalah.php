<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalBenarSalah extends Model
{
    use HasFactory;

    protected $table = 'soal_benar_salah';

    protected $fillable = [
        'slug',
        'nomor',
        'pertanyaan',
        'poin',
        'penjelasan'
    ];
}

