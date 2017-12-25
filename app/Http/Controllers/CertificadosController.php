<?php

namespace App\Http\Controllers;

use App\AlunoCertificado;
use Illuminate\Http\Request;

class CertificadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = AlunoCertificado::select('alunos.*', 'cursos.*')
        ->join('alunos', 'alunos.id', '=', 'aluno_certificado.aluno_id')
        ->join('cursos', 'cursos.id', '=', 'aluno_certificado.curso_id')
        ->select('aluno_certificado.*', 'alunos.nome as nome_aluno', 'cursos.nome as nome_curso')
        ->paginate(10);

        return view('certificado.index', ['results' => $results]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Consulta para retornar os nomes dos alunos
        $alunos = AlunoCertificado::select('alunos.*')
        ->rightJoin('alunos', 'alunos.id', '=', 'aluno_certificado.aluno_id')
        ->select('alunos.id', 'alunos.nome')
        ->groupBy('alunos.nome')
        ->get();


        //Consulta para retornar os nomes dos cursos
        $cursos = AlunoCertificado::select('cursos')
        ->rightJoin('cursos', 'cursos.id', '=', 'aluno_certificado.curso_id')
        ->select('cursos.id', 'cursos.nome')
        ->groupBy('cursos.nome')
        ->where('inativo', '=', 0)
        ->get();



        return view('certificado.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $certificados = new AlunoCertificado();

        $certificados->aluno_id = $request->aluno_id;
        $certificados->curso_id = $request->curso_id;
        $certificados->datamatricula = $request->datamatricula;
        $certificados->dataconclusao = $request->dataconclusao;
        $certificados->nota = $request->nota;

        $certificados->save();
        return redirect('/certificados');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AlunoCertificado  $alunoCertificado
     * @return \Illuminate\Http\Response
     */
    public function show(AlunoCertificado $alunoCertificado)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AlunoCertificado  $alunoCertificado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //Consulta para retornar os nomes dos alunos
      $alunos = AlunoCertificado::select('alunos.*')
      ->rightJoin('alunos', 'alunos.id', '=', 'aluno_certificado.aluno_id')
      ->select('alunos.id', 'alunos.nome')
      ->groupBy('alunos.nome')
      ->get();


      //Consulta para retornar os nomes dos cursos
      $cursos = AlunoCertificado::select('cursos')
      ->rightJoin('cursos', 'cursos.id', '=', 'aluno_certificado.curso_id')
      ->select('cursos.id', 'cursos.nome')
      ->groupBy('cursos.nome')
      ->where('inativo', '=', 0)
      ->get();


      $certificado = AlunoCertificado::findOrFail($id);
      return view('certificado.edit', compact('certificado', 'alunos', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AlunoCertificado  $alunoCertificado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlunoCertificado $alunoCertificado)
    {
        $alunoCertificado = AlunoCertificado::findOrFail($request->id);

        $alunoCertificado->aluno_id = $request->aluno_id;
        $alunoCertificado->curso_id = $request->curso_id;
        $alunoCertificado->datamatricula = $request->datamatricula;
        $alunoCertificado->dataconclusao = $request->dataconclusao;
        $alunoCertificado->nota = $request->nota;

        $alunoCertificado->save();

        return redirect()->route('certifcados.index')->with('message', 'Certificado alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AlunoCertificado  $alunoCertificado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $certificados = AlunoCertificado::findOrFail($id);
        $certificados->delete();

        return redirect('/certificados')->with('alert-success','Certificado deletado com sucesso');
    }

    public function relatorioAlunos()
    {
        $results = AlunoCertificado::select('alunos.*','aluno_certificado.*')
        ->select('alunos.nome as nome_aluno',\DB::raw('count(*) as qtd'))
        ->join('alunos', 'alunos.id', '=', 'aluno_certificado.aluno_id')
        ->groupBy('alunos.nome')
        ->orderBy('qtd', 'desc')
        ->limit(100)
        ->paginate(10);

        return view('certificado.relatorioAluno',  ['results' => $results]);
    }

    public function relatorioCursos()
    {
      $results = AlunoCertificado::select('cursos.*','aluno_certificado.*')
              ->select('cursos.nome as nome_curso',\DB::raw('count(*) as qtd'))
              ->join('cursos', 'cursos.id', '=', 'aluno_certificado.curso_id')
              ->groupBy('cursos.nome')
              ->havingRaw(\DB::raw('COUNT(*) > 100'))
              ->orderBy('qtd', 'desc')
              ->paginate(10);


        return view('certificado.relatorioCurso', ['results' => $results]);
    }
}
