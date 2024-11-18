<!DOCTYPE html>
<html lang="es_ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Plazas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
</head>
<?php
require_once '../vendor/autoload.php';
use App\conexionBD;
use App\funcionesBD;
$connection = conexionBD::getConnection();
$plazas = funcionesBD::getPlazas($connection);
?>
<body>
    <h1>Gestión de Plazas</h1>
    <form method="post">
        <?php
        foreach ($plazas as $plaza) {
            echo '<label for="' . $plaza['numero'] . '">Plaza ' . $plaza['numero'] . ': </label>';
            echo '<input type="number" id="' . $plaza['numero'] . '" name="precio_' . $plaza['numero'] . '" step="0.01" value="' . (isset($_POST['actualizar']) ? $_POST['precio_' . $plaza['numero']] : $plaza['precio']) . '"> €<br><br>';
        }
        ?>
        <button type="submit" name="actualizar">Actualizar</button>
    </form>
    <hr>
    <p><a href="index.php">Página de inicio</a></p>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {
    foreach ($plazas as $plaza) {
        $numero = $plaza['numero'];
        $nuevoPrecio = $_POST['precio_' . $numero] ?? null;

        if ($nuevoPrecio !== null) {
            funcionesBD::nuevosPrecios($connection, $numero, $nuevoPrecio);
            echo "El precio de la Plaza " . $numero . " ha sido actualizado a " . $nuevoPrecio . " €<br>";
        }
    }
}
?>
