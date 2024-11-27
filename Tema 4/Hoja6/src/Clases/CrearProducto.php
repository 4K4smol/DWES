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

    /**
     * Llama al método `index` del producto
     *
     * @return array
     */
    public function index()
    {
        return $this->repositorio->index();
    }

    /**
     * Llama al método `view` del producto
     *
     * @param $id id del producto
     * @return objeto producto
     */
    public function view($id)
    {
        return $this->repositorio->view($id);
    }

    /**
     * Llama al método `delete` del producto
     *
     * @param $id id del producto
     * @return bool
     */
    public function delete($id):bool
    {
        return $this->repositorio->delete($id);
    }
}
