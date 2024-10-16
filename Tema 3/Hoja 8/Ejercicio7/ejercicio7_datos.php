<?php

    


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $numeroMenor = $_POST['numeroEnteroMenor'];
    $numeroMayor = $_POST['numeroEnteroMayor'];

    function ListaDeParesNumeros($numeroMenor,$numeroMayor){
        echo 'LISTA DE PARES DE NUMEROS DE '.$numeroMenor.' Y '.$numeroMayor.':';
        echo "<br><br>";
        for($i=0;$i<=$numeroMayor-$numeroMenor;$i++){
            echo '('.$numeroMenor+$i.','.$numeroMayor-$i.')';
        }

    }

}

ListaDeParesNumeros($numeroMenor,$numeroMayor);
echo "<br>";
echo '<a href="ejercicio7.html">Volver</a>';

?>