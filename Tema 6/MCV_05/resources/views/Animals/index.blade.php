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
        <div class="relative overflow-x-auto shadow-xl sm:rounded-xl bg-white dark:bg-gray-800">
            <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-300">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300 border-b-2 border-gray-200 dark:border-gray-600">
                    <tr class="[&>th]:px-6 [&>th]:py-3.5 [&>th]:font-semibold rounded-t-lg">
                        <th scope="col" class="!ps-6">Especie</th>
                        <th scope="col">Peso</th>
                        <th scope="col">Altura</th>
                        <th scope="col">Fecha Nacimiento</th>
                        <th scope="col">Alimentación</th>
                        <th scope="col">Descripción</th>
                        <th scope="col" class="!pe-6 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($animals as $animal)
                        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50/80 dark:hover:bg-gray-700/50 transition-colors duration-200 group">
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-100 whitespace-nowrap">
                                {{ $animal->especie }}
                            </td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300 whitespace-nowrap">
                                {{ $animal->peso }}
                            </td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                {{ $animal->altura }}
                            </td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                {{ $animal->fechaNacimiento }}
                            </td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                {{ $animal->alimentacion }}
                            </td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300 max-w-[300px] truncate">
                                {{ $animal->descripcion }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2 pe-2">
                                    <a href="{{ route('animals.view', $animal) }}"
                                       class="p-2 rounded-lg bg-purple-500/10 hover:bg-purple-500/20 text-purple-600 dark:text-purple-400 hover:text-purple-700 dark:hover:text-purple-300 transition-all duration-200 transform hover:scale-[1.03] active:scale-95">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z"/>
                                        </svg>
                                    </a>

                                    <a href="{{ route('animals.edit', $animal) }}"
                                       class="p-2 rounded-lg bg-blue-500/10 hover:bg-blue-500/20 text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition-all duration-200 transform hover:scale-[1.03] active:scale-95">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                    </a>

                                    <a href="{{ route('animals.delete', $animal) }}"
                                       class="p-2 rounded-lg bg-red-500/10 hover:bg-red-500/20 text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 transition-all duration-200 transform hover:scale-[1.03] active:scale-95"
                                       onclick="return confirm('¿Seguro que deseas eliminar esta especie?');">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

@endsection
