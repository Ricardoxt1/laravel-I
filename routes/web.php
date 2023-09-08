<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoProdutoController;
use App\Http\Controllers\PedidoController;

use Illuminate\Support\Facades\Route;

/**
 * get
 *post
 *put
 *delete
 *patch
 *options
 */


Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])
    ->name('site.index')
    ->middleware('log.acesso');

Route::get('/sobrenos', [\App\Http\Controllers\SobreNosController::class, 'sobrenos'])
    ->name('site.sobrenos');

Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])
    ->name('site.contato');

Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'salvar'])
    ->name('site.contato');

Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login');

/**
 * possivel fazer o agrupamento de rotas utilizando GROUP
 * renomeando as rotas utilizando name
 */
Route::middleware('autenticacao:ldap,visitante')->prefix('/app')->group(function () {

    Route::get('/home',[\App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('/sair',[\App\Http\Controllers\LoginController::class, 'sair'])->name('app.sair');

    //rota para fornecedores
    Route::get('/fornecedores',[\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/fornecedores/listar',[\App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::post('/fornecedores/listar',[\App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar');

    // adicionar
    Route::get('/fornecedores/adicionar',[\App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedores/adicionar',[\App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');

    // editar
    Route::get('/fornecedores/editar/{id}/{msg?}',[\App\Http\Controllers\FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::post('/fornecedores/editar/{id}',[\App\Http\Controllers\FornecedorController::class, 'editar'])->name('app.fornecedor.editar');

    //deletar
    Route::get('/fornecedores/excluir/{id}',[\App\Http\Controllers\FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');

   // Define routes for the 'produto' resource
   Route::resource('produto', ProdutoController::class);
   
   // Define routes for the 'produto-detalhe' resource
   Route::resource('produto-detalhe', ProdutoDetalheController::class);
   
   // Define routes for the 'cliente' resource
   Route::resource('cliente', ClienteController::class);
   
   // Define routes for the 'pedido-produto' resource
   Route::resource('pedido-produto', PedidoProdutoController::class);
   
   // Define routes for the 'pedido' resource
   Route::resource('pedido', PedidoController::class);

});

/**
 * rota para teste envio de parâmetro
 */
Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('teste');

/**
 * rota para fallback error 404
 */
Route::fallback(function () {
    echo 'A rota não foi encontrada, para voltar a página menu: <a href="' . route('site.index') . '">clique aqui</a>';
});
