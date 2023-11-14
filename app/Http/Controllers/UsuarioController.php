<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
<<<<<<< HEAD
use League\CommonMark\Delimiter\Delimiter;
=======
>>>>>>> 76b4a21d584509c823853d84cd334202ab596d68

class UsuarioController extends Controller
{
    public function store(UsuarioRequest $request)
    {
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
    public function pesquisarPorId($id)
    {
        $usuario = Usuario::find($id);

        if ($usuario == null) {
            return response()->json([
                'status' => false,
                'message' => "Usuario não encontrada"
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $usuario
        ]);
    }
    public function pesquisarPorCpf($cpf)
    {
        $usuario = Usuario::where('cpf', '=', $cpf)->first();

        if ($usuario == null) {
            return response()->json([
                'status' => false,
                'message' => "Usuario não encontrada"
            ]);

            return response()->json([
                'status' => true,
                'data' => $usuario
            ]);
        }
    }
    public function retornarTodos()
    {
        $usuario = Usuario::all();
        return response()->json([
            'status' => true,
            'data' => $usuario
        ]);
    }

    public function pesquisaPorNome(Request $request)
    {
        $usuarios = Usuario::where('nome', 'like', '%' . $request->nome . '%')->get();

        if (count($usuarios) > 0) {



            return response()->json([
                'status' => true,
                'data' => $usuarios
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Não há resultado para pesquisa.'
        ]);
    }

    public function excluir($id)
    {
        $usuario = Usuario::find($id);
        if (!isset($usuario)) {
            return response()->json([
                'status' => false,
                'message' => "Usuário não encontrado"
            ]);
        }

        $usuario->delete();
        return response()->json([
            'status' => true,
            'message' => "Usuário excluído com sucesso"
        ]);
    }

    public function update(Request $request)
    {
        $usuario = Usuario::find($request->id);

        if (!isset($usuario)) {
            return response()->json([
                'status' => false,
                'message' => "Usuário não encontrado"
            ]);
        }
        
        if(isset($request->email)){
        $usuario-> email = $request->email;
        }
        if(isset($request->nome)){
        $usuario-> nome = $request->nome;
        }
        if(isset($request->cpf)){
        $usuario-> cpf = $request->cpf;
        }
        if(isset($request->celular)){
        $usuario-> celular = $request->celular;
        }

        $usuario->update();

        return response()->json([
            'status' => true,
            'message' => "Usuário atualizado."
        ]);
        
        
    }
<<<<<<< HEAD
    public function exportarCsv(){
        $usuarios = Usuario::all();
    
=======

    public function exportarCsv(){
        $usuarios = Usuario::all();
        
>>>>>>> 76b4a21d584509c823853d84cd334202ab596d68
        $nomeArquivo = 'usuarios.csv';

        $filePath = storage_path('app/public/'. $nomeArquivo);

<<<<<<< HEAD
        $handle = fopen ($filePath, 'w');

        fputcsv($handle, array('Nome', 'E-mail', 'CPF', 'Celular'), ';');

=======
        $handle = fopen($filePath, "w");

        fputcsv($handle, array('Nome', 'E-mail', 'CPF', 'Celular'), ';');
        
>>>>>>> 76b4a21d584509c823853d84cd334202ab596d68
        foreach($usuarios as $u){
            fputcsv($handle, array(
                $u->nome,
                $u->email,
                $u->cpf,
                $u->celular
            ), ';');
        }

        fclose($handle);

        return Response::download(public_path().'/storage/'.$nomeArquivo)->deleteFileAfterSend(true);
<<<<<<< HEAD


            }
 
=======
    }
>>>>>>> 76b4a21d584509c823853d84cd334202ab596d68
}
