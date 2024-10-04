<?php

// Incluir los traits y la clase Empleado
require_once 'Traits/InformacionPersonal.php';
require_once 'Traits/InformacionLaboral.php';
require_once 'Traits/Mensaje.php';
require_once 'Clases/Empleado.php';  // Revisa que la carpeta y archivo sean correctos

use Hoja7\Clases\Empleado;

// Crear un empleado
$empleado = new Empleado();

// Actualizar la información personal y laboral
$empleado->actualizarInformacionPersonal("Juan Pérez", 30, "Calle Falsa 123");
$empleado->actualizarInformacionLaboral("E12345", 3000.00);

// Mostrar la información del empleado
echo $empleado->mostrarInformacionCompleta();

// Mostrar un mensaje adicional usando el trait Mensaje
$empleado->mostrarMensaje("Información del empleado completada.");

?>
