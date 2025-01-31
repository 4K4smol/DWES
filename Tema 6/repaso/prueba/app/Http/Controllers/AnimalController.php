<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Image;
use Illuminate\Support\Str;
use App\Http\Requests\CreateAnimalRequest;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animales = Animal::all();
        return view('animales.index', compact('animales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('animales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAnimalRequest $request)
    {
        $animal = new Animal();

        $animal->especie = $request->input('especie');
        $animal->slug = str::slug($request->input('especie'));
        $animal->fecha_nacimiento = $request->input('fecha_nacimiento');
        $animal->save();

        if ($request->file('imagen')) {
            $path = $request->file('imagen')->store('imagenes','public');
            $i = new Image();
            $i->animal_id = $animal->id;
            $i->nombre = $animal->especie;
            $i->url = basename($path);
            $i->save();
        }

        return redirect()->route('animales.index')->with('success', 'Animal guardado correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        return view('animales.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateAnimalRequest $request, Animal $animal)
    {
        $animal->update([
            'especie' => $request->input('especie'),
            'peso' => $request->input('peso'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
        ]);

        return redirect()->route('animales.index')->with('success', 'Animal editado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
