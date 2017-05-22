<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * Aquí se especifican los datos que se han de migrar a la BBDD
     *
     * El campo admin ha sido creado para controlar la gestión de la aplicación
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('telefono');
            $table->string('email',100)->unique();
            $table->string('password');
          //  $table->integer('id_suscripcion')->unsigned();
            //$table->foreign('id_suscripcion')->references('id')->on('tipos_suscripcions');
            $table->date('fecha_nac');
            $table->integer('id_rol')->unsigned();
            $table->foreign('id_rol')->references('id')->on('rols');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('users');
    }

}
