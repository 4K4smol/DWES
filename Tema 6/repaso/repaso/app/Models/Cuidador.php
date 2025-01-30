<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cuidador extends Model
{
    use HasFactory;

    protected $table = 'cuidadores';


    public function animales(){
        return $this->belongsToMany(Animal::class, 'animales_cuidadores');
    }
}
