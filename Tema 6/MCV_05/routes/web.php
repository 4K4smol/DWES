<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\InicioController;

Route::get('/', [InicioController::class, '__invoke'])->name('inicio');
Route::get('/animals', [AnimalsController::class, 'index'])->name('animals.index');
Route::get('/animals/view/{animal}', [AnimalsController::class, 'view'])->name('animals.view');
Route::get('/animals/add', [AnimalsController::class, 'add'])->name('animals.add');
Route::get('/animals/edit/{animal}', [AnimalsController::class, 'edit'])->name('animals.edit');
Route::post('/animals/store', [AnimalsController::class, 'store'])->name('animals.store');
Route::put('/animals/update/{animal}', [AnimalsController::class, 'update'])->name('animals.update');
Route::get('/animals/delete/{animal}', [AnimalsController::class, 'delete'])->name('animals.delete');

