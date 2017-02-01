<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuscripcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suscripcions', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->primarykey();
            $table->integer('tipos_suscripcions_id')->unsigned()->primarykey();
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tipos_suscripcions_id')->references('id')->on('tipos_suscripcions');
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
        Schema::drop('suscripcions');
    }
}
