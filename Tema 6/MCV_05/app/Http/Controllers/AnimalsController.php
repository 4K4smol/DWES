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

        public function view($id)
        {
            $animal = Animal::findOrFail($id);
            return view('animals.view', compact('animal'));
        }

        public function add()
        {
            return view('animals.add');
        }

        public function edit($id)
        {
            $animal = Animal::findOrFail($id);
            return view('animals.edit',compact('animal'));
        }

        public function store (Request $request)
        {
            $request->validate([
            'nombre' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|', // Validación de la imagen
            ]);

            $imagePath = $request->file('imagen')->store('animals', 'public');
            $request->imagen = $imagePath; // Guardar la ruta de la imagen

            Animal::create([
                'imagen' => $request->imagen,
                'nombre' => $request->nombre,
                'esperanza_vida' => $request->esperanza_vida,
            ]);

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
            // dd($request->all());

            // Validar los datos
            $validatedData = $request->validate([
                'id' => 'required|integer|exists:animals,id',
                'nombre' => 'required|string|max:255',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $animal = Animal::findOrFail($validatedData['id']);

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

    }
