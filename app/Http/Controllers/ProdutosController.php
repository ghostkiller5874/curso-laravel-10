<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model
use App\Models\Produtos;

// Request
use App\Http\Requests\FormRequestProduto;

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
        $id = $request->id;
        $buscaRegistro = Produtos::find($id);
        $buscaRegistro->delete();

        return response()->json(['success'=>true]);
    }

    public function cadastrarProduto(FormRequestProduto $request){
        if($request->method() == "POST"){
            // cria os dados
            $data = $request->all();
            Produtos::create($data);

            return redirect()->route('produtos.index');
        }

        return view('pages.produtos.create');
    }
}
