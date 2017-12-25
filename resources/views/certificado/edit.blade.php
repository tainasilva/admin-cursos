@extends('app')
@section('content')

<div class="container">

<form action="{{url('certificados')}}/update/{{ $certificado->id }}" method="POST" class="form-horizontal">
{{ csrf_field() }}
{{ method_field('PUT') }}
<fieldset>

<!-- Form Name -->
<legend>Edição Certificado</legend>

<!-- Select-->

<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Aluno</label>
  <div class="col-md-4">
  @if(count($alunos) > 0)

    <select id="aluno_id" name="aluno_id" class="form-control">
    @foreach ($alunos as $aluno)
      <option value="{{$certificado->nome_aluno}}">{{$aluno->nome}}</option>
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
      <option value="{{$certificado->nome_curso}}">{{$curso->nome}}</option>
     @endforeach
    </select>
    @endif
  </div>
</div>



<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="Data">Data da Matricula</label>
<div class="col-md-4">
<input id="datamatricula" value="{{$certificado->datamatricula}}" name="datamatricula" placeholder="Data da Matricula" class="form-control input-md" value="format('yyyy-MM-dd')" required="" type="date">

</div>
</div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="Data">Data da Conclusão</label>
<div class="col-md-4">
<input id="dataconclusao" value="{{$certificado->dataconclusao}}" name="dataconclusao" placeholder="Data da Conclusão" class="form-control input-md" value="format('yyyy-MM-dd')" required="" type="date">

</div>
</div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="nota">Nota</label>
<div class="col-md-4">
<input id="nota" name="nota"  value="{{$certificado->nota}}" placeholder="Nota" class="form-control input-md" required="" type="text">

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
