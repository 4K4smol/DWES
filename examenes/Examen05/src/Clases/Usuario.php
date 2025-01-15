<?php

    namespace Examen05\Clases;


    class Usuario
    {
        private string $nombre_usuario;
        private string $clave;
        private ?int $id;


        public function __construct(string $nombre_usuario, string $clave, ?int $id = null)
        {
            $this->nombre_usuario = $nombre_usuario;
            $this->clave = $clave;
            $this->id = $id;
        }

        public function getNombreUsuario(): string
        {
            return $this->nombre_usuario;
        }

        public function getClave(): string
        {
            return $this->clave;
        }

        public function getId(): ?int
        {
            return $this->id;
        }
    }




?>