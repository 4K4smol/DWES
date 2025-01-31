<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animales';
    protected $fillable = [
        'especie',
        'peso',
        'fecha_nacimiento'
    ];

    public function cuidadores()
    {
        return $this->belongsToMany(Cuidador::class, 'animales_cuidadores');
    }
}
