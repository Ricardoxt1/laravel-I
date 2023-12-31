@extends('app.layouts.basico')
@section('titulo', $titulo)
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina" style="padding-bottom: 25px">
            <h1>{{ $titulo_pagina }}</h1>
        </div>

        <div class="menu">
            <ul style="margin-top: 20px">
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                {{ $msg ?? '' }}
                <form method="Post" action="{{ route('app.fornecedor.adicionar') }}">
                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? ''}}">
                    @csrf
                    <input type="text" value="{{ $fornecedor->nome ?? old('nome') }}" name="nome" placeholder="Nome"
                        class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type="text" value="{{ $fornecedor->site ?? old('site') }}" name="site" placeholder="Site"
                        class="borda-preta">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}

                    <input type="text" value="{{ $fornecedor->uf ?? old('uf') }}" name="uf" placeholder="UF"
                        class="borda-preta">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}

                    <input type="text" value="{{ $fornecedor->email ?? old('email') }}" name="email"
                        placeholder="Email" class="borda-preta">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>

    </div>
@endsection
