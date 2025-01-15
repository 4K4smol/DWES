<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <?php
        require_once __DIR__ . '/../../vendor/autoload.php';

        if (estaLogueado()) {
            redireccionar("Fuentes/mostrarConectado");
        }
        $error = flash('error');

    ?>
    <?php if ($error): ?>
        <?= $error ?>
    <?php endif; ?>

    <form method="POST" action="/../index.php?accion=autenticar">
        <label for="nombre_usuario">Usuario:</label>
        <input type="text" name="nombre_usuario" id="nombre_usuario" required><br><br>
        <label for="clave">Clave:</label>
        <input type="password" name="clave" id="clave" required><br><br>

        <button type="submit">Iniciar Sesion</button>
    </form>
</body>
</html>