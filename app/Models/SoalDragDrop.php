<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalDragDrop extends Model
{
    use HasFactory;

    protected $table = 'soal_drag';

    protected $fillable = [
        'slug',
        'nomor',
        'pertanyaan',
        'gambar',
        'opsi',
        'urutan',
        'poin',
        'penjelasan',
    ];

    protected $casts = [
        'opsi' => 'array',
        'urutan' => 'array',
    ];
}
