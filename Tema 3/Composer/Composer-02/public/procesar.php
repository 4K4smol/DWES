<?php

require_once __DIR__ . '/../vendor/autoload.php';;

use MiAplicacion\Clases\ServicioCorreo;
use MiAplicacion\Clases\ProveedorMailtrap;

// validar campos
if (empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['mensaje'])) {
    header('Location: index.php?error=1');
    exit;
}

// validar email
if ( ! filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
    header('Location: index.php?error=2');
    exit;
}

$servicioCorreo = new ServicioCorreo(new ProveedorMailtrap);
$enviarCorreo = $servicioCorreo->enviarCorreo(
    paraQuien: $_POST['correo'],
    asunto: 'Formulario de contacto',
    mensaje: $_POST['mensaje'],
);

if ($enviarCorreo) {
    header('Location: index.php?success=1');
    exit;
}

header('Location: index.php?error=3');

?>