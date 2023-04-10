<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'N',
                'cnpj' => '0',
                'ddd' => '11', //São Paulo
                'telefone' => '0000-0000'
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
                'cnpj' => '12.345.678/0002-00',
                'ddd' => '85', //Fortaleza
                'telefone' => '0000-0000'
            ],
            2 => [
                'nome' => 'Fornecedor 3',
                'status' => 'S',
                'cnpj' => '12.345.678/0001-00',
                'ddd' => '32', //Juiz de Fora
                'telefone' => '0000-0000'
            ]
        ];

        // Ternario
        // condicao ? se verddadeiro : se falso;

        // $msg = isset($fornecedores[0]['cnpj']) ? 'CNPJ Informado' : 'CNPJ não informado';
        // echo $msg;

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
