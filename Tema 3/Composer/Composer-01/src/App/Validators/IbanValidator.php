<?php

namespace App\Validators;

use Brick\Math\BigInteger;

class IbanValidator
{
    // Validar el IBAN
    public function validarIban(string $iban): bool
    {
        // Eliminar espacios en blanco del IBAN
        $iban = str_replace(' ', '', $iban);

        // Validar longitud del IBAN (España tiene 24 caracteres)
        if (strlen($iban) !== 24) {
            return false;
        }

        // Comprobar que el IBAN comienza con 'ES'
        if (substr($iban, 0, 2) !== 'ES') {
            return false;
        }

        // Obtener el código CCC (los 20 dígitos del IBAN después de los 4 primeros caracteres 'ESXX')
        $ccc = substr($iban, 4);

        // Validar el CCC (los 20 dígitos restantes)
        if (!$this->validarCcc($ccc)) {
            return false;
        }

        // Reemplazar las letras por números (E = 14, S = 28)
        $ibanReordenado = substr($iban, 4) . '1428' . substr($iban, 2, 2);

        // Convertir a BigInteger usando la librería brick/math
        $ibanNumerico = BigInteger::of($ibanReordenado);

        // Validar el código IBAN (módulo 97)
        return $ibanNumerico->mod(97)->isEqualTo(1);
    }

    // Validar el CCC (Código de Cuenta Cliente)
    private function validarCcc(string $ccc): bool
    {
        // Comprobar que tiene exactamente 20 dígitos
        if (strlen($ccc) !== 20 || !ctype_digit($ccc)) {
            return false;
        }

        // Extraer los componentes del CCC
        $entidad = substr($ccc, 0, 4);
        $oficina = substr($ccc, 4, 4);
        $control = substr($ccc, 8, 2);
        $cuenta = substr($ccc, 10, 10);

        // Validar el primer dígito de control
        if ($this->calcularDigitoControlEntidadOficina($entidad, $oficina) !== (int)$control[0]) {
            return false;
        }

        // Validar el segundo dígito de control
        if ($this->calcularDigitoControlCuenta($cuenta) !== (int)$control[1]) {
            return false;
        }

        return true;
    }

    // Calcular el primer dígito de control (Entidad + Oficina)
    private function calcularDigitoControlEntidadOficina(string $entidad, string $oficina): int
    {
        // Añadir dos ceros por delante
        $cadena = '00' . $entidad . $oficina;

        // Pesos: 1, 2, 4, 8, 5, 10, 9, 7, 3, 6
        $pesos = [1, 2, 4, 8, 5, 10, 9, 7, 3, 6];
        $suma = 0;

        // Multiplicar cada dígito por su peso correspondiente
        for ($i = 0; $i < 10; $i++) {
            $suma += $cadena[$i] * $pesos[$i];
        }

        // Calcular el dígito de control
        $resto = $suma % 11;
        $digitoControl = 11 - $resto;

        if ($digitoControl === 11) {
            return 0;
        } elseif ($digitoControl === 10) {
            return 1;
        }

        return $digitoControl;
    }

    // Calcular el segundo dígito de control (Número de cuenta)
    private function calcularDigitoControlCuenta(string $cuenta): int
    {
        // Pesos: 1, 2, 4, 8, 5, 10, 9, 7, 3, 6
        $pesos = [1, 2, 4, 8, 5, 10, 9, 7, 3, 6];
        $suma = 0;

        // Multiplicar cada dígito por su peso correspondiente
        for ($i = 0; $i < 10; $i++) {
            $suma += $cuenta[$i] * $pesos[$i];
        }

        // Calcular el dígito de control
        $resto = $suma % 11;
        $digitoControl = 11 - $resto;

        if ($digitoControl === 11) {
            return 0;
        } elseif ($digitoControl === 10) {
            return 1;
        }

        return $digitoControl;
    }
}
