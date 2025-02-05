<?php

namespace App\Http\Controllers;

use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *      title="Mi API Laravel",
 *      version="1.0.0",
 *      description="Descripción de la API",
 *      @OA\Contact(
 *          email="soporte@miapi.com"
 *      )
 * )
 */
class SwaggerController extends Controller {}
