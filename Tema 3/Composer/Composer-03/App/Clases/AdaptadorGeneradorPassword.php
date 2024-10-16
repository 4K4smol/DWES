<?php

namespace App\Clases;

use App\Interfaces\InterfazGeneradorPassword;

class AdaptadorGeneradorPassword implements InterfazGeneradorPassword
{
    public function generar($longitud, $incluirMayusculas, $incluirMinusculas, $incluirNumeros, $incluirSimbolos)
    {
        return GeneradorPassword::generarPassword($longitud, $incluirMayusculas, $incluirMinusculas, $incluirNumeros, $incluirSimbolos);
    }
}
