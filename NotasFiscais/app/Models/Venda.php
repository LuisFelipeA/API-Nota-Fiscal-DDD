<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = ['valor_nota', 'numero_nota', 'data_emissao', 'cliente_id'];

    public function cliente() {
        return $this->belongTo('App\Models\Cliente');
    }
}
