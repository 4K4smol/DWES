<?php


    namespace App\Controllers;

    use App\Interfaces\InterfazAccionesUsuario;
    use App\Models\Usuario;

    class UsuarioControlador
    {
        private InterfazAccionesUsuario $interfaz_usuario;

        public function __construct(InterfazAccionesUsuario $interfaz_usuario)
        {
            $this->interfaz_usuario = $interfaz_usuario;
        }

        public function registrar(Usuario $usuario): bool
        {
            return $this->interfaz_usuario->registrar($usuario);
        }

        public function loguear(string $nombre): ?Usuario
        {
            return $this->interfaz_usuario->loguear($nombre);
        }
    }



?>
'>'