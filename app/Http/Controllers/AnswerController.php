<?php

namespace Aram\Http\Controllers;

use Aram\Answers;
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
        $tests = DB::table('questionnaire')
            ->select('id')
            ->where('token',$id)
            ->get();
        $tests = get_object_vars($tests['0']);
        $tests = $tests['id'];

        $nomeProva = DB::table('questionnaire')
            ->select('name')
            ->where('token',$id)
            ->get();
        $nomeProva = get_object_vars($nomeProva['0']);
        $nomeProva = $nomeProva['name'];


        $anss = DB::table('answers')
            ->select('answers')
            ->where('question_id',$tests)
            ->get();

        $nomes = DB::table('answers')
            ->select('*')
            ->where('question_id',$tests)
            ->paginate(20);

        return View::make('report.questionnaireReport')->withToken($id)->withTests($anss)->withNomes($nomes)->withProva($nomeProva);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //prova
        $input = Input::get('questions');
        $device = Input::get('device');
        $inputSemJSON = $input;
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

        $contA = 0;
        $c = 0;
        $certasEErradas = [];
        foreach($resposta->test as $ans){
            $ans = get_object_vars($ans);
            $ansC = get_object_vars($respostaMatriz);
            $ansC = $ansC['test'];
            $ansC = get_object_vars($ansC[$i]);
            $i++;

            if($ansC['tipo'] == "objetiva") {
                if ($ans['tipo'] == "objetiva") {
                    //entra nas perguntas objetivas
                    $z = 0;

                    $respondidas = 0;
                    $certa = 0;
                    foreach ($ans['resposta'] as $alternativa) {
                        $alternativa = get_object_vars($alternativa);//o identificador é de cada alternativa
                        $resp = $ansC['resposta'];
                        $resp = get_object_vars($resp[$z]);
                        $z++;

                        //se estuver correta:
                        if($resp['alt']==$alternativa['alt']){
                            $respondidas++;
                            $certa++;
                        }else{
                            $respondidas++;
                        }
                        //chegou nas alternativas!
                    }
                    if($respondidas-$certa == 0) {
                        $contA++;
                        $c++;
                        $certasEErradas['q'.$c]="certa";
                    }else{
                        $c++;
                        $certasEErradas['q'.$c]="errada";
                    }
                }
            }
        }

        $inputSemJSON = " {\"res\":".json_encode($certasEErradas).",\"test\":". $input."}";

        //nome do cliente
        $nomeDoAluno = Input::get('fname');

        if($c!=0){
            $contA = ($contA * 100)/$c;
        }else{
            $contA = false;
        }

        //salva a resposta no banco
//        DB::table('answers')->insert(
//            [
//                'question_id' => $question_id['id'],
//                'name' => $nomeDoAluno,
//                'answers' => $inputSemJSON,
//                'score' => $contA,
//            ]
//
        Answers::create(array('question_id' => $question_id['id'],
                'name' => $nomeDoAluno,
                'answers' => $inputSemJSON,
                'score' => $contA,));

        if ($device == "mobile"){
            return View::make('answer.readyMobile')->withAcertos($contA);
        }
        return View::make('answer.ready')->withAcertos($contA);
    }

    public function destroy($id)
    {
        //
    }
}
