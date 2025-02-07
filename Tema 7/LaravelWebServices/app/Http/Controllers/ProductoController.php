<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductoResource;
use Illuminate\Http\Request;
use App\Models\Producto;

/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         title="API Productos",
 *         version="1.0",
 *         description="API de productos",
 *         @OA\Contact(
 *             email="email@gmail.com"
 *         )
 *     ),
 *     @OA\Server(
 *         url="http://localhost:8000"
 *     ),
 *     @OA\Components(
 *         @OA\SecurityScheme(
 *             securityScheme="bearerAuth",
 *             type="http",
 *             scheme="bearer",
 *             bearerFormat="JWT",
 *             description="Use un token JWT para autenticarse",
 *             in="header",
 *             name="Authorization"
 *         )
 *     )
 * )
 */
class ProductoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/productos",
     *     summary="Obtener todos los productos",
     *     description="Retorna una lista de todos los productos almacenados en la base de datos",
     *     tags={"Productos"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Producto")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="No se encontraron productos"
     *     )
     * )
     */
    public function index()
    {
        $productos = Producto::all();
        return response()->json($productos);
    }

    /**
     * @OA\Post(
     *     path="/api/productos",
     *     summary="Crear un producto",
     *     description="Crea un nuevo producto en el sistema. Requiere autenticación JWT.",
     *     operationId="store",
     *     tags={"Productos"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Datos del producto",
     *         @OA\JsonContent(
     *             required={"nombre", "precio", "stock"},
     *             @OA\Property(property="nombre", type="string", example="Producto 1"),
     *             @OA\Property(property="descripcion", type="string", example="Descripción del producto"),
     *             @OA\Property(property="precio", type="number", format="float", example=10.5),
     *             @OA\Property(property="stock", type="integer", example=10),
     *             @OA\Property(property="categoria_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Producto creado",
     *         @OA\JsonContent(ref="#/components/schemas/Producto")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Error de validación"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="No autorizado"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $producto = Producto::create($request->all());

        return response()->json([
            'message'  => 'Producto creado exitosamente',
            'producto' => $producto,
        ], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/productos/{id}",
     *     summary="Obtener un producto",
     *     description="Obtiene un producto por su id",
     *     operationId="show",
     *     tags={"Productos"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID del producto",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Producto encontrado",
     *         @OA\JsonContent(ref="#/components/schemas/Producto")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Producto no encontrado"
     *     )
     * )
     */
    public function show(Producto $producto)
    {
        return new ProductoResource($producto->load('categoria'));
    }
}
