<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuidador;

class CuidadoresController extends Controller
{
    public function show(Cuidador $cuidador, Request $request)
    {
        $animal = $request->query('animal');
        return view('cuidadores.show', compact('cuidador', 'animal'));
    }

}
