<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Http\Requests\CrearAnimalRequest;

class AnimalsController extends Controller
{
    public function index()
    {
        $animals = Animal::all();
        return view('animals.index', compact('animals'));
    }

    /**
     * @param App\Models\Animal Animal
     * @return Illuminate\Http\Request
     */
    public function view(Animal $animal)
    {
        return view('animals.view', compact('animal'));
    }

    public function add()
    {
        return view('animals.add');
    }

    public function edit(Animal $animal)
    {
        return view('animals.edit', compact('animal'));
    }

    public function store(CrearAnimalRequest $request)
    {
        $animal = new Animal();
        $animal->especie = $request->input('especie');
        $animal->peso = $request->input('peso');
        $animal->altura = $request->input('altura');
        $animal->alimentacion = $request->input('alimentacion');
        $animal->fechaNacimiento = $request->input('fechaNacimiento');
        $animal->descripcion = $request->input('descripcion');
        $animal->slug = strtolower($request->input('especie'));

        // Guardar la imagen
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('public/animales');
            $animal->imagen = basename($path);
        }
        dd($animal);
        $animal->save();

        return redirect()->route('animals.index', $animal)
        ->with('success', 'Animal añadido con éxito');

    }


    /**
     * Actualiza un animal existente.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CrearAnimalRequest $request, Animal $animal)
    {
        $animal->especie = $request->input('especie');
        $animal->peso = $request->input('peso');
        $animal->altura = $request->input('altura');
        $animal->fechaNacimiento = $request->input('fechaNacimiento');
        $animal->slug = strtolower($request->input('especie'));

        // Actualizar la imagen si se sube una nueva
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('public/animales');
            $animal->imagen = basename($path);
        }

        $animal->save();

        return redirect()->route('animals.index', $animal)
        ->with('success', 'Animal editado con éxito');

    }


    public function delete(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('animals.index')
            ->with('success', 'Animal borrado con éxito.');
    }
}
