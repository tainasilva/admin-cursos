@extends('app')
@section('content')

<<div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title"> 100 alunos com mais certificados</h3>
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

            <th>Aluno</th>
            <th>Qtd. Certificados</th>

        </tr>


    </thead>
    @foreach ($results as $result)

            <tr>

                <td>{{$result->nome_aluno}}</td>
                <td>{{$result->qtd}}</td>

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
                      {{ $cursos->links() }}
                    </ul>
                  </div>
                </div>
              </div>
            </div>
</div>


@stop

@section('content')
