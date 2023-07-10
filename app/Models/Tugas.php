<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $table = 'tugas';
    protected $primaryKey = 'id_tugas';
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
    public function pegawai_bertugas()
    {
        return $this->hasMany(Pegawai_Bertugas::class);
    }
    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'id_proyek', 'id_proyek');
    } 
    public function parameter()
    {
        return $this->belongsTo(Parameter::class, 'id_parameter', 'id_parameter');
    } 
}
