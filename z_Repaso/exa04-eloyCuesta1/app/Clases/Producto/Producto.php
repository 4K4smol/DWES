<?php

    namespace Examen04\Clases\Producto;
    use Examen04\Clases\Familia;
    use Examen04\Clases\Imagen;

    class Producto{

        protected string $nombre;
        protected string $descripcion;
        protected float $precio;
        protected Familia $familia;
        protected Imagen $imagen;
        protected ?int $id;

        public function __construct(string $nombre, string $descripcion, float $precio, Familia $familia, Imagen $imagen, ?int $id)
        {
            $this->id=$id;
            $this->nombre=$nombre;
            $this->descripcion=$descripcion;
            $this->precio=$precio;
            $this->familia=$familia;
            $this->imagen=$imagen;
        }

        public function getId():int
        {
            return $this->id;
        }

        public function getNombre():string
        {
            return $this->nombre;
        }

        public function getDescripcion():string
        {
            return $this->descripcion;
        }

        public function getPrecio():float
        {
            return $this->precio;
        }

        public function getFamilia():Familia
        {
            return $this->familia;
        }

        public function getImagen():Imagen
        {
            return $this->imagen;
        }

    }


?>