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
            $table->string('num_serie', 30)->unique();
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