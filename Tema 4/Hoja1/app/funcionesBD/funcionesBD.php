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

    public static function getEquipoPorJugador(PDO $connection,$jugador){
        try {
            // consulta
            $query = 'SELECT equipos.nombre 
            FROM equipos 
            inner join jugadores 
            on equipos.nombre=jugadores.nombre_equipo 
            where jugadores.nombre=:nombre';

            $stmtQuery = $connection->prepare($query);

            $stmtQuery->execute([':nombre' => $jugador]);
            $equipo = $stmtQuery->fetch(PDO::FETCH_ASSOC);
            return $equipo;
        

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

    public static function darBaja(PDO $connection, $jugador) {
        try {
            $connection->beginTransaction();
    
            // Eliminar estadísticas relacionadas
            $queryDeleteStats = "DELETE e FROM `estadisticas` e
                                 JOIN `jugadores` j ON e.`jugador` = j.`codigo`
                                 WHERE j.`nombre` = :nombre";
            $stmtDeleteStats = $connection->prepare($queryDeleteStats);
            $stmtDeleteStats->execute([':nombre' => $jugador]);
    
            // Eliminar al jugador
            $queryDeletePlayer = "DELETE FROM `jugadores` WHERE `nombre` = :nombre";
            $stmtDeletePlayer = $connection->prepare($queryDeletePlayer);
            $stmtDeletePlayer->execute([':nombre' => $jugador]);
    
            $connection->commit();
            echo "El jugador ha sido dado de baja exitosamente.";
    
        } catch (PDOException $e) {
            $connection->rollBack();
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

    public static function actualizarPesos(PDO $connection, $nombre, $peso)
    {
        try {
            // Consulta para actualizar peso
            $query = "UPDATE jugadores
            SET peso = :peso
            WHERE nombre = :nombre";

            $stmt = $connection->prepare($query);
            $stmt->execute([
                ':nombre' => $nombre,
                ':peso' => $peso,
            ]);

            echo "El jugador ha sido actualizado exitosamente."."<br>";
        } catch (PDOException $e) {
            echo 'Error al insertar jugador: ' . $e->getMessage();
        }
    }

}

?>
