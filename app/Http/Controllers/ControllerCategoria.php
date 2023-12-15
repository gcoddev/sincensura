<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

class ControllerCategoria extends Controller
{
    public function index()
    {
        $categorias = Categoria::where('estado', '=', 1)->get();

        return view('cms.categoria.index', compact('categorias'));
    }
}
