@extends('app')
@section('content')

<div class="container">

<form action="store" method="POST" class="form-horizontal">
{{ csrf_field() }}
<fieldset>

<!-- Form Name -->
<legend>Cadastrar Curso</legend>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="nome">Nome</label>
<div class="col-md-4">
<input id="nome" name="nome" placeholder="Nome" class="form-control input-md" required="" type="text">

</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label" for="inativo">Inativo</label>
<div class="col-md-4">
<label class="radio-inline" for="tipo-0">
  <input name="inativo" id="tipo-0" value="0" checked="checked" type="radio">
  Não
</label>
<label class="radio-inline" for="tipo-1">
  <input name="inativo" id="tipo-1" value="1" type="radio">
  Sim
</label>
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
