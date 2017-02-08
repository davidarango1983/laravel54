<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('clases', function (Blueprint $table) {
            $table->increments('id');            
            $table->time('hora_ini')->index();
            $table->time('hora_fin');
            $table->string('dia');
            $table->integer('limit');
            $table->boolean('publicado');     
            $table->integer('profesor_id')->references('id')->on('profesors');
            $table->string('tipo_id')->references('id')->on('tipo_clases');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('clases');
    }

}
