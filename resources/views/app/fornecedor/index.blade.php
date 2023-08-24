<h3>fornecedor</h3>


@php
   
@endphp

@isset($fornecedores)
    
    @foreach ($fornecedores as $indice => $fornecedor )
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'dado não foi informado' }}
        <br>
        Telefone: {{ $fornecedor['ddd'] ?? 'dado não foi informado' }} {{ $fornecedor['telefone'] ?? 'dado não foi informado' }}
        <hr>
    @endforeach(isset($fornecedores[$i]))
      
@endisset
