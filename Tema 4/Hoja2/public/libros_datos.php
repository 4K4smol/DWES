<!DOCTYPE html>
<html lang="es_ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIBROS DATOS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />

</head>
<?php
    require_once '../vendor/autoload.php';

use App\funcionesBD;
use App\conexionBD;

    $connection = conexionBD::getConnection();

$libros = funcionesBD::listarLibros($connection);

?>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>NUMERO DE EJEMPLAR</th>
                <th>TITULO</th>
                <th>AÑO DE EDICCION</th>
                <th>PRECIO</th>
                <th>FECHA DE ADQUISICION</th>
            </tr>
        </thead>
        <tbody>
            <?php
                echo "<tr>";
                foreach ($libros as $libro) {
                    echo "<tr>";
                    foreach ($libro as $campo => $valor) {
                        echo "<td>" . htmlspecialchars($valor) . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</tr>";
            ?>
        </tbody>
    </table>

    <p><a href="libros.html">Volver</a></p>
</body>
</html>