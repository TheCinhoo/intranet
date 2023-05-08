@extends('app.layouts.basico')

@section('titulo','Cliente')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de Clientes</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('cliente.create')}}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">

            <table border="1" width="100%">
                <thead>
                    <th>Nome</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{$cliente->nome}}</td>
                        <td><a href=" {{ route('cliente.show', ['cliente' => $cliente->id]) }}"> Visualizar</a></td>
                        <td>
                            <form id="form_{{$cliente->id}}"
                                action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">
                                    Excluir
                                </a>
                            </form>
                        </td>
                        <td><a href=" {{ route('cliente.edit', ['cliente' => $cliente->id]) }}"> Editar</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- Faz a paginação e continua com a busca corretamente atravéz do metodo appends --}}
            {{$clientes->appends($request)->links()}}
            <br>

            Exibindo {{$clientes->count()}} clientes de {{$clientes->total()}}.
        </div>
    </div>

</div>
@endsection