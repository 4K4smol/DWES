<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Animal;
    use Illuminate\Http\RedirectResponse;

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
            'esperanza_vida' => 'required|string|max:255'
            ]);

            Animal::create([
                'nombre' => $request->nombre,
                'esperanza_vida' => $request->esperanza_vida,
            ]);

            return redirect()->route('animals.index')
            ->with('success', 'Animal añadido con exito.');

        }

        public function update (Request $request)
        {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'esperanza_vida' => 'required|string|max:255'
            ]);

            $animal = Animal::findOrFail($request['id']);
            $animal->update($request->all());

            return redirect()->route('animals.index')
            ->with('success','Animal editado con exito');
        }

        public function delete ($id)
        {
            $animal = Animal::findOrFail($id);
            $animal->delete();

            return redirect()->route('animals.index')
            ->with('success','Animal borrado exito');
        }

    }
