<?php

namespace App\Http\Controllers;

use App\Aluno;
use Illuminate\Http\Request;


class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::orderBy('created_at', 'desc')->paginate(10);

        return view('aluno.index', ['alunos' => $alunos]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aluno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $alunos = new Aluno();
        $alunos->nome = $request->nome;
        $alunos->matriculado = $request->matriculado;
        $alunos->datacadastro = date("Y/m/d");
        $alunos->email = $request->email;
        $alunos->telefone = $request->telefone;
        $alunos->data_nascimento = $request->data_nascimento;
        $alunos->senha = $request->senha;

        $alunos->save();

        return redirect('/alunos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('aluno.edit', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aluno $aluno)
    {

        $aluno = Aluno::findOrFail($request->id);

        $aluno->nome = $request->nome;
        $aluno->matriculado = $request->matriculado;
        $aluno->datacadastro = date("Y/m/d");
        $aluno->email = $request->email;
        $aluno->telefone = $request->telefone;
        $aluno->data_nascimento = $request->data_nascimento;
        $aluno->senha = $request->senha;

        $aluno->save();

        return redirect()->route('alunos.index')->with('message', 'Aluno alterado com sucesso!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alunos = Aluno::findOrFail($id);
        $alunos->delete();

        return redirect('/alunos')->with('alert-success','Aluno deletado com sucesso');
    }

    public function filter(Request $request)
    {
        $name = $request->nome;

        $aluno = Aluno::where('nome',$name)
                        ->orWhere('nome', 'like', "%" .$name. "%")
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);


        return view('aluno.index', ['alunos' => $aluno ]);
    }

    public function certificado()
    {

        $certificado =  AlunoCertificado::select('alunos.*', 'cursos.*')
                        ->join('alunos', 'alunos.id', '=', 'aluno_certificado.aluno_id')
                        ->join('cursos', 'cursos.id', '=', 'aluno_certificado.curso_id')
                        ->select('aluno_certificado.*', 'alunos.nome as nome_aluno', 'cursos.nome as nome_curso')
                        ->toSql();

        return Response::json($certificado);
    }


}
