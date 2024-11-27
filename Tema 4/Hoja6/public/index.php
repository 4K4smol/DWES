<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Clases\PDOCrearProducto;
use App\Clases\CrearProducto;

$repositorioProducto = new PDOCrearProducto();
$servicioCrearProducto = new CrearProducto($repositorioProducto);
$productos = $servicioCrearProducto->index();

var_dump($productos);

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
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
</head>
<body>
    <main class="container">
        <h1>INICIO</h1>
        <button><a href="formulario.html">Formulario</a></button>
        <h2>INDEX DE PRODUCTOS</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
            <tr>
                <?php
                    foreach ($productos as $producto){
                        echo '<td>'.$producto["nombre"].'</td>';
                    }
                ?>
            </tr>
        </table>

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
                <h3>Éxito:</h3>
                <p><?php echo $mensaje; ?></p>
            </article>
        <?php endif; ?>
    </main>
</body>
</html>
