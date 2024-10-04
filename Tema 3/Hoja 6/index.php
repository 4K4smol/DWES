<?php
include 'Clases/ElementoVolador.php';
$avion1 = new Avion("Airbus A380", 2, 4, "Iberia", 15, 10, 2020, 12000);
echo $avion1->mostrarInformacion();

echo "<p></p>";

$helicoptero1 = new Helicoptero("Heli-1", 0, 1, "pedro", 3);
echo $helicoptero1->mostrarInformacion();
$helicoptero1->acelerar(180);
echo "<br>";
echo $helicoptero1->mostrarInformacion();

echo "<p></p>";

$aeropuerto = new Aeropuerto();

$avion1 = new Avion("Boeing 747", 2, 4, "Iberia", 15, 10, 2020, 12000);
$avion2 = new Avion("Airbus A380", 2, 2, "qatar", 20, 11, 2021, 10000);
$avion3 = new Avion("Cessna 172", 1, 1, "Iberia", 5, 7, 2018, 5000);
$helicoptero1 = new Helicoptero("Heli1", 0, 1, "asd", 3);
$helicoptero2 = new Helicoptero("Heli2", 0, 1, "qwe", 4);
$helicoptero3 = new Helicoptero("Heli3", 0, 1, "zxc", 2);

// Insertar
$aeropuerto->insertar($avion1);
$aeropuerto->insertar($avion2);
$aeropuerto->insertar($avion3);
$aeropuerto->insertar($helicoptero1);
$aeropuerto->insertar($helicoptero2);
$aeropuerto->insertar($helicoptero3);
echo "<br>";
echo $aeropuerto->buscar("Boeing 747"); // Existente
echo "<br>";
echo $aeropuerto->buscar("No existe"); // No existente
echo "<br>";

echo $aeropuerto->ListarCompañia("Iberia"); // Existente
echo $aeropuerto->ListarCompañia("Vueling"); // No existente


echo $aeropuerto->rotores(3); // Con rotores existentes
echo $aeropuerto->rotores(5); // No existentes

?>