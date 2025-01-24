@extends('inicio')
@section('contenido-dentro')
    <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-900 mb-4 text-center">Añadir un Revisión</h2>

        <form action="{{ route('revisiones.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-5">
                <input type="hidden" name="animal_id" id="animal_id" value="{{$animal->id}}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('animal_id')
                <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="fechaRevision" class="block mb-2 text-sm font-medium text-gray-900">Fecha de revisión</label>
                <input type="date" name="fechaRevision" id="fechaRevision" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('fechaRevision')
                <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('descripcion')
                <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Añadir Revisión
            </button>
        </form>

    </div>
@endsection
