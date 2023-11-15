<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nome', 'email'];

    public function vendas() {
        return $this->hasMany('App\Models\Venda');
    }
    
}

