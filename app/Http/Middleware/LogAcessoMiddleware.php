<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $ip = $request->server->get('SERVER_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "IP $ip solicitou acesso a rota $rota"]);

        $resposta = $next($request);
        $resposta->setStatusCode(201,'texto e status modificados');
        return $resposta;
        

    }
}
