<?php

    namespace Examen04\Clases;

    final class Imagen{

        private string $nombre;
        private string $url;
        private ?int $id;

        public function __construct(string $nombre, string $url, ?int $id)
        {
            $this->id=$id;
            $this->nombre=$nombre;
            $this->url=$url;
        }

        public function getNombre():string
        {
            return $this->nombre;
        }

        public function getId():int
        {
            return $this->id;
        }

        public function getUrl():string
        {
            return $this->url;
        }
        
        public function __toString():string
        {
            return "ID-> ". $this->id . 
            ", Nombre-> " . $this->nombre .
            ", URL-> " . $this->url;
        }


    }




?>