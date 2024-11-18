<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\DB;
use App\FuncionesBD\FuncionesBD;

$connection = DB::getInstance()->getConexion();
$auxFuncion = new FuncionesBD;

$turnos = $auxFuncion->getTurnos($connection);

// Verifica si se ha seleccionado un turno
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['num']) && isset($_POST['numPacientes'])) {
    $numPacientes = $_POST['numPacientes'];
    $medicosNumPacientes = $auxFuncion->getMedicosNumPacientes($connection,$numPacientes);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnos</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
</head>
<body>
<h1>Filtrar Medicos por Turno</h1>
    <form method="POST">
        <label for="numPacientes">Seleccione un numero de pacientes: </label>
        <input type="number" name="numPacientes" id="numPacientes" value="<?= isset($_POST['numPacientes']) ? $_POST['numPacientes'] : 0 ?>">
        <button type="submit" name="num">Numero</button>
    </form>

   <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['num'])){
            foreach($medicosNumPacientes as $medico){
                echo
                "Nombre: " .$medico['nombre']."<br>".
                "Codigo: ". $medico['codigo']."<br>".
                "Edad: ". $medico['edad']."<br>".
                "Turno: ". $medico['turno']."<br>".
                "Numero de pacientes: ".$medico['NumeroPacientes'].
                "<br><br>";
            }
        }
    ?>
</body>
</html>