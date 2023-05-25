<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $table = 'proyek';
    protected $fillable = [
        'nama_proyek',
        'deskripsi_proyek',
        'tanggal_mulai',
        'tanggal_selesai',
        'estimasi_durasi',
        'status'
    ];
}
