<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animales';

    protected $fillable = ['especie', 'peso', 'altura', 'fecha_nacimiento'];


    public function cuidadores() {
        return $this->belongsToMany(Cuidador::class, 'animales_cuidadores');
    }


    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
