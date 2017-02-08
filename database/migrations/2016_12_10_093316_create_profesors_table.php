<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesors', function (Blueprint $table) {
           $table->increments('id');
           $table->string('name');
           $table->string('last_name');
           $table->string('telefono');          
           $table->date('fecha_nac');
           $table->string('dni',100)->unique();
           $table->string('email',100)->unique();
         
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
        Schema::drop('profesors');
    }
}
