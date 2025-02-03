<?php

declare(strict_types=1);

namespace App\Controllers\Api\Producto;

use App\Entities\Producto;
use App\Responses\JsonResponse;

final class GetProductoController
{
    public function __invoke(int $producto_id): void
    {
        $producto = new Producto();
        $exists = $producto->find($producto_id);

        JsonResponse::response(['exists' => $exists]);
    }
}
