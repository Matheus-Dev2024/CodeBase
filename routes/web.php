<?php

use App\Http\Controllers\CargosController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LotacaoController;
use App\Http\Controllers\SalvarDadosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UsuariosController::class, 'cadastro']);
Route::get('/lista_usuarios', [UsuariosController::class, 'lista'])->name('lista_usuarios');
Route::get('/cargos', [CargosController::class, 'cargos']);
ROute::get('/cidade', [CidadeController::class, 'cidade']);
Route::get('/lotacao', [LotacaoController::class, 'index']);
Route::get('/genero', [GeneroController::class, 'genero']);
Route::get('/estado', [EstadoController::class, 'estado']);
Route::get('/mostar-lista', [UsuariosController::class, 'mostarLista']);
Route::post('/salvar-dados', [SalvarDadosController::class, 'store']);


Route::get('/usuario/matheus/cadastro', [UsuariosController::class, 'cadastro']);

Route::get('/usuario/listar', [UsuariosController::class, 'grid']);

