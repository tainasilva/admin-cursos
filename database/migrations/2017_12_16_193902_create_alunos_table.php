<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table){
            $table->engine = 'InnoDB';

            $table->bigIncrements('id', 20);
            $table->integer('matriculado')->nullable();
            $table->date('datacadastro')->nullable();
            $table->string('nome', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('senha', 20)->nullable();
            $table->string('telefone', 25)->nullable();
            $table->date('data_nascimento');
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
        Schema::drop('alunos');
    }
}
