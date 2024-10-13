<!DOCTYPE html>
<html>
<head>
    <title>Procesa Datos</title>
</head>
<body>
    <h2>Resultados del formulario</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Procesando los datos enviados por POST
        $nombre = $_POST['nombre'];
        $modulo = $_POST['modulo'];

        echo "<p>Nombre del alumno (POST): $nombre</p>";
        echo "<p>Módulo elegido (POST): $modulo</p>";
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Procesando los datos enviados por GET
        $nombre = $_GET['nombre'];
        $modulo = $_GET['modulo'];

        echo "<p>Nombre del alumno (GET): $nombre</p>";
        echo "<p>Módulo elegido (GET): $modulo</p>";
    }
    ?>
</body>
</html>
