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
        Schema::create('produto_detalhes', function (Blueprint $table) {
            //Colunas Relacionamento 1 para 1
            $table->id();
            $table->unsignedBigInteger('produto_id'); //singular do nome da tabela referencia adicionando _id apos o nome.
            $table->float('comprimento', 8, 2);
            $table->float('altura', 8, 2);
            $table->float('largura', 8, 2);
            $table->timestamps();

            //constraint de relacionamento.
            $table->foreign('produto_id')->references('id')->on('produtos'); //produto_id faz referencias a ID da tabela PRODUTOS
            $table->unique('produto_id'); //Faz com que a coluna produto_id seja unica
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_detalhes');
    }
};
