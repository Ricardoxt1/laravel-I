<h3>fornecedor</h3>

@isset($fornecedores)
    @forelse ($fornecedores as $indice => $fornecedor )
    Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'dado não foi informado' }}
        <br>
        Telefone: {{ $fornecedor['ddd'] ?? 'dado não foi informado' }} {{ $fornecedor['telefone'] ?? 'dado não foi informado' }}

        @if($loop->first)
            <br>
            Primeiro índice do loop
            <br>
            Contagem índice do loop {{ ($loop->count) }}   
        @endif

        @if($loop->last)
            <br>
            Último índice do loop
        @endif
        <hr>
    
        
    
    @empty
        Não existe fornecedores cadastrados!!!
    @endforelse()
@endisset
