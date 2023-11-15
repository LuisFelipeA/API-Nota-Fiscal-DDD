<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // valor da nota, número da nota, data de emissão
    public function up(): void
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('valor_nota', 15, 2);
            $table->integer('numero_nota');
            $table->date('data_emissao');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
