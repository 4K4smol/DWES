<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\clases\ConexionBD;

$connection = ConexionBD::getInstance();
$productos = $connection->getProductos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermercado</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    </head>
<body>
    <h1>Productos del Supermercado</h1>
    <div>
        <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $producto): ?>
                <div>
                    <?= $producto["nombre"] . " " . $producto["precio"] ."$ ". $producto["categoriaNombre"] . " "?>
                </div>
                <hr>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay productos disponibles en este momento.</p>
        <?php endif; ?>
    </div>
</body>
</html>
