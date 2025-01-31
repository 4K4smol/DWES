<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Animal;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $animales = Animal::all();

        foreach ($animales as $animal)
        {
            $i = new Image();
            $i->animal_id = $animal->id;
            $i->nombre = $animal->especie;
            $i->url = $animal->slug .'.png';
            $i->save();
        }
    }
}
