<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run() {
        DB::table('animales')->delete();
        $this->call(AnimalSeeder::class);
        DB::table('users')->delete();
        $this->call(UserSeeder::class);
        DB::table('revisiones')->delete();
        $this->call(RevisionSeeder::class);
    }
}
