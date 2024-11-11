<!DOCTYPE html>
<html lang="es_ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
    <link rel="stylesheet" href="../src/css/styles.css"> <!-- Ruta al CSS -->


</head>
<?php
require_once '../vendor/autoload.php';

use App\conexionBD;
use App\funcionesBD;

$connection = conexionBD::getConnection();
$asientos = funcionesBD::getPlazas($connection);
?>
<body>
    <h1>Reserva de asiento</h1>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required placeholder="Nombre">
        <span class="icon" id="nombre-icon"></span>
        <hr>
        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="dni" required placeholder="Su dni">
        <p>El formato sera 01234567A</p>
        <hr>
        <label for="asiento">Asiento:</label>
        <select name="asiento" id="asiento">
            <?php
                foreach($asientos as $asiento){
                    echo '<option value="' . htmlspecialchars($asiento["numero"]) . '">' . htmlspecialchars($asiento["numero"]).' '.'('.htmlspecialchars($asiento["precio"]).'€))' . '</option>';
                }
            ?>
        </select>
        <hr>
        <button type="submit" name="reservar">Reservar</button>
    </form>
    <p><a href="index.php">Pagina de incio</a></p>
</body>
</html>

<?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if(isset($_POST['dni']) && isset($_POST['nombre']) && isset($_POST['asiento'])){
            $nombre = $_POST['nombre'];
            $dni = $_POST['dni'];
            $asiento = $_POST['asiento'];
            funcionesBD::realizarReserva($connection,$nombre,$dni,$asiento);
        }
    }
    
?>