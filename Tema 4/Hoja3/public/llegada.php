<!DOCTYPE html>
<html lang="es_ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llegada</title>
</head>
<?php
require_once '../vendor/autoload.php';

use App\funcionesBD;
use App\conexionBD;

$connection = conexionBD::getConnection();
?>
<body>
    <h1>Llegada</h1>
    <hr>
    <form method="post">
        <button type="submit" name="llegada">Llegada</button>
    </form>
    <hr>
    <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            funcionesBD::llegada($connection);
        }

    ?>
    


    <p><a href="index.php">Página de incio</a></p>
</body>
</html>