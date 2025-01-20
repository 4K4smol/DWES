<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Animal;

    Class AnimalsController extends Controller
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
            return view('animals.edit',compact('animal'));
        }

        public function store (Request $request)
        {
            // En caso de ser valido el objeto sera igual a la variable
            $validatedData = $request->validate([
                'especie' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'peso' => 'required|float',
                'altura' => 'required|float',
                'fechaNaciemiento' => 'required|date',
                'imagen' => '|image|mimes:jpeg,png,jpg,gif|max:255',
                'alimentacion' => 'string|max:20',
                'descripcion' => '|string|',
            ]);

            if ($request->hasFile('imagen')) {
                // Eliminar imagen existente
                if ($request->imagen) {
                    Storage::delete('public/' . $request->imagen);
                }
                $imagePath = $request->file('imagen')->store('animals', 'public');
                $validatedData['imagen'] = $imagePath;
            }

            Animal::create([$validatedData]);

            return redirect()->route('animals.index')
            ->with('success', 'Animal añadido con exito.');

        }

        /**
         * Actualiza un animal existente.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\RedirectResponse
         */
        public function update(Request $request)
        {
            // Validar los datos
            $validatedData = $request->validate([
                'descripcion' => '|string|',
                'alimentacion' => 'string|max:20',
                'fechaNaciemiento' => 'required|date',
                'altura' => 'required|float',
                'peso' => 'required|float',
                'slug' => 'required|string|max:255',
                'especie' => 'required|string|max:255',
                'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:255',
            ]);

            $animal = Animal::findOrFail($validatedData['id']);

            // Comprobar si existe el file imagen
            if ($request->hasFile('imagen')) {
                // Eliminar imagen existente
                if ($animal->imagen) {
                    Storage::delete('public/' . $animal->imagen);
                }
                $imagePath = $request->file('imagen')->store('animals', 'public');
                $validatedData['imagen'] = $imagePath;
            }

            // Actualizar el animal con los datos validados
            $animal->update($validatedData);

            // Redirigir con mensaje de éxito
            return redirect()->route('animals.index')
                ->with('success', 'Animal editado con éxito');
        }

        public function delete ($id)
        {
            $animal = Animal::findOrFail($id);
            $animal->delete();

            return redirect()->route('animals.index')
            ->with('success','Animal borrado exito');
        }

        public function getEdad($animal)
        {
            $fechaFormateada = Carbon::parse($animal->fechaNacimiento);
            // dd($fechaFormateada->diffInYears(Carbon::now()));
            return number_format($fechaFormateada->diffInYears(Carbon::now()),0);
        }

    }
