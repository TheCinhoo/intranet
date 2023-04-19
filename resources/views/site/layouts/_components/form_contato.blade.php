{{$slot}}

<form action="{{ route('site.contato')}}" method="POST">
    @csrf
    <input type="text" value="{{old('nome')}}" name="nome" placeholder="Nome" class="{{$classe}}">
    @if ($errors->has('nome'))
    {{$errors->first('nome')}}
    @endif
    <br>
    <input type="text" value="{{old('telefone')}}" name="telefone" placeholder="Telefone" class="{{$classe}}">
    @if ($errors->has('telefone'))
    {{$errors->first('telefone')}}
    @endif
    <br>
    <input type="text" value="{{old('email')}}" name="email" placeholder="E-mail" class="{{$classe}}">
    @if ($errors->has('email'))
    {{$errors->first('email')}}
    @endif
    <br>
    <select name="motivo_contatos_id" class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato)
        <option value="{{$motivo_contato->id}}" {{ old('motivo_contatos_id')==$motivo_contato->id ? 'selected' : '' }}>
            {{$motivo_contato->motivo_contato}}
        </option>
        @endforeach

    </select>
    {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
    <br>
    <textarea name="mensagem" class="{{$classe}}" placeholder="Preencha aqui a sua mensagem">
        {{old('mensagem')}}
    </textarea>
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>

{{-- Metodo any() confere se existe algum erro dentro da variavel --}}
{{-- @if ($errors->any())
<div style="text-align: center; position: absolute; top: 0px; left:0px; width:100%; background:red">
    @foreach ($errors->all() as $erro)

    {{$erro}} <br>

    @endforeach
</div>
@endif --}}