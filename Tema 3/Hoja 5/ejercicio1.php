<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3 Hoja 5 Ejercicio 1</title>
</head>
<body>
<?php
include 'Clases/Empleado.php';
include 'Clases/Cuenta.php';
include 'Clases/Medico.php';
include 'Clases/Producto.php';

    $empleado1=new Empleado(22);
    echo $empleado1->getSueldo();
    echo "<br>";
    $encargado1 = new Encargado(100);
    echo $encargado1->getSueldo();
    
    echo "<p></p>";

    $CuentaCorriente = new CuentaCorriente('123','yo',40,20);
    echo $CuentaCorriente->Mostrar();
    echo $CuentaCorriente->Reintegro(20);

    echo "<p></p>";

    $cuentaAhorro = new CuentaAhorro('123','yo',40,20,10);
    echo $cuentaAhorro->Mostrar();
    echo $cuentaAhorro->AplicaInteres();
    echo $cuentaAhorro->Mostrar();

    echo "<p></p>";

    $medicos = [
        new Familia("Dr. Pérez", 45, Turno::mañana, 150),
        new Familia("Dr. García", 61, Turno::tarde,13),
        new Familia("Dra. López", 73, Turno::tarde,98),
        new Urgencia("Dr. Alonso",54,turno::mañana,9),
        new Urgencia("Dr. Diaz",23,turno::tarde,1),
        new Urgencia("Dr. Olmo",122,turno::mañana,4),
    ];

    foreach($medicos as $medico){
        echo $medico->mostrar()."<br>";
    }

    echo "<br> Medicos con mas de 60 años con turno de tade <br>";
    foreach($medicos as $medico){
        if ($medico->getEdad() > 60 && $medico->getTurno() === Turno::tarde) {
        echo $medico->mostrar()."<br>";
        }
    }

    echo "<br><br>";
    $numeroPacientes=50;
    echo "Medicos con un numero mayor o igual de pacientes de $numeroPacientes <br>";
    foreach ($medicos as $medico) {
        if($medico instanceof Familia && $medico->getPacientes()>$numeroPacientes){
            echo $medico->mostrar()."<br>";
        }
    }




// Página principal
$productos = [];

// Crear al menos 2 productos de cada tipo
$producto1 = new Alimentacion('A1', 2.50, 'Pan', 12, 2024);
$producto2 = new Alimentacion('A2', 1.75, 'Leche', 11, 2023);
$producto3 = new Electronica('E1', 250.00, 'Smartphone', 24);
$producto4 = new Electronica('E2', 1200.00, 'Laptop', 36);

// Agregar los productos al array
array_push($productos, $producto1, $producto2, $producto3, $producto4);

    echo "<p></p>";

    // Mostrar los datos de cada producto
    $total = 0;
    $totalAlimentacion = 0;
    $totalElectronica = 0;

    foreach ($productos as $producto) {
        $producto->__toString();
        $total += $producto->__get('precio');

        // Sumar precios según el tipo de producto
        if ($producto instanceof Alimentacion) {
            $totalAlimentacion += $producto->__get('precio');
        } elseif ($producto instanceof Electronica) {
            $totalElectronica += $producto->__get('precio');
        }
    }

    // Mostrar el importe total
    echo "Importe total de la compra: {$total}€\n";

    // Determinar en qué tipo de producto se gastó más
    if ($totalAlimentacion > $totalElectronica) {
        echo "Se ha gastado más en productos de Alimentación.\n";
    } elseif ($totalElectronica > $totalAlimentacion) {
        echo "Se ha gastado más en productos de Electrónica.\n";
    } else {
        echo "El gasto es igual en ambos tipos de productos.\n";
    }


?>
</body>
</html>