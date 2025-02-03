<?php
declare(strict_types=1);

use Pecee\SimpleRouter\SimpleRouter as Router;
use App\Controllers\Api\ApiController;
use App\Controllers\Api\Producto\CreateProductoController;
use App\Controllers\Api\Producto\DeleteProductoController;
use App\Controllers\Api\Producto\GetProductoController;
use App\Controllers\Api\Producto\UpdateProductoController;
use App\Controllers\Api\Producto\ListProductoController;

// Grupo API
Router::group(['prefix' => 'api'], function (): void {
    Router::get('/', [ApiController::class, '__invoke']);

    // Grupo de productos
    Router::group(['prefix' => 'productos'], function (): void {
        Router::get('/', [ListProductoController::class, '__invoke']); // Obtener todos los productos
        Router::post('/', [CreateProductoController::class, '__invoke']); // Crear un producto
        Router::get('/{producto_id}', [GetProductoController::class, '__invoke']); // Obtener un producto por ID
        Router::put('/{producto_id}', [UpdateProductoController::class, '__invoke']); // Actualizar un producto por ID
        Router::delete('/{producto_id}', [DeleteProductoController::class, '__invoke']); // Eliminar un producto por ID
    });
});
