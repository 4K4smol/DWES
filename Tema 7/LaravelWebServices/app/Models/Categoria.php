<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OpenApi\Annotations as OA;
use App\Models\Producto;

/**
 * @OA\Schema(
 *     schema="Categoria",
 *     type="object",
 *     title="Categoria",
 *     description="Modelo de una categoría",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID único de la categoría",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="nombre",
 *         type="string",
 *         description="Nombre de la categoría",
 *         example="Categoria 1"
 *     ),
 *     @OA\Property(
 *         property="productos",
 *         type="array",
 *         description="Lista de productos asociados a la categoría",
 *         @OA\Items(ref="#/components/schemas/Producto")
 *     )
 * )
 */
class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = ['nombre'];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
