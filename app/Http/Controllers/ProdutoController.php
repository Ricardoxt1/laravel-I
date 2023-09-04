<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // function index
    public function index()
    {
        return view('app.produto',['titulo' => 'Super Gestão - Produto']);
    }
}
