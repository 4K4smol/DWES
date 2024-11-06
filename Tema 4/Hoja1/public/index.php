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
 
    // if ($connection instanceof PDO) {
    //     echo 'Conexión establecida correctamente<br>';
    // } else {
    //     echo 'Error en la conexión';
    // }

    $equipos = funcionesBD::getEquipos($connection);
    if(isset($_POST['equipos'])){
    $jugadores = funcionesBD::getJugadoresEquipo($connection,$_POST['equipos']);
    }

    ?>

    <h1>Jugadores de la NBA</h1>
    <hr>
    <form method="post">
        <label for="equipos">Equipo:</label>
        <select id="equipos" name="equipos">
            <?php 
                foreach ($equipos as $equipo) {
                    $selected = (isset($_POST["equipos"]) && $_POST["equipos"] === $equipo["nombre"]) ? 'selected' : '';
                    echo "<option value='{$equipo['nombre']}' $selected>{$equipo['nombre']}</option>";
                }
            ?>
        </select>
        <br><br>
         <button type="submit" name="Mostrar">Mostrar</button>
    </form>
    <hr>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Mostrar'])) {
            echo 
            "<form method='post'>
                    <table>
                        <tr>
                            <td>NOMBRE<hr></td>
                            <td>PESO<hr></td>
                        </tr>";
                foreach($jugadores as $jugador){
                    echo 
                        "<tr>
                            <td>{$jugador['nombre']}</td>
                            <td><input type='number' name='nuevosPesos[]' value='{$jugador['peso']}'> KG</td>
                        </tr>";
                        $pesos[]=$jugador['peso'];
                }
            echo 
                    "</table>
                    <button type='submit' name='actualizar'>Actualizar</button>
                    <input type='hidden' name='pesos' value='" . htmlspecialchars(json_encode($pesos)) . "'>
            </form>";
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {
            $nuevosPesos = $_POST['nuevosPesos'];
            $pesos = json_decode($_POST['pesos']);
            $cambiarPesoJugador=[];
            $resultado = array_diff($nuevosPesos, $pesos);
            $claves = array_keys($resultado);
            
            if(isset($_POST['equipos'])){
                $equipo=$_POST['equipos'];
            }

            echo $resultado[1];

        }
    

    
    ?>


    <h1>Traspasos de Jugadores</h1>
    <hr>
    <h2>Baja y alta de jugadores:</h2>
    <hr>
    <form method="post">
        <label for="jugadorBaja">Baja de Jugador</label>
        <select id="jugadorBaja" name="jugadorBaja">
            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Mostrar'])) {
                    foreach($jugadores as $jugador){
                        $selected = (isset($_POST["jugadorBaja"]) && $_POST["jugadorBaja"] === $jugador["nombre"]) ? 'selected' : '';
                        echo "<option value='{$jugador['nombre']}' $selected>{$jugador['nombre']}</option>";                
                    }
                }
            ?>
        </select>
        <h3>Datos del nuevo Jugador</h3>
        <hr>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre"><br><br>

            <label for="procedencia">Procedencia:</label>
            <input type="text" id="procedencia" name="procedencia"><br><br>

            <label for="altura">Altura:</label>
            <input type="number" id="altura" name="altura"><br><br>

            <label for="peso">Peso:</label>
            <input type="number" id="peso" name="peso"><br><br>

            <label for="posicion">Posicion:</label>
            <input type="text" id="posicion" name="posicion"><br><br>
            
        <button type="submit" name="realizar">Realizar traspaso</button>
    </form>
    
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['realizar'])) {
            if(
                isset($_POST['nombre']) &&
                isset($_POST['procedencia']) &&
                isset($_POST['altura']) &&
                isset($_POST['peso']) &&
                isset($_POST['posicion'])
                ){

                if(isset($_POST['equipos'])){
                    $equipoCopia=$_POST['equipos'];
                }
                    
                if(isset($_POST['jugadorBaja'])){
                    funcionesBD::darBaja($connection, $_POST['jugadorBaja']);
                    funcionesBD::traspaso(
                        $connection,
                        $_POST['nombre'],
                        $_POST['procedencia'],
                        $_POST['altura'],
                        $_POST['peso'],
                        $_POST['posicion'],
                        $equipoCopia);
                }
            }
        }
        
    ?>

</body>
</html>
