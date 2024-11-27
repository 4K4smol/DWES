<?php

namespace App\Interfaces;

interface RepositorioProducto {
    public function crear(array $producto): bool;

    public function index();

    public function view($id);

    public function delete($id): bool;
}
