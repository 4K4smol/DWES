<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $especie = $this->faker->unique()->randomElement([
                'León', 'Tigre', 'Elefante', 'Jirafa', 'Panda', 'Águila', 'Cocodrilo', 'Lobo', 'Delfín', 'Ornitorrinco'
        ]);
        return [
            'especie' => $especie,
            'slug' => str::slug($especie),
            'peso' => $this->faker->randomDigitNotNull(),
            'fecha_nacimiento' => $this->faker->date('y-m-d','now'),
        ];
    }
}
