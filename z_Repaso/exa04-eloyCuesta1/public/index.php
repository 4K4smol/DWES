<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
</head>
<body>
    <?php
    require_once  __DIR__ . '/../vendor/autoload.php';

    use Examen04\Clases\FuncionesRepositorio;
    use Examen04\Clases\CrearProducto;

    $funciones = new FuncionesRepositorio();
    $auxCrearProductos = new CrearProducto($funciones);

    $productos = $auxCrearProductos->listar();

    ?>

    <h1>Listado de productos</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto) : ?>
                <tr>
                    <td>$producto->descripcion</td>
                    <td>$producto->precio</td>
                    <td><a href="index.php/detalle">Mas informacion</a>
                    <a href="index.php/detalle">Mas informacion</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="Fuentes/crearProducto.php">Crear Producto</a>
</body>
</html>