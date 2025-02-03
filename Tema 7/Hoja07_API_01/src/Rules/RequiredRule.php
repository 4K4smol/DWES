<?php

declare(strict_types=1);

namespace App\Rules;

class RequiredRule extends AbstractRule
{
    public function validate(mixed $value): bool
    {
        return !empty($value);
    }

    /**
     * Valida que el dato es numérico.
     */
    public function NumericRule(mixed $value): bool
    {
        return is_numeric($value);
    }

    /**
     * Valida que la longitud del dato es superior o igual al mínimo permitido.
     */
    public function MinRule(mixed $value, int $min): bool
    {
        return is_string($value) && strlen($value) >= $min;
    }

    /**
     * Valida que la longitud del dato no es superior al máximo permitido.
     */
    public function MaxRule(mixed $value, int $max): bool
    {
        return is_string($value) && strlen($value) <= $max;
    }

    /**
     * Valida que el valor de una columna en una tabla sea único.
     * Se asume que tienes una conexión a la base de datos mediante mysqli.
     */
    public function UniqueRule(mixed $value, string $table, string $column, $mysqli): bool
    {
        $count = 0;
        // Prepara la consulta para evitar inyecciones SQL
        $stmt = $mysqli->prepare("SELECT COUNT(*) FROM $table WHERE $column = ?");
        $stmt->bind_param("s", $value); // "s" indica que el parámetro es una cadena
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        // Si el conteo es mayor que 0, significa que el valor no es único
        return $count === 0;
    }
}
