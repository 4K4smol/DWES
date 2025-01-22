<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'especie' => 'required|string|max:255',
                'peso' => 'required|numeric',
                'altura' => 'required|numeric',
                'fechaNacimiento' => 'required|date',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'alimentacion' => 'nullable|string|max:20',
                'descripcion' => 'nullable|string',
            ]);

            if ($request->hasFile('imagen')) {
                $validatedData['imagen'] = $request->file('imagen')->store('animals', 'public');
            }

            $validatedData['slug'] = Str::slug($validatedData['especie'], '-');

            Animal::create($validatedData);

            return redirect()->route('animals.index')
                ->with('success', 'Animal añadido con éxito.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    /**
     * Actualiza un animal existente.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Animal $animal)
    {
        try {
            $validatedData = $request->validate([
                'especie' => 'required|string|max:255',
                'peso' => 'required|numeric',
                'altura' => 'required|numeric',
                'fechaNacimiento' => 'required|date',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'alimentacion' => 'nullable|string|max:20',
                'descripcion' => 'nullable|string',
            ]);

            if ($request->hasFile('imagen')) {
                // Eliminar la imagen anterior si existe
                if ($animal->imagen) {
                    Storage::delete('public/' . $animal->imagen);
                }

                $validatedData['imagen'] = $request->file('imagen')->store('animals', 'public');
            }

            $validatedData['slug'] = Str::slug($validatedData['especie'], '-');
            // dd($validatedData);
            // Actualizar con los datos validados
            $animal->update($validatedData);

            // Redirigir con mensaje de éxito
            return redirect()->route('animals.index')
                ->with('success', 'Animal editado con éxito');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function delete(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('animals.index')
            ->with('success', 'Animal borrado con éxito.');
    }
}
