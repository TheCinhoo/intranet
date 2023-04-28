@extends('app.layouts.basico')

@section('titulo','Fornecedor')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Fornecedor - Listar</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
            <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">

            <table border="1" width="100%">
                <thead>
                    <th>Nome</th>
                    <th>Site</th>
                    <th>UF</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($fornecedores as $fornecedor)
                    <tr>
                        <td>{{$fornecedor->nome}}</td>
                        <td>{{$fornecedor->site}}</td>
                        <td>{{$fornecedor->uf}}</td>
                        <td>{{$fornecedor->email}}</td>
                        <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id)}}"> Excluir</a></td>
                        <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id)}}"> Editar</a></td>
                        <td><a href="{{ route('app.fornecedor.teste', $fornecedor->id)}}"> Teste</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- Faz a paginação e continua com a busca corretamente atravéz do metodo appends --}}
            {{$fornecedores->appends($request)->links()}}
            <br>
            {{-- {{$fornecedores->count()}} - Total de Registros por pagina.
            <br>
            {{$fornecedores->total()}} - Total de Registros.
            <br>
            {{$fornecedores->firstItem()}} - Numero do Primeiro Registro da Pagina
            <br>
            {{$fornecedores->lastItem()}} - Numero do Ultimo Registro da Pagina --}}

            Exibindo {{$fornecedores->count()}} fornecedores de {{$fornecedores->total()}}.
        </div>
    </div>

</div>
@endsection