<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Passar as instruções para criação de registros no banco de dados
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'www.fornecedor100.com';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com';
        $fornecedor->save();

        //Lembrando que para utilizar o metodo Create é necessário passar a váriavel $fillable no model da classe.
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'www.fornecedor200.com.br',
            'uf'   => 'RS',
            'email' => 'contato@fornecedor200.com.br'
        ]);
    }
}
