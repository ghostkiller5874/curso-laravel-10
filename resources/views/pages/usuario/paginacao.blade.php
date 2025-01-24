@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Usuario</h1>
</div>

<div>

    <form action="{{route('produtos.index')}}" method="get">
        <input type="text" name="pesquisar" id="" placeholder="Oque voce procura? ">
        <button>Pesquisar</button>
        <a href="{{route('cadastrar.usuario')}}" type="button" class="btn btn-success float-end">Adicionar Usuario</a>
    </form>

    <div class="table-responsive mt-4">
        @if($findUsuario->isEmpty())
        <p>Dados não encontrados</p>
        @else
        
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">E-mail</th>
              <th scope="col">Ações</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach($findUsuario as $usuario)

            <tr>
              <td>{{$usuario->name}}</td>
              <td>{{$usuario->email}}</td>
              <td>
                <a href="{{route('atualizar.usuario',$usuario->id)}}" class="btn btn-light btn-small">Editar</a>
                <meta name="csrf-token" content="{{csrf_token()}}">
                <a onclick="deleteRegistroPaginacao('{{route('usuario.deletar')}}',{{$usuario->id}})" class="btn btn-danger btn-small">Excluir</a>
              </td>
            </tr>

            @endforeach
            
            
          </tbody>
        </table>
        @endif
      </div>

</div>

@endsection