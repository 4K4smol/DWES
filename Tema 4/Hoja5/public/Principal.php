<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
</head>
<body>

<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\DB;
use App\FuncionesBD\FuncionesBD;

//crear conexion
$connection = DB::getInstance()->getConexion();
//Funciones
$auxFuncion = new FuncionesBD;
$medicos = $auxFuncion->getMedicos($connection);

foreach($medicos as $medico){

    echo
    "Nombre: " .$medico['nombre']."<br>".
    "Codigo: ". $medico['codigo']."<br>".
    "Edad: ". $medico['edad']."<br>".
    "Turno: ". $medico['turno']."<br>".
    "<br><br>";
}
?>


</body>
</html>