@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
</div>

<div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Produtos Cadastrados</h5>
        <p class="card-text">Total de produtos cadastrados no sistema</p>
        <a href="#" class="btn btn-primary">{{$totalProdutosCadastrados}}</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Clientes Cadastrados</h5>
        <p class="card-text">Total de clientes cadastrados no sistema</p>
        <a href="#" class="btn btn-primary">{{$totalClientesCadastrados}}</a>
      </div>
    </div>
  </div>
</div>

<div class="espaco" style="margin:2rem;"></div>

<div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Vendas Cadastradas</h5>
        <p class="card-text">Total de Vendas cadastradas no sistema</p>
        <a href="#" class="btn btn-primary">{{$totalVendasCadastrados}}</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Usuários Cadastrados</h5>
        <p class="card-text">Total de Usuários cadastrados no sistema</p>
        <a href="#" class="btn btn-primary">{{$totalUsuariosCadastrados}}</a>
      </div>
    </div>
  </div>
</div>

@endsection