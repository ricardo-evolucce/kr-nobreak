<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaEquipamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


         Schema::create('marcas', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nome')->unique();
        });

        Schema::create('modelos', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nome');
            $table->unsignedBigInteger('marca_id');
            $table->foreign('marca_id')->references('id')->on('marcas');
        });



        Schema::create('equipamentos', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('marca_id');
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->unsignedBigInteger('modelo_id');
            $table->foreign('modelo_id')->references('id')->on('modelos');
            $table->string('numero_serie', 30)->unique();
            $table->string('potencia', 10);
            $table->string('fator_potencia');
            $table->unsignedBigInteger('tensao_entrada');
            $table->unsignedBigInteger('tensao_saida');
            $table->string('numero_nfe', 10);
            $table->string('observacoes', 800);
            $table->string('observacoes_internas', 800);
            $table->date('inicio_garantia');
            $table->unsignedBigInteger('fim_garantia');
            $table->timestamps(0);

        });

        



       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('equipamentos');
    }
}