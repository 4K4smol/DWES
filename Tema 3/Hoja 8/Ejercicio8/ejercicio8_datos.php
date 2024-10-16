<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $primerNumero = $_POST['primerNumero'];
    $segundoNumero = $_POST['segundoNumero'];
    $operacion = $_POST['operacion'];

    function Operacion($primerNumero,$segundoNumero,$operacion){
        $resultado=0;
        switch ($operacion) {
            case 'Suma':
                $resultado=$primerNumero+$segundoNumero;
                break;
            case 'Resta':
                $resultado=$primerNumero-$segundoNumero;
                break;
            case 'Producto':
                $resultado=$primerNumero*$segundoNumero;
                break;
            case 'Cociente':
                $resultado=$primerNumero/$segundoNumero;
                break;
            
            default:
                echo "AAAAAA";
                break;
        }



        echo 'El resultante de realizar el '.$operacion.' de los numeros '.$primerNumero.' y '.$segundoNumero.
        ' es '.$resultado;
    }

    Operacion($primerNumero,$segundoNumero,$operacion);

}


?>