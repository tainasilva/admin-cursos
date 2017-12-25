@extends('app')
@section('content')

<<div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Lista Cursos</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                  <a href="{{url('cursos')}}/create" class="btn btn-sm btn-primary btn-create">Add novo curso</a>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>

            <th>ID</th>
            <th>Nome</th>
            <th>Inativo</th>
            <th class="text-center">Action</th>
        </tr>


    </thead>
    <tbody>
    @foreach ($cursos as $curso)
            <tr>
                <td>{{$curso->id}}</td>
                <td>{{$curso->nome}}</td>
                <td>{{$curso->inativo = 1 ? "Não" : "Sim"}}</td>
                <td align="center">
                <form action="{{url('cursos')}}/edit/{{ $curso->id }}" method="GET" style="float:left">

                    <button type="submit" class="btn btn-default">
                        <em class="fa fa-pencil"></em>
                    </button>
                </form>

                <form action="{{url('cursos')}}/delete/{{ $curso->id }}" method="POST" style="float:left; margin-left: 10px;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">
                               <em class="fa fa-trash"></em>
                            </button>

                    </form>
                </td>
            </tr>
            @endforeach
</tbody>
    </table>
    </div>
    </div>

              <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-4">
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
