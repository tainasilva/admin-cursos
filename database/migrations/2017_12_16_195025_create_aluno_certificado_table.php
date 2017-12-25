<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoCertificadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_certificado', function (Blueprint $table){
            
            $table->engine = 'InnoDB';
            
            $table->bigIncrements('id', 20);
            $table->unsignedBigInteger('aluno_id');    
            $table->unsignedInteger('curso_id');
            $table->date('datamatricula')->nullable();
            $table->date('dataconclusao')->nullable();
            $table->double('nota', 10, 2)->nullable();

            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->foreign('curso_id')->references('id')->on('cursos');
        
        });
      

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::DropIfExists('aluno_certificado');
    }
    
}
