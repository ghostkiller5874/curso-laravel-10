@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Vendas</h1>
</div>

<div>

    <form action="{{route('venda.index')}}" method="get">
        <input type="text" name="pesquisar" id="" placeholder="Oque voce procura? ">
        <button>Pesquisar</button>
        <a href="{{route('cadastrar.venda')}}" type="button" class="btn btn-success float-end">Adicionar Venda</a>
    </form>

    <div class="table-responsive mt-4">
        @if($findVendas->isEmpty())
        <p>Dados não encontrados</p>
        @else
        
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Produto</th>
              <th scope="col">Numero da venda</th>
              <th scope="col">Cliente</th>              
              <th scope="col">Ações</th>              
            </tr>
          </thead>
          <tbody>
            @foreach($findVendas as $vendas)

            <tr>
              <td>{{$vendas->produto->nome}}</td>
              <td>{{$vendas->numero_venda}}</td>{{--acessavel graças ao belongsTo no model--}}
              <td>{{$vendas->cliente->nome}}</td>{{--acessavel graças ao belongsTo no model--}}
              <td>
                <a href="{{route('enviarComprovantePorEmail.venda', $vendas->id)}}" class="btn btn-light btn-small">Enviar E-mail</a>
              </td>
            </tr>

            @endforeach
            
            
          </tbody>
        </table>
        @endif
      </div>

</div>

@endsection