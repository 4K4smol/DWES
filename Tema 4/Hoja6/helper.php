<?php
function validarRequerido(string $campo): bool {
    return !empty(trim($campo));
}

function validarNumerico(string $valor): bool {
    return is_numeric($valor);
}

function validarSubidaFichero(array $fichero): bool {
    return $fichero['error'] === UPLOAD_ERR_OK;
}

function validarFormatoImagen(string $tipo): bool {
    return in_array($tipo, ['image/jpeg', 'image/png']);
}

function limpiarTexto(string $texto): string {
    return strip_tags($texto, '<a><strong><em><h1><h2><h3><h4><h5><h6><ul><ol><li><blockquote><br><div><span><table><thead><tbody><tr><th><td>');
}

function limpiarEntrada(array $entrada): array {
    return array_map('limpiarTexto', $entrada);
}

function redireccionar(string $path): void {
    header("Location: $path");
    exit;
}
