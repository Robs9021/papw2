<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('imageName');
            $table->string('imageType');
            $table->integer('empresa-id')->unsigned()->index();
            $table->foreign('empresa-id')->references('id')->on('empresas')->onDelete('cascade');
            $table->integer('usuario-id')->unsigned()->index();
            $table->foreign('usuario-id')->references('id')->on('usuarios');
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
        Schema::dropIfExists('usuarios');
    }
}
