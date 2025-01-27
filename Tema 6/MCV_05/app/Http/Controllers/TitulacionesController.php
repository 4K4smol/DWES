<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Titulacion;

class TitulacionesController extends Controller
{
    public function show(Titulacion $titulacion)
    {
        return view('titulaciones.show', compact('titulacion'));
    }
}
