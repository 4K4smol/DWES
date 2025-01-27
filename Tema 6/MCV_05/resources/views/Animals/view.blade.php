{{-- resources/views/animals/show.blade.php --}}
@extends('inicio')

@section('titulo', $animal->especie . ' - Zooilogico.es')

@section('contenido-dentro')
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
    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-2xl hover:shadow-xl transition-shadow duration-300 overflow-hidden">
        <div class="relative group">
            @if (!empty($animal->image))
                <img src="{{ Storage::url('imagenes/' . $animal->image->url) }}"
                alt="{{ $animal->image->nombre }}"
                class="w-full h-72 object-cover transition-transform duration-300 hover:scale-105">
            @endif
            <a href="{{ route('animals.index') }}"
               class="absolute top-4 right-4 bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm hover:bg-white dark:hover:bg-gray-700 text-purple-600 dark:text-purple-400 font-semibold py-2 px-4 rounded-lg shadow-md flex items-center gap-2 transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Volver
            </a>
        </div>

        <div class="p-8 space-y-8">
            <header class="space-y-2">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
                    {{ $animal->especie }}
                    <span class="text-xl text-gray-600 dark:text-gray-400">#{{ $animal->id }}</span>
                </h1>
                <div class="border-b-2 border-purple-200 dark:border-gray-600 w-20"></div>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 text-gray-700 dark:text-gray-300">
                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <p><strong class="text-purple-600 dark:text-purple-400">Peso:</strong> {{ $animal->peso }} kg</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <p><strong class="text-purple-600 dark:text-purple-400">Altura:</strong> {{ $animal->altura }} cm</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <p><strong class="text-purple-600 dark:text-purple-400">Edad:</strong> {{ $animal->getEdad() }}</p>
                    </div>
                </div>

                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <p><strong class="text-purple-600 dark:text-purple-400">Alimentación:</strong> {{ $animal->alimentacion }}</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <p><strong class="text-purple-600 dark:text-purple-400">Nacimiento:</strong> {{ $animal->fechaNacimiento }}</p>
                    </div>
                </div>
            </div>

            <section class="bg-gray-50 dark:bg-gray-700/30 p-6 rounded-xl">
                <h3 class="text-xl font-semibold mb-3 text-purple-600 dark:text-purple-400">
                    Descripción
                </h3>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ $animal->descripcion }}
                </p>
            </section>

            <section class="space-y-6">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <h3 class="text-xl font-semibold text-purple-600 dark:text-purple-400">
                        Historial de Revisiones
                    </h3>
                    <a href="{{ route('revisiones.add', $animal) }}"
                       class="bg-purple-600 hover:bg-purple-700 dark:bg-purple-700 dark:hover:bg-purple-600 text-white px-5 py-2.5 rounded-xl flex items-center gap-2 transition-colors duration-200 shadow-md">
                       Nueva Revisión
                    </a>
                </div>

                <div class="space-y-4">
                    @forelse($animal->revisiones as $revision)
                    <article class="bg-white dark:bg-gray-700 p-5 rounded-xl border border-gray-200 dark:border-gray-600 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-start gap-3">
                            <div class="space-y-1.5">
                                <time class="font-medium text-gray-900 dark:text-white block mb-1">
                                    {{ $revision->fechaRevision }}
                                </time>
                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $revision->descripcion }}
                                </p>
                            </div>
                        </div>
                    </article>
                    @empty
                    <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                        No hay revisiones registradas
                    </div>
                    @endforelse
                </div>
            </section>
            <section class="space-y-6">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <h3 class="text-xl font-semibold text-purple-600 dark:text-purple-400">
                        Cuidadores
                    </h3>
                </div>

                <div class="space-y-4">
                    @foreach($animal->cuidadores as $cuidador)
                    <article class="bg-white dark:bg-gray-700 p-5 rounded-xl border border-gray-200 dark:border-gray-600 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-start gap-3">
                            <div class="space-y-1.5">
                                <a href="{{ route('cuidadores.show', $cuidador) }}" class="text-gray-600 dark:text-gray-300">
                                    {{ $cuidador->nombre }}
                                </a>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection
