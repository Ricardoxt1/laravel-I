<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(){
        return view('site.login', ['titulo' => 'Login']);
    }

    public function autenticar(Request $request){
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

        print_r($request->all());
    }
}
