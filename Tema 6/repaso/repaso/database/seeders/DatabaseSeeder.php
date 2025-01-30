<?php

namespace Database\Seeders;

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

        DB::table('animales_cuidadores')->delete();
        DB::table('cuidadores')->delete();
        DB::table('animales')->delete();

        $this->call(AnimalesSeeder::class);
        $this->call(CuidadoresSeeder::class);
        $this->call(AnimalesCuidadoresSeeder::class);

    }
}
