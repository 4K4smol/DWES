<?php

    namespace Examen04\Clases;


    class Funciones{

        public static function getFamilias():array
        {
            $familias = [];
            $conexion = ConexionBD::getConnection();
            $consulta = "SELECT codigo.nombre FROM familias";
            $setencia = $conexion->prepare($consulta);
            if ($setencia->execute()) {
                while ($fila = $setencia->fetchObject())
                {
                    $familias[] = new Familia($fila->codigo,$fila->nombre);
                }
            }
            unset($setencia);
            return $familias;
        }




    }



?>