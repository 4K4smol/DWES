<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Animal {{$animal->id}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 flex justify-center items-center min-h-screen">

    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
        <a>
            <img src="{{ asset($animal->imagen) }}" alt="{{ $animal->especie }}">
        </a>
        <div class="p-5">
            <a href="{{ route('animals.index') }}" class="bg-purple-600 hover:bg-purple-800 text-white font-semibold py-1 px-3 rounded-lg shadow-md">Volver</a>

            <a>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Animal {{ $animal->id }} </h5>
            </a>
            <p class="mb-3 font-normal text-gray-700">
                <strong>Especie:</strong> {{ $animal->especie }}<br><br>
                <strong>Peso:</strong> {{ $animal->peso }}<br><br>
                <strong>Altura:</strong> {{ $animal->altura }}<br><br>
                <strong>Edad:</strong> {{ $animal->getEdad() }}<br><br>
                <strong>Alimentacion:</strong> {{ $animal->alimentacion }}<br><br>
                <strong>Descripción:</strong> {{ $animal->descripcion }}<br><br>
            </p>
            <p class="mb-3 font-normal text-gray-700">
                <strong>Revisiones:</strong><br><br>
                <?php foreach($animal->revisiones as $revision) : ?>
                    <?= $revision->fechaRevision.':'.' '.$revision->descripcion . '<br>' ?>
                <?php endforeach; ?>
            </p>
            <a href="{{ route('revisiones.add', $animal) }}" class="bg-purple-600 hover:bg-purple-800 text-white font-semibold py-1 px-3 rounded-lg shadow-md">
                Añadir Revision</a>
        </div>
    </div>

</body>
</html>
