{{-- resources/views/titulaciones/show.blade.php --}}
@extends('inicio')

@section('titulacion', $titulacion->nombre . ' - Zooilogico.es')

@section('contenido-dentro')
    <div
        class="max-w-4xl mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-2xl hover:shadow-xl transition-shadow duration-300 overflow-hidden">
        <div class="relative group">
            <a href=""
                class="absolute top-4 right-4 bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm hover:bg-white dark:hover:bg-gray-700 text-purple-600 dark:text-purple-400 font-semibold py-2 px-4 rounded-lg shadow-md flex items-center gap-2 transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Volver
            </a>
        </div>

        <div class="p-8 space-y-8">
            <header class="space-y-2">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
                    {{ $titulacion->nombre }}
                </h1>
                <div class="border-b-2 border-purple-200 dark:border-gray-600 w-20"></div>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 text-gray-700 dark:text-gray-300">
                <div class="space-y-3">
                    @if ($titulacion->cuidadores->isNotEmpty())
                        <div class="flex items-center gap-2">
                            <p>
                                <strong class="text-purple-600 dark:text-purple-400">Cuidadores con la titulación:</strong><br>
                                @foreach ($titulacion->cuidadores as $index => $cuidador)
                                    {{ $cuidador->nombre }}. <br>
                                @endforeach
                            </p>
                        </div>
                    @else
                        <p>No hay cuidadores asociados a esta titulación.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
