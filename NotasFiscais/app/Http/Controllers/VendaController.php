<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;

class VendaController extends Controller
{
    public function Inserir(Request $request) {

        $vendas = Venda::create($request->all());

        return response()->json([
            'message' => 'Venda Criada',
            'Venda' => $vendas
        ], 201);

    }

}