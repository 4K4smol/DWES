<?php
namespace MiAplicacion\Clases;
use MiAplicacion\Interfaces\InterfazProveedorCorreo;

final class ServicioCorreo {
    public function __construct(private readonly InterfazProveedorCorreo $proveedorCorreo)
    {
        
    }

    public function enviarCorreo(string $paraQuien,string $asunto,string $mensaje):bool{
        return $this->proveedorCorreo->enviarCorreo($paraQuien,$asunto,$mensaje);
    }
}
?>

