@extends('app.layouts.basico')

@section('titulo','Produto')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de Produtos</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('produto.create')}}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">

            <table border="1" width="100%">
                <thead>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Fornecedor</th>
                    <th>Peso</th>
                    <th>Unidade ID</th>
                    <th>Comprimento</th>
                    <th>Altura</th>
                    <th>Largura</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                    <tr>
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->descricao}}</td>
                        <td>{{$produto->fornecedor->nome}}</td>
                        <td>{{$produto->peso}}</td>
                        <td>{{$produto->unidade_id}}</td>
                        <td>{{$produto->itemDetalhe->comprimento ?? '' }}</td>
                        <td>{{$produto->itemDetalhe->altura ?? ''}}</td>
                        <td>{{$produto->itemDetalhe->largura ?? ''}}</td>
                        <td><a href=" {{ route('produto.show', ['produto' => $produto->id]) }}"> Visualizar</a></td>
                        <td>
                            <form id="form_{{$produto->id}}"
                                action="{{ route('produto.destroy', ['produto' => $produto->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">
                                    Excluir
                                </a>
                            </form>
                        </td>
                        <td><a href=" {{ route('produto.edit', ['produto' => $produto->id]) }}"> Editar</a></td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <h5>Pedidos</h5>
                            @foreach ($produto->pedidos as $pedido)
                            <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">
                                Pedido: {{ $pedido->id }},
                            </a>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- Faz a paginação e continua com a busca corretamente atravéz do metodo appends --}}
            {{$produtos->appends($request)->links()}}
            <br>

            Exibindo {{$produtos->count()}} fornecedores de {{$produtos->total()}}.
        </div>
    </div>

</div>
@endsection