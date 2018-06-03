<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('skills');
            $table->string('imageName');
            $table->string('imageType');
            $table->float('score');
            $table->integer('empresa-id')->unsigned()->index();
            $table->foreign('empresa-id')->references('id')->on('empresas')->onDelete('cascade');
            $table->integer('usuario-id')->unsigned()->index();
            $table->foreign('usuario-id')->references('id')->on('usuarios')->onDelete('cascade');
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
        Schema::dropIfExists('cursos');
    }
}
