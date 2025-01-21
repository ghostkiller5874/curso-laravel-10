@extends('index')

@section('content')

<form class="form" method="POST" action="{{route('cadastrar.cliente')}}">
    @csrf {{-- coloca/pega token de sessao --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Criar novo cliente</h1>
    </div>
    <div class="form-row">
        <div class="row g-2">
            {{--
                coloco 6, que seria 50%, se nao me engano o bootstrap vai ate 12.
                porem no responsivo nao volta ao 100% e block(na linha de baixo), verificar e corrigir posteriormente            
            --}}
            <div class="col-6 mb-3">
                <label class="form-label">Nome: </label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{@old('nome')}}">
                @if($errors->has('nome'))
                    <div class="invalid-feedback">{{$errors->first('nome')}}</div>
                @endif
            </div>

            <div class="col-6 mb-3">
                <label class="form-label">E-mail: </label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{@old('email')}}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">{{$errors->first('email')}}</div>
                @endif
            </div>
        </div>
  
        <div class="mb-3">
            <label class="form-label">CEP: </label>
            <input id="Cep" type="text" class="form-control @error('cep') is-invalid @enderror" name="cep"  value="{{@old('cep')}}">
            @if($errors->has('cep'))
                <div class="invalid-feedback">{{$errors->first('cep')}}</div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Endereço: </label>
            <input id="Cidade" type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco"  value="{{@old('endereco')}}">
            @if($errors->has('endereco'))
                <div class="invalid-feedback">{{$errors->first('endereco')}}</div>
            @endif
        </div>
        {{--
                endereço e logradouro são a mesma coisa, apenas esta sendo feito de acordo com a aula
            --}}
        <div class="mb-3">
            <label class="form-label">Logradouro: </label>
            <input id="Logradouro" type="text" class="form-control @error('logradouro') is-invalid @enderror" name="logradouro"  value="{{@old('logradouro')}}">
            @if($errors->has('logradouro'))
                <div class="invalid-feedback">{{$errors->first('logradouro')}}</div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Bairro: </label>
            <input id="Bairro" type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro"  value="{{@old('bairro')}}">
            @if($errors->has('bairro'))
                <div class="invalid-feedback">{{$errors->first('bairro')}}</div>
            @endif
        </div>
        
        <button type="submit" class="btn btn-success">Cadastrar Cliente</button>
    </div>
</form>
@endsection