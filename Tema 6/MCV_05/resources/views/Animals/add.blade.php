@extends('inicio')
@section('contenido-dentro')
    <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-900 mb-4 text-center">Añadir un Animal</h2>

        <form action="{{ route('animals.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-5">
                <label for="especie" class="block mb-2 text-sm font-medium text-gray-900">Especie</label>
                <input type="text" name="especie" id="especie" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('especie')
                <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="peso" class="block mb-2 text-sm font-medium text-gray-900">Peso</label>
                <input type="text" name="peso" id="peso" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('peso')
                <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="altura" class="block mb-2 text-sm font-medium text-gray-900">Altura</label>
                <input type="text" name="altura" id="altura" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('altura')
                <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="fechaNacimiento" class="block mb-2 text-sm font-medium text-gray-900">Fecha Nacimiento</label>
                <input type="date" name="fechaNacimiento" id="fechaNacimiento" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('fechaNacimiento')
                <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="alimentacion" class="block mb-2 text-sm font-medium text-gray-900">Alimentación</label>
                <input type="text" name="alimentacion" id="alimentacion" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('alimentacion')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="mb-5">
                <label for="imagen" class="block mb-2 text-sm font-medium text-gray-900">Imagen del animal</label>
                <input type="file" name="imagen" id="imagen" accept="image/*"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('imagen')
                <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Añadir Animal
            </button>
        </form>

    </div>
@endsection
