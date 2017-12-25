<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunoCertificado extends Model
{
    protected $table = 'aluno_certificado';
    public $timestamps = false;

    public function aluno(){
        return $this->belongsTo(Aluno::class);
        
    }

    public function curso(){
        return $this->belongsTo(Curso::class);
    }
    
}
