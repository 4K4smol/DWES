@extends('inicio')
@section('contenido-dentro')
        <h1 class="mb-4 text-3xl font-extrabold text-gray-900 md:text-5xl lg:text-6xl">Lista de Animales</h1>
        <div class="row">
            @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                {{ session('success') }}
                </div>
            @elseif ( session('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-12 bg-light text-right py-5">
                <a href="{{ route('inicio')}}"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Volver</a>
                <a href="{{ route('animals.add')}}"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    Añadir Animal</a>
            </div>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class=" text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Espcie</th>
                        <th scope="col" class="px-6 py-3">Peso</th>
                        <th scope="col" class="px-6 py-3">Altura</th>
                        <th scope="col" class="px-6 py-3">Fecha Nacimiento</th>
                        <th scope="col" class="px-6 py-3">Alimentacion</th>
                        <th scope="col" class="px-6 py-3">Descripcion</th>
                        <th scope="col" class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($animals as $animal)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b">
                            <td class="px-6 py-4">{{ $animal->especie }}</td>
                            <td class="px-6 py-4">{{ $animal->peso }}</td>
                            <td class="px-6 py-4">{{ $animal->altura }}</td>
                            <td class="px-6 py-4">{{ $animal->fechaNacimiento }}</td>
                            <td class="px-6 py-4">{{ $animal->alimentacion }}</td>
                            <td class="px-6 py-4">{{ $animal->descripcion }}</td>
                            <td class="px-5">
                                <a href="{{ route('animals.view', $animal) }}" class="bg-purple-600 hover:bg-purple-800 text-white font-semibold py-1 px-3 rounded-lg shadow-md">Ver</a>
                                <a href="{{ route('animals.edit', $animal) }}" class="bg-purple-600 hover:bg-purple-800 text-white font-semibold py-1 px-3 rounded-lg shadow-md">Editar</a>
                                <a href="{{ route('animals.delete', $animal) }}"
                                    class="bg-purple-600 hover:bg-purple-800 text-white font-semibold py-1 px-3 rounded-lg shadow-md"
                                    onclick="return confirm('¿Quieres eliminar la especie?');">

                                    Borrar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

@endsection
