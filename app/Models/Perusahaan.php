<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    
    protected $table = 'perusahaan';
    protected $primaryKey = 'id_perusahaan';
    protected $fillable = [
        'nama_perusahaan',
        'no_telpon',
        'alamat',
        'provisi',
        'kota'
    ];
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    } 
}
