<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visita y hora</title>
</head>
<body>
    <?php
        if ( $_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['borrar']) && $_GET['borrar'] == 'true') {
            setcookie("hora_visita", "", time() - 3600); // Expira la cookie
            header("Location: index.php" );
            exit;
        }
        // Verificamos si existe la cookie 'hora_visita'
        if (!isset($_COOKIE['hora_visita'])) {
            echo "<h1>Bienvenido a su primera visita</h1>";
        } else {
            echo "<p>Última visita: " . htmlspecialchars($_COOKIE['hora_visita']) . "</p>";
        }

        // Actualizamos la cookie con la hora actual
        $nueva_hora = date("H:i:s");
        setcookie("hora_visita", $nueva_hora, time() + 86400); // Cookie válida por 1 día
        echo "<p>Hora actual registrada: " . $nueva_hora . "</p>";

    ?>
    <a href="?borrar=true">Resetear Cookies</a>
</body>
</html>
