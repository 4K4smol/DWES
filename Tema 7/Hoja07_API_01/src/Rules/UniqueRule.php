<?php

declare(strict_types=1);

namespace App\Rules;

use PDO;
use Exception;

class UniqueRule extends AbstractRule
{
    private string $table;
    private string $column;
    private PDO $db;

    public function __construct(string $table, string $column, PDO $db, string $message = 'El valor debe ser único.')
    {
        parent::__construct($message);
        $this->table = $table;
        $this->column = $column;
        $this->db = $db;
    }

    public function validate(mixed $value): bool
    {
        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM {$this->table} WHERE {$this->column} = :value");
            $stmt->bindParam(':value', $value, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            return $count == 0; // Si el conteo es 0, el valor es único.
        } catch (Exception $e) {
            throw new Exception("Error en la consulta: " . $e->getMessage());
        }
    }
}
