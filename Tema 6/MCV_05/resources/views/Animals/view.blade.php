<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Animal {{$animal->id}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-white flex justify-center items-center min-h-screen">

    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 w-96">
        <h5 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Detalle de Animal</h5>
        <p class="text-gray-700 dark:text-gray-400 font-normal">
            <span class="font-semibold">Nombre:</span> {{ $animal->nombre }} <br>
            <span class="font-semibold">Esperanza de vida:</span> {{ $animal->esperanza_vida }} años
        </p>
        <div class="mt-4 flex justify-end">
            <a href="{{ route('animals.index') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Volver
            </a>
        </div>
    </div>

</body>
</html>
