@if (isset($produto_detalhe->id))
    <form method="post" action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}">
        @csrf
        @method('PUT')
    @else
        <form method="post" action="{{ route('produto-detalhe.store') }}">
            @csrf
@endif

<input type="hidden" name="id" value="{{ $produto_detalhe->id ?? '' }}">

<select name="produto_id">
    <option>-- Selecione um produto --</option>

    @foreach ($produtos as $produto)
                <option value="{{ $produto->id }}"
                    {{ ($produto->id ?? old('id')) == $produto->id ? 'selected' : '' }}>
                    {{ $produto->nome }}</option>
            @endforeach

</select>

<input type="text" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" name="comprimento"
    placeholder="comprimento" class="borda-preta">
{{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

<input type="number" value="{{ $produto_detalhe->largura ?? old('largura') }}" name="largura" placeholder="largura"
    class="borda-preta">
{{ $errors->has('largura') ? $errors->first('largura') : '' }}

<input type="number" value="{{ $produto_detalhe->altura ?? old('altura') }}" name="altura" placeholder="altura"
    class="borda-preta">
{{ $errors->has('altura') ? $errors->first('altura') : '' }}

{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}


<select name="unidades_id">
    <option>-- Selecione uma unidade de medida --</option>

    @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}"
            {{ ($unidade->unidade_id ?? old('unidades_id')) == $unidade->id ? 'selected' : '' }}>
            {{ $unidade->descricao }}</option>
    @endforeach

</select>
{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

<button type="submit" class="borda-preta">Cadastrar</button>
</form>
