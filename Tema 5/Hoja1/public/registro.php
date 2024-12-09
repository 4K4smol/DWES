<!DOCTYPE html>
<html lang="es_ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llegada</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
</head>
<?php
require_once '../vendor/autoload.php';

use App\funcionesBD;
use App\conexionBD;

$connection = conexionBD::getConnection();
if (!$connection) {
    die("Error al conectar con la base de datos.");
}
?>
<body>
    <h1>Registro</h1>
    <hr>
    <form method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <label for="passwordrep">Password Repetida</label>
        <input type="password" name="passwordrep" id="passwordrep" required>
        <button type="submit" name="registro">Registrarse</button>
    </form>
    <hr>

    <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $passwordRep = $_POST['passwordrep'];

            // Comprobar si las contraseñas coinciden
            if ($password !== $passwordRep) {
                $mensaje = "Las credenciales no coinciden";
            } else {
                // Generar el hash de la contraseña
                $pwdHash = password_hash($password, PASSWORD_BCRYPT);

                if(!funcionesBD::registro($connection,$usuario,$pwdHash)) {
                    $mensaje = "No se pudo realizar la operacion de registro";
                } else {
                    $mensaje = "Registrado con exito";
                }
            }
        }
    ?>
    <?php if(!empty($mensaje)) : ?>
        <?= $mensaje ?>
    <?php endif; ?>
    <p><a href="index.php">Página de incio</a></p>
</body>
</html>