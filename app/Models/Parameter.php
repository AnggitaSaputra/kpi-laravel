<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;
    
    protected $table = 'parameter';
    protected $primaryKey = 'id_parameter';
    protected $fillable = [
        'nama_parameter',
        'bobot',
        'created_at',
        'updated_at'
    ];
    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    } 
}
