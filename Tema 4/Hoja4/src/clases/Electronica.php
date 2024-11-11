<?php

    namespace App\clases;

    use App\clases\Producto;
    use DateTime;

    class Electronica extends Producto{

        private DateTime $plazaGarantia;

        public function __construct($codigo, $precio, $nombre, $categoria,DateTime $plazaGarantia)
        {
            parent::__construct($codigo,$precio,$nombre,$categoria);
            $this->plazaGarantia = $plazaGarantia;
        }

        public function __toString(): string
        {
            return parent::__toString() .
            "<br> Plazo de Garantia del producto -> " . $this->plazaGarantia->format('d-m-Y');
        }

        public function setPlazaGarantia(DateTime $plazaGarantia):void
        {
            $this->plazaGarantia = $plazaGarantia;
        }

        public function getPlazaGarantia() : DateTime
        {
            return $this->plazaGarantia;
        }


    }



?>