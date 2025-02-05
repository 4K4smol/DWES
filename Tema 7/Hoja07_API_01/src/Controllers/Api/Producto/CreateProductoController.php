<?php

declare(strict_types=1);

namespace App\Controllers\Api\Producto;

use App\Entities\Producto;
use App\Requests\ProductoRequest;
use App\Responses\JsonResponse;

final class CreateProductoController
{
    public function __invoke(): void
    {
        // Obtener datos del request
        $data = json_decode(file_get_contents("php://input"), true);

        // Instanciar validaciones
        $productoRequest = new ProductoRequest();

        // Validar los datos antes de la creación
        if (!$productoRequest->validate($data)) {
            JsonResponse::response([
                'errors' => $productoRequest->error() // Aquí se devuelven los errores correctamente
            ], 422);
            return;
        }

        // Si los datos son válidos, crear el producto
        $producto = new Producto();
        $productoId = $producto->create($data);

        JsonResponse::response(['success' => $productoId], 201);
    }
}
