<?php


    namespace Examen05\Clases;

    use Examen05\Interfaces\Contratable;

    class Puente
    {
        private Contratable $pdo_usuario;

        public function __construct(Contratable $pdo_usuario)
        {
            $this->pdo_usuario = $pdo_usuario;
        }

        public function comprobarUsuario(Usuario $usuario): int
        {
           return $this->pdo_usuario->comprobarUsuario($usuario);
        }

    }



?>