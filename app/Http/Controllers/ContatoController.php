<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Models\SiteContato;

/**
 * controlador para contatos
 */
class ContatoController extends Controller
{
    public function contato(Request $request)
    {

        $motivo_contato = MotivoContato::all();
        //inserir valores do request para o banco de dados
        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
      

        // print_r($contato->getAttributes());
        // $contato->save();

        return view('site.contato', ['titulo' => 'Super Gestão - Contato', 'motivo_contato' => $motivo_contato]);
    }

    public function salvar(Request $request)
    {
        // realizar validação dos dados da request
        $request->validate([
            'nome' => 'required|min:3|max:40', // lidando com min e máximo de caracteres
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ]);
        // SiteContato::create($request->all());
    }
}
