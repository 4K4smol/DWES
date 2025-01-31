<?php

namespace Database\Seeders;

use App\Models\Cuidador;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();



        DB::table('animales')->delete();
        DB::table('cuidadores')->delete();
        DB::table('animales_cuidadores')->delete();
        DB::table('images')->delete();
        DB::table('titulos')->delete();

        $this->call(AnimalSeeder::class);
        $this->call(TituloSeeder::class);
        $this->call(CuidadorSeeder::class);
        $this->call(ImageSeeder::class);

    }
}
