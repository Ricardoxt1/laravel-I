 @if (isset($produto->id))
     <form method="post" action="{{ route('produto.update', ['produto' => $produto->id]) }}">
         @csrf
         @method('PUT')
     @else
         <form method="post" action="{{ route('produto.store') }}">
            @csrf
 @endif

        <input type="hidden" name="id" value="{{ $produto->id ?? '' }}">
        <input type="text" value="{{ $produto->nome ?? old('nome') }}" name="nome" placeholder="nome" class="borda-preta">
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}

        <input type="text" value="{{ $produto->descricao ?? old('descricao') }}" name="descricao" placeholder="descricao"
            class="borda-preta">
        {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

        <input type="number" value="{{ $produto->peso ?? old('peso') }}" name="peso" placeholder="peso"
            class="borda-preta">
        {{ $errors->has('peso') ? $errors->first('peso') : '' }}

        <select name="unidade_id">
            <option>-- Selecione uma unidade de medida --</option>

            @foreach ($unidades as $unidade)
                <option value="{{ $unidade->id }}"
                    {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
                    {{ $unidade->descricao }}</option>
            @endforeach

        </select>
        {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

        <button type="submit" class="borda-preta">Cadastrar</button>
        </form>
