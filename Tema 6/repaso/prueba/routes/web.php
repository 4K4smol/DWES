<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\AnimalController;

Route::get('/',[InicioController::class, '__invoke'])->name('inicio');
Route::get('/animales',[AnimalController::class, 'index'])->name('animales.index');
Route::get('/animales/create',[AnimalController::class, 'create'])->name('animales.create');
Route::post('/animales',[AnimalController::class, 'store'])->name('animales.store');
Route::get('/amimales/{animal}/editar',[AnimalController::class,'edit'])->name('animales.edit');
Route::put('/animales/{animal}',[AnimalController::class, 'update'])->name('animales.update');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
