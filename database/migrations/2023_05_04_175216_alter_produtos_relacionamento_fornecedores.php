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
        //Criar coluna em produtos que vai receber a FK de fornecedores
        Schema::table('produtos', function (Blueprint $table) {
            //insere um registro de fornecedor para estabelecer o relacionamento
            $fornecedorId = DB::table('fornecedores')->insertGetId([
                'nome' => 'Fornecedor Padrão',
                'site' => 'www.padrao.com.br',
                'uf' => 'SC',
                'email' => 'contato@padrao.com.br'
            ]);

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedorId)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
    }
};
