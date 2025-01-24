<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    private $user =
		array(
			'name' => 'admin',
			'email' => 'admin@admin.es',
			'password' => 'admin',
        );

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

                $admin = new User();
                $admin->name = $this->user['name'];
                $admin->email = $this->user['email'];
                $admin->password = $this->user['password'];
                $admin->save();

        $this->command->info('Tabla users inicializada con datos');
    }
}
