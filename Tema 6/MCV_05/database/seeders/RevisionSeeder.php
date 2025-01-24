<?php

namespace Database\Seeders;

use App\Models\Revision;
use Illuminate\Database\Seeder;

class RevisionSeeder extends Seeder
{

    private $revisiones = array(
		array(
            'animal_id' => '1',
			'fechaRevision' => '2014-09-07',
			'descripcion' => 'Esta malito',
        ),
        array(
            'animal_id' => '1',
			'fechaRevision' => '2016-12-07',
			'descripcion' => 'Esta muy malito',
        ),);

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->revisiones as $revision)
            {
                $r = new Revision();
                $r->animal_id = $revision['animal_id'];
                $r->fechaRevision = $revision['fechaRevision'];
                $r->descripcion = $revision['descripcion'];

                $r->save();
            }
        $this->command->info('Tabla revisiones inicializada con datos');
    }
}
