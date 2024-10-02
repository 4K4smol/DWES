<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja 3 tema 3</title>
</head>
<body>
<?php
//devuelve array pedido
function cargar() {
    $array = [];
    for ($i = 0; $i < 20; $i++) {
        $array[] = rand(1, 100);
    }
    return $array;
}
// Ordena el array
function ordenar(&$array) {
    sort($array); 
}
// merge
function mezclar($array1, $array2) {
    return array_merge($array1, $array2);
}

// Carga y ordena 
$array1 = cargar();
ordenar($array1);
$array2 = cargar();
ordenar($array2);

// MERGE
$mezcla = mezclar($array1, $array2);
ordenar($mezcla);

print_r($array1);
print_r($array2);
print_r($mezcla);

function desgloseMoneda($cantidad) {
    //monedas
    $monedas = [2, 1, 0.50, 0.20, 0.10, 0.05, 0.02, 0.01];
    $desglose = [];

    foreach ($monedas as $moneda) {
        if ($cantidad >= $moneda) {
            $desglose[$moneda] = floor($cantidad / $moneda);
            $cantidad -= $desglose[$moneda] * $moneda;
        }
    }

    return $desglose;
}
$cantidad = 87.43; // cantidad
$desglose = desgloseMoneda($cantidad);
echo "<p></p>";
echo "Cantidad: $cantidad euros\n
Desglose:\n";
foreach ($desglose as $moneda => $cantidad) {
    echo "$cantidad unidades de $moneda euros\n";
}
echo "<p></p>";

function calcularLetraDNI($dni) {
    //letra que puede tener el DNI
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    //se calcula haciendo el modulo de 23
    return $letras[$dni % 23];
}

$dni = 12345678; // Ejemplo de DNI
$letra = calcularLetraDNI($dni);
echo "El NIF completo es: $dni$letra\n";

echo "<p></p>";


echo "<table border='1'>";
echo "<tr><th>Variable</th><th>Valor</th></tr>";
foreach ($_SERVER as $variable => $valor) {
    echo "<tr><td>$variable</td><td>$valor</td></tr>";
}
echo "</table>";




$articulos = [
    ['codigo' => 'A1', 'descripcion' => 'Artículo 1', 'existencias' => 10],
    ['codigo' => 'A2', 'descripcion' => 'Artículo 2', 'existencias' => 50],
    ['codigo' => 'A3', 'descripcion' => 'Artículo 3', 'existencias' => 30]
];

function mayor($articulos) {
    $mayor = $articulos[0];
    foreach ($articulos as $articulo) {
        if ($articulo['existencias'] > $mayor['existencias']) {
            $mayor = $articulo;
        }
    }
    return $mayor['descripcion'];
}
function sumar($articulos) {
    $suma = 0;
    foreach ($articulos as $articulo) {
        $suma += $articulo['existencias'];
    }
    return $suma;
}
function mostrar($articulos) {
    foreach ($articulos as $articulo) {
        echo "Código: " . $articulo['codigo'] . ", Descripción: " . $articulo['descripcion'] . ", Existencias: " . $articulo['existencias'] . "<br>";
    }
}

echo "Artículo con mayor existencias: " . mayor($articulos) . "<br>";
echo "Total de existencias: " . sumar($articulos) . "<br>";
echo "Mostrar todos los artículos:<br>";
mostrar($articulos);


$verbos = ['hablar', 'comer', 'vivir'];

function conjugarVerbo($verbo) {
    $raiz = substr($verbo, 0, -2);
    $terminacion = substr($verbo, -2);

    switch ($terminacion) {
        case 'ar':
            $conjugacion = [
                $raiz . 'o', $raiz . 'as', $raiz . 'a',
                $raiz . 'amos', $raiz . 'áis', $raiz . 'an'
            ];
            break;
        case 'er':
            $conjugacion = [
                $raiz . 'o', $raiz . 'es', $raiz . 'e',
                $raiz . 'emos', $raiz . 'éis', $raiz . 'en'
            ];
            break;
        case 'ir':
            $conjugacion = [
                $raiz . 'o', $raiz . 'es', $raiz . 'e',
                $raiz . 'imos', $raiz . 'ís', $raiz . 'en'
            ];
            break;
        default:
            $conjugacion = [];
            break;
    }

    return $conjugacion;
}

$verbo = $verbos[0];
$conjugacion = conjugarVerbo($verbo);

echo "Verbo: $verbo<br>";
echo "Presente de indicativo:<br>";
echo "Yo " . $conjugacion[0] . "<br>";
echo "Tú " . $conjugacion[1] . "<br>";
echo "Él/Ella " . $conjugacion[2] . "<br>";
echo "Nosotros " . $conjugacion[3] . "<br>";
echo "Vosotros " . $conjugacion[4] . "<br>";
echo "Ellos/Ellas " . $conjugacion[5] . "<br>";

?>
</body>
</html>