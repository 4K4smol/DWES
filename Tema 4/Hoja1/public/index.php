<!DOCTYPE html>
<html lang="ES_es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Base de Datos</title>
</head>
<body>
    <?php 
    require_once '../vendor/autoload.php';
    use App\funcionesBD\funcionesBD;
    use App\conexionBD\conexionBD;
   

    $connection = conexionBD::getConnection();

    $funcion = new funcionesBD();

    if ($connection instanceof PDO) {
        echo 'Conexión establecida correctamente<br>';
    } else {
        echo 'Error en la conexión';
    }

    $equipos = funcionesBD::getEquipos($connection);

    
    ?>
</body>
</html>
