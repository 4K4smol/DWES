<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"/>
</head>
<body>
    <?php

    require_once __DIR__ . '/../vendor/autoload.php';

    use App\Clases\IUsuario;
    use App\Clases\RepositorioUsuario;

    $interfazUsuario = new IUsuario();
    $repositorioUsuario  =new RepositorioUsuario($interfazUsuario);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre_usuario = $_POST['usuario'] ?? '';
        $password = $_POST['password'] ?? '';
        if (!$nombre_usuario || !$password) {
            echo "completa los campos";
        }
        $usuario = $repositorioUsuario->encontrarUsuarioPorNombreUsuario($nombre_usuario);
        if ($usuario == null) {
            echo "No existe el usuario";
            return;
        }
        var_dump($password);
        if (password_verify($password, $usuario->getPassword())) {
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $usuario->getId();
            $_SESSION['username'] = $usuario->getUsuario();
            header('Location: index.php?msg=entro');
            exit;
        } else {
            echo "<p>Usuario o contraseña incorrectos. <a href=''>Intenta nuevamente.</a></p>";
        }
    }

    ?>
    <form method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">

        <button type="submit">Logear</button>
    </form>
</body>
</html>