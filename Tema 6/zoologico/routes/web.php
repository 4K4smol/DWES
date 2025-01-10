<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/animals', [AnimalsController::class, 'index'])->name('animals.index');
Route::get('/animals/view/{id}', [AnimalsController::class, 'view'])->name('animals.view');
Route::get('/animals/add', [AnimalsController::class, 'add'])->name('animals.add');
Route::get('/animals/edit/{id}', [AnimalsController::class, 'edit'])->name('animals.edit');
Route::post('/animals/store/', [AnimalsController::class, 'guardarAnimal'])->name('animals.store');
