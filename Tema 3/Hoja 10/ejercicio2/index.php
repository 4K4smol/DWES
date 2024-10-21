<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Suma</title>
</head>
<body>
    <h1>Suma de Números</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php
        // Crear dinámicamente 10 cajas de entrada con valores del 1 al 10
        for ($i = 1; $i <= 10; $i++) {
            echo "<label for='numero$i'>Número $i:</label>";
            echo "<input type='number' id='numero$i' name='numeros[]' value='$i'><br/>";
        }
        ?>
        <input type="submit" name="sumar" value="Sumar">
    </form>

    <?php
    // Calcular la suma si se ha enviado el formulario
    if (isset($_POST['sumar'])) {
        $numeros = $_POST['numeros']; // Array con los números
        $suma = array_sum($numeros);  // Calcular la suma de los elementos del array

        echo "<h2>Resultado</h2>";
        echo "La suma de los números es: $suma";
    }
    ?>
</body>
</html>
