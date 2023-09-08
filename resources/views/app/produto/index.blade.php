@extends('app.layouts.basico')
@section('titulo', $titulo)
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina" style="padding-bottom: 25px">
            <h1>{{ $titulo_pagina }}</h1>
        </div>

        <div class="menu">
            <ul style="margin-top: 20px; margin-bottom: 20px">
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Peso</th>
                        <th>Unidade ID</th>
                        <th>Comprimento</th>
                        <th>Altura</th>
                        <th>Largura</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>

                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td>{{ $produto->itemDetalhe->comprimento ?? '' }}</td>
                                <td>{{ $produto->itemDetalhe->altura ?? '' }}</td>
                                <td>{{ $produto->itemDetalhe->largura ?? '' }}</td>
                                <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{ $produto->id }}" method="post"
                                        action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type="submit">Excluir</button> --}}
                                        {{-- <a href="">Excluir</a> --}}
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $produto->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $produtos->appends($request)->links('vendor.pagination.bootstrap-4') }}
                <br />
                Exibindo {{ $produtos->count() }}
                produtos de {{ $produtos->total() }}
                (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
            </div>
        </div>
    </div>
@endsection