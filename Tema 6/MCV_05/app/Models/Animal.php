<?php

namespace App\Models;

use Illuminate\Support\Str;
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
        'imagen',
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

}
