<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Animal {{$animal->id}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-white flex justify-center items-center min-h-screen">

    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a>
            <img class="rounded-t-lg" src="{{ asset('storage/' . $animal->imagen) }}" alt="{{ $animal->nombre }}" />
        </a>
        <div class="p-5">
            <a>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Animal {{ $animal->id }} </h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                <strong>Especie:</strong> {{ $animal->especie }}<br><br>
                <strong>Peso:</strong> {{ $animal->peso }}<br><br>
                <strong>Altura:</strong> {{ $animal->altura }}<br><br>
                <strong>Edad:</strong> {{ $animal->getEdad() }}<br><br>
                <strong>Alimentacion:</strong> {{ $animal->alimentacion }}<br><br>
                <strong>Descripción:</strong> {{ $animal->descripcion }}<br><br>
            </p>
        </div>
    </div>

</body>
</html>
