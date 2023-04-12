<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    //Corrige o nome da tabela quando o ELOQUENT não conseguir chegar ao nome correto da tabela
    protected $table = 'fornecedores';
    //Autoriza o metodo Create use esses campos
    protected $fillable = ['nome', 'site', 'uf', 'email'];
}
