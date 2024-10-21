<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo de Múltiples Formularios</title>
</head>
<body>
    <h1>Página con Múltiples Formularios</h1>

    <!-- Formulario de inicio de sesión -->
    <form method="post" action="">
        <h2>Iniciar Sesión</h2>
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario"><br><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password"><br><br>
        <button type="submit" name="submit_login">Iniciar Sesión</button>
    </form>

    <br><hr><br>

    <!-- Formulario de registro -->
    <form method="post" action="">
        <h2>Registrarse</h2>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br><br>
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo"><br><br>
        <label for="password_registro">Contraseña:</label>
        <input type="password" id="password_registro" name="password_registro"><br><br>
        <button type="submit" name="submit_register">Registrarse</button>
    </form>

    <?php
    // Procesar los datos del formulario
    if (isset($_POST['submit_login'])) {
        // Código para manejar el inicio de sesión
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        echo "<p>Has iniciado sesión como $usuario.</p>";
    }

    if (isset($_POST['submit_register'])) {
        // Código para manejar el registro
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        echo "<p>Te has registrado con el nombre $nombre y el correo $correo.</p>";
    }
    ?>
</body>
</html>
