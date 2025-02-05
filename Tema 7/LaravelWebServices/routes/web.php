<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});

Route::apiResource('productos', ProductoController::class);
Route::get('/productos/{producto}',[ProductoController::class, 'show']);
Route::get('/example', [ProductoController::class, 'example']);
