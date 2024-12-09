<?php

    namespace App\Clases;

class Usuario
{
    private ?int $id;
    private string $usuario;
    private string $password;

    public function __construct(?int $id, string $usuario, string $password)
    {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->password = $password;
    }

    // Métodos getter
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): string
    {
        return $this->usuario;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    // Método para validar la contraseña
    public function validarPassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}
?>
