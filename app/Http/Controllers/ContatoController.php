<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * controlador para contatos
 */
class ContatoController extends Controller
{
    public function contato()
    {   
        var_dump($_POST);
        return view('site.contato', ['titulo' => 'Super Gestão - Contato']);
    }
}
