<?php

    namespace Examen04\Clases;

    final class Familia{

        private string $codigo;
        private string $nombre;

        public function __construct(string $codigo, string $nombre){
            $this->codigo=$codigo;
            $this->nombre=$nombre;
        }

        public function getNombre():string
        {
            return $this->nombre;
        }

        public function getCodigo():string
        {
            return $this->codigo;
        }

        public function __toString():string
        {
            return "Codigo-> ". $this->codigo . 
            ", Nombre-> " . $this->nombre;
        }

    }

?>