<?php

function validarCamposRequeridos(string $nombre, string $precio, string $descripcion, array $imagen): bool
{
    return !empty($nombre) && !empty($precio) && !empty($descripcion) && !empty($imagen);
}

function validarPrecio(string $precio): bool
{
    return is_numeric($precio);
}

function validarSubidaArchivo(array $imagen): bool
{
    return isset($imagen['error']) && $imagen['error'] === UPLOAD_ERR_OK;
}

function validarFormatoImagen(array $imagen):bool
{
    $mimeType = mime_content_type($imagen['tmp_name']);
    $formatosPermitidos = ['image/jpeg', 'image/png'];
    return in_array($mimeType, $formatosPermitidos);
}

function limpiarEtiquetas(string $param):bool
{
    $etiquetasPermitidas = '<a><strong><em><h1><h2><h3><h4><h5><h6><ul><ol><li><blockquote><br><div><span><table><thead><tbody><tr><th><td>';

    // Usar strip_tags para eliminar cualquier etiqueta no permitida
    return strip_tags($param, $etiquetasPermitidas);
}

function redirect(string $path):void
{
    header("Location: $path");
    exit;
}