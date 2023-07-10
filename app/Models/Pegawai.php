<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
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
    public function tugas()
    {
        return $this->hasMany(Pegawai_Bertugas::class);
    } 
    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'id_departemen', 'id_departemen');
    } 
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id_jabatan');
    } 
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan', 'id_perusahaan');
    } 
}
