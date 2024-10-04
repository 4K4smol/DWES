<?php

namespace MiProyecto\Traits;

trait InformacionLaboral {
    private string $codigoEmpleado;
    private float $salario;

    public function actualizarInformacionLaboral($codigoEmpleado, $salario): void {
        $this->codigoEmpleado = $codigoEmpleado;
        $this->salario = $salario;
    }

    public function mostrarInformacionLaboral(): string {
        return "Código Empleado: $this->codigoEmpleado,
        Salario: $this->salario<br>";
    }
}

?>
