<?php

namespace Database\Factories;

use App\Models\Cuidador;
use App\Models\Titulacion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CuidadorFactory extends Factory
{
    protected $model = Cuidador::class;

    public function definition(): array
    {
        $nombre = $this->faker->name;

        // Selecciona titulaciones aleatorias
        $titulacion1 = Titulacion::inRandomOrder()->first()->id ?? 1;
        $titulacion2 = Titulacion::inRandomOrder()->first()->id ?? 1;

        return [
            'nombre' => $nombre,
            'slug' => Str::slug($nombre),
            'id_titulacion1' => $titulacion1,
            'id_titulacion2' => $titulacion2,
        ];
    }
}
