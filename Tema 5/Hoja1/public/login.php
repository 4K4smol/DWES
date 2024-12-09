<?php
session_start();
require_once '../vendor/autoload.php';

use App\conexionBD;
use App\funcionesBD;

// Crear conexión a la base de datos
$connection = conexionBD::getConnection();
if (!$connection) {
    die("Error al conectar con la base de datos.");
}


$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarioInput = $_POST['usuario'];
    $passwordInput = $_POST['password'];

    $usuario = funcionesBD::obtenerUsuarioPorNombre($connection,$usuarioInput);

    if ($usuario && $usuario->validarPassword($passwordInput)) {
        // Autenticación exitosa
        $_SESSION['usuario'] = $usuario->getUsuario();
        header('Location: index.php');
        exit;
    } else {
        $mensaje = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es_ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <?php if ($mensaje): ?>
        <p><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>
    <form method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" required>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
