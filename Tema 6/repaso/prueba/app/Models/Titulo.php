<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Titulo extends Model
{
    use HasFactory;

    protected $table = 'titulos';
    protected $fillable = ['titulo'];


    public function cuidadores()
    {
        return $this->hasMany(Cuidador::class, 'titulo1_id')
            ->orWhere('titulo2_id');
    }
}
