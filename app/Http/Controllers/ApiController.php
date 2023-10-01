<?php

namespace App\Http\Controllers;

use App\Models\Estudante;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    // GET ALL
    public function getAllEstudantes()
    {
        $estudantes = \App\models\Estudante::get()->toJson(JSON_PRETTY_PRINT);
        return response($estudantes, 200); // HTTP_CODE significa sucesso
    }

    // POST
    public function createEstudante(Request $request)
    {
        $estudante = new Estudante;
        $estudante->nome = $request->nome;
        $estudante->cpf = $request->cpf;
        $estudante->curso = $request->curso;

        $estudante->save();

        return response()->json(
            [
                "mensagem" => "estudante criado com sucesso."
            ]
        );
    }

    // PUT
    public function updateEstudante(Request $request, $id)
    {

        //dd($request);
        if (Estudante::where('id', $id)->exists()) {
            $estudante = Estudante::find($id);
            //dd($estudante);
            $estudante->nome = is_null($request->nome) ? $estudante->nome : $request->nome;
            $estudante->cpf = is_null($request->cpf) ? $estudante->cpf : $request->cpf;
            $estudante->curso = is_null($request->curso) ? $estudante->curso : $request->curso;

            $estudante->save();

            return response()->json([
                "mensagem" => "Regitro alterado com sucesso!"
            ]);
        } else {
            return response()->json(
                ["mensagem" => "estudante não encontrado"], 404 // HTTP_CODE significa não encontrado
            );
        }
    }

    // DELETE
    public function deleteEstudante($id)
    {
        if (Estudante::where('id', $id)->exists()) {

            $estudante = Estudante::find($id);
            $estudante->delete();

            return response()->json([
                "mensagem" => "Regitro deletado com sucesso!"
            ]);
        } else {
            return response()->json(
                ["mensagem" => "estudante não encontrado"], 404 // HTTP_CODE significa não encontrado
            );
        }
    }

    // GET ONE
    public function getEstudante($id)
    {
        if (Estudante::where('id', $id)->exists()) {

            $estudante = Estudante::find($id)->toJson(JSON_PRETTY_PRINT);

            return response($estudante, 200);
        } else {
            return response()->json(
                ["mensagem" => "estudante não encontrado"], 404 // HTTP_CODE significa não encontrado
            );
        }
    }
}
