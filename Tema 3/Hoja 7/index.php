<?php

require_once 'Traits/InformacionPersonal.php';
require_once 'Traits/InformacionLaboral.php';
require_once 'Traits/Mensaje.php';
require_once 'Clases/Empleado.php';  

use Hoja7\Clases\Empleado;

$empleado = new Empleado();

$empleado->actualizarInformacionPersonal("Juan Pérez", 30, "Calle Falsa 123");
$empleado->actualizarInformacionLaboral("E12345", 3000.00);

echo $empleado->mostrarInformacionCompleta();

$empleado->mostrarMensaje("Información del empleado completada.");

?>
