<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\DB;
use App\FuncionesBD\FuncionesBD;

$connection = DB::getInstance()->getConexion();
$auxFuncion = new FuncionesBD;

$turnos = $auxFuncion->getTurnos($connection);

// Verifica si se ha seleccionado un turno
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filtro']) && isset($_POST['turno_id'])) {
    $turno_id = $_POST['turno_id'];
    $medicosTurno = $auxFuncion->getMedicosTurno($connection,$turno_id);
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
        <label for="turno_id">Seleccione un turno:</label>
        <select id="turno_id" name="turno_id">
            <?php
                foreach ($turnos as $turno) {
                    $selected = (isset($_POST["turno_id"]) && $_POST["turno_id"] == $turno["id"]) ? 'selected' : '';
                    echo "<option value='{$turno['id']}' $selected>{$turno['turno']}</option>";
                }
            ?>
        </select>
        <button type="submit" name="filtro">Filtrar</button>
    </form>

   <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filtro'])){
            foreach($medicosTurno as $medico){
                echo
                "Nombre: " .$medico['nombre']."<br>".
                "Codigo: ". $medico['codigo']."<br>".
                "Edad: ". $medico['edad']."<br>".
                "<br><br>";
            }
        }
    ?>
</body>
</html>