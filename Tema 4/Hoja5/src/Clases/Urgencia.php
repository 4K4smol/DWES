<?php

namespace App\Clases;

use App\Clases\Medico;
use App\enum\Turno;

class Urgencia extends Medico{

    private string $unidad;

    public function __construct(string $codigo, string $nombre, int $edad, Turno $turno, string $unidad)
    {
        parent::__construct($codigo,$nombre,$edad,$turno);
        $this->unidad = $unidad;
    }

    public function __toString():string
    {
        return parent::__toString() . "<br>" .
        "Unidad, Medico Urgencias -> " . $this->unidad;
    }

    public function setUnidad(string $unidad):void
    {
        $this->unidad = $unidad;
    }

    public function getetUnidad():string
    {
        return $this->unidad;
    }



}



?>