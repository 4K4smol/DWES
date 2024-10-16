<?php

    $array=['a','b','c','d','f','g','h','i','j','k'];
    $mensaje="";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $busca = $_POST['pelicula'];
        if(in_array($busca, $array)){
             $mensaje="SE HA ENCONTRADO";
        }else{
             $mensaje="NO SE HA ENCONTRADO!!!";
        }

    }

?>

<!DOCTYPE html>
<html lang="ES_es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 hoja 9 tema 3</title>
</head>
<body>
    <h1>Buscar peliculas</h1>
    <form method="POST">
        <label for="pelicula">Buscar: </label>
        <input type="text" id="pelicula" name="pelicula">
        <br>
        <button type="submit">Enviar Búsqueda</button>
    </form>
    <?php if($mensaje): ?>
        <p><?php echo $mensaje ?>
    <?php endif; ?>
</body>
</html>