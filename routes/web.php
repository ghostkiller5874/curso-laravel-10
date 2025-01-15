<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;

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
