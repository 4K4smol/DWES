<?php
require_once __DIR__ . '/../vendor/autoload.php';

iniciar_sesion();

if (estaLogueado()) {
    redireccionar('/index.php?accion=paginaConectado');
}

// Recuperar mensajes flash y correo ingresado anteriormente (si existe)
$error = flash('error');
$correo = $_SESSION['correo_temporal'] ?? null;
unset($_SESSION['correo_temporal']); // Limpiar la variable temporal
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <?php if ($error): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form action="/index.php?accion=autenticar" method="POST">
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($correo ?? '') ?>" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>
