<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek_Departemen extends Model
{
    use HasFactory;

    protected $table = 'proyek_departemen';
    protected $fillable = [
        'id_departemen',
        'id_proyek'
    ];
}
