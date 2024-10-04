<?php

namespace Hoja7\Traits;

trait InformacionPersonal {
    private string $nombre;
    private int $edad;
    private string $direccion;

    public function actualizarInformacionPersonal($nombre, $edad, $direccion): void {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->direccion = $direccion;
    }

    public function mostrarInformacionPersonal(): string {
        return "Nombre: $this->nombre, Edad: $this->edad, Dirección: $this->direccion<br>";
    }
}
?>
