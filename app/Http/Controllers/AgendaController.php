<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $dados = Agenda::whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->get();
        return view('agenda', compact('dados'));
    }
}
