<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VendasController;

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

Route::get('/', function () {
    return view('index');
});


// PRODUTOS
Route::prefix('produtos')->group(function(){
    // principal
    Route::get('/',[ProdutosController::class, 'index'])->name('produtos.index');
    
    // cadastrar
    Route::get('/cadastrarProduto',[ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    Route::post('/cadastrarProduto',[ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    
    // Editar
    Route::get('/atualizarProduto/{id}',[ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
    Route::put('/atualizarProduto/{id}',[ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');

    // deletar
    Route::delete('/delete',[ProdutosController::class, 'deletar'])->name('produtos.deletar');
});

// CLIENTES
Route::prefix('clientes')->group(function(){
    // principal
    Route::get('/',[ClientesController::class, 'index'])->name('cliente.index');
    
    // cadastrar
    Route::get('/cadastrarCliente',[ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    Route::post('/cadastrarCliente',[ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    
    // Editar
    Route::get('/atualizarCliente/{id}',[ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    Route::put('/atualizarCliente/{id}',[ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');

    // deletar
    Route::delete('/delete',[ClientesController::class, 'deletar'])->name('cliente.deletar');
});

// VENDAS
Route::prefix('vendas')->group(function(){
    // principal
    Route::get('/',[VendasController::class, 'index'])->name('venda.index');
    
    // cadastrar
    Route::get('/cadastrarVenda',[VendasController::class, 'cadastrarVenda'])->name('cadastrar.venda');
    Route::post('/cadastrarVenda',[VendasController::class, 'cadastrarVenda'])->name('cadastrar.venda');
    Route::get('/enviarComprovantePorEmail/{id}',[VendasController::class, 'enviarComprovantePorEmail'])->name('enviarComprovantePorEmail.venda');
});
