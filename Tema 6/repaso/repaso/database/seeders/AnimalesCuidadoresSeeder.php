<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Animal;
use app\Models\Cuidador;

class AnimalesCuidadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cuidadores = Cuidador::all();
        $animales = Animal::all();

        foreach ($cuidadores as $cuidador) {
            $animalesAleatorios = $animales->random(rand(1, 5))->pluck('id');
            $cuidador->animales()->attach($animalesAleatorios);
        }
        $this->command->info('Tabla cuidadores animales inicializada con datos');
    }
}
