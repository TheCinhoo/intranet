@if (isset($produto->id))
<form action="{{ route('produto.update' , ['produto' => $produto->id]) }}" method="post">
    @csrf
    @method('PUT')
    @else
    <form action="{{ route('produto.store') }}" method="post">
        @csrf
        @endif
        <input type="text" placeholder="Nome" name="nome" class="borda-preta"
            value="{{ $produto->nome ?? old('nome')}}">
        {{ $errors->has('nome') ? $errors->first('nome') : ''}}

        <input type="text" placeholder="Descrição" name="descricao" class="borda-preta"
            value="{{ $produto->descricao ?? old('descricao')}}">
        {{ $errors->has('descricao') ? $errors->first('descricao') : ''}}

        <input type="text" placeholder="Peso" name="peso" class="borda-preta"
            value="{{ $produto->peso ?? old('peso')}}">
        {{ $errors->has('peso') ? $errors->first('peso') : ''}}

        <select name="unidade_id">
            <option value="">--Selecione a Unidade de Medida--</option>
            @foreach ($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? old('unidade_id')) ==
                $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>
            @endforeach
        </select>
        {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}

        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>