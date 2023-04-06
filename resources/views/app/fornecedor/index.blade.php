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

@if ( !($fornecedores[0]['status'] == 'S') )
    Fornecedor Inativo
@endif

@unless($fornecedores[0]['status'] == 'S') {{--Executa se o retorno da condição for false--}}
    <br>Fornecedor Inativo
@endunless
<br>

@isset($fornecedores)
    {{-- Se a Variavel existir, então entramos nesse bloco podendo ser usado para verificar informações dentro de um array --}}
@endisset
