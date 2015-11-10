<?php

namespace Aram\Http\Controllers;

use Aram\User;
use Illuminate\Http\Request;
use Aram\Http\Requests;
use Aram\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function index()
    {
        return View::make('answer.answerBrowser');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input = Input::all();
        try{
            $test = DB::table('questionnaire')
                ->select('quest')
                ->where('token',$input['token'])
                ->get();
            $test = get_object_vars($test['0']);
            return View::make('answer/newAnswer')->withProva($test)->withToken($input['token']);
        }catch (\Exception $e){
            $erro = "Token inválido";
            return Redirect::to('responder')->withErrors($erro);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //prova
        $input = Input::get('questions');
        $input = " {\"test\":". $input."}";

        //token da prova
        $token = Input::get('token');

        //chave estrangeira da resposta
        $question_id = DB::table('questionnaire')
            ->select('id')
            ->where('token', $token)
            ->get();
        $question_id = get_object_vars($question_id['0']);

        //prova original com resposta
        $test_ans = DB::table('questionnaire')
            ->select('quest')
            ->where('token', $token)
            ->get();
        $test_ans = get_object_vars($test_ans['0']);
        $test_ans = $test_ans["quest"];

        $i = 0;

        //correção
        $resposta = json_decode($input);
        $respostaMatriz = json_decode($test_ans);

        foreach($resposta->test as $ans){
            $ans = get_object_vars($ans);
            $ansC = get_object_vars($respostaMatriz);
            $ansC = $ansC['test'];
            $ansC = get_object_vars($ansC[$i]);
            $i++;

            if($ansC['tipo'] == "objetiva") {
                if ($ans['tipo'] == "objetiva") {
                    //entra nas perguntas objetivas


                    foreach ($ans['resposta'] as $alternativa) {
                        $alternativa = get_object_vars($alternativa);//o identificador é de cada alternativa
                    echo $alternativa['txt'];
                        ?><br> <?php
                        var_dump($ansC);
                        ?><br> <?php
                        //chegou nas alternativas!


                    }
                }
            }
        }



        //nome do cliente
        $nomeDoAluno = Input::get('fname');

        //salva a resposta no banco
//        DB::table('answers')->insert(
//            [
//                'question_id' => $question_id['id'],
//                'name' => $nomeDoAluno,
//                'answers' => $input,
//                'score' => $score,
//            ]
//        );
//        return View::make('answer.ready');
//        return 'oi';

    }

    public function destroy($id)
    {
        //
    }
}
