<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    public function alunoCertificado(){
        return $this->hasMany(AlunoCertificado::class);
    }
}
