<?php

    function tablaMultiplicar($numero):String{
        echo "TABLA DE MULTIPLICAR DEL $numero";
        $tabla="";

        for($i=0;$i<=10;$i++){
            $resultado=$i*$numero;
            $tabla .= "$i x $numero = $resultado<br>";

        }

        return $tabla;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $numero = $_POST['num'];
        echo tablaMultiplicar($numero);

    }

    echo '<a href="ejercicio6.html">Volver</a>';
?>