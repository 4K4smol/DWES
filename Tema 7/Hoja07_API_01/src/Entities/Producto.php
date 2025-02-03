<?php

declare(strict_types=1);

namespace App\Entities;

use App\services\DBConnection;
use PDO;
use PDOException;

final class Producto
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DBConnection::getConexion();
        $this->createTable();
    }

    private function createTable(): void
    {
        $sql = 'CREATE TABLE IF NOT EXISTS productos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL,
            descripcion VARCHAR(255) NOT NULL,
            precio DECIMAL(10, 2) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )';

        $this->db->exec($sql);
    }

    /**
     * @param array<string, mixed> $data
     * @return false|string
     */
    public function create(array $data): false|string
    {
        $sql = '
            INSERT INTO productos (nombre, descripcion, precio)
            VALUES (:nombre, :descripcion, :precio)
        ';

        $stmt = $this->db->prepare(query: $sql);
        $stmt->execute(params: $data);

        return $this->db->lastInsertId();
    }

    // Obtener todos los productos
    public function get(): array
    {
        try {
            $stmt = $this->db->query('SELECT * FROM productos');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error en get(): ' . $e->getMessage());
            return [];
        }
    }


    // Buscar un producto por ID y devolver true o false
    public function find(int $producto_id): bool
    {
        try {
            $stmt = $this->db->prepare('SELECT * FROM productos WHERE id = :producto_id');
            $stmt->bindParam(':producto_id', $producto_id, PDO::PARAM_INT);
            $stmt->execute();

            return (bool) $stmt->fetchColumn(); // Devuelve true si el producto existe, false si no
        } catch (PDOException $e) {
            error_log('Error en find(): ' . $e->getMessage());
            return false;
        }
    }



    // Actualizar un producto por su ID
    public function update(int $productoId, array $data): bool
    {
        try {
            $sql = 'UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio WHERE id = :id';
            $stmt = $this->db->prepare($sql);
            $data['id'] = $productoId;
            return $stmt->execute($data);
        } catch (PDOException $e) {
            error_log('Error en update(): ' . $e->getMessage());
            return false;
        }
    }

    // Eliminar un producto por su ID
    public function delete(int $productoId): bool
    {
        try {
            $stmt = $this->db->prepare('DELETE FROM productos WHERE id = :id');
            $stmt->bindParam(':id', $productoId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log('Error en delete(): ' . $e->getMessage());
            return false;
        }
    }
}
