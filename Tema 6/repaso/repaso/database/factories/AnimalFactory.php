<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Animal;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{

    protected $model = Animal::class; // Asegúrate de que esto está presente


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $especie = $this->faker->randomElement([
                'Perro', 'Gato', 'Loro', 'Conejo', 'Tortuga', 'Hamster', 'Caballo', 'Iguana'
        ]);

        return [
            'especie' => $especie,
            'slug' => Str::slug($especie . '-' . Str::random(5)),
            'peso' => $this->faker->randomFloat(2, 1, 100),
            'altura' => $this->faker->numberBetween(10,250),
            'fecha_nacimiento' => $this->faker->date('Y-m-d', 'now'),
        ];
    }
}
