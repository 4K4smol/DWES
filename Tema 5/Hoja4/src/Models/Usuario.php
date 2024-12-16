<?php

    namespace App\Models;

    class Usuario
    {
        private ?int $id;
        private string $email;
        private string $pwd;

        public function __construct(string $email, string $pwd, ?int $id = null)
        {
            $this->email=$email;
            $this->pwd=$pwd;
            $this->id=$id;
        }

        // Getters
        public function getId(): ?int
        {
            return $this->id;
        }

        public function getEmail(): string
        {
            return $this->email;
        }

        public function getPwd(): string
        {
            return $this->pwd;
        }

        // Setters
        public function setId(?int $id): void
        {
            $this->id = $id;
        }

        public function setEmail(string $email): void
        {
            $this->email = $email;
        }

        public function setPwd(string $pwd): void
        {
            $this->pwd = $pwd;
        }
    }



?>