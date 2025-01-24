<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CrearRevisionRequest;
use App\Models\Animal;
use App\Models\Revision;

class RevisionesController extends Controller
{
    public function add(Animal $animal)
    {
        return view('revisiones.add', compact('animal'));
    }

    public function store(CrearRevisionRequest $request)
    {

        $revision = new Revision();
        $revision->animal_id = $request->input('animal_id');
        $revision->fechaRevision = $request->input('fechaRevision');
        $revision->descripcion = $request->input('descripcion');

        $revision->save();

        return redirect()->route('animals.index', $revision)
        ->with('success', 'Revision añadido con éxito');
    }
}
