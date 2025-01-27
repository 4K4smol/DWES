<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $table = 'imagenes';

    public function animales()
    {
        return $this->belongsTo(Animal::class);
    }




}
