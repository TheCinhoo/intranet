<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {

        // dd($request->all());
        //$request->input pega o que é recebido por request de cada input da view.

        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();
        */

        // Mostra tudo que está na variavel $contato
        // print_r($contato->getAttributes());

        // $contato = new SiteContato();

        //Caso usar o Fill() ou o Create() ativar no model a variavel $fillable
        // $contato->create($request->all());

        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {
        //Validar dados do formulário
        //Utiliza o name do input na view
        $request->validate([
            'nome' => 'required|min:3|max:40|unique:site_contatos', //Requirido minimo 3 letras maximo 40 e o valor deve ser unico, comparando com a tabela do banco
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ], [
            'nome.min' => 'O Campo Nome precisa ter no mínimo 3 Caracteres',
            'nome.max' => 'O Campo Nome deve ter no mãximo 40 Caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'mensagem.max' => 'A Mensagem deve ter no máximo 2000 Caracteres',
            'email' => 'O Email informado não é válido',
            'required' => 'O Campo :attribute deve ser preenchido' //:attribute traz o nome do campo do formulario
        ]);


        //Salvar os dados passados no formulário
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
