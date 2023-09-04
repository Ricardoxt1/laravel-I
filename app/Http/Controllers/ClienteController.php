<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // function index para clientes
    public function index()
    {
        return view('app.cliente',['titulo' => 'Super Gestão - Cliente']);
    }
}
