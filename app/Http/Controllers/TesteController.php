<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1, int $p2)
    {

        //Passando variaveis para a View através de array
        //return view('site.teste', ['p1' => $p1, 'p2' => $p2]);

        //Passando as variaveis com with(nome usado na view, valorda Variavel) Metodo do Laravel
        // return view('site.teste')->with('p1', $p1)->with('p2', $p2);

        //Passando o nome das variaveis como string via compact() Metodo do PHP
        return view('site.teste', compact('p1', 'p2'));
    }
}
