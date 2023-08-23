<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * controlar principal, envia informação para a rota principal
 */
class PrincipalController extends Controller
{
    public function principal()
    {
        return view('site.principal');
    }
}
