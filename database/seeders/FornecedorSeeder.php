<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //criar um fornecedor
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor Teste';
        $fornecedor->site = 'www.fornecedor.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'fornecedor@teste';
        $fornecedor->save();

        //metodo create()
        Fornecedor::create([
            'nome' => 'Fornecedor Teste 2',
            'site' => 'www.fornecedor2.com.br',
            'uf' => 'SP',
            'email' => 'fornecedor@teste2',
        ]);

        //metodo utilizando db()
        // DB::table('fornecedores')->insert([
        //     'nome' => 'Fornecedor Teste 3',
        //     'site' => 'www.fornecedor3.com.br',
        //     'uf' => 'SP',
        //     'email' => 'fornecedor@teste3',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
    }
}
