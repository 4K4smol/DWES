<!DOCTYPE html>
<html>
<head>
    <title>Procesa Datos con REQUEST</title>
</head>
<body>
    <h2>Resultados del formulario</h2>

    <?php
    // Recibiendo datos con $_REQUEST (funciona tanto con GET como POST)
    $nombre = $_REQUEST['nombre'];
    $modulo = $_REQUEST['modulo'];

    echo "<p>Nombre del alumno: $nombre</p>";
    echo "<p>Módulo elegido: $modulo</p>";
    ?>
</body>
</html>
