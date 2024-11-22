<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Clases\PDOCrearProducto;
use App\Clases\CrearProducto;

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Limpiar datos de entrada
    $nombre = htmlspecialchars($_POST['nombre']);
    $precio = htmlspecialchars($_POST['precio']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $imagen = $_FILES['imagen'];

    // 2. Validaciones
    if (!validarCamposRequeridos($nombre, $precio, $descripcion, $imagen)) {
        $errores[] = "Por favor, rellena todos los campos obligatorios.";
    }

    if (!validarPrecio($precio)) {
        $errores[] = "El precio debe ser un número válido.";
    }

    if (!validarSubidaArchivo($imagen)) {
        $errores[] = "Error al subir la imagen.";
    }

    if (!validarFormatoImagen($imagen)) {
        $errores[] = "La imagen debe ser en formato JPEG o PNG.";
    }

    limpiarEtiquetas($descripcion);

    if (!empty($errores)) {
        $erroresQuery = urlencode(implode(',', $errores));
        redirect("index.php?errores={$erroresQuery}");
    }

    // 3. Guardar la imagen en el directorio /productos
    $directorioDestino = __DIR__ . '/../public/productos/';
    if (!is_dir($directorioDestino)) {
        mkdir($directorioDestino, 0755, true);
    }

    $nombreUnico = uniqid() . '-' . basename($imagen['name']);
    $rutaImagen = $directorioDestino . $nombreUnico;

    if (!move_uploaded_file($imagen['tmp_name'], $rutaImagen)) {
        $errores[] = "No se pudo guardar la imagen.";
        $erroresQuery = urlencode(implode(',', $errores));
        redirect("index.php?errores={$erroresQuery}");
    }

    // 4. Insertar el producto en la base de datos
    $producto = [
        ':nombre' => $nombre,
        ':precio' => $precio,
        ':descripcion' => $descripcion,
        ':imagen' => $nombreUnico
    ];

    $repositorioProducto = new PDOCrearProducto();
    $servicioCrearProducto = new CrearProducto($repositorioProducto);

    if (!$servicioCrearProducto->crear($producto)) {
        $errores[] = "No se pudo guardar el producto en la base de datos.";
        $erroresQuery = urlencode(implode(',', $errores));
        redirect("index.php?errores={$erroresQuery}");
    }

    redirect("index.php?mensaje=" . urlencode("Producto creado correctamente."));
}