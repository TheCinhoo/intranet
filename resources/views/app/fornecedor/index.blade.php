<h1>Fornecedor</h1>

{{--Fica o Comentário que será descartado pelo interpretador do blade--}}
<!-- Teste -->

@php

//Para comentários de uma linha

/*
Para comentários de multiplas linhas
*/



@endphp

{{-- @dd($fornecedores) --}}
{{--
@if (count($fornecedores) > 0 && count($fornecedores) < 10 )
  <h3>Existe alguns fornecedores cadastrados.</h3>
  @elseif(count($fornecedores) > 10)
  <h3>Existem Vários Fornecedores cadastrados</h3>
  @else
  <h3>Ainda não existem fornecedores cadastrados</h3>
@endif --}}

Fornecedor: {{$fornecedores[0]['nome']}} <br>
Status: {{$fornecedores[0]['status']}} <br>
<hr>
@if ( !($fornecedores[0]['status'] == 'S') )
    Fornecedor Inativo com If
@endif
<hr>
@unless($fornecedores[0]['status'] == 'S') {{--Executa se o retorno da condição for false--}}
    <br>Fornecedor Inativo Com unless
@endunless
<br>

<hr>
@isset($fornecedores)
    @forelse($fornecedores as $i => $fornecedor)

        {{$loop->iteration}}
        <br>

        Fornecedor: {{$fornecedor['nome']}}
        <br>
        Status: {{$fornecedor['status']}}
        <br>
        CNPJ: {{$fornecedor['cnpj'] ?? 'dado não preenchido'}}
        <br>
        Telefone: ({{$fornecedor['ddd'] ?? ''}}) {{$fornecedor['telefone'] ?? ''}}
        @switch($fornecedor['ddd'])
            @case('11')
                São Paulo - SP
                @break
            @case('85')
                Fortaleza - CE
                @break
            @case('32')
                Juiz de Fora - MG
                @break
            @default
                Estado não identificado.
        @endswitch
        <hr>

        @empty
            Não existem fornecedores cadastrados.
    @endforelse
@endisset


