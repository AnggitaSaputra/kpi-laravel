<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek_Departemen extends Model
{
    use HasFactory;

    protected $table = 'proyek_departemen';
    protected $primaryKey = 'id_proyek_departemen';
    protected $fillable = [
        'id_proyek_departemen',
        'id_departemen',
        'id_proyek'
    ];
    public function departemen()
    {
        return $this->belongsTo(Departmeen::class, 'id_departemen', 'id_departemen');
    }
    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'id_proyek', 'id_proyek');
    }    
}
