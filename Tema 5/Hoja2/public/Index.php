<?php
// Nombre de la cookie
$cookieName = "ultimaVisita";

// Duración de la cookie en segundos (1 año)
$cookieDuration = 365 * 24 * 60 * 60;

// Mensaje inicial
$mensaje = "";

if (isset($_GET['reset'])) {
    // Eliminar la cookie usando una duración negativa
    setcookie($cookieName, "", time() - 3600);
    $mensaje = "La cookie ha sido reseteada. F5";
} else {
    if (isset($_COOKIE[$cookieName])) {
        // Recuperar la fecha y hora almacenada en la cookie
        $ultimaVisita = $_COOKIE[$cookieName];
        $mensaje = "Bienvenido de nuevo. Tu última visita fue el " . date("d/m/Y H:i:s", strtotime($ultimaVisita)) . ".";
    } else {
        // Primera visita
        $mensaje = "¡Bienvenido! Esta es tu primera visita.";
    }

    // Actualizar la cookie con la fecha y hora actual
    setcookie($cookieName, date("Y-m-d H:i:s"), time() + $cookieDuration);
}
?>

<!DOCTYPE html>
<html lang="es_ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Última Visita</title>
</head>
<body>
    <h1>Seguimiento de Visitas</h1>
    <p><?= htmlspecialchars($mensaje) ?></p>
    <p>
        <a href="?reset=true">Resetear Cookie</a>
    </p>
</body>
</html>
