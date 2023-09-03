<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil)
    {
        if($metodo_autenticacao == 'ldap'){
            echo 'Autenticação LDAP'. $perfil;   
        }

        if($metodo_autenticacao == 'padrao'){
            echo 'Autenticação Padrão'. $perfil;   
        }
        //caso usuario ter acesso
        if (true) {
            return $next($request);
        } else {
            return Response('Precisa de autenticação'. $perfil, 401);
        };
    }
}
