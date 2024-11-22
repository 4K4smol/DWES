<?php

namespace App\Clases;

use App\conexionBD;
use App\Interfaces\RepositorioProducto;
use PDO;


class PDOCrearProducto implements RepositorioProducto {
    private PDO $conexion;

    public function __construct() {
        $this->conexion = ConexionBD::getConnection();
    }

    public function crear(array $producto): bool {
        $query = "INSERT INTO productos (nombre, precio, descripcion, imagen) VALUES (:nombre, :precio, :descripcion, :imagen)";
        $stmt = $this->conexion->prepare($query);

        return $stmt->execute($producto);
    }
}
