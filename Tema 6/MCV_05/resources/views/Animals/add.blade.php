@extends('inicio')
@section('contenido-dentro')
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">Añadir un Animal</h2>

        {{-- Formulario para agregar usuario --}}
        <form action="{{ route('animals.store') }}" method="post" enctype="multipart/form-data" class="max-w-sm mx-auto">
            @csrf
            <div class="row">
                <div class="mb-5">
                    <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del animal</label>
                    <input type="text" name="nombre" id="nombre"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                </div>
                <div class="mb-5">
                    <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Esperanza de vida</label>
                    <input type="text" name="esperanza_vida" id="esperanza_vida"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                </div>
                <div class="mb-5">
                    <label for="imagen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen del animal</label>
                    <input type="file" name="imagen" id="imagen"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        accept="image/*" required>
                </div>
            </div>

                <button type="submit"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Añadir Animal</button>
                <a href="{{ route('animals.index') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Volver</a>
        </form>
    </div>
@endsection
