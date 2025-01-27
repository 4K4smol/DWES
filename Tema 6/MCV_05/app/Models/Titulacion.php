<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titulacion extends Model
{
    use HasFactory;

    protected $table = 'titulaciones';

    /**
     * Relación inversa con `Cuidador` (uno a muchos).
     */
    public function cuidadores()
    {
        return $this->hasMany(Cuidador::class, 'id_titulacion1')
            ->orWhere('id_titulacion2');
    }


}
