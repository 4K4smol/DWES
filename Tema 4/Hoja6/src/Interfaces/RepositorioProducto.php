<?php

namespace App\Interfaces;

interface RepositorioProducto {
    public function crear(array $producto): bool;

    public function index();

    public function view(mixed $id): bool;

    public function delete(mixed $id): bool;
}
