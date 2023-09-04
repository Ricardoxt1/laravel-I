@extends('app.layouts.basico')
@section('titulo', $titulo)
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Pagina de Fornecedor</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                {{-- @component('site.layouts._components.form_contato', ['classe' => 'borda-preta', 'motivo_contato' => $motivo_contato])
                    <p>A nossa equipe logo retornará com um posicionamento</p>
                    <p>Tempo médio de resposta é entorno de 48 horas.</p>
                @endcomponent --}}
            </div>
        </div>
    </div>
@endsection
