<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function index(Request $request)
    {
        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'Usuário ou senha incorreta';
        };

        if ($request->get('erro') == 2) {
            $erro = 'Necessário realizar login para ter acesso a página!';
        };

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required',
        ];

        //feedback possíveis erros no formulario
        $feedback = [
            'usuario.email' => 'O email informado não é valido',
            'senha.required' => 'A senha é obrigatória',
        ];

        $request->validate($regras, $feedback);

        //recuperando request do formulario
        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();

        //validação se realmente existe usuario e senha no banco
        $usuario = $user->where('email', $email)
            ->where('password', $password)
            ->get()
            ->first();

        if (isset($usuario->name)) {

            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        };
    }

    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
