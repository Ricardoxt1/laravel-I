@extends('site.layouts.basico')
@section('titulo', $titulo)
@section('conteudo')
    @include('site.layouts._partials.navbar')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <form action="{{ route('site.login') }}" method="POST">
                @csrf
                <div style="width: 30%; margin-left: auto; margin-right: auto;">
                    <div class="campo">
                        <input type="text" value="{{ old('usuario') }}" name="usuario" id="usuario" placeholder="Usuário" class="borda-preta">
                        {{ $errors->has('usuario') ? $errors->first('usuario') : ''}}
                    </div>
                    <div class="campo">
                        <input type="password" value="{{ old('senha') }}" name="senha" id="senha" placeholder="Digite sua senha"
                            class="borda-preta">
                        {{ $errors->has('senha') ? $errors->first('senha') : ''}}
                    </div>
                    <button type="submit" value="Entrar" class="borda-preta">Acessar</button>
                </div>
            </form>


        </div>

        @include('site.layouts._partials.footer')
    @endsection
