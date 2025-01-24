<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Vendas;
use App\Models\Produtos;
use App\Models\Cliente;

class DashboardController extends Controller
{
    public function index(){
        $totalProdutosCadastrados = $this->buscaTotalProdutosCadastrados();
        $totalClientesCadastrados = $this->buscaTotalClientesCadastrados();
        $totalVendasCadastrados = $this->buscaTotalVendasCadastrados();
        //$totalUsuariosCadastrados = $this->buscaTotalUsuariosCadastrados();


        return view('pages.dashboard.dashboard', compact('totalProdutosCadastrados','totalClientesCadastrados','totalVendasCadastrados'));
    }

    private function buscaTotalProdutosCadastrados(){
        $findProduto = Produtos::all()->count();

        return $findProduto;
    }
    private function buscaTotalClientesCadastrados(){
        $findCliente = Cliente::all()->count();

        return $findCliente;
    }
    private function buscaTotalVendasCadastrados(){
        $findVendas = Vendas::all()->count();

        return $findVendas;
    }
    private function buscaTotalUsuariosCadastrados(){
        $findUsuarios = Usuarios::all()->count();

        return $findUsuarios;
    }
}
