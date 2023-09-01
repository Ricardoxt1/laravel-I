<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ////metodo create()
        SiteContato::create([
            'nome' => 'Fornecedor Teste 2',
            'site' => 'www.fornecedor2.com.br',
            'uf' => 'SP',
            'email' => 'fornecedor@teste2',
        ]);
    }
}
