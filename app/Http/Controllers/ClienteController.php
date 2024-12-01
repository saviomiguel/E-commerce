<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Endereco;

class ClienteController extends Controller
{
    public function cadastrar(Request $request){
        $data = [];
        return view('cadastrar', $data);
    }

 
    public function cadastrarCliente(Request $request) {
        try {
            \DB::beginTransaction(); //começa uma transação no banco de dados
            // Criar usuário
                $usuario = User::create([
                    'nome' => $request->nome,
                    'login' => $request->login,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);
        
            \DB::commit(); //confirmando a transação
            \DB::rollback(); // Se der erro, cancela a transação
            $request->session()->flash('ok', 'Usuário cadastrado');
        } catch (\Throwable $th) {
            $request->session()->flash('erro', 'Usuário não cadastrado');
        }
    
        return redirect()->route('cadastrar');
    }
    
}
