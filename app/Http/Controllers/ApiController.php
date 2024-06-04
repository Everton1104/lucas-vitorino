<?php

namespace App\Http\Controllers;

use App\Models\Whats;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->token) && $request->token == "testeToken123"){

            $numero = Whats::where('remember_token', 1)->first();
            if(isset($numero)){
                return json_encode(["tarefa" => 1, "numero" => $numero->whats, "nome" => $numero->nome]);
            }
        }
        return json_encode(["response" => "Token invalido"]);
    }
}
