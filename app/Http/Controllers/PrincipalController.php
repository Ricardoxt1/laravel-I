<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;
/**
 * controlar principal, envia informação para a rota principal
 */
class PrincipalController extends Controller
{
    /**
     * principal function
     *
     * @return view
     */
    public function principal()
    {   
        $motivo_contato = MotivoContato::all();

        return view('site.principal', ['titulo' => 'Super Gestão - Principal', 'motivo_contato' => $motivo_contato]);
    }
}
