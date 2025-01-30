<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalesController extends Controller
{
    public function index()
    {
        $animales = Animal::all();

        return view('index', compact('animales'));
    }
}
