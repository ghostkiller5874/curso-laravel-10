<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

// Models
use App\Models\Vendas;
use App\Models\Produtos;
use App\Models\Cliente;

// Request
use App\Http\Requests\FormRequestVenda;

// Mail
use App\Mail\ComprovanteVendaEmail;

class VendasController extends Controller
{
    public function __construct(Vendas $vendas){
        $this->vendas = $vendas;
    }

    public function index(Request $request){
        $pesquisar = $request->pesquisar;

        $findVendas = $this->vendas->getVendasPesquisarIndex(search: $pesquisar ?? '');
        return view('pages.vendas.paginacao', compact('findVendas'));
    }

    public function cadastrarVenda(FormRequestVenda $request){
        $findNumeracao = Vendas::max('numero_venda') + 1; 
        

        if($request->method() == "POST"){
            $data = $request->all();
            $data['numero_venda'] = $findNumeracao;
            //dd($data);
            Vendas::create($data);

            return redirect()->route('venda.index');
        }

        
        $findProduto = Produtos::all();
        $findCliente = Cliente::all();

        return view('pages.vendas.create', compact('findNumeracao','findProduto','findCliente'));
       
    }

    public function enviarComprovantePorEmail($id){
        $buscaVenda = Vendas::where('id','=', $id)->first();
        $produtoNome = $buscaVenda->produto->nome;
        $clienteNome = $buscaVenda->cliente->nome;
        $clienteEmail = $buscaVenda->cliente->email;

        $sendMailData = [
            'produtoNome' => $produtoNome,
            'clienteNome' => $clienteNome,
        ];

        Mail::to($clienteEmail)->send(new ComprovanteVendaEmail($sendMailData));

        return redirect()->route('venda.index');
    }
}
