<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3 Hoja 5 Ejercicio 1</title>
</head>
<body>
    <?php
    include 'Clases/Empleado.php';

    $empleado1=new Empleado(22);
    echo $empleado1->getSueldo();
    echo "<br>";
    $encargado1 = new Encargado(100);
    echo $encargado1->getSueldo();


    ?>
</body>
</html>