<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php
    require_once __DIR__ . '/../vendor/autoload.php';

    use Examen05\Clases\Acciones;

    Acciones::inicializar();
    Acciones::runAccion();

    ?>
</body>
</html>