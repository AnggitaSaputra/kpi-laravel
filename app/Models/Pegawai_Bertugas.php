<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai_Bertugas extends Model
{
    use HasFactory;
    
    protected $table = 'pegawai_bertugas';
    protected $fillable = [
        'id_tugas',
        'id_pegawai'
    ];
}
