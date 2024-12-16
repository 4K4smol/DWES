<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina esta Conectado</title>
</head>
<body>
    <?php
        require_once __DIR__ . '/../vendor/autoload.php';

        iniciar_sesion();

        if (!estaLogueado()) {
            flash('error', 'No tienes acceso a esta página');
            redireccionar('index.php');
        }

        echo "<h1>Te has conectado</h1>\n\tHola tu ID de Usuario es: ";


    ?>
</body>
</html>