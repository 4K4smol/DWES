<?php

namespace Database\Factories;
use App\Models\Titulo;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cuidador>
 */
class CuidadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'nombre' => $this->faker->unique()->firstName(),
            'titulo1_id' => Titulo::exists() ? Titulo::inRandomOrder()->first()->id : Titulo::factory()->create()->id,
            'titulo2_id' => Titulo::exists() ? Titulo::inRandomOrder()->first()->id : null,
        ];
    }
}
