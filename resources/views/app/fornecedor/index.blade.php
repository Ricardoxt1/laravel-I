@extends('app.layouts.basico')
@section('titulo', $titulo)
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina" style="padding-bottom: 25px">
            <h1>Pagina de Fornecedor</h1>
        </div>

        <div class="menu">
            <ul style="margin-top: 20px">
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina"> 
                <div style="width: 30%; margin-left: auto; margin-right: auto;"> 
                    <form method="Post" action="{{ route('app.fornecedor.listar') }}">
                        @csrf
                        <input type="text" name="nome" placeholder="Nome" class="borda-preta">
                        <input type="text" name="site" placeholder="Site" class="borda-preta">
                        <input type="text" name="uf" placeholder="UF" class="borda-preta">
                        <input type="text" name="email" placeholder="Email" class="borda-preta">
                        <button type="submit" class="borda-preta">Pesquisar</button>
                    </form>
                </div>
        </div>

    </div>
@endsection
