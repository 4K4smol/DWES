<?php

namespace App\Clases;

use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;

class GeneradorPassword
{
    public static function generarPassword($longitud, $incluirMayusculas, $incluirMinusculas, $incluirNumeros, $incluirSimbolos)
    {
        $generator = new ComputerPasswordGenerator();

        // Configurar las opciones de la contraseña
        if ($incluirMayusculas) {
            $generator->setUppercase(true);
        }else{
            $generator->setUppercase(false);
        }

        if ($incluirMinusculas) {
            $generator->setLowercase(true);
        }else{
            $generator->setLowercase(false);
        }

        if ($incluirNumeros) {
            $generator->setNumbers(true);
        }else{            
            $generator->setNumbers(false);
        }
        
        if ($incluirSimbolos) {
            $generator->setSymbols(true);
        }else{
            $generator->setSymbols(false);
        }

        $generator->setLength($longitud);

        return $generator->generatePassword();
    }
}
