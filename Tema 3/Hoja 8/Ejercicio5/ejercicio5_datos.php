<?php

    function ParImpar($numero) :String {
        if($numero%2===0){
            return "El numero $numero es par";
        }else{
            return "El numero $numero es Impar";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numero = $_POST['num'];
        echo ParImpar($numero);

    }else if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $numero = $_GET['num'];
        $numero = $_POST['num'];
        echo ParImpar($numero);
    }


?>