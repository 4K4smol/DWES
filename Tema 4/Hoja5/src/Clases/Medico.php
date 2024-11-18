<?php
namespace App\Clases;

use App\enum\Turno;

abstract class Medico{

    protected string $codigo;
    protected string $nombre;
    protected int $edad;
    protected Turno $turno;

    public function __construct(string $codigo, string $nombre, int $edad, Turno $turno)
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->$turno = $turno;
    }

    public function __toString()
    {
        $msg =
        "Codigo Medico: " . $this->codigo. "<br>" .
        "Nombre Medico: " . $this->nombre. "<br>" .
        "Edad Medico: " . $this->edad. "<br>" .
        "Turno Medico: " . $this->turno;
    }

    public function getCodigo():string
    {
        return $this->codigo;
    }

    public function getNombre():string
    {
        return $this->nombre;
    }

    public function getEdad():int
    {
        return $this->edad;
    }

    public function getTurno():Turno
    {
        return $this->turno;
    }

    public function setCodigo(string $codigo):void
    {
        $this->codigo = $codigo;
    }

    public function setNombre(string $nombre):void
    {
        $this->nombre = $nombre;
    }

    public function setEdad(int $edad):void
    {
        $this->edad = $edad;
    }

    public function setTurno(Turno $turno):void
    {
        $this->turno = $turno;
    }
}
