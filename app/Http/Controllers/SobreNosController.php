<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

/**
 * controlador de informações para rota sobre
 */
class SobreNosController extends Controller
{
    public function __construct()
    {
        $this->middleware('log.acesso');
    }
    public function sobrenos()
    {
        return view('site.sobrenos', ['titulo' => 'Super Gestão - Sobre Nós']);
    }
}
