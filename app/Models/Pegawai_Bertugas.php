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
    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    } 
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    } 
}
