<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_cursos', function (Blueprint $table) {
            $table->integer('usuario-id')->unsigned()->index();
            $table->foreign('usuario-id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->integer('curso-id')->unsigned()->index();
            $table->foreign('curso-id')->references('id')->on('cursos')->onDelete('cascade');
            $table->primary('usuario-id', 'curso-id');
            $table->float('score');
            $table->integer('status');
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
        Schema::dropIfExists('usuario_cursos');
    }
}
