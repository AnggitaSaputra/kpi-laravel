<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $fillable = [
        'id_departemen',
        'id_perusahaan',
        'id_jabatan',
        'nama_pegawai',
        'username',
        'password',
        'pic',
        'email',
        'alamat',
        'telepon',
        'no_ktp',
        'tanggal_masuk'
    ];
}
