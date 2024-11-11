<!DOCTYPE html>
<html lang="es_ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <style>
        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
    <h2>Inserte los datos del libro</h2>
    <form method="post" action="libros_guardar.php">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required>
        <br><br>
        <label for="anio">Año:</label>
        <input type="number" id="anio" name="anio" required>
        <br><br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" placeholder="0.00 $" required>
        <br><br>
        <label for="fecha">Fecha de adquisición:</label>
        <input type="date" id="fecha" name="fecha" required>
        <br><br>
        <button type="submit" name="guardar">a</button>
    </form>
    <hr>
    <p><a href="libros_datos.php">Mostrar los libros guardados</a></p>

</body>
</html>