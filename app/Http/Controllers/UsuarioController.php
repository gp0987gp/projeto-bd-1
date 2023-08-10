<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function store(UsuarioRequest $request){
        $usuario = Usuario::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'celular' => $request->celular,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            "succes" => true,
            "message" => "Usucario cadastrado",
            "data" => $usuario
        ], 200);
    }
}
