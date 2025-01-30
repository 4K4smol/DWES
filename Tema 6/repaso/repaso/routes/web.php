<?php

use App\Http\Controllers\AnimalesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/animales',[AnimalesController::class, 'index'])->name('animales.index');
