@extends('app')
@section('content')

<div class="col-md-10 col-md-offset-1">

  <div class="panel panel-default panel-table">
    <div class="panel-heading">
      <div class="row">
        <div class="col col-xs-6">
          <h3 class="panel-title">Lista Alunos</h3>
        </div>

        <div class="col col-xs-6 text-right">
          <a href="{{url('alunos')}}/create" class="btn btn-sm btn-primary btn-create">Add novo aluno</a>
        </div>
      </div>
    </div>
    <div class="panel-body">
      <table class="table table-striped table-bordered table-list">
        <!-- <div class="pull-left ">
        <button class="btn btn-default btn-xs btn-filter clickable filter" data-toggle="tooltip">
        <span class="glyphicon glyphicon-filter"></span> Filtro
      </button>
    </div> -->
     <div class="col-md-5" style="margin-bottom:20px;margin-left: -14px;">
      <form action="{{url('alunos')}}/filtro" method="POST">
        {{ csrf_field() }}
         <div class="input-group">
          <input class="form-control" id="nome" name="nome" placeholder="Informe o nome que deseja buscar" required >
          <span class="input-group-btn">
            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
          </span>
        </div>
      </form>
    </div>

    <thead>
      <tr>

        <th>ID</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Data de Nascimento</th>
        <th>Senha</th>
        <th>Telefone</th>
        <th>Data de Cadastro</th>
        <th>Matriculado</th>
        <th class="text-center">Action</th>
      </tr>


    </thead>
    @foreach ($alunos as $aluno)
    <tr>
      <td>{{$aluno->id}}</td>
      <td>{{$aluno->nome}}</td>
      <td>{{$aluno->email}}</td>
      <td>{{date( 'd/m/Y' , strtotime($aluno->data_nascimento))}}</td>
      <td>{{$aluno->senha}}</td>
      <td>{{$aluno->telefone}}</td>
      <td>{{date( 'd/m/Y' , strtotime($aluno->datacadastro))}}</td>
      <td>{{$aluno->matriculado = 1 ? "Sim" : "Não"}}</td>
      <td align="center">

          <button type="submit" class="btn btn-success" data-toggle="modal" data-target=".bootstrap-modal">
            <em class="fa fa-save">Emitir certificado</em>
          </button>


        <form action="{{url('alunos')}}/edit/{{$aluno->id}}" method="GET" style="float:left; margin-left: 10px;">
          <button type="submit" class="btn btn-default">
            <em class="fa fa-pencil"></em>
          </button>
        </form>

        <form action="{{url('alunos')}}delete/{{ $aluno->id }}" method="POST" style="float:left; margin-left: 10px;">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-danger">
            <em class="fa fa-trash"></em>
          </button>

        </form>

      </td>
    </tr>
    @endforeach
  </table>
</div>

</div>
<div class="panel-footer">
  <div class="row">
    <div class="col col-xs-4">Page 1 of 5
    </div>
    <div class="col col-xs-8">
        {{ $alunos->links() }}
      </ul>
    </div>
  </div>
</div>
</div>
</div>

<div class="modal fade bootstrap-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>



@stop

@section('content')
