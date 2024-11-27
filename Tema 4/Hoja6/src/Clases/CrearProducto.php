<?php

namespace App\Clases;

use App\Interfaces\RepositorioProducto;

final class CrearProducto
{
    private RepositorioProducto $repositorio;

    public function __construct(RepositorioProducto $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    /**
     * Llama al método `crear` del repositorio.
     *
     * @param array $producto Datos del producto.
     * @return bool
     */
    public function crear(array $producto): bool
    {
        return $this->repositorio->crear($producto);
    }

    public function index()
    {
        return $this->repositorio->index();
    }
}
