<?php
namespace App\Interfaces;

    interface InterfazGeneradorPassword{

        public function generar($longitud, $incluirMayusculas, $incluirMinusculas, $incluirNumeros, $incluirSimbolos);

    }


?>