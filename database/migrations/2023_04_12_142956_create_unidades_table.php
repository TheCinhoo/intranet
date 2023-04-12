<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Relacionamento de 1 para N
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5); //cm, kg, mm
            $table->string('descricao', 30);
            $table->timestamps();
        });

        //adicionar relacionamento com a tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            //colunas
            $table->unsignedBigInteger('unidade_id');
            //constraints
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        //adicionar relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            //colunas
            $table->unsignedBigInteger('unidade_id');
            //constraints
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Remove relacionamento com a tabela Produtos

        Schema::table('produtos', function (Blueprint $table) {
            //Remove forenkey
            $table->dropForeign('produtos_unidade_id_foreign'); //padrão de criação de nome do laravel - tabela_coluna_foreign
            //Remove coluna
            $table->dropColumn('unidade_id');
        });

        //Remove relacionamento com a tabela Produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            //Remove forenkey
            $table->dropForeign('produto_detalhes_unidade_id_foreign'); //padrão de criação de nome do laravel - tabela_coluna_foreign
            //Remove coluna
            $table->dropColumn('unidade_id');
        });
        //Remove a tabela Unidade
        Schema::dropIfExists('unidades');
    }
};
