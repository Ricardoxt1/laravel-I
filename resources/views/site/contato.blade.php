@extends('site.layouts.basico')
@section('titulo', $titulo)
@section('conteudo')
    @include('site.layouts._partials.navbar')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                @component('site.layouts._components.form_contato', ['classe' => 'borda-preta'])
                    <p>A nossa equipe logo retornará com um posicionamento</p>
                    <p>Tempo médio de resposta é entorno de 48 horas.</p>
                @endcomponent
            </div>
        </div>
    </div>
    @include('site.layouts._partials.footer')
@endsection
