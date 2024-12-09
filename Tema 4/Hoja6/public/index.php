<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Clases\PDOCrearProducto;
use App\Clases\CrearProducto;

$repositorioProducto = new PDOCrearProducto();
$servicioCrearProducto = new CrearProducto($repositorioProducto);
$productos = $servicioCrearProducto->index();

$errores = [];
$mensaje = '';

if (isset($_GET['errores'])) {
    $errores = explode(',', $_GET['errores']);
}

if (isset($_GET['mensaje'])) {
    $mensaje = htmlspecialchars($_GET['mensaje'], ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.5/dist/css/foundation.min.css">
    </head>
<body>
    <main class="container">
        <!-- Mostrar errores si existen -->
        <?php if (!empty($errores)): ?>
            <article class="alert alert-danger">
                <h3>Errores detectados:</h3>
                <ol>
                    <?php foreach ($errores as $error): ?>
                        <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                    <?php endforeach; ?>
                </ol>
            </article>
        <?php endif; ?>

        <!-- Mostrar mensaje de éxito si existe -->
        <?php if (!empty($mensaje)): ?>
            <article class="alert alert-success">
                <p><?php echo $mensaje; ?></p>
            </article>
        <?php endif; ?>


    <h1>INICIO</h1>
        <button><a href="formulario.html">Formulario</a></button>
        <h2>INDEX DE PRODUCTOS</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
                <?php
                    foreach ($productos as $producto){
                        var_dump($producto);
                        echo '<tr>';
                        echo '<td>'.$producto->nombre.'</td>'.'<td>'.$producto->precio.'</td>'.'<td>'.
                        '<a href="view.php?id=' . $producto->id . '" class="btn btn-ver">Ver</a>
                        <a href="delete.php?id=' . $producto->id . '" class="btn btn-borrar">Borrar</a>'.'</td>';
                        echo '</tr>';
                    }
                ?>
        </table>
    </main>
</body>
</html>
