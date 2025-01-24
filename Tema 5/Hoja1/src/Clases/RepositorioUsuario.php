<?php

    namespace App\Clases;

    use App\Interfaces\InterfazUsuario;


    class RepositorioUsuario
    {

        private InterfazUsuario $repositorio_usuario;

        public function __construct(InterfazUsuario $repositorio_usuario)
        {
            $this->repositorio_usuario = $repositorio_usuario;
        }

        public function registrar(Usuario $usuario): bool
        {
            return $this->repositorio_usuario->registrar($usuario);
        }

        public function encontrarUsuarioPorNombreUsuario(string $nombre): ?Usuario
        {
            return $this->repositorio_usuario->encontrarUsuarioPorNombreUsuario($nombre);
        }

    }




?>