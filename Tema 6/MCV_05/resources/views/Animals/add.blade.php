@extends('inicio')
@section('contenido-dentro')
        <h1 class="text-center">Añadir un Animal</h1>

        {{-- Formulario para agregar usuario --}}
        <form action="{{ route('animals.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="nombre" class="form-label">Nombre del animal</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="esperanza_vida" class="form-label">Esperanza de vida</label>
                    <input type="text" name="esperanza_vida" id="esperanza_vida" class="form-control" required>
                </div>
            </div>

                <button type="submit" class="btn btn-primary mt-3">Añadir Animal</button>
                <a href="{{ route('animals.index') }}" class="btn btn-primary mt-3">Volver</a>
        </form>
@endsection
