<?php

    namespace App\Models;



    class Usuario
    {
        private string $nombre;
        private string $email;
        private string $password;
        private string $fecha;
        private ?int $id;

        public function __construct(string $nombre, string $email, string $password,string $fecha ,?int $id = null)
        {
            $this->nombre = $nombre;
            $this->email = $email;
            $this->password = $password;
            $this->fecha = $fecha;
            $this->id = $id;
        }

        public function getNombre(): string
        {
            return $this->nombre;
        }

        public function getEmail(): string
        {
            return $this->email;
        }

        public function getPassword(): string
        {
            return $this->password;
        }

        public function getFecha(): string
        {
            return $this->fecha;
        }

        public function getId(): ?int
        {
            return $this->id;
        }

    }



?>