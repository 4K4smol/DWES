<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductoResource;
use Illuminate\Http\Request;
use App\Models\Producto;

/**
 * @OA\Info(title="API Productos", version="1.0",description="API de productos",
 * @OA\Server(url="http://localhost:8000"),
 * @OA\Contact(email="email@gmail.com"))
 */
class ProductoController extends Controller
{

    /**
     * Display the specified resource.
     */
    /**
     * @OA\Get(
     * path="/api/productos/{id}",
     * summary="Obtener un producto",
     * description="Obtener un producto por su id",
     * operationId="show",
     * tags={"productos"},
     * @OA\Parameter(
     * name="id",
     * in="path",
     * description="Id del producto",
     * required=true,
     * @OA\Schema(type="integer",example="1")
     * ),
     * @OA\Response(
     * response=200,
     * description="Producto encontrado",
     * @OA\JsonContent(ref="#/components/schemas/Producto")
     * ),
     * @OA\Response(
     * response=404,
     * description="Producto no encontrado"
     * )
     * )
     */
    public function show(Producto $producto)
    {
        return new ProductoResource($producto->load('categoria'));
    }
}
