@extends('inicio')
@section('contenido-dentro')
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">Editar un Animal</h2>

        {{-- Formulario para agregar usuario --}}
        <form action="{{ route('animals.update', $animal->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Método HTTP correcto para actualizaciones -->

            <!-- Campos del formulario -->
            <div class="mb-5">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del animal</label>
                <input type="text" name="nombre" id="nombre" value="{{ $animal->nombre }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-5">
                <label for="esperanza_vida" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Esperanza de vida</label>
                <input type="text" name="esperanza_vida" id="esperanza_vida" value="{{ $animal->esperanza_vida }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-5">
                <label for="imagen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen del animal</label>
                <input type="file" name="imagen" id="imagen" accept="image/*"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <button type="submit"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Editar Animal
            </button>
        </form>

    </div>
@endsection
