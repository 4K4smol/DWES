<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"/>
</head>
<body>
    <?php
    require_once __DIR__ . '/../vendor/autoload.php';

    use App\Clases\Usuario;
    use App\Clases\IUsuario;
    use App\Clases\RepositorioUsuario;

    $interfazUsuario = new IUsuario();
    $repositorioUsuario = new RepositorioUsuario($interfazUsuario);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre_usuario = $_POST['usuario'] ?? '';
            $password = $_POST['password'] ?? '';

            $password = password_hash($password, PASSWORD_DEFAULT);

            if ($nombre_usuario && $password) {
                $usuario = new Usuario($nombre_usuario,$password);
                if ($repositorioUsuario->registrar($usuario)) {
                    echo "Se ha creado el usuario";
                } else {
                    echo "Error al crear un usuario";
                }
            } else {
                echo "Por favor, complete todos los campos.";
            }
        }

    ?>

    <h1>Registro</h1>
    <form method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">

        <button type="submit">Registrar</button>
    </form>
</body>
</html>