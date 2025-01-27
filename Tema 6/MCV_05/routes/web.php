<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\RevisionesController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\CuidadoresController;
use App\Http\Controllers\TitulacionesController;

Route::get('/', [InicioController::class, '__invoke'])->name('inicio');
Route::get('/animals', [AnimalsController::class, 'index'])->name('animals.index');
Route::get('/animals/view/{animal}', [AnimalsController::class, 'view'])->name('animals.view');
Route::get('/animals/add', [AnimalsController::class, 'add'])->name('animals.add')->middleware('auth');
Route::get('/animals/edit/{animal}', [AnimalsController::class, 'edit'])->name('animals.edit')->middleware('auth');
Route::post('/animals/store', [AnimalsController::class, 'store'])->name('animals.store');
Route::put('/animals/update/{animal}', [AnimalsController::class, 'update'])->name('animals.update');
Route::get('/animals/delete/{animal}', [AnimalsController::class, 'delete'])->name('animals.delete');
Route::get('revisiones/{animal}/add', [RevisionesController::class, 'add'])->name('revisiones.add');
Route::post('/revisiones/store', [RevisionesController::class, 'store'])->name('revisiones.store');
Route::get('cuidadores/{cuidador}', [CuidadoresController::class, 'show'])->name('cuidadores.show');
Route::get('titulaciones/{titulacion}', [TitulacionesController::class, 'show'])->name('titulaciones.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
