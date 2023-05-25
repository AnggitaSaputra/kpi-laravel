<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';
    protected $fillable = [
        'id_parameter',
        'id_proyek',
        'nama_tugas',
        'deskripsi',
        'prioritas',
        'status',
        'tanggal_mulai',
        'tanggal_selesai',
        'bobot'
    ];
}
