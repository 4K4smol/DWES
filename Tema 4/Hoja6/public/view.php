<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VISTA PRODUCTO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.5/dist/css/foundation.min.css">
</head>
<body>
    <?php
    require_once __DIR__ . '/../vendor/autoload.php';

    use App\Clases\CrearProducto;
    use App\Clases\PDOCrearProducto;

    $repositorioProducto = new PDOCrearProducto();
    $servicioCrearProducto = new CrearProducto($repositorioProducto);

    $producto_id = null;

    // Validar el parámetro `id` recibido por GET
    if (isset($_GET['id'])) {
        $producto_id = $_GET['id'];
    }

    $producto = $servicioCrearProducto->view($producto_id);

    // Validar el parámetro `id` recibido por GET
    if (isset($_GET['id'])) {
        $producto_id = intval($_GET['id']);
    }

    ?>
    <h2>Detalle del producto</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th>Foto</th>
        </tr>
        <?php
            echo '<tr>';
                echo '<td>';
                    echo $producto->nombre;
                echo '</td>';
                echo '<td>';
                    echo $producto->precio;
                echo '</td>';
                echo '<td>';
                    echo $producto->descripcion;
                echo '</td>';
                echo '<td>';
                    echo $producto->imagen;
                echo '</td>';
            echo '</tr>';
        ?>
    </table>
    <a href="index.php">Volver a Inicio</a>
</body>
</html>