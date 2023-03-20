<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteApiController extends Controller
{
    //Traz uma lista com todos os resultados do banco de dados
    public function index()
    {
        return Cliente::all();
    }

    // Traz somente um resultado conforme o ID solicitado
    public function get(string $id)
    {
        return Cliente::findOrFail($id);
    }

    /**
     * Faz a montagem do objeto e salva no banco de dados
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();

        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->cpf = $request->cpf;
        $cliente->telefone = $request->telefone;
       
        $cliente->save();

        return true;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->cpf = $request->cpf;
        $cliente->telefone = $request->telefone;
       
        $cliente->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cliente::findOrFail($id)->delete();
        return true;
    }
}
