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
        <input type="hidden" name="nombre_equipo" value="<?= isset($_POST['equipos']) ? htmlspecialchars($_POST['equipos']) : '' ?>";>
        <button type="submit" name="Mostrar">Mostrar</button>
    </form>
    <hr>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Mostrar'])) {
            $lista_jugadores_pesos=[];
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
                        $lista_jugadores_pesos[] = [
                            'nombre' => $jugador['nombre'],
                            'peso' => $jugador['peso']
                        ];
                }
            echo
                    "</table>
                    <button type='submit' name='actualizar'>Actualizar</button>
                    <input type='hidden' name='lista_jugadores_pesos' value='" . htmlspecialchars(json_encode($lista_jugadores_pesos)) . "'>

            </form>";
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {


            $lista_jugadores_pesos = json_decode($_POST['lista_jugadores_pesos']);
            $nuevos_pesos = $_POST['nuevosPesos'];

            foreach ($lista_jugadores_pesos as $index => $jugador) {
                if (isset($nuevos_pesos[$index])) {
                    // Actualizar si el peso es diferente
                    if($jugador->peso!=$nuevos_pesos[$index]){
                        funcionesBD::actualizarPesos($connection,$jugador->nombre,$nuevos_pesos[$index]);
                    }
                }
            }
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

                if(isset($_POST['equipo'])){
                    $equipoCopia=$_POST['equipos'];
                }

                if(isset($_POST['jugadorBaja'])){
                    //eliminar
                    funcionesBD::darBaja($connection, $_POST['jugadorBaja']);
                    //Insertar
                    funcionesBD::traspaso($connection,$_POST['nombre'],$_POST['procedencia'],$_POST['altura'],$_POST['peso'],$_POST['posicion'],$equipoCopia);
                }
            }
        }

    ?>

</body>
</html>
