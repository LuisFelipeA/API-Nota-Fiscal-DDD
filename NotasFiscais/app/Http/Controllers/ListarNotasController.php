<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Venda;

class ListarNotasController extends Controller
{
    public function Listar($id) {
        // Buscando cliente pelo ID
        $cliente = Cliente::find($id);
    
        if (!$cliente) {
            return response()->json([
                'message' => 'Cliente não encontrado'
            ], 404);
        }
    
        // Buscando todas as notas do cliente
        $notas = Venda::where('cliente_id', $id)->get(['valor_nota', 'data_emissao']);
        //$notas = Venda::where('cliente_id', $id)->get();
    
        // Somando valor total das notas
        $valorTotalDasNotas = $notas->sum('valor_nota');
    
        $response = [
            'id' => $cliente->id,
            'nome' => $cliente->nome,
            'email' => $cliente->email,
            'notas' => $notas,
            'valor_total_das_notas' => $valorTotalDasNotas,
        ];
    
        return response()->json($response, 200);
    }
    
}
