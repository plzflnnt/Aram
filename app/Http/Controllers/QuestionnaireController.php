<?php

namespace Aram\Http\Controllers;

use Aram\Questionnaire;
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

        if (Auth::check()) {

        return Redirect::to('login/create');

        }
        return View::make('auth.welcome');
    }

    public function create()
    {

        if (Auth::check()) {

        return View::make('questionnaire.newQuest');

        }
        return View::make('auth.welcome');
    }

    public function store(Request $request)
    {


        if (Auth::check()) {

        //CRIA UM TOKEN PARA A PROVA
        $id = Auth::id();
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $alpha = '';
        $alpha .= $characters[mt_rand(0, 25)];
        $tokenCru = rand (1000,9999);
        $token = dechex($tokenCru).$alpha.$id;
       $rules = array(
            'name' => 'required',
        );

        $validator = Validator::make($request->input(), $rules);

        if($validator->fails()) return Redirect::to('new')
            ->withInput()
            ->withErrors($validator);
        $public = $request->input('public');
        $request = $request->input('name');
        if($public==null){
            $public = false;;
        }else{
            $public = true;
        }


        Questionnaire::create(array('name' => $request,
                'token' => $token,
                'user_id' => $id,
                'public' => $public,
                'quest' => "sv",));

//        DB::table('questionnaire')->insert(
//            [
//                'name' => $request->input('name'),
//                'token' => $token,
//                'user_id' => $id,
//                'public' => true,
//                'quest' => "sv",
//            ]
//        );
        return Redirect::to('new/'.$token.'/edit');

        }
        return View::make('auth.welcome');
    }

    public function show($id)
    {

        if (Auth::check()) {

        $test = DB::table('questionnaire')
            ->select('quest')
            ->where('token',$id)
            ->get();
        $test = get_object_vars($test['0']);
        return View::make('questionnaire.visualizeQuestionnaire')->withTest($test);

        }
        return View::make('auth.welcome');

    }

    public function edit($id)
    {

        if (Auth::check()) {


        //teste se a prova já existe


        $test = DB::table('questionnaire')
            ->select('quest')
            ->where('token',$id)
            ->get();
        $test = get_object_vars($test['0']);

        if ($test["quest"]=="sv") //não existe
        return View::make('questionnaire.questionEdit')->withId($id);
        else
            $uid = Auth::user() -> id;
        $prova = DB::table('questionnaire')
            ->select('quest')
            ->where('user_id', $uid)
            ->where('token', $id)
            ->get();
        $prova = get_object_vars($prova['0']);
            return View::make('questionnaire.questionModify')->withId($id)->withProva($prova);

        }
        return View::make('auth.welcome');
    }

    public function update(Request $request, $id)
    {

        if (Auth::check()) {

        $nomeDaProva = DB::table('questionnaire')
                        ->select('name')
                        ->where('token',$id)
                        ->get();
        $nomeDaProva = get_object_vars($nomeDaProva['0']);

        $input = Input::get('questions');
        $input = " {\"name\":\"".$nomeDaProva['name']."\",\"test\":". $input."}";

        $userId = Auth::id();

        Questionnaire::where('user_id', $userId)
                        ->where('token', $id)
                        ->update(['quest' => $input]);
//        DB::table('questionnaire')
//                        ->where('user_id', $userId)
//                        ->where('token', $id)
//                        ->update(['quest' => $input]);
        return Redirect::to('login/create');

        }
        return View::make('auth.welcome');
    }

    public function destroy($id)
    {


        if (Auth::check()) {

        DB::table('questionnaire')
            ->where('token',$id)
            ->delete();
        return Redirect::to('login/create');

        }
        return View::make('auth.welcome');

    }
}