@extends('app.layouts.basico')
@section('titulo', $titulo)
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina" style="padding-bottom: 25px">
            <h1>Fornecedor - Listar</h1>
        </div>

        <div class="menu">
            <ul style="margin-top: 20px">
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina"> 
                <div style="width: 30%; margin-left: auto; margin-right: auto;"> 
                    <form method="Post" action="#">
                        ...
                    </form>
                </div>
        </div>

    </div>
@endsection