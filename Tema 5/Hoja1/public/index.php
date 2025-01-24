<!DOCTYPE html>
<html lang="es_ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
</head>
<body>
    <?php
        if ($_SERVER['REQUEST_METHOD']=='GET') {
            if ($_GET['msg']) {
                echo $_GET['msg'];
            }
        }
    ?>
    <h1>Gestion del funicular</h1>
    <h2>Elige una opcion</h2>
        <ul>
            <li><a href="reservar.php">Realizar una reserva</a></li>
            <hr>
            <li><a href="llegada.php">Llegada a destino</a></li>
            <hr>
            <li><a href="gestion.php">Gestion de plazas</a></li>
            <hr>
            <li><a href="registro.php">Registro</a></li>
            <hr>
            <li><a href="login.php">Login</a></li>
            <hr>
        </ul>
</body>
</html>