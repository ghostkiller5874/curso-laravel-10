<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

// Model
use App\Models\Cliente;

// Request
use App\Http\Requests\FormRequestClientes;

class ClientesController extends Controller
{
    public function __construct(Cliente $cliente){
        $this->cliente = $cliente;
    }


    public function index(Request $request){
        $pesquisar = $request->pesquisar;

        $findCliente = $this->cliente->getClientesPesquisarIndex(search: $pesquisar ?? '');
        return view('pages.clientes.paginacao', compact('findCliente'));
    }

    public function deletar(Request $request){
        $id = $request->id;
        $buscaRegistro = Cliente::find($id);
        $buscaRegistro->delete();

        return response()->json(['success'=>true]);
    }

    public function cadastrarCliente(FormRequestClientes $request){
        if($request->method() == "POST"){
            // cria os dados
            $data = $request->all();

            //dd($data);
            Cliente::create($data);

            Toastr::success('Cliente cadastrado com sucesso!');
            return redirect()->route('cliente.index');
        }

        return view('pages.clientes.create');
    }

    public function atualizarCliente(FormRequestClientes $request, $id){
        if($request->method() == "PUT"){
            // atualiza os dados
            $data = $request->all();

            //dd($data);
            $buscaRegistro = Cliente::find($id);
            $buscaRegistro->update($data);

            Toastr::success('Cliente atualizado com sucesso!');
            return redirect()->route('cliente.index');
        }

        $findCliente = Cliente::where('id','=',$id)->first();
        return view('pages.clientes.atualiza', compact('findCliente'));
    }
}
