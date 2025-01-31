<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Titulo;

class TituloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titulos = ['Ingeniero', 'Doctor', 'Abogado', 'Maestro', 'Científico', 'Programador', 'Piloto'];

        foreach ($titulos as $titulo) {
            Titulo::firstOrCreate(['titulo' => $titulo]);
        }
    }
}
