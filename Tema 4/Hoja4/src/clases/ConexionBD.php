<?php

namespace App\clases;

use PDO;
use PDOException;

class ConexionBD {
    private const DNS = "mysql:host=localhost;dbname=dwes_04_supermercado";
    private const USUARIO = "root";
    private const PASSWORD = "mysql";
    private static ?ConexionBD $instance = null;
    private ?PDO $conexion = null;

    // Constructor privado para evitar la instanciación directa
    private function __construct() {
        try {
            $this->conexion = new PDO(self::DNS, self::USUARIO, self::PASSWORD);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    // Método para obtener la instancia única de la clase (patrón Singleton)
    public static function getInstance(): ConexionBD {
        if (self::$instance === null) {
            self::$instance = new ConexionBD();
        }
        return self::$instance;
    }

    // Método para obtener la conexión
    public function getConexion(): PDO {
        return $this->conexion;
    }

    public function getProductos(): array
    {
        try {
            $query = "SELECT p.*, a.mesCaducidad, a.anioCaducidad, e.plazoGarantia, c.nombre AS categoriaNombre
                FROM productos p
                LEFT JOIN alimentaciones a ON p.id = a.id
                LEFT JOIN electronicas e ON p.id = e.id
                JOIN categorias c ON p.categoria_id = c.id
            ";
            $stmt = $this->conexion->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new PDOException("Error al obtener productos: " . $e->getMessage());
        }
    }

    public function getCategorias(): array
    {
        try {
            $query = "SELECT * FROM categorias";
            $stmt = $this->conexion->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new PDOException("Error al obtener categorías: " . $e->getMessage());
        }
    }

    public function getProductosCategoria($categoria_id): array
    {
        try {
            $query = "select productos.nombre as NombreProducto, productos.codigo, productos.precio, categorias.nombre from categorias inner join productos on categorias.id=productos.categoria_id where categoria_id = :categoria_id;";
            $stmtQuery = $this->conexion->prepare($query);
            $stmtQuery->execute([':categoria_id' => $categoria_id]);
            return $stmtQuery -> fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new PDOException("Error al obetner pproductos por categoria: " . $e->getMessage());
        }
    }

}