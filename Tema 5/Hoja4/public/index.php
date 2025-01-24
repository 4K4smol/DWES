<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <?php
        require_once __DIR__ . '/../vendor/autoload.php';

        use App\Autentificarse;

        // Inicializar y configurar el sistema
        Autentificarse::inicializar();
        Autentificarse::configurar();

        // Ejecutar la acción correspondiente
        Autentificarse::runAccion();

    ?>

    <h1>Inicio</h1>
</body>
</html>