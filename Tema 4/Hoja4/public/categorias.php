<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\clases\ConexionBD;

$connection = ConexionBD::getInstance();
$categorias = $connection->getCategorias();
$productos = [];

// Verifica si se ha seleccionado una categoría
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filtro']) && isset($_POST['categoria_id'])) {
    $categoriaId = $_POST['categoria_id'];
    $productos = $connection->getProductosCategoria($categoriaId);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    </head>
<body>
    <h1>Filtrar Productos por Categoría</h1>
    <form method="POST">
        <label for="categoria_id">Seleccione una categoría:</label>
        <select id="categoria_id" name="categoria_id">
            <?php
                foreach ($categorias as $categoria) {
                    $selected = (isset($_POST["categoria_id"]) && $_POST["categoria_id"] == $categoria["id"]) ? 'selected' : '';
                    echo "<option value='{$categoria['id']}' $selected>{$categoria['nombre']}</option>";
                }
            ?>
        </select>
        <button type="submit" name="filtro">Filtrar</button>
    </form>

    <?php if (!empty($productos)): ?>
        <h2>Productos de la Categoría Seleccionada</h2>
        <div>
            <?php foreach ($productos as $producto): ?>
                <div>
                    <p><strong>Nombre:</strong> <?= htmlspecialchars($producto['NombreProducto']) ?></p>
                    <p><strong>Precio:</strong> <?= number_format($producto['precio'], 2) ?> €</p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p>No hay productos para la categoría seleccionada.</p>
    <?php endif; ?>
</body>
</html>
