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

}

?>