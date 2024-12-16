<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model
use App\Models\Produtos;

class ProdutosController extends Controller
{

    public function __construct(Produtos $produto){
        $this->produto = $produto;
    }


    public function index(Request $request){
        $pesquisar = $request->pesquisar;

        $findProduto = $this->produto->getProdutosPesquisarIndex(search: $pesquisar ?? '');
        return view('pages.produtos.paginacao', compact('findProduto'));
    }

    public function deletar(Request $request){
        
    }
}
