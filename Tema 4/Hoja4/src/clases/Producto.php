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

    }





?>