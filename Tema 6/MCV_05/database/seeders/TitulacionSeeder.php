<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Titulacion;

class TitulacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Titulacion::factory(20)->create();
        $this->command->info('Tabla titulaciones inicializada con datos');
    }
}
