@extends('app.layouts.basico')
@section('titulo', $titulo)
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina" style="padding-bottom: 25px">
            <h1>{{ $titulo_pagina }}</h1>
        </div>

        <div class="menu">
            <ul style="margin-top: 20px">
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">

                <form method="post" action="{{ route('produto.store') }}">
                    <input type="hidden" name="id" value="{{ $produto->id ?? '' }}">
                    @csrf
                    <input type="text" value="{{ $produto->nome ?? old('nome') }}" name="nome" placeholder="nome"
                        class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type="text" value="{{ $produto->descricao ?? old('descricao') }}" name="descricao"
                        placeholder="descricao" class="borda-preta">
                    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

                    <input type="number" value="{{ $produto->peso ?? old('peso') }}" name="peso" placeholder="peso"
                        class="borda-preta">
                    {{ $errors->has('peso') ? $errors->first('peso') : '' }}

                    <select name="unidade_id">
                        <option>-- Selecione uma unidade de medida --</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{ $unidade->id }}" {{ old('unidade_id') == $unidade->id ? 'selected' : '' }}>
                                {{ $unidade->descricao }}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>

    </div>
@endsection
