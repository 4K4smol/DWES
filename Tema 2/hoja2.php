<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja 2</title>
</head>
<body>
<?php

print ("Este es el resultado correcto del primer ejercicio");
print("<br/>");

print("Segundo ejercicio: visualización del contenido de variables");

$nombre="yo";
$edad=25;

print("<p>Mi nombre es $nombre y mi edad es $edad</p>");

$operador1 = 13;
$operador2 = 4;
$resultado = 0;

$resultado=$operador1-$operador2;
print("<p>$operador1-$operador2=$resultado</p>");

$resultado=$operador1+$operador2;
print("<p>$operador1+$operador2=$resultado</p>");

$resultado=$operador1*$operador2;
print("<p>$operador1*$operador2=$resultado</p>");

$resultado=$operador1/$operador2;
print("<p>$operador1/$operador2=$resultado</p>");

$resultado=$operador1%$operador2;
print("<p>$operador1%$operador2=$resultado</p>");




print('<i>Información de la variable "nombre": </i>');
var_dump($nombre);

print("</br><i>Contenido de la variable: $nombre</i>");
$nombre=null;

print("</br><i>Después de asignarle un valor nulo: </i>");
var_dump($nombre);



print("<p></p>");
$temporal="juan"; echo "<br/>Temporal = $temporal <br>Tipo = ";
echo gettype($temporal);

$temporal=3.14; echo "<br/>Temporal = $temporal <br>Tipo = ";
echo gettype($temporal);

$temporal=false; echo "<br/>Temporal = "; echo ($temporal ? 'true' : 'false');
echo "<br>Tipo = ";
echo gettype($temporal);

$temporal=3; echo "<br/>Temporal = $temporal <br>Tipo = ";
echo gettype($temporal);

$temporal=null; echo "<br/>Temporal = "; var_dump($nombre);
echo "<br>Tipo = ";
echo gettype($temporal);

print("<p></p>");



$numero1=10;
$numero2=20;
$numero3=40;
$media=($numero1+$numero2+$numero3)/3;
print("Media de ($numero1 + $numero2 + $numero3) / 3 = $media <p></p>");




$valor1 = 10;
$valor2 = "Luna";

echo "Antes del intercambio:<br/>";
echo "valor1 = " . $valor1 . "<br/>";
echo "valor2 = " . $valor2 . "<br/>";

$valorTemp=$valor1;
$valor1=$valor2;
$valor2=$valorTemp;

echo "<br/>";
echo "Después del intercambio:<br/>";
echo "valor1 = " . $valor1 . "<br/>";
echo "valor2 = " . $valor2 . "<br/>";
echo "<p></p>";


/*dinero*/
$dinero = 1;

/*valor billetes*/
$billete10=10;
$billete5=5;
$moneda=1;

/*cantidad billetes o monedas*/
$cant10=0;
$cant5=0;
$cant1=0;

print("Dinero = $dinero$ <br/>");
$cant10 = ($dinero>=10) ? 1:0;
$cant10 = ($cant10==1) ? (($dinero/10)-($dinero%$billete10/10)) : 0;
$dinero = ($cant10==0) ? $dinero : $dinero-($cant10*$billete10);
$cant5 = ($dinero>=5) ? 1 : 0;
$dinero = ($cant5==0) ? $dinero : $dinero-($cant5*$billete5);
$cant1 = ($dinero>0) ? $dinero : 0;

print("billetes de 10 = $cant10 <br/> billetes de 5 = $cant5 <br/>
        monedas de 1 = $cant1");

?>
</body>
</html>