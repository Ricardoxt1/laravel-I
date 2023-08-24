<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
            0 => [
                'nome' => 'fornecedor 1',
                'status' => 'N',
                'cnpj' => '00.000.000/000-00',
                'ddd' => '14', //quintana
                'telefone' => '99840-0340'
            ],
            1 => [
                'nome' => 'fornecedor 2',
                'status' => 'S',
                'cnpj' => '00.000.222/000-00',
                'ddd' => '11', //são paulo
                'telefone' => '99783-0340'

            ],
            2 => [
                'nome' => 'fornecedor 3',
                'status' => 'S',
                'cnpj' => '02.000.000/000-00',
                'ddd' => '32', //ceara
                'telefone' => '99320-0340'
            ],
        ];

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
