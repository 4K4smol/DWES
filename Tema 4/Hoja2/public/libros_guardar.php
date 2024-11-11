<!DOCTYPE html>
<html lang="es_ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libro guardado</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />

</head>
<body>
    <?php
    require_once '../vendor/autoload.php';

    use App\funcionesBD;
    use App\conexionBD;

        $connection = conexionBD::getConnection();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $titulo = $_POST['titulo'];
        $anio = $_POST['anio'];
        $precio = $_POST['precio'];
        $fecha = $_POST['fecha'];
        }

        if(funcionesBD::guardarLibro($connection,$titulo,$anio,$precio,$fecha)==true){
            echo "<p>Datos guardados correctamente:</p>";
            echo "<p><strong>Título:</strong> " . htmlspecialchars($titulo) . "</p>";
            echo "<p><strong>Año:</strong> " . htmlspecialchars($anio) . "</p>";
            echo "<p><strong>Precio:</strong> $" . htmlspecialchars(number_format($precio, 2)) . "</p>";
            echo "<p><strong>Fecha de adquisición:</strong> " . htmlspecialchars($fecha) . "</p>";
        }else {
            echo "<p style='color: red;'>Error: Todos los campos deben estar completos.</p>";
        }
    ?>

    <p><a href="libros.html">Volver</a></p>
</body>
</html>