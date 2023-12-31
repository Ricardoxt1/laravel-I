<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Unidade;
use App\Models\Produto;
use App\Models\Item;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Item $Produto, Request $request)
    {
        $msg = '';

        $produtos = $Produto::with(['itemDetalhe'])->paginate(10);

        return view('app.produto.index', [
            'titulo' => 'Super Gestão - Lista Produtos',
            'titulo_pagina' => 'Listagem de Produtos',
            'produtos' => $produtos,
            'msg' => $msg,
            'request' => $request->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Unidade $Unidades, Fornecedor $Fornecedor)
    {
        $unidades = $Unidades::all();
        $fornecedores = $Fornecedor::all();

        return view('app.produto.create', [
            'titulo' => 'Super Gestão - Cadastro de Produtos',
            'titulo_pagina' => 'Cadastro de Produtos',
            'unidades' => $unidades,
            'fornecedores' => $fornecedores
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param App\Models\Item $Produto
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Item $Produto)
    {

        $regra = [
            'nome' => 'required|min:3|max:30',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no maximo 30 caracteres',
            'descricao.min' => 'O campo descricao deve ter no minimo 3 caracteres',
            'descricao.max' => 'O campo descricao deve ter no maximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve ser um numero inteiro',
            'unidade_id.exists' => 'A unidade informada não existe'
        ];

        $request->validate($regra, $feedback);
        $Produto::create($request->all());

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $Produto)
    {
        //
        return view('app.produto.show', ['produto' => $Produto, 'titulo' => 'Super Gestão - Detalhes do Produto', 'titulo_pagina' => 'Detalhes do Produto']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $Produto, Unidade $Unidade, Fornecedor $Fornecedor)
    {
        $unidades = $Unidade::all();
        $fornecedores = $Fornecedor::all();

        return view('app.produto.edit', [
            'titulo' => 'Super Gestão - Editar Produto', 'titulo_pagina' => 'Editar Produto',
            'produto' => $Produto,
            'unidades' => $unidades,
            'fornecedores' => $fornecedores
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $Produto)
    {
        //
        $regra = [
            'nome' => 'required|min:3|max:30',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no maximo 30 caracteres',
            'descricao.min' => 'O campo descricao deve ter no minimo 3 caracteres',
            'descricao.max' => 'O campo descricao deve ter no maximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve ser um numero inteiro',
            'unidade_id.exists' => 'A unidade informada não existe',
            'fornecedor_id.exists' => 'O fornecedor informado não existe'
        ];

        $request->validate($regra, $feedback);


        $Produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $Produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $Produto)
    {
        //
        $Produto->delete();
        return redirect()->route('produto.index');
    }
}
