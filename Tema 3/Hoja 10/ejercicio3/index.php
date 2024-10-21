<?php
$equipos = [
    "Real Madrid" => [
        "entrenador" => [
            "nombre" => "Zidane",
            "imagen" => "imagenes/zidane.jpg"
        ],
        "jugadores" => [
            [
                "nombre" => "Courtois",
                "imagen" => "imagenes/courtois.jpg"
            ],
            [
                "nombre" => "Ramos",
                "imagen" => "imagenes/ramos.jpg"
            ],
            [
                "nombre" => "Hazard",
                "imagen" => "imagenes/hazard.jpg"
            ]
        ]
    ],
    "Barcelona" => [
        "entrenador" => [
            "nombre" => "Koeman",
            "imagen" => "imagenes/koeman.jpg"
        ],
        "jugadores" => [
            [
                "nombre" => "Ter Stegen",
                "imagen" => "imagenes/terstegen.jpg"
            ],
            [
                "nombre" => "Piqué",
                "imagen" => "imagenes/pique.jpg"
            ],
            [
                "nombre" => "Griezmann",
                "imagen" => "imagenes/griezmann.jpg"
            ]
        ]
    ]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Selección de Equipos</title>
</head>
<body>
    <h1>Selección de Equipos de Fútbol</h1>
    <form method="post">
        <label for="equipo">Elige un equipo:</label>
        <select name="equipo" id="equipo">
            <option value="Todos">Todos</option>
            <option value="Real Madrid">Real Madrid</option>
            <option value="Barcelona">Barcelona</option>
        </select>
        <br/><br/>

        <label>Elige el tipo de componente:</label>
        <input type="radio" name="componente" value="entrenador" checked> Entrenador
        <input type="radio" name="componente" value="jugadores"> Jugadores
        <br/><br/>

        <input type="submit" name="mostrar" value="Mostrar">
    </form>
    <?php
    if (isset($_POST['mostrar'])) {
        $equipoSeleccionado = $_POST['equipo'];
        $tipoComponente = $_POST['componente'];

        echo "<h2>Resultados</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Nombre</th><th>Imagen</th></tr>";

        // Función para mostrar la tabla
        function mostrarComponente($nombre, $imagen) {
            echo "<tr>";
            echo "<td>$nombre</td>";
            echo "<td><img src='$imagen' alt='$nombre' width='100'></td>";
            echo "</tr>";
        }

        // Mostrar resultados según la selección
        if ($equipoSeleccionado === "Todos") {
            // Mostrar todos los equipos
            foreach ($equipos as $equipo => $datos) {
                if ($tipoComponente === "entrenador") {
                    mostrarComponente($datos['entrenador']['nombre'], $datos['entrenador']['imagen']);
                } elseif ($tipoComponente === "jugadores") {
                    foreach ($datos['jugadores'] as $jugador) {
                        mostrarComponente($jugador['nombre'], $jugador['imagen']);
                    }
                }
            }
        } else {
            // Mostrar solo el equipo seleccionado
            $datos = $equipos[$equipoSeleccionado];
            if ($tipoComponente === "entrenador") {
                mostrarComponente($datos['entrenador']['nombre'], $datos['entrenador']['imagen']);
            } elseif ($tipoComponente === "jugadores") {
                foreach ($datos['jugadores'] as $jugador) {
                    mostrarComponente($jugador['nombre'], $jugador['imagen']);
                }
            }
        }

        echo "</table>";
    }
    ?>
</body>
</html>
