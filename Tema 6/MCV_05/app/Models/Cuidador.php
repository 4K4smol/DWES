<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cuidador extends Model
{
    use HasFactory;

    protected $table = 'cuidadores';

    /**
     * Relación con la primera titulación (uno a muchos).
     */
    public function titulacion1()
    {
        return $this->belongsTo(Titulacion::class, 'id_titulacion1');
    }

    /**
     * Relación con la segunda titulación (uno a muchos).
     */
    public function titulacion2()
    {
        return $this->belongsTo(Titulacion::class, 'id_titulacion2');
    }

    public function animales()
    {
        return $this->belongsToMany(Animal::class);
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }


}
