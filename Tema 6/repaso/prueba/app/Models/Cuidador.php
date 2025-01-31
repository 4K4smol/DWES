<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuidador extends Model
{
    use HasFactory;

    protected $table = 'cuidadores';
    protected $fillable = ['nombre', 'titulo1_id', 'titulo2_id'];


    public function titulo1()
    {
        return $this->belongsTo(Titulo::class,'titulo1_id');
    }

    public function titulo2()
    {
        return $this->belongsTo(Titulo::class,'titulo2_id');
    }

    public function animales()
    {
        return $this->belongsToMany(Animal::class);
    }
}
