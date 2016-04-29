<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLigaCoresCarros extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('liga_cores', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_marca')->unsigned();
            $table->foreign('id_marca')->references('id')->on('carros');
            $table->integer('id_cor')->unsigned();
            $table->foreign('id_cor')->references('id')->on('cores');
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('liga_cores');
    }

}
