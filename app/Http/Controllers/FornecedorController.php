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

    public function listar(Request $request, Fornecedor $Fornecedor)
    {
        $fornecedores = $Fornecedor::with(['produtos'])->where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->paginate(3);


        return view(
            'app.fornecedor.listar',
            [
                'titulo' => 'Super Gestão - Listagem de Fornecedores',
                'fornecedores' => $fornecedores,
                'request' => $request->all()
            ]
        );
    }

    public function adicionar(Request $request, Fornecedor $Fornecedor)
    {
        $msg = '';

        // adição
        if ($request->input('_token') != '' && $request->input('id') == '') {
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

        // edição
        if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = $Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if ($update) {
                $msg = 'Update realizado com sucesso!';
            } else {
                $msg = 'Houve um problema na atualização dos dados!';
            }

            return redirect()->route(
                'app.fornecedor.editar',
                [
                    'id' => $request->input('id'),
                    'msg' => $msg,
                    'titulo' => 'Super Gestão - Adicionar Fornecedor',
                    'titulo_pagina' => 'Editar Fornecedor'
                ]
            );
        }
        return view('app.fornecedor.adicionar', [
            'msg' => $msg,
            'titulo' => 'Super Gestão - Adicionar Fornecedor',
            'titulo_pagina' => 'Adicionar Fornecedor',
        ]);
    }

    //método para editagem de fornecedores
    public function editar(Fornecedor $Fornecedor, $id, $msg = '')
    {
        $fornecedor = $Fornecedor::find($id);

        return view('app.fornecedor.adicionar', [
            'titulo' => 'Super Gestão - Editar Fornecedor',
            'titulo_pagina' => 'Editar Fornecedor',
            'fornecedor' => $fornecedor,
            'msg' => $msg
        ]);
    }

    public function excluir($id, Fornecedor $Fornecedor){
        $Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');
    }
}
