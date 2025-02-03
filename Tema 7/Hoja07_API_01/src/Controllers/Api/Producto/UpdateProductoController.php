<?php

declare(strict_types=1);

namespace App\Controllers\Api\Producto;

use App\Entities\Producto;
use App\Responses\JsonResponse;

final class UpdateProductoController
{
    public function __invoke(int $id): void
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (!isset($data['nombre'], $data['descripcion'], $data['precio'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Faltan datos requeridos']);
            return;
        }

        $producto = new Producto();
        $updated = $producto->update($id, $data);

        JsonResponse::response(['success' => $updated]);
    }
}
