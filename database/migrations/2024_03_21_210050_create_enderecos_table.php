<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomeProvincia');
            $table->string('nomeMunicipio');
            $table->string('nomeBairro');
            $table->string('nomeRua');
            $table->string('numero');
            $table->string('complemento')->nullable();
            $table->string('nomeCompleto');
            $table->string('cpea');
            $table->integer('pedido_id')->unsigned();
            $table->timestamps();
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos');
    }
};
