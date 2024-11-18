<?php

    namespace App\clases;

    use App\clases\Producto;

    class Electronica extends Producto{

        //Meses
        private int $plazaGarantia;

        public function __construct($codigo, $precio, $nombre, $categoria,int $plazaGarantia)
        {
            parent::__construct($codigo,$precio,$nombre,$categoria);
            $this->plazaGarantia = $plazaGarantia;
        }

        public function __toString(): string
        {
            return parent::__toString() .
            "<br> Plazo de Garantia del producto -> " . $this->plazaGarantia . " meses";
        }

        public function setPlazaGarantia(int $plazaGarantia):void
        {
            $this->plazaGarantia = $plazaGarantia;
        }

        public function getPlazaGarantia() : int
        {
            return $this->plazaGarantia;
        }


    }



?>