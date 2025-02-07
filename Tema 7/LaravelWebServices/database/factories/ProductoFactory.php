<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;
use App\Models\Categoria;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * El nombre del modelo que se va a utilizar.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define el estado por defecto del modelo.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'       => $this->faker->word,
            'descripcion'  => $this->faker->sentence,
            'precio'       => $this->faker->randomFloat(2, 10, 1000), // Decimal con 2 decimales entre 10 y 1000.
            'stock'        => $this->faker->numberBetween(0, 100),      // Número entero entre 0 y 100.
            'categoria_id' => Categoria::inRandomOrder()->first()->id,
        ];
    }
}
