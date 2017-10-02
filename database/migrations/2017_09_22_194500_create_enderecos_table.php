<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logradouro');
            $table->string('bairro');
            $table->integer('numero');
            $table->string('cep');
            $table->string('complemento');
            $table->string('pontoRef');
            $table->integer('idCidade')->unsigned();;
            $table->integer('idCliente')->unsigned();
            $table->foreign('idCidade')->references('id')->on('cidades');
            $table->foreign('idCliente')->references('id')->on('clientes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
