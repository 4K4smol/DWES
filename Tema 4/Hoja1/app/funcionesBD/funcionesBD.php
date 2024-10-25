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
            return [];
        }
    }
    


}

?>