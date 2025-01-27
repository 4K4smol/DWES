<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Animal extends Model
{
    protected $table = 'animales';

    protected $fillable = [
        'especie',
        'slug',
        'peso',
        'altura',
        'fechaNacimiento',
        'alimentacion',
        'descripcion'
    ];

    public function getEdad()
    {
        $fechaFormateada=Carbon::parse($this->fechaNacimiento);
        return number_format($fechaFormateada->diffInYears(Carbon::now()),0);
    }


    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function revisiones(){
        return $this->hasMany(Revision::class);
    }

    public function cuidadores(){
        return $this->belongsToMany(Cuidador::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

}
