<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        $motivo_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ];
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


        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {
        //Validar dados do formulário
        //Utiliza o name do input na view
        $request->validate([
            'nome' => 'required|min:3|max:40', //Requirido minimo 3 letras maximo 40
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ]);


        //Salvar os dados passados no formulário
        SiteContato::create($request->all());
    }
}
