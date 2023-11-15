<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Venda;

class ClienteController extends Controller
{
    //Create
    public function Inserir(Request $request)
    {

        $clientes = Cliente::create($request->all());

        return response()->json([
            'message' => 'Cliente Criado',
            'Cliente' => $clientes
        ], 201);


    }


    //Read
    public function Listar() {
        $clientes = Cliente::all();

        return response()->json($clientes);
    }

    public function ListarPorId($id) {

        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json([
                'message' => 'Cliente não encontrado'
            ], 404);
        }

        return response()->json($cliente, 200);

        }


    //Update
    public function Alterar(Request $request, $id) {
        $cliente = Cliente::find($id);
    
        if (!$cliente) {
            return response()->json([
                'message' => 'Cliente não encontrado'
            ], 404);
        }
    
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:clientes,email,' . $id
        ]);
    
        $cliente->nome = $request->input('nome');
        $cliente->email = $request->input('email');
        $cliente->save();
    
        return response()->json([
            'message' => 'Cliente atualizado com sucesso',
            'Cliente' => $cliente
        ], 200);
    }
    

    //Delete
    public function Deletar($id) {
        // Verifique se o cliente existe
        $cliente = Cliente::find($id);
    
        if (!$cliente) {
            return response()->json([
                'message' => 'Cliente não encontrado'
            ], 404);
        }
    
        $vendas = Venda::where('cliente_id', $id)->get();
    
        foreach ($vendas as $venda) {
            $venda->delete();
        }
    
        $cliente->delete();
    
        return response()->json([
            'message' => 'Cliente Deletado'
        ], 201);
    }

}
