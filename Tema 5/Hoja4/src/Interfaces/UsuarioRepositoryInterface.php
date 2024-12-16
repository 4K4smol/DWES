<?php

    namespace App\Interfaces;

    use App\Models\Usuario;

    interface UsuarioRepositoryInterface
    {
        public function findById(int $id): ?Usuario;
        public function guardar(Usuario $usuario): bool;
    }

?>