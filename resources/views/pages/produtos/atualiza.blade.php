@extends('index')

@section('content')
<form class="form" method="POST" action="{{route('atualizar.produto', $findProduto->id)}}">
    @csrf {{-- coloca/pega token de sessao --}}
    @method('PUT') {{-- faz o POST ser PUT --}}
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editar produto</h1>
</div>
  <div class="form-row">
  <div class="mb-3">
    <label class="form-label">Nome: </label>
    <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{isset($findProduto->nome) ? $findProduto->nome : old('nome')}}">
    @if($errors->has('nome'))
        <div class="invalid-feedback">{{$errors->first('nome')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label  class="form-label">Valor: </label>
    <input id="mascara_valor" type="text" class="form-control @error('nome') is-invalid @enderror" name="valor" placeholder="Ex: 5.3" value="{{isset($findProduto->valor) ? $findProduto->valor : old('valor')}}">
    @if($errors->has('valor'))
        <div class="invalid-feedback">{{$errors->first('valor')}}</div>
    @endif
  </div>
  
  <button type="submit" class="btn btn-success">Atualizar</button>
</form>
@endsection