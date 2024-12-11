<?php

    namespace Examen04\Interfaces;

    use Examen04\Clases\Producto\Producto;

    interface RepositorioInterfaz
    {
        public function crear(Producto $producto):bool;
        public function listar(): array;
        public function listarPorId(int $id): null|Producto;
        public function borrar(int $id): bool;
    }

?>