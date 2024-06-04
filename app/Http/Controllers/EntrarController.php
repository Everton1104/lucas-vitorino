<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Whats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class EntrarController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->whats)){
            $request['whats'] = str_replace(" ","",$request->whats);
            $request['whats'] = str_replace("(","",$request->whats);
            $request['whats'] = str_replace(")","",$request->whats);
            $request['whats'] = str_replace("-","",$request->whats);
            Validator::make($request->all(), [
                'whats' => 'required|max:14|min:14',
            ],[
                'required' => 'É necessário inserir seu número de Whatsapp',
                'max' => 'O número do whatsapp deve conter 11 digitos Ex.: (11) 9 1234-5678',
                'min' => 'O número do whatsapp deve conter 11 digitos Ex.: (11) 9 1234-5678',
            ])->validate();
            $usuario = Whats::where('whats', $request['whats'])->first();
            if(isset($usuario->id)){
                return view('entrar', compact('usuario'));
            }else{
                return view('entrar')->with('whats', $request['whats']);
            }
        }
        return view('entrar');
    }

    public function store(Request $request){
        Validator::make($request->all(), [
            'nome' => 'required|min:3',
        ],[
            'required' => 'É necessário inserir seu nome ou apelido.',
            'min' => 'Seu nome ou apelido deve conter ao menos 3 letras',
        ])->validate();
        if(isset(Whats::where('whats', $request['whats'])->first()->id)){
            return redirect()->back();
        }
        $usuarioCriado = Whats::create([
            'whats'=>$request->whats,
            'nome' => $request->nome,
        ]);
        //chamar bot
        return view('entrar', compact('usuarioCriado'));
    }

    public function edit($id){
        $usuarioCriado = Whats::find($id);
        //chamar bot
        return view('entrar', compact('usuarioCriado'));
    }

    public function show($id, Request $request){
        Validator::make($request->all(), [
            'pass' => 'required|min:6',
        ],[
            'required' => 'É necessário inserir sua senha.',
        ])->validate();
        $user = Whats::find($id);
        if(isset($user->password)){
            if(Hash::check($request->pass, $user->password)){
                $dados = Agenda::whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->get();
                return view('agenda', compact('dados'));
            }else{
                throw ValidationException::withMessages(['pass' => 'Senha incorreta.']);
            }
        }else{
            throw ValidationException::withMessages(['pass' => 'Você ainda não criou sua senha. Clique no botão (Esqueci minha senha) a baixo para defini-la.']);
        }
    }
}
