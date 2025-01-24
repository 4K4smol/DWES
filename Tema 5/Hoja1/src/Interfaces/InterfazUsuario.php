<?php

    namespace App\Interfaces;

    use App\Clases\Usuario;

    interface InterfazUsuario {
        public function registrar(Usuario $usuario): bool;
        public function encontrarUsuarioPorNombreUsuario(string $nombre): ?Usuario;
    }

?>