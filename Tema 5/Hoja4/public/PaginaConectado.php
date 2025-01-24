<?php
require_once __DIR__ . '/../vendor/autoload.php';

iniciar_sesion();

if (!estaLogueado()) {
    flash('error', 'No tienes acceso a esta página');
    redireccionar('/index.php?accion=paginaLogin');
}

// Recuperar los datos del usuario desde la sesión
$usuario = $_SESSION['usuario'] ?? null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Conectado</title>
</head>
<body>
    <h1>Bienvenido</h1>
    <?php if ($usuario): ?>
        <p>Te has conectado, Hola <?= htmlspecialchars($usuario['nombre']) ?>. Tu ID de usuario es <?= htmlspecialchars($usuario['id']) ?>.</p>
        <a href="/index.php?accion=desconectarse">Cerrar Sesión</a>
    <?php else: ?>
        <p>Error al recuperar los datos del usuario.</p>
    <?php endif; ?>
</body>
</html>
