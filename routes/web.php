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


Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal']);

Route::get('/sobrenos', [\App\Http\Controllers\SobreNosController::class, 'sobrenos']);

Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato']);

Route::get('/login', function() { return 'login'; });
Route::get('/clientes', function() { return 'clientes'; });
Route::get('/fornecedores', function() { return 'fornecedores'; });
Route::get('/produtos', function() { return 'produtos'; });


