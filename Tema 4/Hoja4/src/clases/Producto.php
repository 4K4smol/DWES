<?php

    namespace App\clases;

    use App\clases\Categoria;

    Class Producto{

        protected string $codigo;
        protected float $precio;
        protected string $nombre;
        protected Categoria $categoria;

        public function __construct($codigo, $precio, $nombre, $categoria)
        {
            $this->codigo = $codigo;
            $this->precio = $precio;
            $this->nombre = $nombre;
            $this->categoria = $categoria;
        }

        public function __toString():string
        {
            $mensaje=
            "Código del producto -> $this->codigo"."<br>".
            "Precio del producto -> $this->precio"."<br>".
            "Nombre del producto -> $this->nombre"."<br>".
            "Categoria del producto -> $this->categoria"."<br>";

            return $mensaje;
        }

        public function setCodigo(string $codigo): void
        {
            $this->codigo = $codigo;
        }

        public function getCodigo(): string
        {
            return $this->codigo;
        }

        public function setPrecio(float $precio) : void
        {
            $this->precio = $precio;
        }

        public function getPrecio(): float
        {
            return $this->precio;
        }

        public function setNombre(string $nombre):void
        {
            $this->nombre = $nombre;
        }

        public function getNombre(): string
        {
            return $this->nombre;
        }

        public function setCategoria(Categoria $categoria): void
        {
            $this->categoria = $categoria;
        }

        public function getCategoria(): Categoria
        {
            return $this->categoria;
        }

    }





?>