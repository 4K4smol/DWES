<?php

namespace App;

use App\Clases\Usuario;
use PDO;
use PDOException;

class funcionesBD{

    public static function getPlazas(PDO $connection){

        try{
            $query = "SELECT * FROM dwes_03_funicular.plazas WHERE plazas.reservada = 0";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $asientos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "No se ha podido realizar la consulta" . $e->getMessage();
        }

        return $asientos;
    }

    public static function realizarReserva(PDO $connection, $nombre, $dni, $asiento){
        try{
            //iniciar transaccion
            $connection->beginTransaction();

            //realizar reserva de un pasajero
            $queryReserva = "INSERT INTO dwes_03_funicular.pasajeros (dni,nombre,sexo,numero_plaza) VALUES (:dni,:nombre,:sexo,:numero_plaza)";
            $stmt = $connection->prepare($queryReserva);
            $stmt->execute([
                ':dni' => $dni,
                ':nombre' => $nombre,
                ':sexo' => '-',
                ':numero_plaza' => $asiento,
            ]);

            //actualizar plazas
            $queryActualizarPlazas = "UPDATE dwes_03_funicular.plazas SET reservada = 1 WHERE numero = :asiento";
            $stmt = $connection->prepare($queryActualizarPlazas);
            $stmt->execute([
                ':asiento' => $asiento,
            ]);

            // Confirmar la transacción
            $connection->commit();
            echo "El pasajero ha sido añadido.";

        }catch(PDOException $e){
            echo "No se ha podido realizar la consulta" . $e->getMessage();
        }
    }

    public static function llegada(PDO $connection){

        try{
            //iniciar transaccion
            $connection->beginTransaction();

            //borrar pasjeros
            $queryDeletePasajeros = "DELETE FROM dwes_03_funicular.pasajeros";
            $stmt = $connection->prepare($queryDeletePasajeros);
            $stmt->execute();

            //actualizar plazas
            $queryActualizarPlazas = "UPDATE dwes_03_funicular.plazas SET reservada = 0";
            $stmt = $connection->prepare($queryActualizarPlazas);
            $stmt->execute();

            // Confirmar la transacción
            $connection->commit();
            echo "Todos los pasajeros han sido eliminados y las plazas están disponibles.";


        }catch(PDOException $e){
            //Tira pa´tra
            $connection->rollBack();
            echo "No se ha podido realizar la consulta" . $e->getMessage();
        }

    }

    public static function nuevosPrecios(PDO $connection, $plaza, $precio){
        try{
            $queryCambiarPrecio = "UPDATE dwes_03_funicular.plazas SET precio = :precio  WHERE numero = :plaza";
            $stmt = $connection->prepare($queryCambiarPrecio);
            $stmt->execute([
                ':precio' => $precio,
                ':plaza' => $plaza,
            ]);
        }catch(PDOException $e){
            echo "No se ha podido realizar la consulta" . $e->getMessage();
        }
    }

    public static function registro (PDO $connection, $usuario, $pwd):bool
    {
        try {
            $query = "INSERT INTO usuarios (usuario, password) VALUES (:usuario, :pwd)";
            $stmt = $connection->prepare($query);
            return $stmt->execute([
                ':usuario' => $usuario,
                ':pwd' => $pwd
            ]);
        } catch (PDOException $e) {
            "Error al registrar usuario " . $e->getMessage();
            return false;
        }
    }

    public static function obtenerUsuarioPorNombre(PDO $connection, string $usuario): ?Usuario
    {
        try {
            $query = "SELECT id, usuario, password FROM usuarios WHERE usuario = :usuario";
            $stmt = $connection->prepare($query);
            $stmt->execute([':usuario' => $usuario]);

            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                return new Usuario($data['id'], $data['usuario'], $data['password']);
            }
        } catch (PDOException $e) {
            error_log("Error al obtener usuario: " . $e->getMessage());
        }

        return null; // Devuelve null si no encuentra el usuario
    }

}

?>