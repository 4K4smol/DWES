<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja 3</title>
    <style>
        body{
            background-color: #c0c0c0;
        }
    </style>
</head>
<body>
<?php

$fechaActual = date("d-m-Y"); // Salida: 21-09-2024
echo $fechaActual . "<br>";


$fechaMenosCinco = date("d-m-Y",strtotime("-5 days"));
echo $fechaMenosCinco . "<br>";


$dia = 31;
$mes = 2; 
$anio = 2024;

echo checkdate($mes, $dia, $anio) ?
"La fecha $dia/$mes/$anio es correcta." : "La fecha $dia/$mes/$anio no es correcta.";
print("<p></p>");

$date1 = new DateTime($fechaActual);
$date2 = new DateTime($fechaMenosCinco);
$intervalo = $date1->diff($date2);

echo $intervalo->format('%a dias de diferencia' . "<br>");

print("<p></p>");
echo date("d-m-Y H:i", strtotime("+2 hours"));
print("<p></p>");


$a=8;
$b=3;
$c=5;

echo " $a == $b". var_export($a==$b) . "<br>";
echo " $a != $b".var_export($a != $b). "<br>";
echo " $a < $b".var_export($a < $b). "<br>";
echo " $a > $b.".var_export($a > $b). "<br>";
echo " $a >= $c".var_export($a >= $c). "<br>";
echo " $a <= $c".var_export($a <= $c). "<br>";

// echo $a==$b ? 'true' : 'false'; 

echo "($a == $b) && ($c > $b): " . (($a == $b) && ($c > $b) ? 'true' : 'false') . "<br/>";
echo "($a == $b) || ($b == $c): " . (($a == $b) || ($b == $c) ? 'true' : 'false') . "<br/>";
echo "($b <= $c): " . ($b <= $c ? 'true' : 'false') . "<br/>";

?>
</body>
</html>