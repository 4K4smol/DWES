<?php


    namespace Examen04\Clases\Producto;
    use Examen04\Interfaces\RepositorioInterfaz;
    use Examen04\Clases\Producto\Producto;

    final class CrearProducto
    {
        private RepositorioInterfaz $repositorio;
        
        public function __construct(RepositorioInterfaz $repositorio)
        {
            $this->repositorio = $repositorio;
        }

        /**
         * Llama al metodo 'crear' del repositorio
         * 
         * @param Producto
         * @return bool
         */
        public function crear(Producto $producto):bool
        {
            return $this->repositorio->crear($producto);
        }

        /**
         * Llama al metodo 'listar' del repositorio
         * 
         * 
         * @return array de productos
         */
        public function listar(): array
        {
            return $this->repositorio->listar();
        }

    }




?>