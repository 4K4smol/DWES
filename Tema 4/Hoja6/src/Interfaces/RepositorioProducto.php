<?php

namespace App\Interfaces;

interface RepositorioProducto {
    public function crear(array $producto): bool;
}
