<?php

    namespace Examen05\Interfaces;

    use Examen05\Clases\Usuario;

    interface Contratable
    {
        public function comprobarUsuario(Usuario $usuario): int;
    }


?>