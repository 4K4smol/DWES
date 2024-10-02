<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja4/index.html</title>
</head>
<body>
<?php
include 'Clases/Circulo.php';
include 'Clases/Coche.php';
include 'Clases/Monedero.php';

$circulo1 = new Circulo(5);

echo $circulo1->__toString().'<br>';

//Recibir un atriburo poniendo el nombre
echo $circulo1->__get('radio')."<br>";
//Cambiar valor de un atriburo poniendo el nombre
$circulo1->__set('radio',10);
echo $circulo1->__toString();

$coche = new Coche('2394ELE',20);
echo "<p></p>";
echo $coche->__toString();
echo "<br>";
$coche->Acelerar(101);

echo $coche->__toString();
echo "<br>";

$coche->Frenar(10);
echo "<br>";
echo $coche->__toString();
echo "<p></p>";
$monedero1=new Monedero(500);
$monedero2=new Monedero(500);
echo $monedero1->MostrarMonedero();
echo "<br>";
$monedero1->SacarDinero(50);
echo $monedero1->MostrarMonedero();
$monedero1->MeterDinero(23);
echo "<br>";
echo $monedero1->MostrarMonedero();
echo "<br>";
echo $monedero1->CantidadMonederos();
echo "<br>";
unset($monedero2);
echo $monedero1->CantidadMonederos();
?>
</body>
</html>