<?php

declare(strict_types=1);

namespace App\Controllers\Api\Producto;

use App\Entities\Producto;
use App\Requests\ProductoRequest;
use App\Responses\JsonResponse;

final class UpdateProductoController
{
    public function __invoke(int $id): void
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $productoRequest = new ProductoRequest();

        if (!$productoRequest->validate($data)) {
            JsonResponse::response([
                'errors' => $productoRequest->error() // Aquí se devuelven los errores correctamente
            ], 422);
            return;
        }

        $producto = new Producto();
        $updated = $producto->update($id, $data);

        JsonResponse::response(['success' => $updated]);
    }
}
