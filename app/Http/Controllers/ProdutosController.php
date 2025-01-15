<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

// Model
use App\Models\Produtos;
use App\Models\Componentes;

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
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);

            //dd($data);
            Produtos::create($data);

            Toastr::success('Produto cadastrado com sucesso!');
            return redirect()->route('produtos.index');
        }

        return view('pages.produtos.create');
    }

    public function atualizarProduto(FormRequestProduto $request, $id){
        if($request->method() == "PUT"){
            // atualiza os dados
            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);

            //dd($data);
            $buscaRegistro = Produtos::find($id);
            $buscaRegistro->update($data);

            Toastr::success('Produto atualizado com sucesso!');
            return redirect()->route('produtos.index');
        }

        $findProduto = Produtos::where('id','=',$id)->first();
        return view('pages.produtos.atualiza', compact('findProduto'));
    }
}
