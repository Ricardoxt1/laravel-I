<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * get
 *post
 *put
 *delete
 *patch
 *options
 */


Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobrenos', [\App\Http\Controllers\SobreNosController::class, 'sobrenos'])->name('site.sobrenos');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', function () {
    return 'login';
})->name('site.login');

/**
 * possivel fazer o agrupamento de rotas utilizando GROUP
 * renomeando as rotas utilizando name
 */
Route::prefix('/app')->group(function () {

    Route::get('/clientes', function () {
        return 'clientes';
    })->name('app.clientes');

    Route::get(
        '/fornecedores',
        [\App\Http\Controllers\FornecedorController::class, 'index']
    )->name('app.fornecedores');

    Route::get(
        '/produtos',
        function () {
            return 'produtos';
        }
    )->name('app.produtos');
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
