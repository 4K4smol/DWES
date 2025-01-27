<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('animal_cuidador')->delete();
        DB::table('revisiones')->delete();
        DB::table('animales')->delete();
        DB::table('cuidadores')->delete();
        DB::table('titulaciones')->delete();
        DB::table('users')->delete();

        $this->call(TitulacionSeeder::class);
        $this->call(CuidadorSeeder::class);
        $this->call(AnimalSeeder::class);
        $this->call(RevisionSeeder::class);
        $this->call(UserSeeder::class);
    }
}
