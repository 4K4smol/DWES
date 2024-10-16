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
        }
        if ($incluirMinusculas) {
            $generator->setLowercase(true);
        }
        if ($incluirNumeros) {
            $generator->setNumbers(true);
        }
        if ($incluirSimbolos) {
            $generator->setSymbols(true);
        }

        $generator->setLength($longitud);

        return $generator->generatePassword();
    }
}
