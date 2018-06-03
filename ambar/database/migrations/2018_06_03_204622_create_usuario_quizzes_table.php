<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_quizzes', function (Blueprint $table) {
            $table->integer('usuario-id')->unsigned()->index();
            $table->foreign('usuario-id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->integer('quiz-id')->unsigned()->index();
            $table->foreign('quiz-id')->references('id')->on('quizzes')->onDelete('cascade');
            $table->primary('usuario-id', 'quiz-id');
            $table->integer('status');
            $table->integer('score');
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
        Schema::dropIfExists('usuario_quizzes');
    }
}
