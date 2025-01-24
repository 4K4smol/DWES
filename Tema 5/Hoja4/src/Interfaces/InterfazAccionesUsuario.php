<?php

    namespace App\Interfaces;

    use App\Models\Usuario;

    interface InterfazAccionesUsuario
    {
        public function registrar(Usuario $usuario): bool;
        public function loguear(string $email): ?Usuario;
    }

?>