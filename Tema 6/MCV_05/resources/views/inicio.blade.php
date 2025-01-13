{{-- view/inicio.blade.ph --}}
@extends('layouts.plantilla')

@section('titulo', 'Zooilogico.es')

@section('contenido')
    <h1 class="text-2xl font-bold underline">ANIMALES</h1>
    <div class="container mx-auto p-4">
        @yield('contenido-dentro')
    </div>
@endsection
