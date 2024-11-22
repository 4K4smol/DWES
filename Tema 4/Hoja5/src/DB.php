<?php

namespace App;

use PDO;
use PDOException;

class DB {
    private const DNS = "mysql:host=localhost;port=3306;dbname=dwes_05_hospital";
    private const USUARIO = "root";
    private const PASSWORD = "mysql";
    private static ?DB $instance = null;
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
    public static function getInstance(): DB {
        if (self::$instance === null) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    // Método para obtener la conexión
    public function getConexion(): PDO {
        return $this->conexion;
    }
}