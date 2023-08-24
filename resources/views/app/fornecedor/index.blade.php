<h3>fornecedor</h3>


@php
    /*
        if(empty($variavel)) {} //retornar true se a variavel estiver vazia
    */

    /*
        - ''
        - 0
        - 0.0
        - '0'
        - null
        - false
        - array ()
        - $var 
    */

@endphp

@isset($fornecedores)
    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    <br>
    @isset($fornecedores[1]['cnpj'])
        CNPJ: {{ $fornecedores[1]['cnpj'] }}
        @empty($fornecedores['1']['cnpj'])
        - Vazio
        @endempty
    @endisset
@endisset
