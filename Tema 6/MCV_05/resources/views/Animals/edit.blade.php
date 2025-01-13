<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Añadir un Animal</h1>
        {{-- Formulario para agregar usuario --}}
        <form action="{{ route('animals.update') }}" method="post">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="nombre" class="form-label">Nombre del animal</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{$animal->nombre}}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="esperanza_vida" class="form-label">Esperanza de vida</label>
                    <input type="text" name="esperanza_vida" id="esperanza_vida" class="form-control" value="{{$animal->esperanza_vida}}" required>
                </div>
            </div>
            <input type="hidden" name="id" id="id" value="{{$animal->id}}">
                <button type="submit" class="btn btn-primary mt-3">Actualizar Animal</button>
                <a href="{{ route('animals.index') }}" class="btn btn-primary mt-3">Volver</a>
        </form>
    </div>
</body>
</html>
