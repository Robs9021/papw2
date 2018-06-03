<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_modulos', function (Blueprint $table) {
            $table->integer('usuario-id')->unsigned()->index();
            $table->foreign('usuario-id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->integer('modulo-id')->unsigned()->index();
            $table->foreign('modulo-id')->references('id')->on('modulos')->onDelete('cascade');
            $table->primary('usuario-id', 'modulo-id');
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
        Schema::dropIfExists('usuario_modulos');
    }
}
