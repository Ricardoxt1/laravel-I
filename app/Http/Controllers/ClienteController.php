<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param App\Models\Cliente $Cliente
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $Cliente, Request $Request)
    {
        //
        $clientes = $Cliente::paginate(10);
        return view('app.cliente.index', ['titulo' => 'Clientes', 'titulo_pagina' => 'Listagem de Clientes', 'clientes' => $clientes, 'request' => $Request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     * @param App\Models\Cliente $Cliente
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $Cliente, Request $request)
    {
        //       
        $clientes = $Cliente::all();
        return view('app.cliente.create', ['titulo' => 'Novo Cliente', 'titulo_pagina' => 'Cadastro de Clientes', 'clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $regras = [
            'nome' => 'required|min:3|max:40',
        ];

        $feedback = [
            'required' => 'O campo nome é obrigatório.',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',

        ];

        $request->validate(
            $regras,
            $feedback
        );

        $cliente = new Cliente();
        $cliente->nome = $request->get('nome');
        $cliente->save();

        return redirect()->route('cliente.index');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
