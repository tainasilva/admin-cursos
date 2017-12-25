@extends('app')
@section('content')

<div class="container">

<form action="store" method="POST" class="form-horizontal">
{{ csrf_field() }}
<fieldset>

<!-- Form Name -->
<legend>Cadastro Certificado</legend>

<!-- Select-->

<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Aluno</label>
  <div class="col-md-4">
  @if(count($alunos) > 0)
   
    <select id="aluno_id" name="aluno_id" class="form-control">
    @foreach ($alunos as $aluno)
      <option value="{{$aluno->id}}">{{$aluno->nome}}</option>
      @endforeach
    </select>
    @endif
  </div>
</div>


<!-- Select-->

<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Cursos</label>
  <div class="col-md-4">
  @if(count($cursos) > 0)
    <select id="curso_id" name="curso_id" class="form-control">
    @foreach ($cursos as $curso)
      <option value="{{$curso->id}}">{{$curso->nome}}</option>
     @endforeach
    </select>
    @endif
  </div>
</div>



<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="Data">Data da Matricula</label>  
<div class="col-md-4">
<input id="datamatricula" name="datamatricula" placeholder="Data da Matricula" class="form-control input-md" value="format('yyyy-MM-dd')" required="" type="date">

</div>
</div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="Data">Data da Conclusão</label>  
<div class="col-md-4">
<input id="dataconclusao" name="dataconclusao" placeholder="Data da Conclusão" class="form-control input-md" value="format('yyyy-MM-dd')" required="" type="date">

</div>
</div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="nota">Nota</label>  
<div class="col-md-4">
<input id="nota" name="nota" placeholder="Nota" class="form-control input-md" required="" type="text">

</div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
    <button  class="btn btn-success">Enviar</button>
    <button id="Limpar" name="Limpar" class="btn btn-primary">Limpar</button>
  </div>
</div>


</fieldset>
</form>

</div>



@stop

@section('content')