@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produtos</h1>
</div>

<div>

    <form action="{{route('produtos.index')}}" method="get">
        <input type="text" name="pesquisar" id="" placeholder="Oque voce procura? ">
        <button>Pesquisar</button>
        <a href="{{route('cadastrar.produto')}}" type="button" class="btn btn-success float-end">Incluir Produto</a>
    </form>

    <div class="table-responsive mt-4">
        @if($findProduto->isEmpty())
        <p>Dados não encontrados</p>
        @else
        
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Valor</th>
              <th scope="col">Ações</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach($findProduto as $produto)

            <tr>
              <td>{{$produto->nome}}</td>
              <td>{{ 'R$'.' '. number_format($produto->valor,2,',','.') }}</td>
              <td>
                <a href="#" class="btn btn-light btn-small">Editar</a>
                <meta name="csrf-token" content="{{csrf_token()}}">
                <a onclick="deleteRegistroPaginacao('{{route('produtos.deletar')}}',{{$produto->id}})" class="btn btn-danger btn-small">Excluir</a>
              </td>
            </tr>

            @endforeach
            
            
          </tbody>
        </table>
        @endif
      </div>

</div>

@endsection