<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contas;
use App\Models\User;
use App\Models\Banco;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




class LoginController extends Controller
{
    public function cadastrar_conta(Request $request){

        //dd($request->get('name'));
        $cadastro = new User;
        $cadastro->name = $request->get('name');
        $cadastro->email = $request->get('email');
        $cadastro->password = bcrypt($request->get('password'));
        //dd('tudo certo');
        $cadastro->save();

        $id = User::orderBy('created_at', 'desc')->select('id','name')->first();
     
        $banco = new Banco;
        $banco->user_id = $id->id;
        $banco->name = $id->name;
        $banco->save();

        return redirect()->route('login');
    }

    public function login_conta(Request $request)
    {
        // Validação dos dados de entrada
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ]);

        // Tentativa de autenticar o usuário
        if (Auth::attempt($credentials)) {
            // Se a autenticação for bem-sucedida
            return redirect()->route('inicio');
        } else {
            // Se a autenticação falhar
            return redirect()->route('login')->withErrors(['login' => 'Credenciais inválidas']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
        }
        
}
