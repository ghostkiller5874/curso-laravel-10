<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// Models
use App\Models\User;

// Request
use App\Http\Requests\UsuarioFormRequest;


class UsuarioController extends Controller
{
    //
    public function __construct(User $user){
        $this->user = $user;
    }

    public function index(Request $request){
        $pesquisar = $request->pesquisar;
        $findUsuario = $this->user->getUsuariosPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.usuario.paginacao',compact('findUsuario'));
    }

    public function deletar(Request $request){
        $id = $request->id;
        $buscaRegistro = User::find($id);
        $buscaRegistro->delete();

        return response()->json(['success'=>true]);
    }

    public function cadastrarUsuario(UsuarioFormRequest $request){
        if($request->method() == "POST"){
            // cria os dados
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            //dd($data);
            User::create($data);

            Toastr::success('Cliente cadastrado com sucesso!');
            return redirect()->route('usuario.index');
        }

        return view('pages.usuario.create');
    }

    public function atualizarUsuario(UsuarioFormRequest $request, $id){
        if($request->method() == "PUT"){
            // atualiza os dados
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);

            //dd($data);
            $buscaRegistro = User::find($id);
            $buscaRegistro->update($data);

            Toastr::success('Cliente atualizado com sucesso!');
            return redirect()->route('usuario.index');
        }

        $findUsuario = User::where('id','=',$id)->first();
        return view('pages.usuario.atualiza', compact('findUsuario'));
    }
}
