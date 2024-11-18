<?php

namespace App\FuncionesBD;

use App\DB;
use PDO;
use PDOException;

$connection = DB::getInstance();

class FuncionesBD{

    public function getMedicos(PDO $connection)
    {
        try {
            $query = "SELECT medicos.codigo, medicos.nombre, medicos.edad, turnos.turno as turno FROM medicos
            INNER JOIN turnos on medicos.turno_id = turnos.id;";
            $stmt = $connection->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Hubo un error con la consulta de medicos" . $e->getMessage();
        }
    }

    public function getTurnos(PDO $connection)
    {
        try {
            $query = "SELECT turnos.id, turnos.turno FROM dwes_05_hospital.turnos;";
            $stmt = $connection->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Hubo un error al retornar los turnos existentes" . $e->getMessage();
        }
    }

    public function getMedicosTurno(PDO $connection,$turno_id)
    {
        try {
            $query = "SELECT medicos.codigo, medicos.nombre, medicos.edad
            FROM medicos
            WHERE medicos.turno_id = :turno_id;";
            $stmt = $connection->prepare($query);
            $stmt->execute([':turno_id' => $turno_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Hubo un error al obtener los medicos segun su turno" . $e->getMessage();
        }
    }

    public function getMedicosNumPacientes(PDO $connection, $numPacientes)
    {
        try {
            $query = "SELECT medicos.codigo, medicos.nombre, medicos.edad, turnos.turno as turno, familia.numPacientes as NumeroPacientes FROM medicos
            INNER JOIN turnos on medicos.turno_id = turnos.id
            INNER JOIN familia on medicos.id=familia.medico_id
            WHERE familia.numPacientes = :numPacientes;";
            $stmt = $connection->prepare($query);
            $stmt->execute([':numPacientes' => $numPacientes]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Hubo un problema al solicitar los medicos con igual numero de pacientes que {$numPacientes}" . $e->getMessage();
        }
    }


}

?>