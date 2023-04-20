<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $meto_autenticacao, $perfil): Response
    {
        echo $meto_autenticacao . ' - ' . $perfil . '<br> ';
        //Verifica se o Usuário possui acesso a rota
        if ($meto_autenticacao == 'padrao') {
            echo "Verificar o usuario e senha no banco de dados " . $perfil . '<br>';
        }

        if ($meto_autenticacao == 'ldap') {
            echo "Verificar o usuario e senha no AD " . $perfil . '<br>';
        }

        if ($perfil == 'visitante') {
            echo 'Exibir apenas alguns recursos';
        } else {
            echo 'Carregar o perfil do banco de dados';
        }

        if (false) {
            return $next($request);
        } else {
            // return $next($request);
            return Response('Acesso Negado, Rota exige autenticação');
        }
    }
}
