@extends('app')
@section('content')

<div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Lista Certificados</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                    <a href="{{url('certificados')}}/relatorio/alunos" class="btn btn-sm btn-primary btn-create">Relatorio Alunos</a>
                    <a href="{{url('certificados')}}/relatorio/cursos" class="btn btn-sm btn-primary btn-create">Relatorio Cursos</a>
                  <a href="{{url('certificados')}}/create" class="btn btn-sm btn-primary btn-create">Add novo certifcado</a>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
            <th>ID</th>
            <th>Aluno</th>
            <th>Curso</th>
            <th>Data da Matricula</th>
            <th>Data da Conclusão</th>
            <th>Nota</th>
            <th class="text-center">Action</th>
        </tr>


    </thead>
    @foreach ($results as $result)

            <tr>
                <td>{{$result->id}}</td>
                <td>{{$result->nome_aluno}}</td>
                <td>{{$result->nome_curso}}</td>
                <td>{{date( 'd/m/Y' , strtotime($result->datamatricula))}}</td>
                <td>{{date( 'd/m/Y' , strtotime($result->dataconclusao))}}</td>
                <td>{{$result->nota}}</td>
                <td align="center">
                <form action="{{url('certificados')}}/edit/{{ $result->id }}" method="GET" style="float:left">
                    <button type="submit" class="btn btn-default">
                        <em class="fa fa-pencil"></em>
                    </button>
                </form>

                <form action="{{url('certificados')}}/delete/{{ $result->id }}" method="POST" style="float:left; margin-left: 10px;">
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
    <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-4">Page 1 of 5
                  </div>
                  <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right">
                    {{ $results->links() }}
                    </ul>
                  </div>
                </div>
              </div>
            </div>
</div>


@stop

@section('content')
