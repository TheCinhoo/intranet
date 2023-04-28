@extends('app.layouts.basico')

@section('titulo','Produto')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Vizualizar Produto</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('produto.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">

        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            <table border="1px" style="text-align: left;">
                <tr>
                    <td>ID</td>
                    <td>{{ $produto->id}}</td>
                </tr>
                <tr>
                    <td>Nome</td>
                    <td>{{ $produto->nome}}</td>
                </tr>
                <tr>
                    <td>Descrição</td>
                    <td>{{ $produto->descricao}}</td>
                </tr>
                <tr>
                    <td>Peso</td>
                    <td>{{ $produto->peso}}kg</td>
                </tr>
                <tr>
                    <td>Unidade de Medida</td>
                    <td>{{ $produto->unidade_id}}</td>
                </tr>
            </table>
        </div>
    </div>

</div>
@endsection