<?php
namespace App;

use PDO;
use PDOException;



class funcionesBD{

        public static function guardarLibro(PDO $connection, $titulo,$anio,$precio,$fecha):bool{
            $salida=false;
            try{
                $query = "INSERT INTO dwes_02_libros.libros (titulo, anyo_edicion, precio, fecha_adquisicion)
                    VALUES (:titulo,:anio,:precio,:fecha_adquisicion)";

                $stmt = $connection->prepare($query);
                $stmt->execute([
                    ':titulo' => $titulo,
                    ':anio' => $anio,
                    ':precio' => $precio,
                    ':fecha_adquisicion' => $fecha
                ]);
                $salida = true;
            }catch (PDOException $e) {
                // Manejo de errores en caso de fallo en la consulta
                echo "Error al guardar los datos: " . $e->getMessage();
            }

            return $salida;
        }

        public static function listarLibros(PDO $connection){
            
            try{
                $query = "SELECT * FROM dwes_02_libros.libros";
                $stmt = $connection->prepare($query);
                $stmt->execute();
                $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch (PDOException $e) {
                // Manejo de errores en caso de fallo en la consulta
                echo "Error al guardar los datos: " . $e->getMessage();
            }

            return $libros;

        }

}



?>