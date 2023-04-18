<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use HasFactory;
    use SoftDeletes;
    //Corrige o nome da tabela quando o ELOQUENT não conseguir chegar ao nome correto sozinho
    protected $table = 'fornecedores';
    //Autoriza o metodo Create use esses campos no método FILL()
    protected $fillable = ['nome', 'site', 'uf', 'email'];
    //soft delete - Importar o soft delete

}
