<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Animales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Lista de Animales</h1>
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif ( session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-12 bg-light text-right">
                <a href="{{ route('inicio')}}" class="btn btn-primary">Volver</a>
                <a href="{{ route('animals.add')}}" class="btn btn-primary">Añadir Animal</a>
            </div>
        </div>
        <table class="table table-striped table-bordered mt-3">
            <thead>
                <tr class="text-center">
                    <th>Nombre</th>
                    <th>Esperanza de vida</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($animals as $animal)
                    <tr>
                        <td class="col-5">{{ $animal->nombre }}</td>
                        <td class="col-5">{{ $animal->esperanza_vida }}</td>
                        <td class="col-2 text-center">
                            <a href="{{ route('animals.view', $animal->id) }}" class="btn btn-primary">Ver</a>
                            <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ route('animals.delete', $animal->id) }}" class="btn btn-primary">Borrar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
