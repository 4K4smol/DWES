<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja1</title>
</head>
<body>
    <?php
        
    setlocale(LC_TIME, 'es_ES.UTF-8');
    $fecha_actual = strftime("%A, %d de %B de %Y");
    echo "<h1>Hoy es $fecha_actual</h1>";


    echo "<p></p>";
    $sumatorio=0;
    for($i = 10; $i<100; $i+=1){
        if($i%2==0){
            $sumatorio+=$i;
        }
    }
    echo "sumatorio = " .$sumatorio;


    print("<p></p>");
    function capicua($capi){
        $copia=$capi;
        $cifras=1;
        if($capi<=10){
            echo "Es imposible que sea capicua";
        }else
            while($capi>10){
                $capi /= 10;
                $cifras+=1;
            }
            // Devolver el valor
            $capi=$copia;
            //echo $capi . "<br>";

            //comparar primer y ultimo digito
            $esCapicua=true;
            for($i = 0; $i <= $cifras / 2;$i++){
                $primerDigito = floor($capi / pow(10, ($cifras-1) - $i)) % 10;
                $ultimoDigito = $capi % 10;
                //echo $primerDigito . "<br>";
                //echo $ultimoDigito . "<br>";

                if ($primerDigito != $ultimoDigito) {
                    $esCapicua = false;
                    break;
                }


            // Eliminar el último dígito
            $capi = floor($capi / 10);
            $cifras--;

            // Remover el primer dígito
            $capi = $capi % pow(10, $cifras-1); 


            }
            
            if($esCapicua){
                return  "Es capicua";
            }else{
                return "No es capicua";
            }

        }

    echo capicua(765567);

        echo "<br>";
    //generar los numero capicuas del 100 al 999
    for($i = 100; $i<999; $i++){
        if(capicua($i)=='Es capicua'){
            echo " " . $i;
        }

        //Numeros que sumen lo mismo que multiplican del 100 al 999
        $cien = floor($i / 100); 
        $diez = floor(($i / 10) % 10); 
        $unidad = $i % 10; 
    
        $suma = $cien + $diez + $unidad;
        $producto = $cien * $diez * $unidad;
    
        if ($suma == $producto) {
            echo "<br>$i cumple la condición<br>";
        }
       
    }
    echo "<p></p>";
    //funcion recursiva, fibo
    function fibo($x){
       // base
    if ($x == 0) {
        return 0;
    }elseif ($x == 1) {
        return 1;
    }else {
        return fibo($x-1) + fibo($x - 2);
    }
    }
    
    echo fibo(8);
    echo "<p></p>";

    for ($i = 1; $i <= 10; $i++) {
        $numDen = pow(2, $i);
        echo "$i/$numDen<br>";
    }
    
    echo "<p></p>";


    $num = 5;
    $numFactorial = 1;
    for ($i = 1; $i <= $num; $i++) {

        $numFactorial *= $i;
    }
    echo "El factorial de $num es $numFactorial";

    echo "<p></p>";
    //tren
    $distancia = 850; 
    $estancia = 10;
    $precioKM = 2.5;
    $precioTotal = $distancia * $precioKM;
    
    if ($estancia > 7 && $distancia > 800) {
        $precioTotal -= $precioTotal*30/100; 
    }
    
    echo "El precio del billete es: €" . number_format($precioTotal, 2);
    
    echo "<p></p>";

    function esPrimo($primo){
        $esPrimo=true;
        if ($primo < 2) {
            $esPrimo = false;
        } else {
            for ($i = 2; $i <= $primo/2; $i++) {
                if ($primo % $i == 0) {
                    $esPrimo = false;
                    break;
                }
            }
        }   
        return $esPrimo; 
    }

    echo "<p></p>";

    for($i = 0; $i<10; $i++){
        for($j=10-$i;$j>=1;$j--){
            echo $j . " ";
        }
        echo "<br>";
    }

    echo "<p></p>";

    for($i = 3; $i<999; $i++){
        if(true==esPrimo($i)){
            echo $i . " ";
        }


    }


    ?>


</body>
</html>