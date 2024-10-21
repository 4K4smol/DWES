<?php


    //array asociativo
    $coches = [
    'Toyota' => ['Corolla', 'Camry', 'Yaris'],
    'Nissan' => ['d','e','f'],
    'Citroen' => ['c','v','x']
    ];

    //funcion mostrar marca
    function mostrarModelos($marcaSeleccionada, $coches){
        if (!empty($coches[$marcaSeleccionada])) {
            echo "<form method='post'>";
            echo "<table border='1'>";
            echo "<tr><th>Modelos de $marcaSeleccionada</th></tr>";
            foreach ($coches[$marcaSeleccionada] as $indice => $modelo) {
                // Crea una caja de texto para cada modelo
                echo "<tr><td><input type='text' name='modelos[$indice]' value='$modelo'></td></tr>";
            }
            echo "</table>";
            // Botón para actualizar
            echo "<br><input type='hidden' name='marcaSeleccionada' value='$marcaSeleccionada'>";
            echo "<input type='submit' name='actualizar' value='actualizar'>";
            echo "</form>";
        }
    }
    


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Hoja 10 Tema 3</title>
</head>
<body>
    <form method="post">
        <label for="marca">Selecciona una marca:</label>
        <select name="marca" id="marca">
            <?php 
                foreach ($coches as $marca => $value) {
                    $selected = (isset($_POST['marca']) && $_POST['marca'] === $marca) ? 'selected' : '';
                    echo "<option value='$marca' $selected>$marca</option>";
                }
                echo '<br>';
            ?>
        </select>
        <button type="submit" name='mostrar'>Mostrar</button>
    </form>
    <?php
        // Mostrar los modelos si se ha seleccionado una marca
    if (isset($_POST['mostrar']) && !empty($_POST['marca'])) {
        $marcaSeleccionada = $_POST['marca'];
        mostrarModelos($marcaSeleccionada, $coches);
    }
    
    ?>
</body>
</html>

