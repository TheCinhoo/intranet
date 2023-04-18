{{$slot}}

<form action="{{ route('site.contato')}}" method="POST">
    @csrf
    <input type="text" value="{{old('nome')}}" name="nome" placeholder="Nome" class="{{$classe}}">
    <br>
    <input type="text" value="{{old('telefone')}}" name="telefone" placeholder="Telefone" class="{{$classe}}">
    <br>
    <input type="text" value="{{old('email')}}" name="email" placeholder="E-mail" class="{{$classe}}">
    <br>

    <select name="motivo_contato" class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato)
        <option value="{{$key}}" {{ old('motivo_contato')==$key ? 'selected' : '' }}>{{$motivo_contato}}</option>
        @endforeach

    </select>

    <br>
    <textarea name="mensagem" class="{{$classe}}" placeholder="Preencha aqui a sua mensagem">
        {{old('mensagem')}}
    </textarea>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>

<div style="position: absolute; top: 0px; left:0px; width:100%; background:red">
    <pre>
        {{print_r($errors)}}
    </pre>
</div>
