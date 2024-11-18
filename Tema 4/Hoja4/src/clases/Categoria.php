<?php

    namespace App\Clases;

    Class Categoria{

        private int $id;
        private string $nombre;


        public function __construct($id,$nombre)
        {
            $this->id = $id;
            $this->nombre = $nombre;
        }

        public function getId(): int {
            return $this->id;
        }

        public function setId(int $id): void {
            $this->id = $id;
        }

        public function getNombre(): string {
            return $this->nombre;
        }

        public function setNombre(string $nombre): void {
            $this->nombre = $nombre;
        }

}

?>