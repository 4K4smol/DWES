<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Producto",
 *     description="Modelo de un producto",
 *     @OA\Xml(name="Producto")
 * )
 */
class Producto extends Model
{

    use HasFactory;

    protected $table = 'productos';
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'categoria_id',
    ];
    /**
     * @OA\Property(
     *     property="id",
     *     type="integer",
     *     format="int64",
     *     description="ID del producto",
     *     example=1
     * )
     *
     * @OA\Property(
     *     property="nombre",
     *     type="string",
     *     description="Nombre del producto",
     *     example="Laptop"
     * )
     *
     * @OA\Property(
     *     property="precio",
     *     type="number",
     *     format="float",
     *     description="Precio del producto",
     *     example=899.99
     * )
     *
     * @OA\Property(
     *     property="stock",
     *     type="integer",
     *     description="Cantidad en stock",
     *     example=50
     * )
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

}
