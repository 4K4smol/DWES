<?php

    require_once __DIR__ . '/../vendor/autoload.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear</title>
</head>
<body>
    <h1>Alta Productos</h1>
    <form method="post" action="">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre"><br><br>
        <label for="descripcion">descripcion</label>
        <input type="text" name="descripcion"><br><br>
        <label for="descripcion">precio</label>
        <input type="number" step="0.1" name="precio" id="precio" min=0><br><br>
        <label for="familia">Familia del producto</label>
        <select name="familia">
            <option value="">a</option>
        </select><br><br>
        <input type="file" name="imagen" id="imagen">
    </form>
</body>
</html>