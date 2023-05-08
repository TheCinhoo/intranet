<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'produtos'; //Sabe que a Classe item tem que usar a tabela proddutos do banco
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function itemDetalhe()
    {
        // Relacionamento um para vários
        return $this->hasOne('App\Models\ItemDetalhe', 'produto_id', 'id');
    }

    public function fornecedor()
    {
        return $this->belongsTo('App\Models\Fornecedor');
    }

    public function pedidos()
    {
        return $this->belongsToMany('App\Models\Pedido', 'pedidos_produtos', 'produto_id', 'pedido_id');
    }
}
