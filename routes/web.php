<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LogarController;

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


Route::match(['get', 'post'], '/', [ProdutoController::class, 'index'])->name('home');

Route::match(['get', 'post'], '/cadastrar', [ClienteController::class, 'cadastrar'])->name('cadastrar');

Route::match(['get', 'post'], '/cliente/cadastrar', [ClienteController::class, 'cadastrarCliente'])->name('cadastrar_cliente');

Route::match(['get', 'post'], '/logar', [UsuarioController::class, 'logar'])->name('logar');

Route::get( '/sair', [UsuarioController::class, 'sair'])->name('sair');

Route::match(['get', 'post'], '/{idproduto}/carrinho/adicionar', [ProdutoController::class, 'adicionarCarrinho'])->name('adicionar_carrinho');

Route::match(['get', 'post'], '/carrinho', [ProdutoController::class, 'verCarrinho'])->name('ver_carrinho');

Route::match(['get', 'post'], '/{indice}/carrinho/excluir', [ProdutoController::class, 'excluirCarrinho'])->name('carrinho_excluir');

Route::post( '/carrinho/finalizar', [ProdutoController::class, 'finalizar'])->name('carrinho_finalizar');

Route::match(['get', 'post'],'/compras/historico', [ProdutoController::class, 'historico'])->name('compra_historico');


Route::view('preencher/formulario', 'endereco_formulario')->name('endereco'); //View com formulario q consome a API, mas nao quero usa-lo de momento

Route::get('/consultar-endereco', [LogarController::class, 'consumirConsultarEndereco']);



Route::post('/compras/detalhes', [ProdutoController::class, 'detalhes'])->name('compra_detalhes');

Route::post('/compras/endereco-detalhes', [ProdutoController::class, 'detalhesEndereco'])->name('endereco_detalhes');
