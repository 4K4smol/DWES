<?php
require_once '../vendor/autoload.php';
require_once 'helpers/helper.php';

use App\Clases\PDOCrearProducto;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura y limpieza de datos
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_FILES['imagen'];

    $nombre = limpiarTexto($nombre);
    $descripcion = limpiarTexto($descripcion);

    // Validaciones
    if (!validarRequerido($nombre) || !validarRequerido($precio) || !validarRequerido($descripcion)) {
        die("Por favor, rellena todos los datos.");
    }

    if (!validarNumerico($precio)) {
        die("Por favor, introduce un precio válido.");
    }

    if (!validarSubidaFichero($imagen)) {
        die("No se puede procesar el archivo.");
    }

    if (!validarFormatoImagen($imagen['type'])) {
        die("El archivo no tiene una extensión válida.");
    }

    // Subida de la imagen
    $rutaDestino = __DIR__ . '/productos/';
    if (!is_dir($rutaDestino)) {
        mkdir($rutaDestino, 0777, true);
    }

    $nombreImagen = uniqid() . '-' . basename($imagen['name']);
    $rutaCompleta = $rutaDestino . $nombreImagen;

    if (!move_uploaded_file($imagen['tmp_name'], $rutaCompleta)) {
        die("No se puede procesar el archivo.");
    }

    // Crear el repositorio y guardar el producto
    try {
        $repositorio = new PDOCrearProducto();
        $producto = [
            ':nombre' => $nombre,
            ':precio' => $precio,
            ':descripcion' => $descripcion,
            ':imagen' => $nombreImagen
        ];

        if ($repositorio->crear($producto)) {
            echo "El producto ha sido dado de alta correctamente.";
        } else {
            die("No se ha podido guardar el producto en base de datos.");
        }
    } catch (PDOException $e) {
        die("Error en la base de datos: " . $e->getMessage());
    }
}
