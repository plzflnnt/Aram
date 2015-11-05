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

class questionnaireController extends Controller
{

    public function index()
    {
        return View::make('questionnaire.new');
    }

    public function create()
    {
        return View::make('questionnaire.newQuest');
    }

    public function store(Request $request)
    {


        $id = Auth::id();
        $tokenCru = uniqid(rand(), true);
        $token = dechex($tokenCru);

       $rules = array(
            'name' => 'required',
        );

        $validator = Validator::make($request->input(), $rules);

        if($validator->fails()) return Redirect::to('new')
            ->withInput()
            ->withErrors($validator);

        DB::table('questionnaire')->insert(
            [
                'name' => $request->input('name'),
                'token' => $token,
                'user_id' => $id,
                'public' => true,
                'quest' => "sv",
            ]
        );
        return Redirect::to('new/'.$token.'/edit');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        //teste se a prova já existe
//return $id;
        $test = DB::table('questionnaire')
            ->select('quest')
            ->where('token',$id)
            ->get();
        $test = get_object_vars($test['0']);
//        return var_dump($test["quest"]);

        if ($test["quest"]=="1")
        return View::make('questionnaire.questionEdit')->withId($id);
        else
            $uid = Auth::user() -> id;
        $prova = DB::table('questionnaire')
            ->select('quest')
            ->where('user_id', $uid)
            ->where('token', $id)
            ->get();
        $prova = get_object_vars($prova['0']);
//        $prova = json_decode($prova['quest']);
            return View::make('questionnaire.questionModify')->withId($id)->withProva($prova);
    }

    public function update(Request $request, $id)
    {
        $input = Input::get('questions');


$input = " {\"name\":". $input."}";

        $userId = Auth::id();
        DB::table('questionnaire')
                        ->where('user_id', $userId)
                        ->where('token', $id)
                        ->update(['quest' => $input]);
        return Redirect::to('login/create');
    }

    public function destroy($id)
    {
        //
    }
}


//TODO : trazer a logica de banco das provas da view home dos usuários pra ca