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
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos', // lidando com min e máximo de caracteres
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'nome.required' => 'O nome é obrigatório',
            'nome.min' => 'O nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O nome deve ter no máximo 40 caracteres',
            'nome.unique' => 'Este nome já existe',
            'telefone.required' => 'O telefone é obrigatório',
            'email.email' => 'O email informado é inválido',
            'motivo_contatos_id.required' => 'O motivo do contato é obrigatório',
            'mensagem.required' => 'A mensagem é obrigatória',
            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres'
        ];

        // realizar validação dos dados da request
        $request->validate($regras, $feedback);
        
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
