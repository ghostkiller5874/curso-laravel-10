@extends('index')

@section('content')
<form class="form" method="POST" action="{{route('atualizar.usuario', $findUsuario->id)}}">
    @csrf {{-- coloca/pega token de sessao --}}
    @method('PUT') {{-- faz o POST ser PUT --}}
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editar Usuario</h1>
</div>
<div class="form-row">
            <div class=" mb-3">
                <label class="form-label">Nome: </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{isset($findUsuario->name) ? $findUsuario->name : old('name')}}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">{{$errors->first('name')}}</div>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">E-mail: </label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{isset($findUsuario->email) ? $findUsuario->email : old('email')}}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">{{$errors->first('email')}}</div>
                @endif
            </div>
  
        <div class="mb-3">
            <label class="form-label">Nova Senha: </label>
            <input id="Cep" type="text" class="form-control @error('password') is-invalid @enderror" name="password"  value="{{@old('password')}}">
            @if($errors->has('password'))
                <div class="invalid-feedback">{{$errors->first('password')}}</div>
            @endif
        </div>
        
        <button type="submit" class="btn btn-success">Atulizar Usuário</button>
    </div>
</form>
@endsection