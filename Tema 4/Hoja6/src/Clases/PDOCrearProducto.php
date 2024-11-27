<?php

namespace App\Clases;

use App\conexionBD;
use App\Interfaces\RepositorioProducto;
use PDO;
use PDOException;

class PDOCrearProducto implements RepositorioProducto {

    private PDO $conexion;

    public function __construct() {
        $this->conexion = ConexionBD::getConnection();
        $this->crearTablaSiNoExiste();
    }

    public function crear(array $producto): bool
    {
        try {
            $query = "INSERT INTO productos (nombre, precio, descripcion, imagen)
                    VALUES (:nombre, :precio, :descripcion, :imagen)";
            $stmt = $this->conexion->prepare($query);

            // Sanitizar datos
            $producto[':nombre'] = htmlspecialchars($producto[':nombre'], ENT_QUOTES, 'UTF-8');
            $producto[':descripcion'] = htmlspecialchars($producto[':descripcion'], ENT_QUOTES, 'UTF-8');

            // Ejecutar consulta
            return $stmt->execute($producto);
        } catch (PDOException $e) {
            // Manejar la excepción, por ejemplo, registrar el error
            error_log("Error al insertar el producto: " . $e->getMessage());
            return false;
        }
    }

    public function index()
    {
        try {
            $query = "SELECT productos.nombre, productos.precio, productos.descripcion, productos.imagen
            FROM dwes_06_productos.productos";

            $stmt = $this->conexion->prepare($query);
            // Ejecutar la consulta
            if ($stmt->execute()) {
                // Obtener TODOS LOS RESULTADOS (ALL) como un objeto
                $productos = $stmt->fetchAll(PDO::FETCH_OBJ);

                $productos = $stmt->fetch(PDO::FETCH_OBJ);
                return $productos;
            }
        } catch (PDOException $e) {
            error_log("Error al consultar el index de productos: " . $e->getMessage());
        }
    }

    public function view($id):bool
    {
        try {
            $query = "SELECT productos.nombre, productos.precio, productos.descripcion, productos.imagen
                    FROM dwes_06_productos.productos WHERE productos.id = :id";
            $stmt = $this->conexion->prepare($query);

            // Enlazar el parámetro :id
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                // Obtener el resultado como un objeto
                $producto = $stmt->fetch(PDO::FETCH_OBJ);
                return $producto;
            }

            return null; // Retorna null si no se ejecuta correctamente
        } catch (PDOException $e) {
            error_log("Error al consultar el producto con ID $id: " . $e->getMessage());
            return null;
        }
    }

    public function delete($id): bool
    {
        try {
            $query = "DELETE FROM dwes_06_productos.productos WHERE productos.id = :id";
            $stmt = $this->conexion->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            error_log("Error al consultar el producto con ID $id: " . $e->getMessage());
            return null;
        }
        return false;
    }

    /**
     * Crea la tabla productos si no existe.
     */
    private function crearTablaSiNoExiste(): void
    {
        $sql = "
            CREATE TABLE IF NOT EXISTS productos (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(255) NOT NULL,
                precio DECIMAL(10, 2) NOT NULL,
                descripcion TEXT NOT NULL,
                imagen VARCHAR(255) NOT NULL
            );
        ";
        $this->conexion->exec($sql);
    }
}
