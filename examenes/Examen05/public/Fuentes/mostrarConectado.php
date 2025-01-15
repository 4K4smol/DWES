<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conectado</title>
</head>
<body>
    <?php
        require_once __DIR__ . '/../../vendor/autoload.php';
        use Examen05\Clases\Acciones;

        Acciones::inicializar();

        if (isset($_GET['cerrar_sesion']) && $_GET['cerrar_sesion']) {
            Acciones::cerrar_sesion();
        }
        var_dump($_SESSION['usuario']);
        $usuario = $_SESSION['usuario'];
    ?>

    <?php if (estaLogueado()) :?>
        <h1>Te has conectado</h1>
        <h2>El ID del usuario es <?= $usuario['id'] ?></h2>
    <?php endif;?>

    <a href="?cerrar_sesion=true">Cerrar Sesión</button>
</body>
</html>