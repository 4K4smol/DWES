<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar producto</title>
</head>
<body>
    <?php
    require_once __DIR__ . '/../vendor/autoload.php';

    use App\Clases\CrearProducto;
    use App\Clases\PDOCrearProducto;

    $repositorioProducto = new PDOCrearProducto();
    $servicioCrearProducto = new CrearProducto($repositorioProducto);

    $producto_id = null;

    if (!empty($_GET['id'])) {
        $producto_id = $_GET['id'];
    }

    echo "¿Quieres borrar el producto?\nID ->".$producto_id;
    echo "<form method='POST'>";
        echo  "<button type='submit' name='boton1'>SI</button>";
        echo  "<button type='submit' name='boton2'>NO</button>";
    echo "</form>";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['boton1'])) {
            if ($servicioCrearProducto->delete($producto_id)) {
                redirect("index.php?mensaje=" . "Producto elimiando correctamente.");
            }else{
                redirect("index.php?mensaje=" . "El producto no puedo ser eliminado.");
            }
        } else if (isset($_POST['boton2'])) {
            redirect("index.php?mensaje=" . "Se ha declinado la eliminacion del producto.");
        }
    }

?>
</body>
</html>