<?php

namespace App\clases;

class Alimentacion extends Producto {

    private int $mesCaducidad;
    private int $anioCaducidad;

    public function __construct($codigo, $precio, $nombre, $categoria, int $mesCaducidad, int $anioCaducidad)
    {
        parent::__construct($codigo, $precio, $nombre, $categoria);
        $this->mesCaducidad = $mesCaducidad;
        $this->anioCaducidad = $anioCaducidad;
    }

    public function __toString(): string
    {
        return parent::__toString() .
            //añade un cero a la izquierda si es necesario (str_pad)
            "<br> Mes de caducidad del producto -> " . str_pad($this->mesCaducidad, 2, '0', STR_PAD_LEFT) .

            "<br> Año de caducidad del producto -> " . $this->anioCaducidad;
    }

    public function setMesCaducidad(int $mesCaducidad): void
    {
        $this->mesCaducidad = $mesCaducidad;
    }

    public function setAnioCaducidad(int $anioCaducidad): void
    {
        $this->anioCaducidad = $anioCaducidad;
    }

    public function getMesCaducidad(): int
    {
        return $this->mesCaducidad;
    }

    public function getAnioCaducidad(): int
    {
        return $this->anioCaducidad;
    }
}
