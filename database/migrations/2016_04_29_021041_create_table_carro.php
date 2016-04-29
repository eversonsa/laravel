<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCarro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros', function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_marca')->unsigned();
            $table->foreign('id_marca')->references('id')->on('marcos_carros');
            $table->string('nome');
            $table->string('placa');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('carros');
    }
}
