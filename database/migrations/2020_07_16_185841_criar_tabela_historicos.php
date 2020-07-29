<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaHistoricos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicos', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('equipamento_id');
            $table->unsignedBigInteger('tipo_manutencao');
            $table->date('data_proxima_preventiva');
            $table->foreign('equipamento_id')->references('id')->on('equipamentos');
            $table->date('data');
            $table->string('descricao', 800);
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
        //
    }
}
