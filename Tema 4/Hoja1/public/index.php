<!DOCTYPE html>
<html lang="ES_es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Base de Datos</title>
</head>
<body>
    <?php 
    require_once '../vendor/autoload.php';
    use App\funcionesBD\funcionesBD;
    use App\conexionBD\conexionBD;
   
    $connection = conexionBD::getConnection();
 
    if ($connection instanceof PDO) {
        echo 'Conexión establecida correctamente<br>';
    } else {
        echo 'Error en la conexión';
    }

    $equipos = funcionesBD::getEquipos($connection);
    $jugadores = funcionesBD::getJugadoresEquipo($connection,$_POST['equipos']);

    ?>

    <h1>Jugadores de la NBA</h1>
    <hr>
    <form method="post">
        <label for="equipos">Equipo:</label>
        <select id="equipos" name="equipos">
            <?php 
                foreach ($equipos as $equipo) {
                    echo "<option value='{$equipo['nombre']}'>{$equipo['nombre']}</option>";
                }
            ?>
        </select>
        <br><br>
        <button type="submit" name="Mostrar">Mostrar</button>
    </form>
    <hr>

    <?php 
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Mostrar'])) {

            echo "<table><tr><td>NOMBRE<hr></td><td>PESO<hr></td></tr>";
            foreach($jugadores as $jugador){
                echo "<tr><td>{$jugador['nombre']}</td><td>{$jugador['peso']}</td></tr>";
            }
            echo "</table>";

        }
    
    ?>

</body>
</html>
