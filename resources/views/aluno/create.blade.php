@extends('app')
@section('content')

<div class="container">

<form action="store" method="POST" class="form-horizontal">
{{ csrf_field() }}
<fieldset>

<!-- Form Name -->
<legend>Cadastro Aluno</legend>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="nome">Nome</label>
<div class="col-md-4">
<input id="nome" name="nome" placeholder="Nome" class="form-control input-md" required="" type="text">

</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label" for="matriculado">Matriculado</label>
<div class="col-md-4">
<label class="radio-inline" for="tipo-0">
  <input name="matriculado" id="tipo-0" value="1" checked="checked" type="radio">
  Sim
</label>
<label class="radio-inline" for="tipo-1">
  <input name="matriculado" id="tipo-1" value="0" type="radio">
  Não
</label>
</div>
</div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="E-mail">E-mail</label>
<div class="col-md-4">
<input id="email" name="email" placeholder="seu@email.com.br" class="form-control input-md" required="" type="text">

</div>
</div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="senha">Senha</label>
<div class="col-md-4">
<input id="senha" name="senha" placeholder="Senha" class="form-control input-md" required="" type="password">

</div>
</div>


<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="Telefone">Telefone</label>
<div class="col-md-4">
<input id="telefone" name="telefone" placeholder="Telefone" class="form-control input-md" required="" type="text">

</div>
</div>


<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="Data">Data de Nascimento</label>
<div class="col-md-4">
<input id="data_nascimento" name="data_nascimento" placeholder="Data de Nascimento" class="form-control input-md" value="format('yyyy-MM-dd')" required="" type="date">

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
