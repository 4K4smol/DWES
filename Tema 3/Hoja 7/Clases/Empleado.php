<?php

namespace Hoja7\Clases; // Cambia a "Clases"

use Hoja7\Traits\InformacionPersonal;
use Hoja7\Traits\InformacionLaboral;
use Hoja7\Traits\Mensaje;

class Empleado {
    use InformacionPersonal, InformacionLaboral, Mensaje;

    public function mostrarInformacionCompleta(): string {
        return $this->mostrarInformacionPersonal() . $this->mostrarInformacionLaboral();
    }
}


?>
