 @if (isset($cliente->id))
     <form method="post" action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">
         @csrf
         @method('PUT')
     @else
         <form method="post" action="{{ route('cliente.store') }}">
             @csrf
 @endif
 <input type="hidden" name="id" value="{{ $cliente->id ?? '' }}">

 


 <input type="text" value="{{ $cliente->nome ?? old('nome') }}" name="nome" placeholder="nome" class="borda-preta">
 {{ $errors->has('nome') ? $errors->first('nome') : '' }}


 @if (isset($cliente->id))
     <button type="submit" class="borda-preta">Editar</button>
 @else
     <button type="submit" class="borda-preta">Cadastrar</button>
     @csrf
 @endif

 </form>
