<?php

namespace App\Http\Controllers;

use App\Models\Whats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ApiController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->token) && $request->token == "testeToken123"){

            //PEDIR SENHA
            if(isset($request->pedirSenha) && isset($request->numero)){
                $user = Whats::where('whats', '=', $request->numero)->first();
                $user->update(["remember_token" => 2]);
            }

            //PROCURA NUMERO
            if(isset($request->numero)){
                $user = Whats::where('whats', '=', $request->numero)->first();
                if(isset($user->nome)){
                    if($user->remember_token == 2){
                        return json_encode(["res" => true, "tarefa" => 1, "nome" => $user->nome, "numero" => $user->numero]);
                    }
                    return json_encode(["res" => true, "nome" => $user->nome, "numero" => $user->numero]);
                }else{
                    return json_encode(["response" => "Numero nao encontrado"]);
                }

            }

            // ARMAZENA A SENHA
            if(isset($request->senha) && isset($request->numero)){
                $numero = Whats::where('whats', '=', $request->whats)->first();
                $numero->update(['remember_token' => 3, "password" => Hash::make($request->senha)]);
                return json_encode(["res" => true, "tarefa" => 2, "numero" => $numero->whats, "nome" => $numero->nome]);
            }

            //TAREFA 1
            $numero = Whats::where('remember_token', 1)->first();
            if(isset($numero)){
                return json_encode(["tarefa" => 1, "numero" => $numero->whats, "nome" => $numero->nome]);
            }
        }
        return json_encode(["response" => "Token invalido->".$request->token??'']);
    }
}
