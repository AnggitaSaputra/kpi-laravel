<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    protected $table = 'departemen';
    protected $primaryKey = 'id_departemen';
    protected $fillable = [
        'nama_departemen',
    ];
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
    public function proyek_departemen()
    {
        return $this->hasMany(Proyek_Departemen::class);
    }
}
