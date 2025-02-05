<?php

declare(strict_types=1);

namespace App\Requests;

use App\Requests\AbstractRequest;
use App\Rules\RequiredRule;
use App\Rules\NumericRule;
use App\Rules\MinRule;
use App\Rules\MaxRule;
use App\Rules\UniqueRule;
use App\services\DBConnection;
use PDO;
use Exception;

class ProductoRequest extends AbstractRequest
{
    private PDO $db;

    public function __construct()
    {
        try {
            $this->db = DBConnection::getConexion(); // Obtener conexión PDO una sola vez
        } catch (Exception $e) {
            die("Error al conectar a la base de datos: " . $e->getMessage());
        }
    }

    protected function rules(): array
    {
        return [
            'nombre' => [
                new RequiredRule('El nombre es obligatorio.'),
                new MinRule(3, 'El nombre debe tener al menos 3 caracteres.'),
                new MaxRule(100, 'El nombre no puede superar los 100 caracteres.')
            ],
            'precio' => [
                new RequiredRule('El precio es obligatorio.'),
                new NumericRule('El precio debe ser un número válido.')
            ],
            'codigo' => [
                new RequiredRule('El código es obligatorio.'),
                new UniqueRule('productos', 'codigo', $this->db), // Se pasa la conexión PDO
            ]
        ];
    }
}
