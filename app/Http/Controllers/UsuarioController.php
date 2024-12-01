<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UsuarioController extends Controller
{
    public function logar(Request $request){
        $data = [];

        if ($request->isMethod('POST')) {
            $email = $request->input('email');
            $password = $request->input('password');
             // Adicione logs para verificar as credenciais fornecidas
             Log::info("Tentativa de login com email: $email e senha: $password");


            $credential = ['email' => $email, 'password' => $password];

            if (Auth::attempt($credential)) {
                 // Log para indicar que a autenticação foi bem-sucedida
                 Log::info("Login bem-sucedido para o usuário com email: $email");
                return redirect()->route('home');
            }else{
                // Log para indicar que a autenticação falhou
                Log::info("Falha de login para o usuário com email: $email");
                $request->session()->flash('erro', 'Usuário / senha inválidos');
                return redirect()->route('logar');
            }
        }

        return view('logar', $data);
    }


    public function sair(){
        Auth::logout();
        return redirect()->route('home');
    }


}
