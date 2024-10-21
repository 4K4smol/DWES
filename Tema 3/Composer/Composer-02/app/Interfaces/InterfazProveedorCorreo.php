<?php
namespace MiAplicacion\Interfaces;
interface InterfazProveedorCorreo{
    public function enviarCorreo(string $paraQuien,string $asunto,string $mensaje):bool;
}
?>
