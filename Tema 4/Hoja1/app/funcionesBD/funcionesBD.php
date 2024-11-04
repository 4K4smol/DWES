<?php
namespace App\funcionesBD;

use PDO;
use PDOException;

class funcionesBD{

    public static function getEquipos(PDO $connection) {
        try {
            $query = 'SELECT nombre, ciudad, conferencia, division FROM equipos'; // consulta
            $resultado = $connection->query($query);
            // Retorna un array asociativo con los resultados
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        

        } catch (PDOException $e) {
            echo 'Error al obtener equipos: ' . $e->getMessage();
            echo 'Se ha producido un error al obtener los equipos.';
            return [];
        }
    }

    public static function getJugadoresEquipo(PDO $connection, $equipo) {
        try {
            $query = "SELECT * FROM jugadores where nombre_equipo = '$equipo'"; // consulta
            $resultado = $connection->query($query);
            // Retorna un array asociativo con los resultados
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        

        } catch (PDOException $e) {
            echo 'Error al obtener equipos: ' . $e->getMessage();
            echo 'Se ha producido un error al obtener los equipos.';
            return [];
        }
    }

    public static function darBaja(PDO $connection, $jugador){
        try {
            $queryUpdate = "UPDATE `estadisticas` e
            JOIN `jugadores` j ON e.`jugador` = j.`codigo`
            SET 
            e.`puntos_por_partido` = NULL,
            e.`asistencias_por_partido` = NULL,
            e.`tapones_por_partido` = NULL,
            e.`rebotes_por_partido` = NULL
            WHERE j.`nombre` = :nombre";

            $stmtUpdate = $connection->prepare($queryUpdate);
            $stmtUpdate->execute([':nombre' => $jugador]);

        // Eliminar al jugador
        $queryDelete = "DELETE FROM `jugadores` WHERE `nombre` = :nombre";
        $stmtDelete = $connection->prepare($queryDelete);
        $stmtDelete->execute([':nombre' => $jugador]);

        echo "El jugador ha sido dado de baja exitosamente.";

        } catch (PDOException $e) {
        echo 'Error al dar de baja al jugador: ' . $e->getMessage();
        }
    }

    public static function traspaso(PDO $connection, $nombre, $procedencia, $altura, $peso, $posicion, $nombreEquipo) {
        try {
            // Generar un código aleatorio entre 1000 y 10,000
            $codigo = rand(1000, 10000);

            // Consulta para insertar un nuevo jugador
            $query = "INSERT INTO `jugadores` (`codigo`, `nombre`, `procedencia`, `altura`, `peso`, `posicion`, `nombre_equipo`)
                    VALUES (:codigo, :nombre, :procedencia, :altura, :peso, :posicion, :nombreEquipo)";

            $stmt = $connection->prepare($query);
            $stmt->execute([
                ':codigo' => $codigo,
                ':nombre' => $nombre,
                ':procedencia' => $procedencia,
                ':altura' => $altura,
                ':peso' => $peso,
                ':posicion' => $posicion,
                ':nombreEquipo' => $nombreEquipo
            ]);

            echo "El jugador ha sido insertado exitosamente.";
        } catch (PDOException $e) {
            echo 'Error al insertar jugador: ' . $e->getMessage();
        }
    }
}

?>
