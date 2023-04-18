<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Database\Factories\SiteContatoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContatoSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $contato = new SiteContato();
        // $contato->nome              = 'Intranet';
        // $contato->telefone          = '(48) 3333-4444';
        // $contato->email             = 'contato@intranet.com.br';
        // $contato->motivo_contato    = 1;
        // $contato->mensagem          = 'Seja Bem-Vindo a Intranet';

        // $contato->save();

        \App\Models\SiteContato::factory()->count(100)->create();
    }
}
