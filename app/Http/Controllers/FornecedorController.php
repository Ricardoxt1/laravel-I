<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index', ['titulo' => 'Super Gestão - Fornecedor']);
    }

    public function listar()
    {
        return view('app.fornecedor.listar', ['titulo' => 'Super Gestão - Listagem de Fornecedores']);
    }

    public function adicionar(Request $request)
    {
        $msg= '';

        if ($request->input('_token') != '') {
            //validação
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];
            
            $feedback = [
                'required' => 'O campo :attribute é obrigatório',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo uf deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo uf deve ter no máximo 2 caracteres',
                'email.email' => 'O campo email deve ser um email válido'
            ];
            
            $request->validate($regras, $feedback);
            
            // adicionar fornecedor
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());        
            
            $msg = 'Fornecedor cadastrado com sucesso';
        }


        return view('app.fornecedor.adicionar', ['titulo' => 'Super Gestão - Adicionar Fornecedor', 'msg' => $msg]);
    }
}
