<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use App\Models\ItemDetalhe;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Unidade $Unidade, Produto $Produto)
    {
        //
        $produtos = $Produto::all();
        $unidades = $Unidade->all();
        return view('app.produto_detalhe.create', ['titulo' => 'Detalhes do produto', 'titulo_pagina' => 'Detalhes do produto', 'unidades' => $unidades, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ProdutoDetalhe $ProdutoDetalhe)
    {
        //
        $ProdutoDetalhe::create($request->all());
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  App\Model\Unidade $Unidades
     * @param App\Model\Produto $Produto
     * @param App\Model\ItemDetalhe $ItemDetalhe
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Unidade $Unidade, Produto $Produto, ItemDetalhe $ItemDetalhe)
    {
        //
        $produtoDetalhe = $ItemDetalhe::find($id);
        $unidades = $Unidade::all();
        $produtos = $Produto::all();
        return view('app.produto_detalhe.edit', ['titulo' => 'Detalhes do produto', 'titulo_pagina' => 'Editagem do produto', 'unidades' => $unidades, 'produtos' => $produtos, 'produto_detalhe' => $produtoDetalhe]);

    }

    /**
     * Update the specified resource in storage.
     * @param App\Model\ProdutoDetalhe $produtoDetalhe
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        //
        $produtoDetalhe->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
