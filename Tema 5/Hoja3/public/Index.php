<?php
session_start();

$_SESSION['usuario'] = 'eloy';
$_SESSION['hash_password'] = hash('sha256', 'contraseña123');

if (isset($_GET['limpiar'])) {
    unset($_SESSION['visitas']);
    $mensaje = "Bienvenido. Esta es su primera visita.";
} else {
    $fechaActual = date("d/m/Y a las H:i");
    $_SESSION['visitas'][] = $fechaActual;

    if (count($_SESSION['visitas']) === 1) {
        $mensaje = "Bienvenido. Esta es su primera visita.";
    } else {
        $mensaje = "Se han producido " . count($_SESSION['visitas']) . " visitas.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Sesiones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
    <main class="container">
        <h1>Gestionar sesiones</h1>
        <table>
            <tr>
                <th>Nombre de usuario:</th>
                <td><?= htmlspecialchars($_SESSION['usuario']) ?></td>
            </tr>
            <tr>
                <th>Hash de la contraseña:</th>
                <td><?= htmlspecialchars($_SESSION['hash_password']) ?></td>
            </tr>
        </table>
        <p><?= $mensaje ?></p>

        <?php if (!empty($_SESSION['visitas'])): ?>
            <h2>Historial de visitas</h2>
            <ul>
                <?php foreach ($_SESSION['visitas'] as $visita): ?>
                    <li><?= htmlspecialchars($visita) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <a href="?limpiar=true" class="button">Limpiar registro</a>
    </main>
</body>
</html>
